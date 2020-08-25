<?php
// Including missing functionality from PHP 5.5
include 'array_column.php';

// Location of the CSV file
define("CSVURL", "http://titan.csit.rmit.edu.au/~e54061/wp/letters-home.txt");

class Letters
{
    public function loadLetters()
    {
        // Variables used to retrieve and store letters
        $rowCount = 0;
        $letterKeys = array();
        $lettersReturnVal = array();

        // Open a file handle to the CSV file
        if (($handle = fopen(CSVURL, "r")) !== false)
        {

            // Iterate through the CSV file
            while (($row = fgetcsv($handle, 0, "\t", "\"")) !== false)
            {

                // If we're on the first row, grab the keys
                if ($rowCount == 0)
                {
                    $letterKeys = $row;

                    // Else handle the rows
                    
                }
                else
                {
                    // Populate a temp array for row loading
                    $letterRow = array();

                    // Loop through the keys and grab the values
                    for ($i = 0;$i < count($letterKeys);$i++)
                    {
                        $letterRow[$letterKeys[$i]] = $row[$i];
                    }

                    // Add the temp row to the array of letters
                    $lettersReturnVal[] = $letterRow;
                }

                // Iterate the row count
                $rowCount++;
            }

            // Close the file handle
            fclose($handle);

            // Sort the letters by date
            $dateStart = array_column($lettersReturnVal, 'DateStart');
            array_multisort($dateStart, SORT_ASC, $lettersReturnVal);
        }

        return $lettersReturnVal;
    }

    public function letterYears($lettersInput)
    {
        $letterYearsVal = array();

        // Loop through the letters and populate the years
        for ($i = 0;$i < count($lettersInput);$i++)
        {
            $letterYearsVal[] = date_parse($lettersInput[$i]["DateStart"]) ["year"];
        }

        // Only grab unique records
        $letterYearsVal = array_unique($letterYearsVal);

        // Sort the years
        sort($letterYearsVal);

        // Return the years
        return $letterYearsVal;
    }

    public function printYears($letterYearsInput)
    {
        // The string to represent the letter category years
        $yearsOutput = "";

        // Loop through the letter years
        for ($i = 0;$i < count($letterYearsInput);$i++)
        {
            $yearsOutput .= "<a href=\"#letters$letterYearsInput[$i]\">$letterYearsInput[$i]</a> &ndash; ";
        }

        // Output the list if there is letters, otherwise show "Nothing to show here"
        if (strlen($yearsOutput) > 0)
        {
            return substr($yearsOutput, 0, strlen($yearsOutput) - 8);
        }
        else
        {
            return "Nothing to show here!";
        }
    }

    public function printLetterLists($letterYearsInput, $lettersInput)
    {
        // The string to represent the letter category output
        $yearsListOutput = "";

        // Loop through the letter years
        for ($i1 = 0;$i1 < count($letterYearsInput);$i1++)
        {

            // Print the article header
            $yearsListOutput .= "<article id=\"letters$letterYearsInput[$i1]\">";
            $yearsListOutput .= "<h1>Letters &ndash; $letterYearsInput[$i1]</h1>";

            // Loop through the letters
            for ($i2 = 0;$i2 < count($lettersInput);$i2++)
            {

                // If the letter matches the letter category year
                if (date_parse($lettersInput[$i2]["DateStart"]) ["year"] == $letterYearsInput[$i1])
                {

                    // Print a link to the letter
                    $yearsListOutput .= "<p><a href=\"#letter-$i2\">";

                    if (strlen($lettersInput[$i2]["Transport"]) > 0)
                    {
                        $yearsListOutput .= $lettersInput[$i2]["Transport"] . ", ";
                    }

                    if (strlen($lettersInput[$i2]["Town"]) > 0)
                    {
                        $yearsListOutput .= $lettersInput[$i2]["Town"] . ", ";
                    }

                    if (strlen($lettersInput[$i2]["Country"]) > 0)
                    {
                        $yearsListOutput .= $lettersInput[$i2]["Country"] . ", ";
                    }

                    $yearsListOutput .= date("F jS Y", strtotime($lettersInput[$i2]["DateStart"])) . "</a></p>";
                }
            }

            // Close off the article
            $yearsListOutput .= "</article>";
        }

        return $yearsListOutput;
    }

    public function printLetters($lettersInput)
    {
        // The string to represent the letters output
        $lettersOutput = "";

        // Image counter
        $image_counter = 1;

        // Loop through all the letters
        for ($i = 0;$i < count($lettersInput);$i++)
        {
            // Print the article header
            $lettersOutput .= "<article id=\"letter-$i\">";
            $lettersOutput .= "<h1>";

            if (strlen($lettersInput[$i]["Transport"]) > 0)
            {
                $lettersOutput .= $lettersInput[$i]["Transport"] . ", ";
            }

            if (strlen($lettersInput[$i]["Town"]) > 0)
            {
                $lettersOutput .= $lettersInput[$i]["Town"] . ", ";
            }

            if (strlen($lettersInput[$i]["Country"]) > 0)
            {
                $lettersOutput .= $lettersInput[$i]["Country"] . ", ";
            }

            $lettersOutput .= date("F jS Y", strtotime($lettersInput[$i]["DateStart"])) . "</h1>";

            // Letter container
            $lettersOutput .= "<div class=\"letter\">";
            $lettersOutput .= "<div class=\"letterinner\">";

            // Print the letter content
            $lettersOutput .= "<div class=\"lettercontents letterfront\">";
            $lettersOutput .= "<div class=\"pageturn1\"></div>";
            $lettersOutput .= "<div class=\"lettersubcontents\">";

            // Break the content up over lines
            $text_split = explode("\n", $lettersInput[$i]["Content"]);

            // Output the lines as seperate paragraphs
            for ($i2 = 0;$i2 < count($text_split);$i2++)
            {
                $lettersOutput .= "<p class=\"handwriting\">" . htmlentities($text_split[$i2], ENT_HTML5) . "</p>";
            }

            // Close off the letter front page
            $lettersOutput .= "</div>";
            $lettersOutput .= "</div>";

            // Prints the front page
            $lettersOutput .= "<div class=\"lettercontents letterback\">";
            $lettersOutput .= "<div class=\"pageturn2\"></div>";

            for ($i2 = 1;$i2 <= 3;$i2++)
            {
                // Add the letter image
                $lettersOutput .= "<div class=\"letterimage letterimage$image_counter letterimagepos$i2\"></div>";

                // Add to the image counter
                $image_counter++;

                // If we're at 16, loop back to one
                if ($image_counter == 16)
                {
                    $image_counter = 1;
                }
            }

            // Close off the letter back page
            $lettersOutput .= "</div>";

            // Close off the container
            $lettersOutput .= "</div>";
            $lettersOutput .= "</div>";

            $lettersOutput .= "</article>";
        }

        // Return the letters
        return $lettersOutput;
    }

    public function printBattles($lettersInput)
    {
        // The string to represent the battles output
        $battlesOutput = "";

        // Loop through the letters
        for ($i = 0;$i < count($lettersInput);$i++)
        {
            // If the letter is a battle letter
            if (strlen($lettersInput[$i]["Battle"]) > 0)
            {
                // Print the header
                $battlesOutput .= "<h2>";

                if (strlen($lettersInput[$i]["Transport"]) > 0)
                {
                    $battlesOutput .= $lettersInput[$i]["Transport"] . ", ";
                }

                if (strlen($lettersInput[$i]["Town"]) > 0)
                {
                    $battlesOutput .= $lettersInput[$i]["Town"] . ", ";
                }

                if (strlen($lettersInput[$i]["Country"]) > 0)
                {
                    $battlesOutput .= $lettersInput[$i]["Country"] . ", ";
                }

                $battlesOutput .= date("F jS Y", strtotime($lettersInput[$i]["DateStart"]));

                $battlesOutput .= "</h2>";

                // Print a link to the letter
                $battlesOutput .= "<p><a href=\"#letter-$i\">";

                $battlesOutput .= htmlentities(implode(" ", array_slice(explode(" ", $lettersInput[$i]["Content"]) , 0, 10)) , ENT_HTML5) . "...";

                $battlesOutput .= "</a></p>";
            }
        }

        // Return the battles
        return $battlesOutput;
    }

    public function printLetterSitemapList($letterYearsInput, $lettersInput)
    {
        // The string to represent the letter sitemap output
        $letterSitemapOutput = "";

        // Loop through the letter years
        for ($i1 = 0;$i1 < count($letterYearsInput);$i1++)
        {
            // Print a link to the letter year category
            $letterSitemapOutput .= "<li><a href=\"#letters$letterYearsInput[$i1]\">Letters &ndash; $letterYearsInput[$i1]</a></li>";

            // Start a sublist for the letters
            $letterSitemapOutput .= "<ul>";

            // Loop through the letters
            for ($i2 = 0;$i2 < count($lettersInput);$i2++)
            {
                // If the letter year corresponds to the category year
                if (date_parse($lettersInput[$i2]["DateStart"]) ["year"] == $letterYearsInput[$i1])
                {
                    // Print a link to the letter
                    $letterSitemapOutput .= "<li><a href=\"#letter-$i2\">";

                    if (strlen($lettersInput[$i2]["Transport"]) > 0)
                    {
                        $letterSitemapOutput .= $lettersInput[$i2]["Transport"] . ", ";
                    }

                    if (strlen($lettersInput[$i2]["Town"]) > 0)
                    {
                        $letterSitemapOutput .= $lettersInput[$i2]["Town"] . ", ";
                    }

                    if (strlen($lettersInput[$i2]["Country"]) > 0)
                    {
                        $letterSitemapOutput .= $lettersInput[$i2]["Country"] . ", ";
                    }

                    $letterSitemapOutput .= date("F jS Y", strtotime($lettersInput[$i2]["DateStart"])) . "</a></li>";
                }
            }

            // Close the sublist off
            $letterSitemapOutput .= "</ul>";

        }
        return $letterSitemapOutput;
    }

    public function printBattlesSitemapList($lettersInput)
    {
        // Loop through the letters
        for ($i = 0;$i < count($lettersInput);$i++)
        {

            // If the letter is a battle letter
            if (strlen($lettersInput[$i]["Battle"]) > 0)
            {
                // Print a link to the letter
                echo "<li><a href=\"#letter-$i\">";

                if (strlen($letters[$i]["Transport"]) > 0)
                {
                    echo $letters[$i]["Transport"] . ", ";
                }

                if (strlen($letters[$i]["Town"]) > 0)
                {
                    echo $letters[$i]["Town"] . ", ";
                }

                if (strlen($letters[$i]["Country"]) > 0)
                {
                    echo $letters[$i]["Country"] . ", ";
                }

                echo date("F jS Y", strtotime($letters[$i]["DateStart"])) . "</a></li>";
            }
        }
    }
}
?>

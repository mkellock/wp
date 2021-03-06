<?php
// Include reference to letters.php functionality
include 'letters.php';

// Global letter variables
$lettersFunc = new Letters;
$letters = array();
$letterYears = array();

// Grab the letters and the letter years
$letters = $lettersFunc->loadLetters();
$letterYears = $lettersFunc->letterYears($letters);
?>
<!DOCTYPE html>
<html lang='en'>

<head>
   <title>Assignment 3</title>
   <meta name="description" content="Free Web tutorials">
   <meta name="author" content="Ian Baker">
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="robots" content="noindex">
   <script src="https://kit.fontawesome.com/dcb908c6b2.js" crossorigin="anonymous"></script>
   <script src='../wireframe.js'></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="Scripts/page.js"></script>
   <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>
   <link id='stylecss' type="text/css" rel="stylesheet" href="Styles/style.css">
</head>

<body>
   <header>
      <div class="banner"> <span>ANZAC Douglas Raymond Baker</span> <span class="divider">&nbsp;-&nbsp;</span> <br
            class="break" /> <span>Letters Home</span> </div>
      <div class="progress"></div>
   </header>
   <nav>
      <div class="hamburger hamburger_hide">
         <div class="fas fa-bars" aria-hidden="true"></div>
      </div>
      <div class="menu menu_hide"><a href="#">HOME</a></div>
      <div class="menu menu_hide"><a href="#intro">INTRO.</a></div>
      <div class="menu menu_hide"><a href="#letters">LETTERS</a></div>
      <div class="menu menu_hide"><a href="#battles">BATTLES</a></div>
      <div class="menu menu_hide"><a href="#places">PLACES</a></div>
      <div class="menu menu_hide"><a href="#related">RELATED</a></div>
      <div class="menu menu_hide"><a href="#comments">COMMENTS</a></div>
      <div class="menu menu_hide"><a href="#sitemap">SITEMAP</a></div>
   </nav>
   <main>
      <div id="envelope">
         <div id="envelopeinner">
            <div id="envelopefront">
               <img src="Images/envelopefront.jpg" alt="Front of letter" class="envelopeimg">
               <p class="handwriting">Please click the letter to open it</p>
            </div>
            <div id="envelopeback"> <img src="Images/envelopeback.jpg" alt="Back of letter" class="envelopeimg"> </div>
         </div>
      </div>
      </div>
      <article id="home">
         <div>
            <h1>Hello and welcome</h1>
            <div class="rightfloatbox">
               <img src="Images/baker.jpg" alt="Douglas Raymond Baker" />
               <p class="subtitle">(Photograph courtesy of : John Oxley Library, State Library of Queensland [Image
                  number: 702692-19141024-s0023-0027])</p>
            </div>
            <p>This year is the centenary of the birth of the ANZAC legend. As such, many people, particularly young
               people, are looking for ways to connect with people of that period and inparticular, those who created
               the ANZAC legend.</p>
            <p>This site presents the letters of Douglas Raymond Baker, who came from Gympie, Queensland, Australia. He
               enlisted in August 1914 and during the years that followed, he wrote letters and post cards to his family
               at home. In them, he describes much of the goings-on of the life of an ANZAC, his feeling and opinions,
               and experiences while visiting his relatives in England during leave.</p>
            <p>They start from the beginning of basic training in Brisbane in August 1914 and end in May 1918.</p>
            <p>They are offered here so that others may get an understanding of life as an ANZAC and get a sense of what
               life on the battlefield was like.</p>
            <p>From the menu on the left, read the Introduction to set the scene. Then, to start reading the letters,
               click on Letter and Post Cards in the menu on the left. All the letters are searchable using the search
               bar at the top right of this page.</p>
         </div>
      </article>
      <article id="intro">
         <h1>Introduction</h1>
         <p>By Douglas Richard Baker (son of Douglas Raymond Baker)</p>
         <p>These are copies of letters written by my father Douglas Raymond Baker during the First World War
            (1914-1918) to his family in Gympie. I have three thick exercise books in which the letters were copied in
            hand writing by my Aunt Alice, his sister. I understand that this was done so his letters could be sent on
            to other members of the family. I don&rsquo;t know if the originals are still in existence, probably not.
         </p>
         <p>In the early letters Alice has not included the name of the person they were written to but later she writes
            at the beginning, &ldquo;Letter to Dot&rdquo;, &ldquo;Letter to Mother&rdquo;, etc. and later still copies
            the original, &ldquo;Dear Al&rdquo;, &ldquo;Dear Mag&rdquo;, etc.. Likewise the endings are often not laid
            out fully as we would do but Al may have done this or Dad may have been saving space on the page.</p>
         <p>Some letters are slightly out of date order in the books but as most of these are around the time his father
            died I have put them in the correct order as this is crucial to understanding the sense of the contents. A
            lot will be missing &ndash; many, many ships were sunk but thanks to Aunt Alice we have these copies of the
            ones that did get through.</p>
         <p>Where Dad used brackets in a letter I have used [] style and where I have made any comment or explanation I
            have used ( ) and Italics.</p>
         <p>Where he uses the word &ldquo;gay&rdquo; it is used in the true sense, bright, happy, carefree, etc., This
            is the original meaning of the word before it became associated with the homosexual community.</p>
         <p>The amounts of money are, of course, in Pounds, shillings and pence but as these are out of date and we have
            no pounds sign in the computer I have written them in, sometimes showing the decimal equivalents. One Pound
            equalled $2, one shilling equalled 10 cents and one penny equalled a little under one cent. After a while I
            stopped putting the equivalents in as they had cno significance unless you knew the relative cost of things
            then and now. A shilling &ndash; equivalent to ten cents might actually alent to ten cents might actually
            buy buy ten or twenty dollars worth of goods now.</p>
         <table>
            <caption>Abbreviations and terms</caption>
            <tr>
               <th scope="col">Abbreviation</th>
               <th scope="col">Term</th>
            </tr>
            <tr>
               <td>Coy</td>
               <td>Company(part of a Battalion)</td>
            </tr>
            <tr>
               <td>Batt.</td>
               <td>Battalion</td>
            </tr>
            <tr>
               <td>Col.</td>
               <td>Colonel</td>
            </tr>
            <tr>
               <td>Sergt.</td>
               <td>Sergeant</td>
            </tr>
            <tr>
               <td>Capt.</td>
               <td>Captain</td>
            </tr>
            <tr>
               <td>Lieut.</td>
               <td>Lieutenant (pronounced &ldquo;Lef-tenant&rdquo;)</td>
            </tr>
            <tr>
               <td>Q.M.</td>
               <td>Quarter Master</td>
            </tr>
            <tr>
               <td>Comp.</td>
               <td>also Company</td>
            </tr>
            <tr>
               <td>P.C.</td>
               <td>Post Card (not Personal Computer!)</td>
            </tr>
            <tr>
               <td>C.B.</td>
               <td>Confined to Barracks (leave stopped as a punishment)</td>
            </tr>
            <tr>
               <td>Big hits</td>
               <td>Top ranked officers</td>
            </tr>
            <tr>
               <td>Brass hats</td>
               <td>Top ranked officers</td>
            </tr>
            <tr>
               <td>Dry canteen</td>
               <td>Bar and/or cafeteria, etc. where no alcohol is served</td>
            </tr>
            <tr>
               <td>Wet canteen</td>
               <td>Bar and/or cafeteria, etc. where alcohol is available</td>
            </tr>
            <tr>
               <td>Sapping</td>
               <td>digging a tunnel or deep trench to approach or undermine an enemy position</td>
            </tr>
            <tr>
               <td>L. Horse</td>
               <td>Light Horse</td>
            </tr>
            <tr>
               <td>Good nick or great nick</td>
               <td>Good health</td>
            </tr>
            <tr>
               <td>Bonsorful</td>
               <td>Wonderful, marvellous. (in 2009 speak, &ldquo;awesome&rdquo;, &ldquo;cool&rdquo;)</td>
            </tr>
            <tr>
               <td>M. G. S.</td>
               <td>Machine Gun Section</td>
            </tr>
            <tr>
               <td>Territorials</td>
               <td>Soldiers of the English Volunteer Reserve</td>
            </tr>
            <tr>
               <td>Terriers</td>
               <td>Territorials</td>
            </tr>
            <tr>
               <td>Bomb</td>
               <td>Unless dropped from an aeroplane these would have been Mills</td>
            </tr>
            <tr>
               <td>Bombs</td>
               <td>An early version of the hand grenade</td>
            </tr>
            <tr>
               <td>Blighty</td>
               <td>England</td>
            </tr>
            <tr>
               <td>Duke</td>
               <td>Dad’s/family’s dog</td>
            </tr>
            <tr>
               <td>O.R.</td>
               <td>Orderly Room</td>
            </tr>
         </table>
         <h2>Additional Comments by Ian Stuart Baker (son of Douglas Richard Baker)</h2>
         <p>As the grandson of the Douglas Raymond, I'd like to share some thoughts with modern readers. Apart from the
            language issues that my Dad highlights, it would also help to recognise that in Grandfathers day, the letter
            was the only means of international communications for average people (telegrams were expensive and used
            rarely and international telephone calls, rarer still). That's why these letters are so important and why
            their content gives us window into their lives.</p>
         <p>From discussions with my Dad, it has came to light that the content of letters to his direct family
            deliberately leave out much of the dreadful suffering and drudgery experienced by the diggers. This
            intentional self-editing was intended to allay the fears and concerns of those at home, inparticular, his
            mother and sisters.</p>
         <p>Finally, let me express a debt of thanks to Great Aunt Alice for diligently transcribing the original
            letters for without this effort, we would not have the material we do today. Also, my gratitude to my father
            for his work transforming the hand-written script into a typed paper record and then into electronic format,
            making my part in this infinitely easier.</p>
      </article>
      <article id="letters">
         <h1>Letters</h1>
         <p>Select a year:</p>
         <p class="centeralign">
<?php

// Output the letter years
echo $lettersFunc->printYears($letterYears);

?>
         </p>
      </article>
<?php

// Output the letter list pages
echo $lettersFunc->printLetterLists($letterYears, $letters);

// Output the letter pages
echo $lettersFunc->printLetters($letters);

?>
      <article id="battles">
         <h1>Battles</h1>
<?php

// Output the battle list page
echo $lettersFunc->printBattles($letters);

?>
      </article>
      <article id="places">
         <h1>Places</h1>
         <p>As a matter of interest, I will try to list here the names of places Dad mentions:</p>
         <iframe title="Places D R Baker visted"
            src="https://www.google.com/maps/d/u/1/embed?mid=1Y7bWnCZOAmbgwJPZyyAA4L6vyjMkIoUC&zoom=100"
            class="map"></iframe>
      </article>
      <article id="related">
         <h1>Related</h1>
         <p><a rel="noopener noreferrer" href="https://www.aif.adfa.edu.au/showPerson?pid=11163" target="_blank">Douglas
               Raymond BAKERs summary of service record in the AIF Project</a></p>
         <p><a rel="noopener noreferrer" href="http://recordsearch.naa.gov.au/scripts/Imagine.asp?B=3009496"
               target="_blank">His complete original service record (Note: this is 20 pages long.)</a></p>
         <p><a rel="noopener noreferrer"
               href="https://www.google.com.au/search?hl=en&site=imghp&tbm=isch&source=hp&biw=1920&bih=982&q=Omrah&oq=Omrah&gs_l=img.12...5422.5422.0.6592.1.1.0.0.0.0.212.212.2-1.1.0.msedr...0...1ac.1.62.img..1.0.0.xuc9Jh0uuzM#imgdii=_&imgrc=_XfTmb11-JZqDM%253A%3BrsnzwSFIEHttOM%3Bhttp%253A%252F%252Fwww.nationalanzaccentre.com.au%252Fsites%252Fdefault%252Ffiles%252Fstyles%252Fcharacter_bite_images%252Fpublic%252Fships%252FH02223--2-.jpg%253Fitok%253Dp6xYoFZI%3Bhttp%253A%252F%252Fwww.nationalanzaccentre.com.au%252Fstory%252Frobert-george-hamilton%3B1363%3B1000"
               target="_blank">Picture of the 9th Battalion, AIF, boarding the Omrah, Brisbane</a></p>
         <p><a rel="noopener noreferrer" href="https://www.awm.gov.au/collection/C1378317" target="_blank">Embarkation
               Roll - Australian War Memorial</a></p>
      </article>
      <article id="comments">
         <h1>Comments</h1>
         <div id="contactForm">
            <p>Please fill in the below form to submit any feedback or questions:</p>
            <form id="contact">
               <div> <label for="name">Name</label> <label for="email">Email</label> <label for="mobile">Mobile</label>
                  <label for="subject">Subject</label> <label for="message">Message</label> </div>
               <div>
                  <input type="text" name="name" id="name" pattern="[a-zA-Z]+(([',. -][a-zA-Z])?[a-zA-Z]*)*"
                     title="Please enter a valid name, only English alphabet and basic punctuation to hyphenate or abbreviate allowed"
                     required /> <input type="email" name="email" id="email" required /> <input type="text"
                     name="mobile" id="mobile"
                     pattern="(?:\+?61|0)4?(?:(?:[01] ?[0-9]|2 ?[0-57-9]|3 ?[1-9]|4 ?[7-9]|5 ?[018])?[0-9]|3 ?0 ?[0-5])(?: ?[0-9]){5}"
                     title="Please enter a valid Australian mobile number" /> <input type="text" name="subject"
                     id="subject" required />
                  <textarea name="message" id="message" required></textarea>
                  <div> <input type="checkbox" name="remember" id="remember" /> <label for="remember"><span>Remember
                           Me</span></label> </div>
                  <input type="submit" value="Submit" name="submitForm" id="submitForm">
               </div>
            </form>
         </div>
         <div id="contactFormSuccess"></div>
      </article>
      <article id="sitemap">
         <h1>Sitemap</h1>
         <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="#intro">Introduction</a></li>
            <li><a href="#letters">Letters</a></li>
<?php

// Output the letter sitemap list
echo $lettersFunc->printLetterSitemapList($letterYears, $letters);

?>
            <li><a href="#battles">Battles</a></li>
            <ul>
<?php

// Output the letter sitemap list
echo $lettersFunc->printBattlesSitemapList($letters);

?>
            </ul>
            <li><a href="#places">Places</a></li>
            <li><a href="#related">Related</a></li>
            <li><a href="#comments">Comments</a></li>
            <li><a href="#sitemap">Sitemap</a></li>
         </ul>
      </article>
   </main>
   <footer>
      <div id="copyright">&copy; <?=date ("Y") ; ?> Matthew Kellock - s3812552 - Last modified
         <?=date ("Y F d H:i", filemtime($_SERVER['SCRIPT_FILENAME'])); ?></div>
      <div>Disclaimer: This website is not a real website and is being developed as part of a School of Science Web
         Programming course at RMIT University in Melbourne, Australia.</div>
      <hr>
      <div><button id="toggleWireframeCSS">Toggle Wireframe CSS</button></div>
   </footer>
</body>

</html>
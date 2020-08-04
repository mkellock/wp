<?php
  session_start();

  // Define the regex patterns
  define('NAME_REGEX', '/[a-zA-Z]+(([\',. -][a-zA-Z ])?[a-zA-Z]*)*/i');
  // Email regex from https://emailregex.com/
  define('EMAIL_REGEX', '/^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-[a-z0-9]+)*\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-[a-z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$/iD');
  define('MOBILE_REGEX', '/(?:\+?61|0)4?(?:(?:[01] ?[0-9]|2 ?[0-57-9]|3 ?[1-9]|4?[7-9]|5 ?[018])?[0-9]|3 ?0 ?[0-5])(?: ?[0-9]){5}/i');
  define('VALID_CHARS_REGEX', '/[^a-z0-9_<>\s!@#$%^&*()+={}\[\]|\/:;"\'?.,-]/i');
  // NOTE: There are more valid charcters as per the RFC, but the regex is insane, below is for illustration purposes
  define('VALID_EMAIL_CHARS_REGEX', '/[^a-z0-9@_.-]/i');

  // Check if the form is submitted 
  if (isset($_POST['submitForm'])) { 

    // Retrieve the form data by using the element's name attributes value as key 
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Clean up non acceptable characters
    $name = preg_replace(VALID_CHARS_REGEX, '', $name);
    $email = preg_replace(VALID_EMAIL_CHARS_REGEX, '', $email);
    $mobile = preg_replace(VALID_CHARS_REGEX, '', $mobile);
    $subject = preg_replace(VALID_CHARS_REGEX, '', $subject);
    $message = preg_replace(VALID_CHARS_REGEX, '', $message);

    // Validate the name fields
    if (!strlen($name)) {
      echo '{"status":1,"message":"Please ensure the name field is populated and is a valid name."}';
    
    // Validate the name fields
    } elseif (!strlen($email)) {
      echo '{"status":2,"message":"Please ensure the email field is populated and is a valid email address."}';
    
    // Validate the name fields
    } elseif (!strlen($subject)) {
      echo '{"status":3,"message":"Please ensure the subject field is populated and in English."}';
    
    // Validate the name fields
    } elseif (!strlen($message)) {
      echo '{"status":4,"message":"Please ensure the message field is populated and in English."}';
    
    // Validate the name
    } elseif (!preg_match(NAME_REGEX, $name)) {
      echo '{"status":1,"message":"Please enter a valid name."}';
    
    // Validate the email
    } else if (!preg_match(EMAIL_REGEX, $email)) {
      echo '{"status":2,"message":"Please enter a valid email address."}';
    
    // Validate the mobile
    } else if (isset($email) && !preg_match(MOBILE_REGEX, $mobile)) {
      echo '{"status":5,"message":"Please enter a valid mobile number."}';
    
    // Successful response
    } else {
      echo '{"status":0,"message":"Message sent successfully."}';

      // Store the message
      // Code inspired from https://www.php.net/manual/en/function.fputcsv.php
      $fp = fopen('mail.txt', 'a');
      fseek($fp, 0, SEEK_END);
      fputcsv($fp, array($name, $email, $mobile, $subject, $message));
      fclose($fp);
    }

    exit;
  }
?>
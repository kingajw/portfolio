<?php
if(isset($_POST['send'])) {

    $email_to = "kinga.j.walaszek@gmail.com";

    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }


    // validation expected data exists
    if(!isset($_POST['name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['title']) ||
        !isset($_POST['message'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');
    }



    $name = $_POST['name']; // required
    $email_from = $_POST['email']; // required
    $title = $_POST['title']; // not required
    $message = $_POST['message']; // required
    $email_subject = $_POST['title'];

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }

    $string_exp = "/^[A-Za-z .'-]+$/";

  if(strlen($name) < 2) {
    $error_message .= 'The name you entered does not appear to be valid.<br />';
  }

  if(strlen($title) < 2) {
    $error_message .= 'The title you entered does not appear to be valid.<br />';
  }

  if(strlen($message) < 2) {
    $error_message .= 'The message you entered does not appear to be valid.<br />';
  }

  if(strlen($error_message) > 0) {
    died($error_message);
  }



    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }



    $email_message = "Name: ".clean_string($name)."<br>";
    $email_message .= "Email: ".clean_string($email_from)."<br>";
    $email_message .= "Title: ".clean_string($title)."<br>";
    $email_message .= "Message: ".clean_string($message)."<br>";

// create email headers
$headers =  'MIME-Version: 1.0' . "\r\n";
$headers .= 'From: ' . $name . '<' . $email_from . '>' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
mail($email_to, $email_subject, $email_message, $headers);
?>

<!-- include your own success html here -->

Thank you for contacting me! I will get back to you as soon as I can.

<?php

}
?>

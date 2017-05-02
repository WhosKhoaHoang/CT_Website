<?php
    include("class.phpmailer.php");     
    $contact_us_error = ""; $successMessage = "";

    //Got this from: https://www.w3schools.com/php/php_form_validation.asp
    function clean_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //If there's anything in the $_POST array...(wouldn't it be better to use isset? No because $_POST is always
    //gonna be set with something so the inside of the if block would always be executed?
    if ($_POST) { //I.e., return true was executed in the the submit() method.
                
        if (!$_POST["contact_us_name"]) {
            $contact_us_error .= "- Your name is required.<br/>";
        }
        else if ($_POST["contact_us_name"] && !preg_match("/^[a-zA-Z -]*$/", $_POST["contact_us_name"])) {
            $contact_us_error .= "- Only letters, white space, and dashses are allowed for your name.<br/>";
        }
        else {
            $_POST["contact_us_name"] = clean_input($_POST["contact_us_name"]);
        }
        
        if (!$_POST["contact_us_email"]) {
            $contact_us_error .= "- Your email is required.<br/>";
        }
        else if ($_POST["contact_us_email"] && filter_var($_POST["contact_us_email"], FILTER_VALIDATE_EMAIL === false)) {
            $contact_us_error .= "- The email address you entered is not valid.<br/>";
        }
        else {
            $_POST["contact_us_email"] = clean_input($_POST["contact_us_email"]);
        }
             
        if (!$_POST["contact_us_subject"]) {
            $contact_us_error .= "- A subject is required<br/>";
        }
        else {
            $_POST["contact_us_subject"] = clean_input($_POST["contact_us_subject"]);
        }
                 
        if (!$_POST["contact_us_msg"]) {
            $contact_us_error .= "- Your message is required<br/>";
        }
        else {
            $_POST["contact_us_msg"] = clean_input($_POST["contact_us_msg"]);
        }
    }

    if ($contact_us_error != "") {
        echo("ERRORS:<br/>");
        echo($contact_us_error);
    }
    else {

        //FOR TESTING
        echo("<pre>");
        echo($_POST["contact_us_name"]."<br/>"); //FOR TESTING
        echo($_POST["contact_us_email"]."<br/>"); //FOR TESTING
        echo($_POST["contact_us_subject"]."<br/>"); //FOR TESTING
        echo($_POST["contact_us_msg"]."<br/>"); //FOR TESTING

        
        //Send Email
        $mail = new PHPMailer;
        $mail->From = "blah@ramen.com";
        $mail->FromName = "Ramen";
        $mail->addAddress("whoskhoahoang@gmail.com", "User");     
        $mail->addReplyTo("whoskhoahoang@gmail.com", "Information");

        $mail->Subject = "Here is the subject";
        $mail->Body    = "Her is the message!";

        /*
        if(!$mail->send()) {
            echo "Message could not be sent.";
            echo "Mailer Error: ".$mail->ErrorInfo;
        } else {
            echo "Message has been sent";
        }
        */
    }

    //header("Location: index.php");

?>
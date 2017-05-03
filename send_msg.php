<?php
    include("class.phpmailer.php");     
    $contact_us_error = ""; $success_msg = "";

    //Got this from: https://www.w3schools.com/php/php_form_validation.asp
    function clean_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_POST) { 
                
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
        else if ($_POST["contact_us_email"] && filter_var($_POST["contact_us_email"], FILTER_VALIDATE_EMAIL) === false) {
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
        
        
        if ($contact_us_error != "") {
            echo("<p style='text-align: center; font-weight: bold; font-size: 20px;'>Oops. Don't forget:</p>");
            echo($contact_us_error);
        }
        else {

            //echo("<div style='text-align: center;'><img src='images/ct_icon.png'></div><p style='text-align: center; font-size: 20px; margin-top: 10px;'>Your message is on its way lol PSYCH!</br></p>"); //FOR TESTING
            
            //FOR TESTING
            /*
            echo("<pre>");
            echo($_POST["contact_us_name"]."<br/>"); //FOR TESTING
            echo($_POST["contact_us_email"]."<br/>"); //FOR TESTING
            echo($_POST["contact_us_subject"]."<br/>"); //FOR TESTING
            echo($_POST["contact_us_msg"]."<br/>"); //FOR TESTING
            */

            
            //Send the email to us first...
            $mail = new PHPMailer();
            $mail->From = $_POST["contact_us_email"]; //Sender's email
            $mail->FromName = $_POST["contact_us_name"]; //Sender's name
            $mail->Subject = "Contact Us Subject: ".$_POST["contact_us_subject"]; //Sender's subject
            $mail->Body    = $_POST["contact_us_msg"]; //Sender's message

            $mail->addReplyTo($_POST["contact_us_email"]); //Add reply to sender's email
            //$mail->addAddress("services@iclevertech.com"); //Send the email to us  
            $mail->addAddress("whoskhoahoang@gmail.com"); //FOR TESTING 


            if(!$mail->send()) {
                echo "Message could not be sent. Please try again later.";
                //echo "Mailer Error: ".$mail->ErrorInfo;
            } else {
                echo "<div style='text-align: center;'><img src='images/ct_icon.png'></div><p style='text-align: center; font-size: 20px; margin-top: 10px;'>Your message is on its way!</br></p>";

                $mail2 = new PHPMailer();
                $mail2->From = "noreply@iclevertech.com";
                $mail2->FromName = "CleverTech";
                $mail2->Subject = "Thank you for your message!";
                $mail2->Body    = "We have received your message and will get back to you shortly.\n\nThank you!\n\nCleverTech\n1150 Murphy Ave, Ste 205\nSan Jose, CA 9513\n408-316-7600\n";

                $mail2->addAddress($_POST["contact_us_email"]);
                $mail2->addReplyTo("noreply@iclevertech.com");

                $mail2->send();

                //if(!$mail2->send()) { echo("Confirmation email error"); }
                //else { echo("A confirmation email has been sent to your address."); }
            }

        }
    }

?>
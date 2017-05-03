<?php
    include("class.phpmailer.php"); 


    $error = ""; $successMessage = "";
    $reqs_per_device = 3;


    function is_phone_num($phone) {
        if(preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $phone)) {
            return true;
        }
    }


    //Got this from: https://www.w3schools.com/php/php_form_validation.asp
    function clean_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


    if ($_POST) {
        
        $num_devices = count($_POST["model_type"]); //Count the length of any array
        $num_reqs = $reqs_per_device * $num_devices;
        
        
        if (!$_POST["first_name"] || !$_POST["last_name"]) {
            $error .= "- Your full name is required.<br/>";
        }
        else if ($_POST["first_name"] && $_POST["last_name"] && 
                 (!preg_match("/^[a-zA-Z -]*$/", $_POST["first_name"]." ".$_POST["last_name"]))) {
            $error .= "- Only letters, white space, and dashes are allowed for your name.<br/>";
        }
        else {
            $_POST["first_name"] = clean_input($_POST["first_name"]);   
            $_POST["last_name"] = clean_input($_POST["last_name"]);
        }
        
        
        if (!$_POST["email"]) {
            $error .= "- Your email is required.<br/>";
        }
        else if ($_POST["email"] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
            $error .= "- The email address you entered is not valid.<br/>";
        }
        else {
            $_POST["email"] = clean_input($_POST["email"]);
        }
        
        
        if (!$_POST["phone"]) {
            $error .= "- Your phone number is required.<br/>";
        }
        else if ($_POST["phone"] && !is_phone_num($_POST["phone"])) {
            $error .= "- Phone number must be in the form XXX-XXX-XXXX.<br/>";
        }
        else {
            $_POST["phone"] = clean_input($_POST["phone"]);
        }
        
        
        if (!$_POST["street_address"]) {
            $error .= "- Your street address is required<br/>";
        }
        else {
            $_POST["street_address"] = clean_input($_POST["street_address"]);
        }
        
        
        //Non-required input
        $_POST["address_line2"] = clean_input($_POST["address_line2"]);
        
        
        if ($_POST["city"] === "Select City") {
            $error .= "- Your city is required<br/>";
        }
        else {
            $_POST["city"] = clean_input($_POST["city"]);
        }

        
        //Non-required input
        $_POST["zip_postal"] = clean_input($_POST["zip_postal"]);
        
        
        //Is this part really necessary?
        //Process the dropdown menu items so that the default prompt is replaced with empty string
        for ($i = 0; $i < count($_POST["model_type"]); $i++) {
            if ($_POST["model_type"][$i] === "Select Model Type") {
                $_POST["model_type"][$i] = "";
            }
        }
                
        //Loop through required input fields and see if they've been filled out
        for ($i = 0; $i < $num_devices; $i++) {
            if (!$_POST["model_type"][$i]) {
                $error .= "- Model Type is required for Device ".($i+1).".<br/>";
            }
            else {
                $_POST["model_type"][$i] = clean_input($_POST["model_type"][$i]);
            }
            
            
            if (!$_POST["serial_number"][$i]) {
                $error .= "- Serial Number is required for Device ".($i+1).".<br/>";
            }
            else if ($_POST["serial_number"][$i] && !ctype_digit($_POST["serial_number"][$i])) {
                $error .= "- Serial number must consist of numbers only for Device ".($i+1).".<br/>";
            }
            else if ($_POST["serial_number"][$i] && !preg_match('/^\d{12}$/', $_POST["serial_number"][$i])) {
                $error .= "- Serial number must consist of 12 digits for Device ".($i+1).".<br/>";
            }
            else {
                $_POST["serial_number"][$i] = clean_input($_POST["serial_number"][$i]);
            }
            
            
            if ($_POST["problem"][$i] === "") {
                $error .= "- Problem is required for Device ".($i+1).".<br/>";
            }
            else {
                $_POST["problem"][$i] = clean_input($_POST["problem"][$i]);
            }
            
            //non-required input
            $_POST["cust_ref_num"][$i] = clean_input($_POST["cust_ref_num"][$i]);
            
            //non-required input
            $_POST["other_info"][$i] = clean_input($_POST["other_info"][$i]);

        }
        
        
        if ($_POST["service_type"] === "") {
            $error .= "- A service type is required.<br/>";
        }
        else {
            $_POST["service_type"] = clean_input($_POST["service_type"]);
        }
        
        if ($_POST["agree_to_terms"] === "") {
            $error .= "- Please agree to the important information and limitations of liability.</br>";
        }
        else {
            $_POST["agree_to_terms"] = clean_input($_POST["agree_to_terms"]);
        }
        
        
        if ($error != "") {
            echo("<p style='text-align: center; font-weight: bold; font-size: 20px;'>Oops. Don't forget:</p>");
            echo($error);
        }
        else {
            
            //echo("<div style='text-align: center;'><img src='images/ct_icon.png'></div><p style='text-align: center; font-size: 20px; margin-top: 10px;'>Pick-up request has been sent lol PSYCH!</br></p>"); //FOR TESTING
            
            $device_lst = array();
            //Make hashmaps for individual devices that you'll then use for the email
            for ($i = 0; $i < $num_devices; $i++) {                 
                $device = array();
                
                //Required Info
                $device["model_type"] = $_POST["model_type"][$i];
                $device["serial_number"] = $_POST["serial_number"][$i];                
                $device["problem"] = $_POST["problem"][$i];
                
                //Non-required Info
                $device["cust_ref_num"] = $_POST["cust_ref_num"][$i];
                $device["other_info"] = $_POST["other_info"][$i];
                
                $device_lst[] = $device;
            }
            
            //FOR TESTING
            /*
            echo("<pre>");
            echo($_POST["first_name"]."<br/>"); //FOR TESTING
            echo($_POST["last_name"]."<br/>"); //FOR TESTING
            echo($_POST["email"]."<br/>"); //FOR TESTING
            echo($_POST["phone"]."<br/>"); //FOR TESTING
            echo($_POST["street_address"]."<br/>"); //FOR TESTING
            echo($_POST["address_line2"]."<br/>"); //FOR TESTING
            echo($_POST["city"]."<br/>"); //FOR TESTING
            echo($_POST["zip_postal"]."<br/>"); //FOR TESTING
            echo($_POST["service_type"]."<br/>"); //FOR TESTING
            echo($_POST["agree_to_terms"]."<br/>"); //FOR TESTING
            print_r($device_lst); //FOR TESTING
            */
            
            $body = "=== Customer Information ===\nName: ".$_POST["first_name"]." ".$_POST["last_name"]."\nEmail: ".$_POST["email"]."\nPhone Number: ".$_POST["phone"]."\nStreet Address: ".$_POST["street_address"]."\nAddress Line 2: ".$_POST["address_line2"]."\nCity: ".$_POST["city"]."\nPostal Code: ".$_POST["zip_postal"]."\nService Type: ".$_POST["service_type"]."\n\n\n=== Device Information ===\n";
            
            //loop through devices
            $device_info = "";
            for ($i = 0; $i < count($device_lst); $i++) {
                
                $device_info .= "Device ".($i+1)."\nModel Type: ".$device_lst[$i]["model_type"]."\n12-digit Serial #: ".$device_lst[$i]["serial_number"]."\nProblem: ".$device_lst[$i]["problem"]."\nCustomer Reference #: ".$device_lst[$i]["cust_ref_num"]."\nOther Info: ".$device_lst[$i]["other_info"]."\n";
                
            }
            $body .= $device_info;            
            
            $conf_msg = "Hello ".$_POST["first_name"]."!,\nYour recent pick-up request with CleverTech has been received! Below is a summary of your request:\n\n".$device_info."\nPick-up requests submitted before 10:30 am are usually picked up same day. If submitted after 10:30 am, expect a phone call to schedule a next day pick-up. If you need to cancel or reschedule a pick-up, please call us at 408-316-7600. When we come for the pick-up, an initial diagnostic of your device will be made and an estimated service cost will be given. If you decline the repair for this device, a pick-up fee ($50) will be charged. If you approve the repair, the pick-up fee will be waived.\n\n\nThank You!\n\nCleverTech\n1150 Murphy Ave, Ste 205\nSan Jose, CA 9513\n408-316-7600\n";
          
            
            //Send the mail to us first...
            $mail = new PHPMailer();
            $mail->From = $_POST["email"];
            $mail->FromName = $_POST["first_name"]." ".$_POST["last_name"];            
            $mail->Subject = "Pick-Up Request For ".$_POST["first_name"]." ".$_POST["last_name"];
            $mail->Body    = $body;
            
            $mail->addReplyTo($_POST["email"]); //Add reply to sender's email
            //$mail->addAddress("services@iclevertech.com"); //Send the email to us first
            $mail->addAddress("whoskhoahoang@gmail.com"); //FOR TESTING
            

            if(!$mail->send()) {
                echo "Message could not be sent. Please try again later.";
            } else {
                echo "<div style='text-align: center;'><img src='images/ct_icon.png'></div><p style='text-align: center; font-size: 20px; margin-top: 10px;'>Pick-up request has been sent!</br></p>";
            
                $mail2 = new PHPMailer();
                $mail2->From = "noreply@iclevertech.com";
                $mail2->FromName = "CleverTech";
                $mail2->Subject = "Your Pick-Up Request has been received!";
                $mail2->Body    = $conf_msg;

                $mail2->addAddress($_POST["email"]);
                $mail2->addReplyTo("noreply@iclevertech.com");
                
                $mail2->send();
                
                //if(!$mail2->send()) {echo("But we were not able to send a confirmation email.<br/>");}
                //else {echo("We've also sent you a confirmation email.<br/>");}
            }
        }   
    }
?>
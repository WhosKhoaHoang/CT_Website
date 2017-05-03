<?php
    include("class.phpmailer.php"); 

    $error = ""; $successMessage = "";
    $reqs_per_device = 3;

    function phpAlert($msg) {
        echo '<script type="text/javascript">alert("' . $msg . '")</script>';
    }

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
        else if ($_POST["email"] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL === false)) {
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
            echo("ERRORS:<br/>");
            echo($error);
            //echo "<script type='text/javascript'>alert('".$error."')</script>"; //FOR TESTING
            //$error = '<div class="alert alert-danger" role="alert"><p>There were error(s) in your form:</p>'.$error.'</div>';
        }
        else {
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
            
            /*
            subject: Customer Pick-Up Request

            === Customer Information ===
            Name:
            Email:
            Phone Number:
            Street Address:
            Address Line 2:
            City:
            Postal Code:

            === Device Information ===
            Device 1
            Model Type:
            12-Digit Serial #:
            Problem:
            Customer Reference #:
            Other Info:
            */
            
            $body = "=== Customer Information ===<br/>
            Name: ".$_POST["first_name"]." ".$_POST["last_name"]."<br/>
            Email: ".$_POST["email"]."<br/>
            Phone Number: ".$_POST["phone"]."<br/>
            Street Address: ".$_POST["street_address"]."<br/>
            Address Line 2: ".$_POST["address_line2"]."<br/>
            City: ".$_POST["city"]."<br/>
            Postal Code: ".$_POST["zip_postal"]."<br/>
            Service Type: ".$_POST["service_type"]."<br/>
            <br/>
            === Device Information ===<br/>";
            
            //loop through devices
            $device_info = "";
            for ($i = 0; $i < count($device_lst); $i++) {
                
                $device_info .= "
                Device ".($i+1)."<br/>
                Model Type: ".$device_lst[$i]["model_type"]."<br/>
                12-digit Serial #: ".$device_lst[$i]["serial_number"]."<br/>
                Problem: ".$device_lst[$i]["problem"]."<br/>
                Customer Reference #: ".$device_lst[$i]["cust_ref_num"]."<br/>
                Other Info: ".$device_lst[$i]["other_info"]."<br/>
                <br/>";
                
            }
            $body .= $device_info;
            echo($body);
            
            
            $test_conf = "Hello ".$_POST["first_name"]."!,<br/>
                Your recent pick-up request with CleverTech has been received! Below is a summary of your request:<br/><br/>".$device_info."<br/>
                Pick-up requests submitted before 10:30 am are usually picked up same day. If submitted after 10:30 am, expect a phone call to schedule a next day pick-up. If you need to cancel or reschedule a pick-up, please call us at 408-316-7600. When we come for the pick-up, an initial diagnostic of your device will be made and an estimated service cost will be given. If you decline the repair for this device, a pick-up fee ($50) will be charged. If you approve the repair, the pick-up fee will be waived.<br/>
                <br/><br/>
                Thank You!
                <br/>
                CleverTech<br/>
                1150 Murphy Ave, Ste 205<br/>
                San Jose, CA 9513<br/>
                408-316-7600<br/>
                ";
            
            echo($test_conf);
            
            /*
            $mail = new PHPMailer();
            //$mail->From = "blah@ramen.com";
            //$mail->FromName = "Ramen";
            $mail->addAddress("whoskhoahoang@gmail.com"); //Send it to us first                 

            $mail->Subject = "Pick-Up Request For ".$_POST["first_name"]." ".$_POST["last_name"];
            $mail->Body    = $body;
            
            if(!$mail->send()) {
                echo "Message could not be sent.";
                echo "Mailer Error: " . $mail->ErrorInfo;
            } else {
                echo "Pick-Up Request has been sent!";
            
                $mail2 = new PHPMailer();
                $mail2->From = "noreply@ramen.com";
                $mail2->FromName = "Ramen";
                $mail2->Subject = "Thank you for your message!";
                $mail2->Body    = "Hello ".$_POST["first_name"]."!,\n
                Your recent pick-up request with CleverTech has been received! Below is a summary of your request:";

                $mail2->addAddress($_POST["email"]);
                $mail2->addReplyTo("noreply@ramen.com");

                if(!$mail2->send()) {
                    echo("Confirmation email error");
                }
                else {
                    echo("Confirmation email sent");
                }
            }
            */
        }   
    }
?>
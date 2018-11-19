<?php
    require_once("php_libs/class.phpmailer.php"); 
    require_once("php_libs/Requests.php");
    Requests::register_autoloader();


    // ===================== DEFINE HELPER FUNCTIONS ===================== //
    //Got this regex from http://stackoverflow.com/questions/123559/a-comprehensive-regex-for-phone-number-validation
    function is_phone_num($phone) {
        return (preg_match("/^(?:(?:(\s*\(?([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9])\s*)|([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9]))\)?\s*(?:[.-]\s*)?)([2-9]1[02-9]|[2-9][02-9]1|[2-9][02-9]{2})\s*(?:[.-]\s*)?([0-9]{4})$/", $phone));
    }

    //Got this from: https://www.w3schools.com/php/php_form_validation.asp
    function clean_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    /*
    Takes a string representing a date in the
    form MONTH_NAME DAY_NUM, YEAR and converts
    it to a year period in the form
        Early/Mid/Late YEAR.
    $date      : A date in the form:
                   MONTH_NAME DAY_NUM, YEAR
                 to convert to a year period.
    type $date : str
    return : A year period in the form:
             Early/Mid/Late YEAR
    rtype  : str
    */
    function determine_year_per($date) {
        $nmonth = date("m", strtotime($date));
        $nyear  = date("Y", strtotime($date));
        $period = "";
        
        if ($nmonth >= 1 && $nmonth < 4) {
            $period = "Early";
        }
        else if ($nmonth >= 4 && $nmonth < 8) {
            $period = "Mid";
        }
        else {
            $period = "Late";
        }
        
        return $period." ".$nyear;
    }


    // ===== FOCUS HERE ===== //
    // ===================== MAKE API CALL ===================== //
    //. Make API calls and establish variables retrieved from API calls
    //. GAMEPLAN:
    //   - Use the user's Serial # as part of the EveryMac API request
    //   - Extract the relevant information from the returned JSON object
    //     to fill out the appropriate fields for the E-mail message.
    //. TODO: Handle case where API call limit has been reached!
    //. THINK: What does the JSON look like when you reach the API call limit?
    //. THINK: Tell Gonz to buy the Enterprise API and have him tell you the key?
    //. NOTE: When pushing code to online repos, be sure that you DO NOT put
    //        the API key in the code when you start using the real API!!!!!
    //. Since the customer will potentially specify multiple devices, you'll
    //  get multiple serial numbers and therefore need to make multiple API calls.
    //  You'll probably need to put year, model, and emc values into an array...
    $headers = array("Accept" => "application/json");
    $request = Requests::get("{CENSORED}", $headers);
    $data   = json_decode($request->body);
    $year = ""; $model = ""; $emc = "";
    if ($data->{"token"} == null) {

    } //Is this^ how JSON indicates reached API call limit?
    else {
        $result = $data->{"results"}[0]; //Change index to examine different results
        $year   = determine_year_per($result->{"introductionDate"});
        $model  = $result->{"modelNumber"};
        $emc    = $result->{"emcNumber"};
    }

    echo("<br/>");
    var_dump($request->status_code);
    echo("<br/>");
    var_dump($request->headers["content-type"]);
    echo("<br/>");
    echo($year);
    echo("<br/>");
    echo($model);
    echo("<br/>");
    echo($emc);


    // ===================== DO FORM VALIDATION ===================== //
    $errrorMessage = "";
    $successMessage = ""; //Is this needed anymore?
    $reqs_per_device = 3; //Is this needed anymore?
    if ($_POST) {
        $num_devices = count($_POST["model_type"]); //Count the length of any array
        $num_reqs = $reqs_per_device * $num_devices; //Is this needed anymore?

        // ------------- REQUIRED INPUT ------------- //
        //COMMENT OUT FOR TESTING!
        /*
        if (!$_POST["first_name"] || !$_POST["last_name"]) {
            $errrorMessage .= "- Your full name is required.<br/>";
        }
        else if ($_POST["first_name"] && $_POST["last_name"] && 
                 (!preg_match("/^[a-zA-Z -]*$/", $_POST["first_name"]." ".$_POST["last_name"]))) {
            $errrorMessage .= "- Only letters, white space, and dashes are allowed for your name.<br/>";
        }
        else {
            $_POST["first_name"] = clean_input($_POST["first_name"]);   
            $_POST["last_name"] = clean_input($_POST["last_name"]);
        }

        if (!$_POST["email"]) {
            $errrorMessage .= "- Your email is required.<br/>";
        }
        else if ($_POST["email"] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
            $errrorMessage .= "- The email address you entered is not valid.<br/>";
        }
        else {
            $_POST["email"] = clean_input($_POST["email"]);
        }

        if (!$_POST["phone"]) {
            $errrorMessage .= "- Your phone number is required.<br/>";
        }
        else if ($_POST["phone"] && !is_phone_num($_POST["phone"])) {
            $errrorMessage .= "- Please enter a valid 10-digit phone number.<br/>";
        }
        else {
            $_POST["phone"] = clean_input($_POST["phone"]);
        }

        if (!$_POST["street_address"]) {
            $errrorMessage .= "- Your street address is required.<br/>";
        }
        else {
            $_POST["street_address"] = clean_input($_POST["street_address"]);
        }

        if ($_POST["city"] === "Select City") {
            $errrorMessage .= "- Your city is required.<br/>";
        }
        else {
            $_POST["city"] = clean_input($_POST["city"]);
        }
   
        //Loop through required input fields and see if they've been filled out
        for ($i = 0; $i < $num_devices; $i++) {
            if (!$_POST["model_type"][$i]) {
                $errrorMessage .= "- Model Type is required for Device ".($i+1).".<br/>";
            }
            else {
                $_POST["model_type"][$i] = clean_input($_POST["model_type"][$i]);
            }


            if (!$_POST["serial_number"][$i]) {
                $errrorMessage .= "- Serial Number is required for Device ".($i+1).".<br/>";
            }
            //else if ($_POST["serial_number"][$i] && !preg_match('/^\d{12}$/', $_POST["serial_number"][$i])) {
            else if ($_POST["serial_number"][$i] && strlen($_POST["serial_number"][$i]) !== 12) {
                $errrorMessage .= "- Serial number must consist of 12 characters for Device ".($i+1).".<br/>";
            }
            else {
                $_POST["serial_number"][$i] = clean_input($_POST["serial_number"][$i]);
            }
            
            if ($_POST["problem"][$i] === "") {
                $errrorMessage .= "- Problem is required for Device ".($i+1).".<br/>";
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
            $errrorMessage .= "- A service type is required.<br/>";
        }
        else {
            $_POST["service_type"] = clean_input($_POST["service_type"]);
        }

        if ($_POST["agree_to_terms"] === "") {
            $errrorMessage .= "- Please agree to the important information and limitations of liability.</br>";
        }
        else {
            $_POST["agree_to_terms"] = clean_input($_POST["agree_to_terms"]);
        }
        */

        // ------------- NON-REQUIRED INPUT ------------- //
        $_POST["company"] = clean_input($_POST["company"]);
        $_POST["address_line2"] = clean_input($_POST["address_line2"]);
        $_POST["zip_postal"] = clean_input($_POST["zip_postal"]);

        //Is this part really necessary?
        //Process the dropdown menu items so that the default prompt is replaced with empty string
        for ($i = 0; $i < count($_POST["model_type"]); $i++) {
            if ($_POST["model_type"][$i] === "Select Model Type") {
                $_POST["model_type"][$i] = "";
            }
        }


        // ===================== PREPARE TO SEND E-MAILS ===================== //
        if ($errrorMessage != "") {
            echo("<p style='text-align: center; font-weight: bold; font-size: 20px;'>Oops. Don't forget:</p>");
            echo($errrorMessage);
        }
        else {
            $device_lst = array();
            //Make hashmaps for individual devices that you'll then use to construct the email
            for ($i = 0; $i < $num_devices; $i++) {                 
                $device = array();

                //Required Info
                $device["model_type"] = $_POST["model_type"][$i];
                $device["serial_number"] = $_POST["serial_number"][$i];                
                $device["problem"] = $_POST["problem"][$i];

                // ===== FOCUS HERE ===== //
                //THINK: Make API calls here instead to get the model, emc,
                //       and year for the current device? You can leave the
                //       the call to retrieve the API data near the top, but
                //       write code to extract information from that data here...

                //Non-required Info
                $device["cust_ref_num"] = $_POST["cust_ref_num"][$i];
                $device["other_info"] = $_POST["other_info"][$i];

                $device_lst[] = $device;
            }

            // ---------- CONSTRUCT BODY FOR THE EMAIL THAT'S SENT TO US ---------- //
            $body = "=== Customer Information ===\nName: ".$_POST["first_name"]." ".$_POST["last_name"]."\nEmail: ".$_POST["email"]."\nPhone Number: ".$_POST["phone"]."\nCompany: ".$_POST["company"]."\nStreet Address: ".$_POST["street_address"]."\nAddress Line 2: ".$_POST["address_line2"]."\nCity: ".$_POST["city"]."\nPostal Code: ".$_POST["zip_postal"]."\nService Type: ".$_POST["service_type"]."\n\n\n=== Device Information ===\n";
            //. The "Device Information" section will potentially contain information
            //  on multiple devices (depending on how many devices the user provided).
            //. Loop through devices to append to body string:
            $device_info = "";
            for ($i = 0; $i < count($device_lst); $i++) {
                $device_info .= "Device ".($i+1)."\nModel: ".$model."\nModel Name: ".$device_lst[$i]["model_type"]."\nSerial Number: ".$device_lst[$i]["serial_number"]."\nEMC: ".$emc."\nYear: ".$year."\nPasscode: "."\nMissing Screws: "."\nScratches: "."\nDent: "."Known Liquid Damage: "."\nDevice's Current Issue: ".$device_lst[$i]["problem"]."Customer's Approvals: "."\nCustomer Reference #: ".$device_lst[$i]["cust_ref_num"]."Estimated Turnaround Time: 3-5 Days"."Missing SSD/HDD: "."Tech Notes: "."\nTechnician: "."\nOther Info: ".$device_lst[$i]["other_info"]."\n";
            }
            $body .= $device_info;

            // ---------- CONSTRUCT BODY FOR THE EMAIL THAT'S SENT TO CUSTOMER ---------- //
            $conf_msg = "Hello ".$_POST["first_name"]."!,\nYour recent pick-up request with CleverTech has been received! Below is a summary of your request:\n\n".$device_info."\nPick-up requests submitted before 10:30 am are usually picked up same day. If submitted after 10:30 am, expect a phone call to schedule a next day pick-up. If you need to cancel or reschedule a pick-up, please call us at 408-316-7600. When we come for the pick-up, an initial diagnostic of your device will be made and an estimated service cost will be given. If you decline the repair for this device, a pick-up fee ($50) will be charged. If you approve the repair, the pick-up fee will be waived.\n\n\nThank You!\n\nCleverTech Team\n1150 Murphy Ave, Ste 205\nSan Jose, CA 9513\n408-316-7600\n";

            //Send the mail to us first...
            $mail = new PHPMailer();
            $mail->From = $_POST["email"];
            $mail->FromName = $_POST["first_name"]." ".$_POST["last_name"];            
            $mail->Subject = "Pick-Up Request For ".$_POST["first_name"]." ".$_POST["last_name"];
            $mail->Body    = $body;
            $mail->addReplyTo($_POST["email"]); //Add reply to sender's email

            //COMMENT OUT FOR TESTING!
            /*
            //===== NEW MAILING CODE =====
            $sj_requests = array("San Jose", "Santa Clara", "Campbell", "Milpitas", "Cupertino");
            $pa_requests = array("Sunnyvale", "Mountain View", "Palo Alto", "Menlo Park", "Burlingame", "Atherton", "Los Altos", "Portola Valley", "Woodside", "Redwood City", "San Carlos", "Foster City", "San Mateo", "Concord", "Berkeley");
            if (in_array($_POST["city"], $sj_requests)) {
                $mail->addAddress("sanjose@iclevertech.com"); //Send the email to us first
                //$mail->addAddress("whoskhoahoang@gmail.com"); //FOR TESTING
            }
            else if (in_array($_POST["city"], $pa_requests)) {
                $mail->addAddress("paloalto@iclevertech.com"); //Send the email to us first
                //$mail->addAddress("whoskhoahoang@gmail.com"); //FOR TESTING
            }
            else {
                $mail->addAddress("services@iclevertech.com"); //Send the email to us first
                //$mail->addAddress("whoskhoahoang@gmail.com"); //FOR TESTING
            }

            if (!$mail->send()) {
                //If mail unsuccessful, show error message:
                echo "Pick-up request could not be sent. Please try again later.";
            } else {
                //If mail successful, then send confirmation message to customer:

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
            */
        }   
    }
?>
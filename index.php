<?php
    $error = ""; $successMessage = "";
    function phpAlert($msg) {
        echo '<script type="text/javascript">alert("' . $msg . '")</script>';
    }

    //If there's anything in the $_POST array...(wouldn't it be better to use isset? No because $_POST is always
    //gonna be set with something so the inside of the if block would always be executed?
    if ($_POST) { //I.e., return true was executed in the the submit() method.
                
        if (!$_POST["first_name"] || !$_POST["last_name"]) {
            $error .= "- Your full name is required.<br/>";
        }
        if (!$_POST["email"]) {
            $error .= "- Your email is required.<br/>";
        }
        if ($_POST["email"] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL === false)) {
            $error .= "- The email address you entered is not valid.<br/>";
        }
        if (!$_POST["phone"]) {
            $error .= "- Your phone number is required.<br/>";
        }
        if (!$_POST["street_address"]) {
            $error .= "- Your street address is required<br/>";
        }
        if (!isset($_POST["city"])) {
            $error .= "- Your city is required<br/>";
        }
        
        //. A perhaps killer tip:
        //  - Each index in the dynamic form arrays corresponds to a device. E.g., index 0 corresponds
        //    with the 1st device, index 1 corresponds with the 2nd device, etc.
        //  - !!!QUESTIONABLE -->  Note that there'll never be a case where an entry in array has the empty string 
        //    while other entries have something in them. The only time there'll ever be an empty string is if that 
        //    entry is never filled out anywhere...this makes things super tricky because if the user doesn't fill 
        //    in any entries for the first device but fills in entries for the second device, the info for the second
        //    device will go to the 0th index in the arrays corresponding to what was filled out. <--QUESTIONABLE!!!
        //  - In regards to that^...if the first and ONLY entry in an array is "", then the user completely overlook this
        //    field for ALL devices. Think: If data for device 3 was filled out, then all data that wasn't fill out before
        //    it will be blank.
        //. Challenge:
        //  - Give specific info about where missing required fields are. Perhaps doing it this way would
        //  - do away with needing the hidden input tag with the num_devices ID because you'd depend entirely
        //  - on the arrays that were POSTed. Perhaps you'd change the null value that model type has to ""
        
        $NUM_REQS = 3;
        $num_devices = $_POST["num_devices"];

        //Initialize lengths:
        //. Instead of using these length varibles, maybe you can just delete that first and only empty string entry...
        //. Except fot $_POST["model_type"], if the first and ONLY entry is "", then the user completely overlooked this field for ALL devices...

        //Think: How to make the setting of the $_POST["model_type"] array itself look like the others when the
        //form is submitted without any value passed to the corresponding input? Might need to do this if I want to
        //output specific information...Jeez, having a disabled option from a select element just for a better
        //user experience really complicates the backend code!
        $model_type_len = !isset($_POST["model_type"]) ? 0 : count($_POST["model_type"]);
       
        $serial_number_len = ($_POST["serial_number"][0] === "" && count($_POST["serial_number"]) === 1) ? 0 : count($_POST["serial_number"]);
        
        $problem_len = ($_POST["problem"][0] === "" && count($_POST["problem"]) === 1) ? 0 : count($_POST["problem"]);
        
        $cust_ref_num_len = ($_POST["cust_ref_num"][0] === "" && count($_POST["cust_ref_num"]) === 1) ? 0 : count($_POST["cust_ref_num"]);
        
        $other_info_len = ($_POST["other_info"][0] === "" && count($_POST["other_info"]) === 1) ? 0 : count($_POST["other_info"]);
        
        
        echo("model_type_array: <br/>");
        print_r($_POST["model_type"]); echo("<br/>");
        echo("serial_number array: <br/>");
        print_r($_POST["serial_number"]); echo("<br/>");
        echo("problem array: <br/>");
        print_r($_POST["problem"]); echo("<br/>");
        echo("cust_ref_num array: <br/>");
        print_r($_POST["cust_ref_num"]); echo("<br/>");
        echo("other_info array: <br/>");
        print_r($_POST["other_info"]); echo("<br/>");
        
        echo("<br/>");
        echo("model_type_len: ".$model_type_len."<br/>");
        echo("serial_number_len: ".$serial_number_len."<br/>");
        echo("problem_len: ".$problem_len."<br/>");
        echo("cust_ref_len: ".$cust_ref_num_len."<br/>");
        echo("other_info_len: ".$other_info_len."<br/>");
        echo("Sum of Lengths: ".($model_type_len+$serial_number_len+$problem_len)."<br/>");        
        echo("Number of devices: ".$num_devices."<br/>");
        echo("Number of Requirements: ".$NUM_REQS."<br/><br/><br/>");
        
        
        if (($model_type_len+$serial_number_len+$problem_len) < ($num_devices*$NUM_REQS)) {
            $error .= "- You have missing entries for your devices information.<br/>";
        }
        if ($serial_number_len != 0) {
            
            //validate serial numbers (length and numeric)
            for ($i = 0; $i < $serial_number_len; $i++) {
                if (!ctype_digit($_POST["serial_number"][$i])) {
                    $error .= "- Serial number must consist of only numbers for Device ".($i+1).".<br/>";

                }
                
                //$_POST["serial_number"][$i]= preg_replace('/\D/', '', $_POST["serial_number"][$i]);
                //^Makes it so that no errors are thrown in the events of spaces or plusses, etc. Only digits are considered.
                if (!preg_match('/^\d{12}$/', $_POST["serial_number"][$i])) {
                    $error .= "- Serial number must consist of 12 digitis for Device ".($i+1).".<br/>";
                }
            }
        }
        
        
        if ($error != "") {
            //echo("ERRORS:<br/>");
            //echo($error);
            //$error = '<div class="alert alert-danger" role="alert"><p>There were error(s) in your form:</p>' . $error . '</div>';
            //echo "<script language='javascript'>alert('WRONG')</scipt>";
            //phpAlert(   "Hello world!\\n\\nPHP has got an Alert Box"   );
        }
        else {
            $device_lst = array();

            //Make hashmaps for individual devices that you'll then use for the email
            for ($i = 0; $i < $num_devices; $i++) {                 
                $device = array();
                
                $device["model_type"] = ""; $device["serial_number"] = "";
                $device["problem"] = ""; $device["cust_ref_num"] = ""; $device["other_info"] = "";
                
                $device["model_type"] = $_POST["model_type"][$i];
                $device["serial_number"] = $_POST["serial_number"][$i];                
                $device["problem"] = $_POST["problem"][$i];
                
                if ($cust_ref_num_len >= $i) {
                    $device["cust_ref_num"] = $_POST["cust_ref_num"][$i];
                }
                if ($other_info_len >= $i) {
                    $device["other_info"] = $_POST["other_info"][$i];
                }
                
                $device_lst[] = $device;                
            }
            
            
            echo("<pre>"); //FOR TESTING
            echo("device_lst array is: <br/>"); //FOR TESTING
            print_r($device_lst); //FOR TESTING
               
            
            /*
            $emailTo = "whoskhoahoang@gmail.com"; //FOR TESTING
            $headers = "From: ".$_POST['email'];

            if (mail($emailTo, "", "", $headers)) {
                $successMessage = '<div class="alert alert-success" role="alert">Your message was sent, we\'ll get back to you ASAP!</div>';
            } else {
                $error = '<div class="alert alert-danger" role="alert"><p><strong>Your message couldn\'t be sent - please try again later</div>';
            }
            */
        }
        
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags always come first -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>CleverTech TESTING</title>
        
        <!-- Include this link on every HTML page of the website! -->
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
        <!-- import Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- Add icon library from Perfect Icons-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- import your own styles -->
        <link rel="stylesheet" href="http://localhost/clevertech/styles.css" /> <!--Seems like I need to use an absolute pathname for CSS?-->
        <!--<link rel="stylesheet" href="//fonts.googleapis.com/css?family=PT+Sans" /> No to this for now... -->
        
        <style type="text/css">

            /* Apparently it matters where you put media queries if you want them to work properly */
            
        </style>
        
    </head>
    
    <body data-spy="scroll" data-target="#my_navbar"> <!--data-spy and data-target are for jumping to particular sections of the page through links-->
        
        <!-- THE NAVBAR BEGIN -->
        <nav class="navbar navbar-fixed-top" id="my_navbar">
            <div class="container">
                <div class="navbar-header">
                    
                    <!--This "hamburger" button shows up and contains the navbar links once the viewport has been adequately shrinked -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    
                    <!-- LOGO BEGIN -->
                    <a class="navbar-brand" href="#welcome">
                        <!--If you decide to make clicking on the logo shoot to the top, add href="#welcome"-->
                        <img src="http://localhost/clevertech/images/navbar_logo.png" width="50" height="50" alt="" style="display:inline">
                    </a>
                    <!-- LOGO END -->  
                </div>

                <!-- Collect the nav links, forms, and other content for toggling when user collapses window -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav" style="float: left;">
                        <li class="nav-item"><a href="#how_it_works" class="nav-link">How It Works</a></li>
                        <li class="nav-item"><a href="#services" class="nav-link">Services</a></li>
                        <li class="nav-item"><a href="#stay_clever" class="nav-link">Stay Clever</a></li>  
                    </ul>
                    
                    <!-- START REPAIR BUTTON BEGIN -->
                    <!--Setting this div with class navbar-form aligns everything properly.-->
                    <!--navbar-right will push this button to the far right.-->
                    <div class="navbar-right" style="padding-top: 10px; padding: 10px; display:block;">
                        <a href="#" id="start_repair_btn" class="btn" data-toggle="modal" data-target="#start_repair_modal">Request Pick-Up</a>
                    </div>
                    <!-- START REPAIR BUTTON END -->
                </div>

            </div>
        </nav>
        <!-- THE NAVBAR END-->
        
        
        <!-- MODALS BEGIN -->
        <!--Thanks to Ren De Nobel from SO: http://stackoverflow.com/questions/18053408/vertically-centering-bootstrap-modal-window-->
        <!-- START REPAIR MODAL BEGIN -->
        <div id="start_repair_modal" class="modal fade" role="dialog">
            <div class="vertical-alignment-helper">
                <div class="modal-dialog vertical-align-center">
                    <div id="start_a_repair_dialog" class="modal-dialog">
                        
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div id="start_a_repair_body" class="modal-body" style="font-size: 165x; padding: 20px;">
                                
                                <div class="form-group" style="margin-bottom: 30px;">
                                    <button type="button" class="close" data-dismiss="modal" style="float: left;">&times;</button>
                                </div>
                                
                                <form id="pick_up_request_form" method="post"> <!-- Should I have action="/validate.php" ? -->
                                    <!--<p class="required">Name</p>-->

                                    <h3 style="color: #0f6a37;">Your Info</h3>
                                    <hr/>
                                    
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <label class="required" for="first_name">First Name</label>
                                                <input class="form-control" id="first_name" name="first_name">
                                            </div>
                                            <div class="col-xs-6">
                                                <label class="required" for="last_name">Last Name</label>
                                                <input class="form-control" id="last_name" name="last_name">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <label class="required" for="email">Email</label>
                                                <input class="form-control" type="email" id="email" name="email">
                                                <p>We'll be sending you a confirmation email to this address.</p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!--
                                    <p style="padding-bottom: 10px;">A confirmation email will be sent to your email address. The email will also be used as the contact for the order.</p>
                                    -->
                                    
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <label class="required" for="phone">Phone Number</label>
                                                <input class="form-control" type="tel" id="phone" name="phone">
                                            </div>
                                        </div>
                                    </div> 
                                    
                                    
                                    <!--<p class="required">Pick-Up Address</p>-->
 
                                    
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <label class="required" for="street_address">Street Address</label>
                                                <input class="form-control" id="street_address" name="street_address">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <label for="address_line2">Address Line 2</label>
                                                <input class="form-control" id="address_line2" name="address_line2">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <label class="required" for="city">City</label>
                                                <select class="form-control" id="city" name="city">
                                                    <option selected disabled>Select City</option>
                                                    <!--<option selected readonly>Select City</option>-->
                                                    <option>San Jose</option>
                                                    <option>Santa Clara</option>
                                                    <option>Milpitas</option>
                                                </select>
                                            </div>           
                                            <div class="col-xs-6">
                                                <label for="zip_postal">ZIP / Postal Code</label>
                                                <input class="form-control" id="zip_postal" name="zip_postal">
                                            </div>
                                        </div>
                                    </div>

                                    
                                    <h3 style="color: #0f6a37;">Device Info</h3>
                                    <hr/>
                                    
                                    <!-- DYNAMIC INPUT SECTION BEGIN! -->
                                    <!-- Note how names for dynamic inputs are all associated with arrays! -->
                                                                        
                                    <div id="dynamic_input">
                                        
                                        <!-- The first BEGIN -->
                                        <div id="dynamic_device_group0"> 
                                            <h4 style="text-decoration: underline;">Device 1</h4>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-xs-6">
                                                        
                                                        <label class="required" for="model_type">Model Type</label>
                                                        <!-- FOR TESTING: -->
                                                        <!--<input type="hidden" name="model_type[]" value="" />-->
                                                        <select class="form-control" id="model_type" name="model_type[]" >
                                                            <option selected disabled>Select Model Type</option>
                                                            <option>iMac 27'' Model</option>
                                                            <option>iMac 21.5'' Model</option>
                                                            <option>Macbook Air</option>
                                                            <option>Macbook Pro (non-Retina)</option>
                                                            <option>Macbook 21.5'' Model (Retina)</option>
                                                            <option>iPhone 7 Plus &amp; 7</option>
                                                            <option>iPhone 6s Plus &amp; 6s</option>
                                                            <option>iPhone 6 Plus &amp; 6</option>
                                                            <option>iPhone 5 SE/5s/5c/5</option>
                                                            <option>iPad 2/3/4 &amp; Air</option>
                                                            <option>iPad Air 2</option>
                                                            <option>iPad Mini 1/2/3</option>
                                                            <option>iPad Mini 4</option>
                                                        </select>
                                                        
                                                    </div>
                                                    <!-- CHECK THAT THE LENGTH OF THIS VALUE IS 12!!!-->
                                                    <div class="col-xs-6">
                                                        
                                                        <label class="required" for="serial_number">12-Digit Serial #</label>
                                                        <input class="form-control" id="serial_number" name="serial_number[]">
                                                        
                                                    </div>
                                                </div>
                                            </div>

                                            
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-xs-6">
                                                        
                                                        <label class="required" for="problem">Problem</label>
                                                        <input class="form-control" id="problem" name="problem[]">
                                                        
                                                    </div>
                                                    <div class="col-xs-6">
                                                        
                                                        <label for="cust_ref_num">Customer Reference #</label>
                                                        <input class="form-control" id="cust_ref_num" name="cust_ref_num[]">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!--
                                            <div class="form-group">
                                                <p>Estimated Service Cost: </p><span id="est_service_cost" style="display:none;"></span>
                                            </div>
                                            -->
                                            
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        
                                                        <label for="other_info">Anything else you'd like to tell us about your problem?</label>
                                                        <textarea class="form-control" id="other_info" rows=4 name="other_info[]" style="resize: none;"></textarea>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- The first END -->
                                        
                                    </div> 
                                    
                                    
                                    <input type="button" id="add_device_btn" class="btn" value="Add another device" onClick="add_device('dynamic_input');" style="margin-top: 20px; width: 200px;">
                                    
                                    <input type="button" id="remove_device_btn" class="btn" value="Remove a device" onClick="remove_device();" style="margin-top: 20px; margin-left: 10px; width: 200px; display: none;">  
                                    <!-- DYNAMIC INPUT SECTION END -->

                                    
                                    <h3 style="color: #0f6a37;">Pick-Up Info</h3>
                                    <hr/>
                                    
                                    <div class="form-group">
                                        <label class="required">Service Type</label><br/>
                                        <p><input name="service_type" type="radio"> &nbsp; Personal Hardware Service </p> 
                                        <p><input name="service_type" type="radio"> &nbsp; Business Hardware Service </p> 
                                    </div>
                                    
                                    <div id="error" style="display: hidden"></div>
                                    
                                    <div class="form-group">
                                        <button type="submit" id="submit" class="btn" style="background-color: #0f6a37; color: white;">Submit</button>
                                    </div>
                                    
                                    <input type="hidden" id="num_devices" name="num_devices" value=1 />  
                                </form>
                            </div>
 
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- START REPAIR MODAL END -->
        
        <!-- SELECT IMAC MODEL MODAL BEGIN -->
        <!-- Note that you mainly used data-value so you can get the device name and make them part of variable names -->
        <div id="imac_device_select" class="modal fade" role="dialog">
            <div class="vertical-alignment-helper">
                <div class="modal-dialog vertical-align-center">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content" style="padding: 20px;">
                            
                            <div class="modal-body">
                                <div class="row" style="text-align: center; z-index: 1">
                                    <h2>iMac</h2>
                                </div>
                                
                                
                                <div class="row" style="position: relative; top: -20px;">  
                                    
                                    <!-- MODEL SELECTION -->
                                    <!--The value of this element gets set to a model when a model is chosen-->
                                    <input id="imac_model_chosen" type="radio" value=0 style="display: none;">
                                    
                                    <div class="col-xs-1"></div>
                                    
                                    <div class="col-xs-5" style="text-align: center;">
                                        <input class="device_select" type="radio" name="imac_select_group" value="1" id="imac_select1" />
                                        <label for="imac_select1" data-value="imac">
                                            <img src="images/imac_black_sharp.png" style="width: 100%; height: 100%;">
                                            <p class="device_model">iMac 27'' Model</p>
                                        </label>
                                    </div>
                                    
                                    <div class="col-xs-5" style="text-align: center;">
                                        <input class="device_select" type="radio" name="imac_select_group" value="2" id="imac_select2" />
                                        <label for="imac_select2" data-value="imac">
                                            <img src="images/imac_black21-5_sharp.png" style="width: 100%; height: 100%;">
                                            <p class="device_model">iMac 21.5'' Model</p>
                                        </label>
                                    </div>
                                    
                                    <div class="col-xs-1"></div>
                                </div>
                                
                                
                                
                                <div clas="row" style="text-align: center;">
                                    
                                    <!-- PROBLEM SELECTION -->
                                    <!--The value of this element gets set to the problem when a problem is chosen-->
                                    <input id="imac_problem_chosen" type="radio" value=0 style="display: none;">
                                    
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="imac_problem_select_group" id="imac_problem_select1" />
                                            <label for="imac_problem_select1" class="problem_item btn btn-block" data-value="imac">Graphics Card</label>
                                        </div>
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="imac_problem_select_group" id="imac_problem_select2" />
                                            <label for="imac_problem_select2" class="problem_item btn btn-block" data-value="imac">SSD Upgrade</label>
                                        </div>
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="imac_problem_select_group" id="imac_problem_select3" />
                                            <label for="imac_problem_select3" class="problem_item btn btn-block" data-value="imac">LCD Replacement</label>
                                        </div>
                                    </div>
 

                                    <div class="row">
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="imac_problem_select_group" id="imac_problem_select4" />
                                            <label for="imac_problem_select4" class="problem_item btn btn-block" data-value="imac">Motherboard</label>
                                        </div>
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="imac_problem_select_group" id="imac_problem_select5" />
                                            <label for="imac_problem_select5" class="problem_item btn btn-block" data-value="imac">Optical Drive</label>
                                        </div>
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="imac_problem_select_group" id="imac_problem_select6" />
                                            <label for="imac_problem_select6" class="problem_item btn btn-block" data-value="imac">RAM</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="imac_problem_select_group" id="imac_problem_select7" />
                                            <label for="imac_problem_select7" class="problem_item btn btn-block" data-value="imac">Power Supply</label>
                                        </div>
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="imac_problem_select_group" id="imac_problem_select8" />
                                            <label for="imac_problem_select8" class="problem_item btn btn-block" data-value="imac">Data Recovery</label>
                                        </div>
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="imac_problem_select_group" id="imac_problem_select9" />
                                            <label for="imac_problem_select9" class="problem_item btn btn-block" data-value="imac">Virus Removal</label>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                                <div class="row" style="font-size: 15px; text-align: center;"> 
                                    <div class="col-xs-12">
                                        <div class="row">
                                            <label style="display: block;">Service Price: </label>
                                        </div>
                                        <div class="row">
                                            <label id="imac_repair_price" class="price_value">&nbsp;</label>
                                        </div>
                                    </div>
                                    <!--
                                    <div class="col-xs-2">
                                        <label id="imac_repair_price" class="price_value" style="float: left;"></label> 
                                    </div>
                                    -->
                                </div>
                                
                                <div class="row">
                                    <button class="btn_from_device_modal btn col-xs-4 col-xs-offset-4" style="background-color: #0f6a37; color: white; margin-top: 10px;" data-dismiss="modal" data-toggle="modal" data-target="#start_repair_modal" id="imac_service_pickup">Request Pick-Up</button>
                                    <!-- I might actually need to use some Javascript here for the pre-fillout behavior -->
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- SELECT IMAC MODEL MODAL END -->
        
        
        <!-- SELECT MACBOOK MODEL MODAL BEGIN -->
        <div id="macbook_device_select" class="modal fade" role="dialog">
            <div class="vertical-alignment-helper">
                <div class="modal-dialog vertical-align-center">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            
                            <div class="modal-body">
                                <div class="row" style="text-align: center; z-index: 1">
                                    <h2>Macbook</h2>
                                </div>
                                
                                <div class="row" style="position: relative; top: -10px;"> 
                                    
                                    <!-- MODEL SELECTION -->
                                    <!--The value of this element gets set to a model when a model is chosen-->
                                    <input id="macbook_model_chosen" type="radio" value=0 style="display: none;">
                                    
                                    <div class="col-xs-4" style="text-align: center;">
                                        <input class="device_select" type="radio" name="macbook_select_group" value="1" id="macbook_select1" />
                                        <label for="macbook_select1" data-value="macbook">
                                            <img src="images/macbook_air_black.png" style="width: 100%; height: 100%;">
                                            <p class="device_model">Macbook Air</p>
                                        </label>
                                    </div>
                                    
                                    <div class="col-xs-4" style="text-align: center;">
                                        <input class="device_select" type="radio" name="macbook_select_group" value="2" id="macbook_select2" />
                                        <label for="macbook_select2" data-value="macbook">
                                            <img src="images/macbook_pro_black.png" style="width: 100%; height: 100%;">
                                            <p class="device_model">Macbook Pro (non-Retina)</p>
                                        </label>
                                    </div>
                                    
                                    <div class="col-xs-4" style="text-align: center;">
                                        <input class="device_select" type="radio" name="macbook_select_group" value="3" id="macbook_select3" />
                                        <label for="macbook_select3" data-value="macbook">
                                            <img src="images/macbook_pro_black.png" style="width: 100%; height: 100%;">
                                            <p class="device_model">Macbook 21.5'' Model (Retina)</p>
                                        </label>
                                    </div>
                                    
                                </div>
                                
                                <div clas="row" style="text-align: center;">
                                    
                                    <!-- PROBLEM SELECTION -->
                                    <!--The value of this element gets set to the problem when a problem is chosen-->
                                    <input id="macbook_problem_chosen" type="radio" value=0 style="display: none;">
                                    
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="macbook_problem_select_group" id="macbook_problem_select1" />
                                            <label for="macbook_problem_select1" class="problem_item btn btn-block" data-value="macbook">Graphics Card</label>
                                        </div>
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="macbook_problem_select_group" id="macbook_problem_select2" />
                                            <label for="macbook_problem_select2" class="problem_item btn btn-block" data-value="macbook">SSD Upgrade</label>
                                        </div>
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="macbook_problem_select_group" id="macbook_problem_select3" />
                                            <label for="macbook_problem_select3" class="problem_item btn btn-block" data-value="macbook">LCD Replacement</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="macbook_problem_select_group" id="macbook_problem_select4" />
                                            <label for="macbook_problem_select4" class="problem_item btn btn-block" data-value="macbook">Motherboard</label>
                                        </div>
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="macbook_problem_select_group" id="macbook_problem_select5" />
                                            <label for="macbook_problem_select5" class="problem_item btn btn-block" data-value="macbook">Keyboard</label>
                                        </div>
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="macbook_problem_select_group" id="macbook_problem_select6" />
                                            <label for="macbook_problem_select6" class="problem_item btn btn-block" data-value="macbook">RAM</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="macbook_problem_select_group" id="macbook_problem_select7" />
                                            <label for="macbook_problem_select7" class="problem_item btn btn-block" data-value="macbook">Battery</label>
                                        </div>
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="macbook_problem_select_group" id="macbook_problem_select8" />
                                            <label for="macbook_problem_select8" class="problem_item btn btn-block" data-value="macbook">Data Recovery</label>
                                        </div>
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="macbook_problem_select_group" id="macbook_problem_select9" />
                                            <label for="macbook_problem_select9" class="problem_item btn btn-block" data-value="macbook">Virus Removal</label>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row" style="font-size: 15px; text-align: center;"> 
                                    <div class="col-xs-12">
                                        <div class="row">
                                            <label style="display: block;">Service Price: </label>
                                        </div>
                                        <div class="row">
                                            <label id="macbook_repair_price" class="price_value">&nbsp;</label>
                                        </div>
                                    </div>
                                    <!--
                                    <div class="col-xs-3 col-xs-offset-4" style="float: left; padding: 0px;">
                                        <label>Service Price: </label>
                                    </div>
                                    <div class="col-xs-2">
                                        <label id="macbook_repair_price" class="price_value" style="float: left;"></label> 
                                    </div> 
                                    -->
                                </div>
                                
                                <div class="row"> 
                                    <button class="btn_from_device_modal btn col-xs-4 col-xs-offset-4" style="background-color: #0f6a37; color: white; margin-top: 10px;" data-dismiss="modal" data-toggle="modal" data-target="#start_repair_modal" id="macbook_service_pickup">Request Pick-Up</button>
                                </div>
                                
                            </div>
                                                     
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- SELECT MACBOOK MODEL MODAL END -->
        
        
        <!-- SELECT IPHONE MODEL MODAL BEGIN -->
        <div id="iphone_device_select" class="modal fade" role="dialog">
            <div class="vertical-alignment-helper">
                <div class="modal-dialog vertical-align-center">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            
                            <div class="modal-body">
                                <div class="row" style="text-align: center; margin-bottom: 20px; z-index: 1">
                                    <h2>iPhone</h2>
                                </div>
                                
                                <div class="row" style="position: relative; top: -20px;"> 
                                    
                                    <!-- MODEL SELECTION -->
                                    <!--The value of this element gets set to a model when a model is chosen-->
                                    <input id="iphone_model_chosen" type="radio" value=0 style="display: none;">
                                    
                                    <div class="col-xs-3" style="text-align: center;">
                                        <input class="device_select" type="radio" name="iphone_select_group" value="1" id="iphone_select1" />
                                        <label for="iphone_select1" data-value="iphone">
                                            <img src="images/iphone_duo.png" style="width: 100%; height: 100%;">
                                            <p class="device_model">iPhone 7 Plus &amp; 7</p>
                                        </label>
                                    </div>                                    
                                    <div class="col-xs-3" style="text-align: center;">
                                        <input class="device_select" type="radio" name="iphone_select_group" value="2" id="iphone_select2" />
                                        <label for="iphone_select2" data-value="iphone">
                                            <img src="images/iphone_duo.png" style="width: 100%; height: 100%;">
                                            <p class="device_model">iPhone 6s Plus &amp; 6s</p>
                                        </label>
                                    </div>
                                    
                                    <div class="col-xs-3" style="text-align: center;">
                                        <input class="device_select" type="radio" name="iphone_select_group" value="3" id="iphone_select3" />
                                        <label for="iphone_select3" data-value="iphone">
                                            <img src="images/iphone_duo.png" style="width: 100%; height: 100%;">
                                            <p class="device_model">iPhone 6 Plus &amp; 6</p>
                                        </label>
                                    </div>
                                    
                                    <div class="col-xs-3" style="text-align: center;">
                                        <input class="device_select" type="radio" name="iphone_select_group" value="4" id="iphone_select4" />
                                        <label for="iphone_select4" data-value="iphone">
                                            <img src="images/iphone_alone.png" style="width: 100%; height: 100%;">
                                            <p class="device_model">iPhone 5 SE/5s/5c/5</p>
                                        </label>
                                    </div>                                
                                </div>
                                
                                <div clas="row" style="text-align: center;">
                                    
                                    <!-- PROBLEM SELECTION -->
                                    <!--The value of this element gets set to 1 when a problem is chosen-->
                                    <input id="iphone_problem_chosen" type="radio" value=0 style="display: none;">
                                    
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="iphone_problem_select_group" id="iphone_problem_select1" />
                                            <label for="iphone_problem_select1" class="problem_item btn btn-block" data-value="iphone">Screen</label>                                            
                                        </div>
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="iphone_problem_select_group" id="iphone_problem_select2" />
                                            <label for="iphone_problem_select2" class="problem_item btn btn-block" data-value="iphone">Wifi</label>
                                        </div>
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="iphone_problem_select_group" id="iphone_problem_select3" />
                                            <label for="iphone_problem_select3" class="problem_item btn btn-block" data-value="iphone">Speakers</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="iphone_problem_select_group" id="iphone_problem_select4" />
                                            <label for="iphone_problem_select4" class="problem_item btn btn-block" data-value="iphone">Battery</label>
                                        </div>
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="iphone_problem_select_group" id="iphone_problem_select5" />
                                            <label for="iphone_problem_select5" class="problem_item btn btn-block" data-value="iphone">Headphone Jack</label>
                                        </div>
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="iphone_problem_select_group" id="iphone_problem_select6" />
                                            <label for="iphone_problem_select6" class="problem_item btn btn-block" data-value="iphone">Home Button</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="iphone_problem_select_group" id="iphone_problem_select7" />
                                            <label for="iphone_problem_select7" class="problem_item btn btn-block" data-value="iphone">Water Damage</label>
                                        </div>
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="iphone_problem_select_group" id="iphone_problem_select8" />
                                            <label for="iphone_problem_select8" class="problem_item btn btn-block" data-value="iphone">Charging Port</label>
                                        </div>
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="iphone_problem_select_group" id="iphone_problem_select9" />
                                            <label for="iphone_problem_select9" class="problem_item btn btn-block" data-value="iphone">Camera</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" style="font-size: 15px; text-align: center;"> 
                                    <div class="col-xs-12">
                                        <div class="row">
                                            <label style="display: block;">Service Price: </label>
                                        </div>
                                        <div class="row">
                                            <label id="iphone_repair_price" class="price_value">&nbsp;</label>
                                        </div>
                                    </div>
                                    <!--
                                    <div class="col-xs-3 col-xs-offset-4" style="float: left; padding: 0px;">
                                        <label>Service Price: </label>
                                    </div>
                                    <div class="col-xs-2">
                                        <label id="iphone_repair_price" class="price_value" style="float: left;"></label> 
                                    </div>
                                    -->
                                </div>
                                
                                <div class="row"> 
                                    <button class="btn_from_device_modal btn col-xs-4 col-xs-offset-4" style="background-color: #0f6a37; color: white; margin-top: 10px;" data-dismiss="modal" data-toggle="modal" data-target="#start_repair_modal" id="iphone_service_pickup">Request Pick-Up</button>
                                </div>
                                
                            </div>
                                                     
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- SELECT IPHONE MODEL MODAL END -->
        
        
        <!-- SELECT IPAD MODEL MODAL BEGIN -->
        <div id="ipad_device_select" class="modal fade" role="dialog">
            <div class="vertical-alignment-helper">
                <div class="modal-dialog vertical-align-center">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            
                            <div class="modal-body">
                                <div class="row" style="text-align: center; margin-bottom: 20px; z-index: 1">
                                    <h2>iPad</h2>
                                </div>
                                
                                <div class="row" style="position: relative; top: -20px;"> 
                                    
                                    <!-- MODEL SELECTION -->
                                    <!--The value of this element gets set to a model when a model is chosen-->
                                    <input id="ipad_model_chosen" type="radio" value=0 style="display: none;">
                                    
                                    <div class="col-xs-3" style="text-align: center;">
                                        <input class="device_select" type="radio" name="ipad_select_group" value="1" id="ipad_select1" />
                                        <label for="ipad_select1" data-value="ipad">
                                            <img src="images/ipad_air.png" style="width: 100%; height: 100%;">
                                            <p class="device_model">iPad 2/3/4 &amp; Air</p>
                                        </label>
                                    </div>                                    
                                    <div class="col-xs-3" style="text-align: center;">
                                        <input class="device_select" type="radio" name="ipad_select_group" value="2" id="ipad_select2" />
                                        <label for="ipad_select2" data-value="ipad">
                                            <img src="images/ipad_air.png" style="width: 100%; height: 100%;">
                                            <p class="device_model">iPad Air 2</p>
                                        </label>
                                    </div>
                                    
                                    <div class="col-xs-3" style="text-align: center;">
                                        <input class="device_select" type="radio" name="ipad_select_group" value="3" id="ipad_select3" />
                                        <label for="ipad_select3" data-value="ipad">
                                            <img src="images/ipad_mini.png" style="width: 100%; height: 100%;">
                                            <p class="device_model">iPad Mini 1/2/3</p>
                                        </label>
                                    </div>
                                    
                                    <div class="col-xs-3" style="text-align: center;">
                                        <input class="device_select" type="radio" name="ipad_select_group" value="4" id="ipad_select4" />
                                        <label for="ipad_select4" data-value="ipad">
                                            <img src="images/ipad_mini.png" style="width: 100%; height: 100%;">
                                            <p class="device_model">iPad Mini 4</p>
                                        </label>
                                    </div>                                
                                </div>
                                
                                <div clas="row" style="text-align: center;">
                                    
                                    <!-- PROBLEM SELECTION -->
                                    <!--The value of this element gets set to 1 when a problem is chosen-->
                                    <input id="ipad_problem_chosen" type="radio" value=0 style="display: none;">
                                    
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="ipad_problem_select_group" id="ipad_problem_select1" />
                                            <label for="ipad_problem_select1" class="problem_item btn btn-block" data-value="ipad">Screen</label>
                                        </div>
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="ipad_problem_select_group" id="ipad_problem_select2" />
                                            <label for="ipad_problem_select2" class="problem_item btn btn-block" data-value="ipad">Wifi</label>
                                        </div>
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="ipad_problem_select_group" id="ipad_problem_select3" />
                                            <label for="ipad_problem_select3" class="problem_item btn btn-block" data-value="ipad">Speakers</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="ipad_problem_select_group" id="ipad_problem_select4" />
                                            <label for="ipad_problem_select4" class="problem_item btn btn-block" data-value="ipad">Battery</label>
                                        </div>
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="ipad_problem_select_group" id="ipad_problem_select5" />
                                            <label for="ipad_problem_select5" class="problem_item btn btn-block" data-value="ipad">Headphone Jack</label>
                                        </div>
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="ipad_problem_select_group" id="ipad_problem_select6" />
                                            <label for="ipad_problem_select6" class="problem_item btn btn-block" data-value="ipad">Home Button</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="ipad_problem_select_group" id="ipad_problem_select7" />
                                            <label for="ipad_problem_select7" class="problem_item btn btn-block" data-value="ipad">LCD Replacement</label>
                                        </div>
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="ipad_problem_select_group" id="ipad_problem_select8" />
                                            <label for="ipad_problem_select8" class="problem_item btn btn-block" data-value="ipad">Charging Port</label>
                                        </div>
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="ipad_problem_select_group" id="ipad_problem_select9" />
                                            <label for="ipad_problem_select9" class="problem_item btn btn-block" data-value="ipad">Camera</label>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row" style="font-size: 15px; text-align: center;">
                                    <div class="col-xs-12">
                                        <div class="row">
                                            <label style="display: block;">Service Price: </label>
                                        </div>
                                        <div class="row">
                                            <label id="ipad_repair_price" class="price_value">&nbsp;</label>
                                        </div>
                                    </div>
                                    
                                    <!--
                                    <div class="col-xs-3 col-xs-offset-4" style="float: left; padding: 0px;">
                                        <label>Service Price: </label>
                                    </div>
                                    <div class="col-xs-2">
                                        <label id="ipad_repair_price" class="price_value" style="float: left;"></label> 
                                    </div>
                                    -->
                                </div>
                                
                                <div class="row"> 
                                    <button class="btn_from_device_modal btn col-xs-4 col-xs-offset-4" style="background-color: #0f6a37; color: white; margin-top: 10px;" data-dismiss="modal" data-toggle="modal" data-target="#start_repair_modal" id="ipad_service_pickup">Request Pick-Up</button>
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- SELECT IPAD MODEL MODAL END -->
        
        
        <!-- CLEVERTECH VIDEO MODAL BEGIN -->
        <div id="clevertech_vid" class="modal fade" role="dialog">
            <div class="vertical-alignment-helper">
                <div class="modal-dialog vertical-align-center">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            
                            <div class="modal-body" style="background-color: black;">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/QGKvYpL4DRU"></iframe>
                                </div>                    
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- CLEVERTECH VIDEO MODAL END -->
        
        
        <!-- CONTACT US MODAL BEGIN -->
        <div id="contact_us_modal" class="modal fade" role="dialog">
            <div class="vertical-alignment-helper">
                <div class="modal-dialog vertical-align-center">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            
                            <div class="modal-body">
                                <!-- Put form code here-->
                                <form id="contact_form" method="post" style="padding: 20px;" action="sendmail.php">
                                    <!--<p class="required">Name</p>-->
                                    <div class="form-group" style="text-align: center;">
                                        <h3>Send Us A Message!</h3>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="required" for="contact_us_name">Name</label>
                                        <input class="form-control" id="contact_us_name" name="contact_us_first_name">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="required" for="contact_us_email">Email</label>
                                        <input class="form-control" type="email" id="contact_us_email" name="contact_us_email">
                                        <!--<input id="receive_email_updates" type="checkbox"> Check here to receive email updates-->
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="required" for="contact_us_subject">Subject</label>
                                        <input class="form-control" id="contact_us_subject" name="contact_us_subject">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="required" for="contact_us_msg">Message</label>
                                        <textarea class="form-control" rows=4 id="contact_us_msg" name="contact_us_msg" style="resize: none;"></textarea>               
                                    </div>
                                    
                                    <div id="contact_form_error" style="display: hidden"></div>

                                    <div class="form-group">
                                        <button type="submit" id="contact_submit" class="btn" style="background-color: #0f6a37; color: white;">Submit</button>
                                    </div>
                                </form>
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- CONTACT US MODAL END -->

        
        <!-- Say tabindex=-1 so users can access keyboard shortcuts on modals -->
        <!-- Note how you didn't center this modal. It was causing weird stuff to happen during resizing. -->
        <div class="modal fade in" id="pick_up_info_modal" tabindex="-1" role="dialog" aria-hidden="true">

            <div class="modal-dialog modal-lg" style="margin-top: 100px;">
                <div class="modal-content">

                    <div class="modal-body" style="padding-left: 50px; padding-right: 50px; text-align: center;">
                        <div class="row">
                            <h1>Smart Pick-Up</h1>
                        </div>
                        
                        <div class="row">
                            <p class="how_it_works_text">CleverTech performs home &amp; business computer pick-ups the day after a pick-up request is submitted. In some case (when possible) the day of submission. After submitting a request, we will call you to veify time and location for the computer pick-up. It's easy!</p>
                        </div>
                        

                        <div class="row" style="margin-top: 20px;">
                            <a class="how_it_works_text" style="cursor: pointer; color: green;" data-dismiss="modal" data-toggle="modal" data-target="#start_repair_modal">Start your pick-up request here ></a>
                        </div>
                        

                        <div class="row" style="margin-top: 70px;">
                            <h1>What to expect</h1>
                        </div>
                        <div class="row">
                            <p class="how_it_works_text">Pick-up requests submitted before 10:30 am are usually picked up same day. If submitted after 10:30 am, expect a phone call to schedule a next day pick-up. If you need to cancel or reschedule a pick-up, please call us at 408-316-7600. A pick-up fee ($50) is charged for any repairs that are declined. If you approve the repair, the pick-up fee is waived.</p>
                        </div>
                        
                        
                        <div class="row" style="margin-top: 20px; margin-bottom: 18px;">
                            <a class="how_it_works_text" style="cursor: pointer; color: green;" data-dismiss="modal" data-toggle="modal" data-target="#terms_and_cond_modal">Terms &amp; Conditions ></a>
                        </div>
                        
                    </div>

                </div>
            </div>
        </div>

        
        <!-- Note how you didn't center this modal. It was causing weird stuff to happen during resizing. -->
        <div class="modal fade in" id="repair_info_modal" tabindex="-1" role="dialog" aria-hidden="true">

            <div class="modal-dialog modal-lg" style="margin-top: 100px;">
                <div class="modal-content">

                    <div class="modal-body" style="padding-left: 50px; padding-right: 50px; text-align: center;">
                        
                        <div class="row">
                            <h1>CleverTech Repair</h1>
                        </div>
                        
                        <div class="row">
                            <p class="how_it_works_text">We're here to help. CleverTech repairs are performed by experts who use genuine Apple parts. All parts from 2006 till now are in stock. This allows us to turnaround repairs in 2-3 days no matter what model computer or issue you're experiencing. We're so good, it doesn't make sense to go anywhere else!</p>
                        </div>
                        

                        <div class="row" style="margin-top: 20px;">
                            <a class="how_it_works_text" style="cursor: pointer; color: green;" data-dismiss="modal" data-toggle="modal" data-target="#start_repair_modal">Start your pick-up request here ></a>
                        </div>
                        

                        <div class="row" style="margin-top: 70px;">
                            <h1>The CleverWay!</h1>
                        </div>
                        <div class="row">
                            <p class="how_it_works_text">Every repair comes with a 90 Day Limited Warranty and up to 365 days of coverage on parts with Manufacturer Warranties. The limited warranty provides that if within 90 days from the repair date of your CleverTech repair you device fails to operate for some reasons related to the original repair, CleverTech will perform any labor related to the original repair free of charge.</p>
                        </div>
                        
                        
                        <div class="row" style="margin-top: 20px; margin-bottom: 18px;">
                            <a class="how_it_works_text" style="cursor: pointer; color: green;" data-dismiss="modal" data-toggle="modal" data-target="#terms_and_cond_modal">Terms &amp; Conditions ></a>
                        </div>
                        
                    </div>

                </div>
            </div>
        </div>

        
        <!-- Note how you didn't center this modal. It was causing weird stuff to happen during resizing. -->
        <div class="modal fade in" id="drop_off_info_modal" tabindex="-1" role="dialog" aria-hidden="true">

            <div class="modal-dialog modal-lg" style="margin-top: 100px;">
                <div class="modal-content">

                    <!--<div class="modal-body" style="padding: 50px; text-align: center;">-->
                    <div class="modal-body" style="padding-left: 50px; padding-right: 50px; text-align: center;">
                        
                        <div class="row">
                            <h1>Smart Drop-Off</h1>
                        </div>
                        
                        <div class="row">
                            <p class="how_it_works_text">Drop-offs are performed between 11am-3pm. Drop-off location can differ from pick-up location if requested.</p>
                        </div>
                        

                        <div class="row" style="margin-top: 100px;">
                            <h1>Customer's Responsibilities</h1>
                        </div>
                        <div class="row">
                            <p class="how_it_works_text">Your photo ID will be needed to verify who you are. If you need to cancel or reschedule a drop-off, please call us at 408-316-7600. Any instructions/tips for the driver to access your building or parking are greatly appreciated.</p>
                        </div>
                        
                        
                        <div class="row" style="margin-top: 20px; margin-bottom: 18px;">
                            <a class="how_it_works_text" style="cursor: pointer; color: green;" data-dismiss="modal" data-toggle="modal" data-target="#terms_and_cond_modal">Terms &amp; Conditions ></a>
                        </div>
                        
                    </div>

                </div>
            </div>
        </div>

        
        
        <!-- Note how you didn't center this modal. It was causing weird stuff to happen during resizing. -->
        <div class="modal fade in" id="terms_and_cond_modal" tabindex="-1" role="dialog" aria-hidden="true">

            <div id="terms_and_cond_dialog" class="modal-dialog modal-lg" style="margin-top: 100px; ">
                <div class="modal-content">

                    <!--<div class="modal-body" style="padding: 50px; text-align: center;">-->
                    <div id="terms_and_cond_body" class="modal-body" style="padding-left: 50px; padding-right: 50px;">
                        
                        <div class="row">
                            <h3>Terms &amp; Conditions</h3>
                        </div>
  
                        <div class="row">
                            <p style="font-size: 15px;">

                                <br/>Limited Warranty<br/><br/>

                                CLEVERTECH provides a 15-Day Return Window (see Return of Non-Defective Products below) and the following limited warranty. This limited warranty extends only to the original purchaser.<br/>
                                Please note that any warranty services or questions must be accompanied by the order number from the transaction through which the warranted product was purchased. The order number serves as your warranty number and must be retained. CLEVERTECH will offer no warranty service without this number.<br/>
                                CLEVERTECH warrants products and its parts against defects in materials or workmanship for 90 days from the original ship date. During this period, CLEVERTECH will repair or replace defective parts with new or reconditioned parts at CLEVERTECH’s option, without charge to you. This is only applicable if the product is not warranted by manufacturer.
                                All shipping fees both to and from CLEVERTECH following the first 90-days of purchase period must be paid by the customer. All returns, both during and following the 15-day period, must be affected via the Procedures for Obtaining Warranty Service described below.<br/>
                                All original parts (parts installed by CLEVERTECH at the original system build) replaced by CLEVERTECH or its authorized service center, become the property of CLEVERTECH. Any after-market additions or modifications will not be warranted. The product owner is responsible for the payment, at current rates, for any service or repair outside the scope of this limited warranty.<br/>
                                CLEVERTECH makes no other warranty, either express or implied, including but not limited to implied warranties of merchantability, fitness for a particular purpose, or conformity to any representation or description, with respect to this product other than as set forth below. CLEVERTECH makes no warranty or representation, either express or implied, with respect to any other manufacturer’s product or documentation, its quality, performance, merchantability, fitness for a particular purpose, or conformity to any representation or description.<br/>
                                Except as provided below, CLEVERTECH is not liable for any loss, cost, expense, inconvenience or damage that may result from use or inability to use the product. Under no circumstances shall CLEVERTECH be liable for any loss, cost, expense, inconvenience or damage exceeding the purchase price of the product.<br/>
                                The warranty and remedies set forth below are exclusive and in lieu of all others, oral or written, expressed or implied. No reseller, agent or employee is authorized to make any modification, extension or addition to this warranty.<br/><br/>

                                Warranty Conditions<br/><br/>

                                The above Limited Warranty is subject to the following conditions:<br/><br/>

                                · This warranty extends only to products distributed and/or sold by CLEVERTECH. It is effective only if the products are purchased and operated in the USA. (Within the USA including US 48 States, Alaska and Hawaii.)<br/><br/>

                                · This warranty covers only normal use of the product. CLEVERTECH shall not be liable under this warranty if any damage or defect results from (i) misuse, abuse, neglect, improper shipping or installation; (ii) disasters such as fire, flood, lightning or improper electric current; or (iii) service or alteration by anyone other than an authorized CLEVERTECH representative; (iv) damages incurred through irresponsible use, including those resulting from viruses or spyware, over clocking, or other non-recommended practices.<br/><br/>

                                · You must retain your bill of sale or other proof of purchase to receive warranty service.<br/><br/>

                                · No warranty extension will be granted for any replacement part(s) furnished to the purchaser in fulfillment of this warranty.<br/><br/>

                                · CLEVERTECH and its Authorized Service Center accepts no responsibility for any software programs, data or information stored on any media or any parts of any products returned for repair to CLEVERTECH.<br/><br/>

                                · All pre-installed software programs are licensed to customers under non-CLEVERTECH software vendor’s term and conditions provided with the packages.<br/><br/>

                                · This warranty does not cover any third party software or virus related problems.<br/><br/>

                                · CLEVERTECH makes no warranty either expressed or implied regarding third-party (non-CLEVERTECH) software.<br/><br/>

                                · Thirty-day Return Window does not include opened software, parts, special order merchandise and shipping and handling fees.<br/><br/>

                                CLEVERTECH provides a 15-Day Return Window (see Return of Non-Defective Products below) and the following limited warranty. This limited warranty extends only to the original purchaser.<br/><br/>

                                Please note that any warranty services or questions must be accompanied by the order number from the transaction through which the warranted product was purchased. The order number serves as your warranty number and must be retained. CLEVERTECH will offer no warranty service without this number.<br/><br/>

                                CLEVERTECH warrants products and its parts against defects in materials or workmanship for 90 days from the original ship date. During this period, CLEVERTECH will repair or replace defective parts with new or reconditioned parts at CLEVERTECH’s option, without charge to you. This is only applicable if the product is not warranted by manufacturer.<br/><br/>

                                All shipping fees both to and from CLEVERTECH following the first 90-days of purchase period must be paid by the customer. All returns, both during and following the 15-day period, must be affected via the Procedures for Obtaining Warranty Service described below.<br/><br/>

                                All original parts (parts installed by CLEVERTECH at the original system build) replaced by CLEVERTECH or its authorized service center, become the property of CLEVERTECH. Any after-market additions or modifications will not be warranted. The product owner is responsible for the payment, at current rates, for any service or repair outside the scope of this limited warranty.<br/><br/>

                                CLEVERTECH makes no other warranty, either express or implied, including but not limited to implied warranties of merchantability, fitness for a particular purpose, or conformity to any representation or description, with respect to this product other than as set forth below. CLEVERTECH makes no warranty or representation, either express or implied, with respect to any other manufacturer’s product or documentation, its quality, performance, merchantability, fitness for a particular purpose, or conformity to any representation or description.<br/><br/>

                                Except as provided below, CLEVERTECH is not liable for any loss, cost, expense, inconvenience or damage that may result from use or inability to use the product. Under no circumstances shall CLEVERTECH be liable for any loss, cost, expense, inconvenience or damage exceeding the purchase price of the product.<br/><br/>

                                The warranty and remedies set forth below are exclusive and in lieu of all others, oral or written, expressed or implied. No reseller, agent or employee is authorized to make any modification, extension or addition to this warranty.<br/><br/>

                                A non-defective product may be returned to CLEVERTECH within 15 days of the invoice date for a refund of the original purchase price with the following amendments/fees:<br/><br/>

                                New products: <br/>
                                -May be returned within 15 days for a full refund or store credit, if sealed, unopened and undamaged. <br/>
                                -Open box products that are undamaged and still in new condition are subject to a 35% restocking fee.<br/><br/>

                                Refurbished products: <br/>
                                -May be returned within 15 days for a store credit and/or a 25% restocking fee. We reserve the right to deny a return or credit based on the condition of the product. The return must be in the same condition as when it was sold.<br/><br/>

                                CLEVERTECH will refund neither the original shipping cost nor the shipping and handling fees incurred from the products return. If the original purchase was made under a “Free Shipping” promotion then a charge of up to $200 (depending on the weight of the product) fee will be deducted from any return in counter to that offer.<br/><br/>

                                No refund will be granted for software which has been opened, used, or tampered with in any way which jeopardized CLEVERTECH’s ability to remarket or resell the product. CLEVERTECH maintains full discretion in decisions regarding a products fitness for return.<br/><br/>

                                Any non-defective returns are subject to a 15% restocking fee, which percentage is taken from the final purchase price less any shipping or handling charges.<br/><br/>

                                Quantity purchases of five products or more are not eligible for return.<br/><br/>

                                To return a defective product, please contact our Customer Service Department for a Return Merchandise Authorization (RMA) number and follow the Return of Products Instructions below. The RMA is valid for 30 days from date of issuance. Returns will not be accepted without an RMA. Manufacturer restrictions do apply. Any item missing the UPC on the original packaging may not be returned.<br/><br/>

                                Procedures for Obtaining Warranty Service<br/><br/>

                                RMA (Returning Merchandise Authorization) Policy:<br/><br/>

                                · If repairs are required, the customer must obtain a RMA number and provide proof of purchase. RMA and services are rendered by CLEVERTECH only. Any shipping cost (starting from the original date of purchase) on any item returned for repair is the customers’ responsibility. All returned parts must have a RMA number written clearly on the outside of the package along with a letter detailing the problems and a copy of the original proof of purchase. No COD packages will be accepted. No package will be accepted without a RMA number written on the outside of the package. RMA numbers are only valid for 30 days from the date of issue.<br/><br/>

                                Should you have any problems with your products, please follow these procedures to obtain the service:<br/><br/>

                                1. If you have purchased our on-site warranty, please find your warranty# (the order number from the transaction through which the warranted product was originally purchased) and contact CLEVERTECH Customer Service at PHONE NUMBER.<br/><br/>

                                2. If the system must be repaired, an RMA number (Return Merchandise Authorization Number) will be issued for shipment to our repair department. Please follow the instructions given by CLEVERTECH technical support staff to ship your computer. CLEVERTECH will not accept any shipments without a RMA number.<br/><br/>

                                3. Pack the system in its original box or a well-protected box, as outlined in the Return Shipping Instructions. CLEVERTECH will not be responsible for shipping damage/loss of any product outside the original 30-day CLEVERTECH-paid service period. It is very important that you write the RMA number clearly on the outside of the package. Ship the system with a copy of your bill of sale or other proof of purchase, your name, address, phone number, description of the problem(s), and the RMA number you have obtained to:<br/><br/>

                                CLEVERTECH Computer Service Center<br/><br/>

                                RMA#____________<br/><br/>

                                1150 Murphy Ave Ste 205<br/><br/>

                                San Jose, CA 93131<br/><br/>

                                4. Upon receiving the computer, CLEVERTECH will repair or replace your computer (at CLEVERTECH’s discretion) and will ship it back to you within 2 weeks (dependent on parts availability) via UPS, FedEx, USPS.<br/><br/>

                                5. Cross-exchange (Parts only): You will need to provide a valid credit card number as a deposit guarantee when the RMA number is issued. Once approval has been obtained on your credit card, the part(s) will be shipped via UPS, FedEx, USPS. You will need to ship defective part(s) back to CLEVERTECH within 15 days to avoid charges to your credit card. If such charges are incurred, the shipped part(s) will be billed at the then current price.<br/><br/>

                                6. CLEVERTECH will pay for shipping to and from the customer only within the first thirty days following the original product ship date. Following the RMA period all shipping fees both for under warranty and post warranty repairs are the sole responsibility of the customer. The customer also assumes full liability for losses or damages resulting from shipping as well as all responsibility to pursue remuneration for such issues with their selected carrier.<br/><br/>

                                After 90-Day Warranty – Post Warranty Repair<br/><br/>

                                For post warranty repair, the procedure is the same as outlined above for RMA and shipping. However, you are responsible for shipping charges both ways, current labor charges (if not under warranty), and the current price of part(s) used in repair.<br/><br/>

                                Technical Support:<br/><br/>

                                · service@urclevertech.com<br/><br/>

                                Contact: (408) 316-7600<br/><br/>

                                Customer Service:<br/><br/>

                                · sales@urclevertech.com<br/><br/>

                                Contact: (408) 316-7600<br/><br/><br/><br/>



                                WARRANTY EXCLUSIONS<br/><br/>

                                CLEVERTECH does not offer technical support for any software including installed OS or other programs. Technical support should be pursued through channels offered by the software’s individual tech support. CLEVERTECH accepts no liability for problems caused by after-market software or hardware modifications or additions. CLEVERTECH is not responsible for giving any technical support concerning the installation or integration of any software or component the customer did not pay CLEVERTECH to install. CLEVERTECH is not responsible for loss of data or time, even with hardware failure. Customers are responsible for backing up any data for their own protection. CLEVERTECH is not responsible for any loss of work (“down time”) caused by a product requiring service. This warranty is null and void if the defect or malfunction was due to damage resulting from operation not within manufacturer specifications. It will also be null and void if there are indications of misuse and/or abuse. CLEVERTECH has the option of voiding the warranty if anyone other than a CLEVERTECH technician attempts to service the product. CLEVERTECH will not warrant any problems arising from an act of (lighting, flooding, tornado, etc.), electrical spikes or surges, or problems arising out of hardware, software, or additional devices added to complement any system/component bought at CLEVERTECH. Under no circumstances will CLEVERTECH be responsible for any refund or remuneration exceeding the original purchase price of the product less any shipping fees. CLEVERTECH will not be held responsible for typographical errors on sales receipts, repair tickets, or on our website. CLEVERTECH makes every effort to make sure all information on our website is correct.
                            </p>
                        </div>
  
                    </div>

                </div>
            </div>
        </div>

        
        <!-- MODALS END -->
        
        
        
        <!-- THE CONTENT BEGIN-->
        
        <!-- SECTION 1 BEGIN -->
        <div class="jumbotron" id="welcome" style="text-align: center;">
            <div id="welcome_content">
                <!--
                <h1>Welcome to CleverTech</h1>
                <p id="here_to_help" style="font-size: 25px;">We're here to help</p>
                -->
                <div class="container">
                    <div class="row">
                        <h1>Welcome to CleverTech</h1>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <button id="here_to_help_btn" class="btn" style="font-size: 25px;" data-toggle="modal" data-target="#clevertech_vid">
                                <img id="play_btn" src="images/play_button.png">
                                <span id="here_to_help_span">We're here to help</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- SECTION 1 END -->


        <!-- SECTION 2 BEGIN -->
        <div class="jumbotron" id="how_it_works" style="text-align: center;">
            <div class="container" id="how_it_works_content">
                <div class="row">
                    <h1>Start to Finish</h1>
                    <p style="font-size: 25px;">3 days to complete</p>
                </div>
                <div class="row">
                    <button class="btn how_it_works_btn" data-toggle="modal" data-target="#pick_up_info_modal">Pick-Up</button>
                    <button class="btn how_it_works_btn" data-toggle="modal" data-target="#repair_info_modal">Repair</button>
                    <button class="btn how_it_works_btn" data-toggle="modal" data-target="#drop_off_info_modal">Drop-Off</button>
                    
                    <!--
                    <h1 class="btn how_it_works_btn" data-toggle="modal" data-target="#pick_up_info_modal">Pick-Up</h1>
                    <h1 class="btn how_it_works_btn" data-toggle="modal" data-target="#repair_info_modal">Repair</h1>
                    <h1 class="btn how_it_works_btn" data-toggle="modal" data-target="#drop_off_info_modal">Drop-Off</h1>
                    -->
                </div>
                <!--
                <div class="row">
                    <p>3 days to complete</p>
                </div>
                -->
            </div>
        </div>
        <!-- SECTION 2 END -->

        
        <!-- SECTION 3 BEGIN -->
        <div class="jumbotron" id="services" style="text-align: center;">
            
            <div class="container" id="services_content">  
                
                <div class="row">
                    <!--<h1 style="position: relative; top: -50px;">Got Problems?<br/>Tell us your model</h1>-->
                    <h1>Got Problems?</h1>
                    <p style="font-size: 25px;">Tell us your model</p>
                </div>
                
                <div class="row">
                    <!-- Add solid color to this div to see how nicely the color consumes the whole menu item -->
                    <div class="col-xs-3 problem_device" data-toggle="modal" data-target="#imac_device_select" style="background-color: rgba(0,0,0,0.4); border-top-left-radius: 10px; border-bottom-left-radius: 10px;">
                        <!-- What if I got rid of this anchor tag. It added some unnecessary padding to <img> -->
                        <!--<a class="device_selection" href="" data-toggle="modal" data-target="#imac_device_select">-->
                        <img src="images/imac_white2.png" style="width: 100%; height: 100%;">
                        <p class="services_device_type">iMac</p>
                        <!--</a>-->
                    </div>                       
                    <div class="col-xs-3 problem_device" style="background-color: rgba(0,0,0,0.4);" data-toggle="modal" data-target="#macbook_device_select">
                        <img src="images/macbook_white2.png" style="width: 100%; height: 100%;">
                        <p class="services_device_type">Macbook</p>
                    </div>
                    <div class="col-xs-3 problem_device" style="background-color: rgba(0,0,0,0.4);" data-toggle="modal" data-target="#iphone_device_select">
                        <img src="images/iphone_white2.png" style="width: 100%; height: 100%;">
                        <p class="services_device_type">iPhone</p>
                    </div>   
                    <div class="col-xs-3 problem_device" data-toggle="modal" data-target="#ipad_device_select" style="background-color: rgba(0,0,0,0.4); border-top-right-radius: 10px; border-bottom-right-radius: 10px;">
                        <img src="images/ipad_white2.png" style="width: 100%; height: 100%;">
                        <p class="services_device_type">iPad</p>
                    </div>   
                </div>
                
            </div>
        
        
        </div>
        <!-- SECTION 3 END -->
        
        
        
        <!-- STAY CLEVER BEGIN -->
        <div class="jumbotron" id="stay_clever" style="text-align: center;">
            <div class="container" id="stay_clever_content">
                
                
                <div class="row" style="position: relative; top: 150px;">
                    <!--
                    <div class="row">
                        <div class="col-xs-6 col-xs-offset-6" style="background-color: rgba(0,0,0,0.4);">
                            <div class="row">
                                <h2 class="gonz_quote">
                                    "I want to see a paradigm shift. We're going to be so good...It wouldn't make sense to go anywhere else."<br/><br/>
                                    Gonzalo Martinez<br/>
                                    Founder
                                </h2>
                            </div>
                            <div class="row">
                                <div id="contact_us_btn" class="btn" data-toggle="modal" data-target="#contact_us_modal">Contact Us</div>
                            </div>
                        </div>
                    </div>
                    -->

                    <div class="row">
                        <h2 class="gonz_quote">
                            "I want to see a paradigm shift. We're going to be so good...It wouldn't make sense to go anywhere else."<br/><br/>
                            Gonzalo Martinez<br/>
                            Founder
                        </h2>
                    </div>
                    
                    <div class="row">
                        <div id="contact_us_btn" class="btn" data-toggle="modal" data-target="#contact_us_modal" style="background-color: rgba(0,0,0,0.4);">Contact Us</div>
                    </div>
                </div>
                
                <!-- FLANKED LAYOUT BEGIN -->
                <!--<div id="soc_media_and_store_info" style="background-color: rgba(0,0,0,0.4); border-radius: 5px; margin-top: 250px;">-->
                <div id="soc_media_and_store_info">
                    <div class="row" style="margin-top:150px;">
                        <div class="col-md-4">
                            <div class="row" style="padding-top: 20px;">
                                <div class="col-lg-12">
                                    <label>For the crazy ones:</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <ul class="soc">
                                        <li><a class="soc-facebook" href="#"></a></li> 
                                        <li><a class="soc-instagram" href="#"></a></li> 
                                        <li><a class="soc-tumblr" href="#"></a></li>
                                        <li><a class="soc-twitter" href="#"></a></li> 
                                        <li><a class="soc-youtube" href="#"></a></li> 
                                        <li><a class="soc-yelp" href="#"></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-8" style="padding-top: 20px; padding-right: 40px;"> 
                            <div class="row">
                                <div class="col-xs-6 col-md-9">
                                    <dl class="pull-right">
                                        <dt>Phone Number:</dt> 
                                        <dd>408.316.7600</dd><br/> 
                                        <dt>Address:</dt> 
                                        <dd>1150 Murphy Ave, Ste 205</dd> 
                                        <dd>San Jose, CA 9513</dd> <br/>
                                    </dl>
                                </div>

                                <div class="col-xs-6 col-md-3">

                                    <dl class="pull-left">
                                        <dd>Monday - Friday: <br/>9am - 7pm</dd>    
                                        <dd>Saturday - Sunday: <br/>10am - 6pm</dd>  <br/> 
                                        <dd>© CleverTech Corporation</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- FLANKED LAYOUT END -->
                
            </div>
            
        </div>
        <!-- STAY CLEVER END -->

        <!-- THE CONTENT END -->
        
        <!-- Arrow Button Code -->
        <a id="move_up" href="#"></a>
        <a id="move_down" style="display: inline;" href="#"></a>

        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> 
        <!--Fit Text import-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/FitText.js/1.2.0/jquery.fittext.min.js"></script>
        <script language="JavaScript" type="text/javascript">
            
            $("body").scrollspy({ target: "#my_navbar" });

            //Fit Text Code!!
            $(".gonz_quote").fitText(2, { minFontSize: "15px", maxFontSize: "22px" });

            
            var duration = 300;  
            var welcome_top = $("#welcome").position().top;
            var how_it_works_top = $("#how_it_works").position().top; //485 on full viewport
            var services_top = $("#services").position().top;
            var stay_clever_top = $("#stay_clever").position().top; //1400 on full viewport
            
            
            //scroll() constantly keeps tabs on the position of the scrollbar? Does this code fire as
            //the user is moving the scrollbar?
            $(window).scroll(function() {                
                //For the move up button
                if ($(this).scrollTop() >= how_it_works_top) {
                    $("#move_up").fadeIn(duration);
                }
                else {
                    $("#move_up").fadeOut(duration);
                }
                
                //For the move down button
                if ($(this).scrollTop() >= stay_clever_top) {
                    $("#move_down").fadeOut(duration);
                }
                else {
                    $("#move_down").fadeIn(duration);
                }
            });
            

            $("#move_up").click(function(event) {
                event.preventDefault();
                var cur_scrolltop = $(window).scrollTop();
                var welcome_bottom = welcome_top + $("#welcome").outerHeight(false);
                var how_it_works_bottom = how_it_works_top + $("#how_it_works").outerHeight(false);    
                var services_bottom = services_top + $("#services").outerHeight(false);
                
                //When we're on the How It Works section:
                if (cur_scrolltop >= welcome_bottom && cur_scrolltop < services_top) {
                    $("html, body").animate({scrollTop: welcome_top}, duration);
                }
                //When we're on the Services section:
                else if (cur_scrolltop >= how_it_works_bottom && cur_scrolltop < stay_clever_top) {
                    $("html, body").animate({scrollTop: how_it_works_top}, duration);
                }
                //When we're on the Stay Clever section:
                else if (cur_scrolltop >= services_bottom) {
                    $("html, body").animate({scrollTop: services_top}, duration);
                }
                
                return false; //Does this need to be here?
            });
            
            
            $(".btn_from_device_modal").click(function(event) {
                event.preventDefault(); 
                //prefill start a repair modal with values selected here
                
            });
            
            $("#move_down").click(function(event) {
                event.preventDefault();                
                var cur_scrolltop = $(window).scrollTop();

                if (cur_scrolltop < how_it_works_top) {
                    $("html, body").animate({scrollTop: how_it_works_top}, duration);
                }
                else if (cur_scrolltop < services_top) {
                    $("html, body").animate({scrollTop: services_top}, duration);
                }
                else if (cur_scrolltop < stay_clever_top) {
                    $("html, body").animate({scrollTop: stay_clever_top}, duration);
                }
                
                return false; //Does this need to be here?
            });
            
            
            // For smooth scrollspy scrolling (thanks to nice ass from SO)
            $("nav ul li a[href^='#'], nav .navbar-header a[href^='#']").on("click", function(e) {
                //First arg is for the navbar items, second arg is for the brand logo
                
                // prevent default anchor click behavior
                e.preventDefault();

                // store hash
                var hash = this.hash;

                //console.log(hash);
                
                // animate
                $("html, body").animate({
                    scrollTop: $(hash).offset().top
                }, 300, function(){
                    //when done, add hash to url
                    //(default click behaviour)
                    window.location.hash = hash;
                });
            });
            
                        
            // ===================== For device select buttons =====================
            $(".device_select ~ label").click(function() {
                
                var device_type = $(this).data("value");
                $("#" + device_type + "_model_chosen").val($(this).find("p").html()); 
                //Set the model that has been chosen   
                                                
                if ($("#" + device_type + "_problem_chosen").val() !== "0") {
                    console.log("I'MA SET THE PRICE FROM MODEL!")
                    console.log("The Model Is: " + $("#" + device_type + "_model_chosen").val()); //The model
                    console.log("The Problem Is: " + $("#" + device_type + "_problem_chosen").val()); //The problem

                    var model = $(this).find("p").html();
                    var problem = $("#" + device_type + "_problem_chosen").val();
                    
                    check_and_set_repair_prices(model, problem);

                }
            });
            
            
            // ===================== For problem select buttons =====================
            $(".problem_select ~ label").click(function() {

                var device_type = $(this).data("value");
                $("#" + device_type + "_problem_chosen").val($(this).html());  
                //Set the problem that has been chosen
                
                if ($("#" + device_type + "_model_chosen").val() !== "0") {
                    console.log("I'MA SET THE PRICE FROM PROBLEM!")
                    console.log("The Model Is: " + $("#" + device_type + "_model_chosen").val()); //The model
                    console.log("The Problem Is: " + $("#" + device_type + "_problem_chosen").val()); //The problem
                    
                    var model = $("#" + device_type + "_model_chosen").val();
                    var problem = $("#" + device_type + "_problem_chosen").val();
                    
                    check_and_set_repair_prices(model, problem);
                }

            });
            
            
            //TODO: CHANGE THESE TO SWITCH STATEMENTS!!
            function check_and_set_repair_prices(model, problem) {
                if (model === "iMac 27'' Model" || model === "iMac 21.5'' Model") {
                    check_imac_repair_prices(model, problem);
                }
                else if (model === "Macbook Air" || model === "Macbook Pro (non-Retina)" ||
                        model === "Macbook 21.5'' Model (Retina)") {
                    check_macbook_repair_prices(model, problem);
                }
                else if (model === "iPhone 7 Plus &amp; 7" || model === "iPhone 6s Plus &amp; 6s" || 
                        model === "iPhone 6 Plus &amp; 6" || model === "iPhone 5 SE/5s/5c/5") {
                    check_iphone_repair_prices(model, problem);
                }
                else if (model === "iPad 2/3/4 &amp; Air" || model === "iPad Air 2" || 
                        model === "iPad Mini 1/2/3" || model === "iPad Mini 4") {
                    check_ipad_repair_prices(model, problem);
                }
            }
            
            
            function check_imac_repair_prices(model, problem) {
                switch(problem) {
                    case "Graphics Card":
                        set_imac_repair_prices(model, "$285", "$285");
                        break;
                    case "SSD Upgrade":
                        set_imac_repair_prices(model, "$422-$575", "$422-$575");
                        break;
                    case "LCD Replacement":
                        set_imac_repair_prices(model, "$380-$741", "$380-$741");
                        break;
                    case "Motherboard":
                        set_imac_repair_prices(model, "$285", "$285");
                        break;
                    case "Optical Drive":
                        set_imac_repair_prices(model, "$217", "$217");
                        break;
                    case "RAM":
                        set_imac_repair_prices(model, "$128-$218", "$128-$218");
                        break;
                    case "Power Supply":
                        set_imac_repair_prices(model, "$240", "$240");
                        break;
                    case "Data Recovery":
                        set_imac_repair_prices(model, "$190-$???", "$190-$???");
                        break;
                    case "Virus Removal":
                        set_imac_repair_prices(model, "$79", "$79");
                }
            }
            
            
            function check_macbook_repair_prices(model, problem) {
                switch(problem) {
                    case "Graphics Card":
                        set_macbook_repair_prices(model, "$285", "$285", "$285");
                        break;
                    case "SSD Upgrade":
                        set_macbook_repair_prices(model, "$570-$873", "$327-$480", "$570-$873");
                        break;
                    case "LCD Replacement":
                        set_macbook_repair_prices(model, "$256-$355", "$158-$390", "$338-$546");
                        break;
                    case "Motherboard":
                        set_macbook_repair_prices(model, "$285", "$285", "$285");
                        break;
                    case "Keyboard":
                        set_macbook_repair_prices(model, "$228", "$228", "$228");
                        break;
                    case "RAM":
                        set_macbook_repair_prices(model, "(No Service)", "$128-$218", "(No Service)");
                        break;
                    case "Battery":
                        set_macbook_repair_prices(model, "$153", "$153", "$166");
                        break;
                    case "Data Recovery":
                        set_macbook_repair_prices(model, "$190-$???", "$190-$???", "$190-$???");
                        break;
                    case "Virus Removal":
                        set_macbook_repair_prices(model, "$79", "$79", "$79");
                }
            }
            
            
            function check_iphone_repair_prices(model, problem) {
                switch(problem) {
                    case "Screen":
                        set_iphone_repair_prices(model, "$162-$183", "$145-$104.99", "$134-$102", "$80-$85");
                        break;
                    case "Wifi":
                        set_iphone_repair_prices(model, "$56-$120", "$56-$120", "$56-$120", "$56-$120");  
                        break;
                    case "Speakers":
                        set_iphone_repair_prices(model, "$62", "$62", "$62", "$62");  
                        break;
                    case "Battery":
                        set_iphone_repair_prices(model, "$66", "$66", "$66", "$66");
                        break;
                    case "Headphone Jack":
                        set_iphone_repair_prices(model, "$70", "$70", "$70", "$70");
                        break;
                    case "Home Button":
                        set_iphone_repair_prices(model, "$56", "$56", "$56", "$56");
                        break;
                    case "Water Damage":
                        set_iphone_repair_prices(model, "$120-$285", "$120-$285", "$120-$285", "$120-$285");
                        break;
                    case "Charging Port":
                        set_iphone_repair_prices(model, "$70", "$70", "$70", "$70");
                        break;
                    case "Camera":
                        set_iphone_repair_prices(model, "$66", "$66", "$66", "$66");
                }
            }
            
            
            function check_ipad_repair_prices(model, problem) {
                switch(problem) {
                    case "Screen":
                        set_ipad_repair_prices(model, "$115-$134", "$230", "$126", "$230");
                        break;
                    case "Wifi":
                        set_ipad_repair_prices(model, "$93", "$93", "$93", "$93");
                        break;
                    case "Speakers":
                        set_ipad_repair_prices(model, "$97", "$97", "$97", "$97");
                        break;
                    case "Battery":
                        set_ipad_repair_prices(model, "$105", "$105", "$105", "$105");
                        break;
                    case "Headphone Jack":
                        set_ipad_repair_prices(model, "$92", "$92", "$92", "$92");
                        break;
                    case "Home Button":
                        set_ipad_repair_prices(model, "$98", "$98", "$98", "$98");
                        break;
                    case "LCD Replacement":
                        set_ipad_repair_prices(model, "$118-$140", "$230", "$142", "$230");  
                        break;
                    case "Charging Port":
                        set_ipad_repair_prices(model, "$97", "$97", "$97", "$97");  
                        break;
                    case "Camera":
                        set_ipad_repair_prices(model, "$91", "$91", "$91", "$91");  
                }
            }
            
            
            function set_imac_repair_prices(model, imac27_price, imac215_price) {
                if (model === "iMac 27'' Model") {
                    $("#imac_repair_price").html(imac27_price);
                }
                else if (model === "iMac 21.5'' Model") {
                    $("#imac_repair_price").html(imac215_price);
                }
            }
            
            
            function set_macbook_repair_prices(model, mbair_price, 
                                                mbpro_non_retina_price, 
                                                mbpro215_retina_price) {
                if (model === "Macbook Air") {
                    $("#macbook_repair_price").html(mbair_price);
                }
                else if (model === "Macbook Pro (non-Retina)") {
                    $("#macbook_repair_price").html(mbpro_non_retina_price);
                }
                else if (model === "Macbook 21.5'' Model (Retina)") {
                    $("#macbook_repair_price").html(mbpro215_retina_price);
                }
            }
            
            
            function set_iphone_repair_prices(model, iphone7p7_price, iphone6sp6s_price, 
                                                iphone6p6_price, iphone5se5s5c5_price) {
                if (model === "iPhone 7 Plus &amp; 7") {
                    $("#iphone_repair_price").html(iphone7p7_price);
                }
                else if (model === "iPhone 6s Plus &amp; 6s") {
                    $("#iphone_repair_price").html(iphone6sp6s_price);
                }
                else if (model === "iPhone 6 Plus &amp; 6") {
                    $("#iphone_repair_price").html(iphone6p6_price);
                }
                else if (model === "iPhone 5 SE/5s/5c/5") {
                    $("#iphone_repair_price").html(iphone5se5s5c5_price);
                }
            }
            
            
            function set_ipad_repair_prices(model, ipad234air_price, ipadair2_price, 
                                            ipadmini123_price, ipadmini4_price) {
                if (model === "iPad 2/3/4 &amp; Air") {
                    $("#ipad_repair_price").html(ipad234air_price);
                }
                else if (model === "iPad Air 2") {
                    console.log("HERE");
                    $("#ipad_repair_price").html(ipadair2_price);
                }
                else if (model === "iPad Mini 1/2/3") {
                    $("#ipad_repair_price").html(ipadmini123_price);
                }
                else if (model === "iPad Mini 4") {
                    $("#ipad_repair_price").html(ipadmini4_price);
                } 
            }
            
            
            $("#imac_service_pickup").click(function() {
                //Take model type and pre-fill #model_type
                //Take problem and pre-fill #symptoms/needs
                var decoded = decode_entities($("#imac_model_chosen").val());
                $("#model_type").val(decoded); 
                $("#problem").val($("#imac_problem_chosen").val());
            });
            
            
            $("#macbook_service_pickup").click(function() {
                //Take model type and pre-fill #model_type
                //Take problem and pre-fill #symptoms/needs
                
                var decoded = decode_entities($("#macbook_model_chosen").val());
                $("#model_type").val(decoded);
                $("#problem").val($("#macbook_problem_chosen").val());

            });
            
            
            $("#iphone_service_pickup").click(function() {
                //Take model type and pre-fill #model_type
                //Take problem and pre-fill #symptoms/needs
                
                var decoded = decode_entities($("#iphone_model_chosen").val())
                $("#model_type").val(decoded);
                $("#problem").val($("#iphone_problem_chosen").val());


            });
            
            
            $("#ipad_service_pickup").click(function() {
                //Take model type and pre-fill #model_type
                //Take problem and pre-fill #symptoms/needs
                
                var decoded = decode_entities($("#ipad_model_chosen").val());
                $("#model_type").val(decoded);
                $("#problem").val($("#ipad_problem_chosen").val());

            });
            
            
            //Need this for decoding HTML entities (thanks to lucascaro from SO)
            function decode_entities(encoded_string) {
                //var decoded = $("<div/>").html($("#iphone_model_chosen").val()).text();
                //^Don't do it this way. Apparently this makes us open to XSS attacks.
                var text_area = document.createElement('textarea');
                text_area.innerHTML = encoded_string;
                return text_area.value;
            }
            
            
            var counter = 1;
            var limit = 10;
            //Hmm, be sure you add code to DELETE a device section too...
            function add_device(div_name){
                                
                if (counter === 1) {
                    $("#remove_device_btn").css("display", "inline-block");
                }
                
                if (counter == limit)  {
                    alert("You have reached the limit of adding " + counter + " devices");
                }
                else {
                    var new_div = document.createElement("div");
                    new_div.id = "dynamic_device_group" + counter;
                    new_div.innerHTML = "<hr/>\
                                        <div class='form-group'>\
                                            <h4 style='text-decoration: underline;'>Device "+(counter+1)+"</h4>\
                                            <div class='row'>\
                                                <div class='col-xs-6'>\
                                                    <label class='required' for='model_type'>Model Type</label>\
                                                    <select class='form-control' id='model_type' name='model_type[]'>\
                                                        <option selected disabled>Select Model Type</option>\
                                                        <option>iMac 27'' Model</option>\
                                                        <option>iMac 21.5'' Model</option>\
                                                        <option>Macbook Air</option>\
                                                        <option>Macbook Pro (non-Retina)</option>\
                                                        <option>Macbook 21.5'' Model (Retina)</option>\
                                                        <option>iPhone 7 Plus &amp; 7</option>\
                                                        <option>iPhone 6s Plus &amp; 6s</option>\
                                                        <option>iPhone 6 Plus &amp; 6</option>\
                                                        <option>iPhone 5 SE/5s/5c/5</option>\
                                                        <option>iPad 2/3/4 &amp; Air</option>\
                                                        <option>iPad Air 2</option>\
                                                        <option>iPad Mini 1/2/3</option>\
                                                        <option>iPad Mini 4</option>\
                                                    </select>\
                                                </div>\
                                                <div class='col-xs-6'>\
                                                    <label class='required' for='serial_number'>12-Digit Serial #</label>\
                                                    <input class='form-control' id='serial_number' name='serial_number[]'>\
                                                </div>\
                                            </div>\
                                        </div>\
                                        <div class='form-group'>\
                                            <div class='row'>\
                                                <div class='col-xs-6'>\
                                                    <label class='required' for='problem'>Problem</label>\
                                                    <input class='form-control' id='problem' name='problem[]'>\
                                                </div>\
                                                <div class='col-xs-6'>\
                                                    <label for='cust_ref_num'>Customer Reference #</label>\
                                                    <input class='form-control' id='cust_ref_num' name='cust_ref_num[]'>\
                                                </div>\
                                            </div>\
                                        </div>\
                                        <div class='form-group'>\
                                            <div class='row'>\
                                                <div class='col-xs-12'>\
                                                    <label for='other_info'>Anything else you'd like to tell us about your problem?</label>\
                                                    <textarea class='form-control' id='other_info' rows=4 name='other_info[]' style='resize:none;'></textarea>\
                                                </div>\
                                            </div>\
                                        </div>"
                    document.getElementById(div_name).appendChild(new_div); //think: div_name stands in for "this"?
                    counter++;
                }
                
                console.log("TESTING new_div:");
                console.log(new_div); //FOR TESTING
                
                //$("#start_a_repair_body").animate({scrollTop: ($("#add_device_btn").position().top + $(new_div).outerHeight(false))}, 300);
            }

            function remove_device() {
                
                console.log("Deleteing dynamic_device_group"+(counter-1));
                $("#dynamic_device_group"+(counter-1)).remove();
                counter--;
                
                //$("#start_a_repair_body").animate({scrollTop: ($("#dynamic_device_group"+(counter-1)).position().top + $("#dynamic_device_group"+(counter-1)).outerHeight(false))}, 300);
                
                
                if (counter === 1) {
                    $("#remove_device_btn").css("display", "none");
                }
            }
            
            
            // ============== Client-side form validation ==============
            $("#pick_up_request_form").submit(function(e) {
                                
                var error = "";
                //If you decide to highlight the sections of the form corresponding to where the user F'ed up,
                //in these if statements might be where to do it....
                if ($("#first_name").val() === "" || $("#last_name").val() === "") {
                    error += "- Your full name is required.<br/>";
                }
                if ($("#email").val() === "") {
                    error += "- Your email address is required.<br/>";
                }
                if ($("#phone").val() === "") {
                    error += "- Your phone number is required.<br/>";
                }
                if ($("#street_address").val() === "") {
                    error += "- Your street address is required.<br/>";
                }
                if ($("#city").val() === "") {
                    error += "- Your city is required.<br/>";
                }
                
                var device_lst = $("#dynamic_input").children();
                for (var i = 0; i < device_lst.length; i++) {
                    
                    var req_dynamic_labels = $(device_lst[i]).find(".required");
                    for (var j = 0; j < req_dynamic_labels.length; j++) {

                        if ($(req_dynamic_labels[j]).html() === "Model Type") {
                            
                            if ($(req_dynamic_labels[j]).next().val() === null) {
                                error += "- Model type is required for Device "+(i+1)+".<br/>";    
                            }
                        }
                        if ($(req_dynamic_labels[j]).html() === "12-Digit Serial #") {
                            
                            if ($(req_dynamic_labels[j]).next().val() === "") {
                                error += "- Serial number is required for Device "+(i+1)+".<br/>";
                            } 
                            else if ($("#serial_number").val() != "") {
                                if (!is_numeric($("#serial_number").val())) {
                                    error += "- Serial number must consist of only numbers for Device "+(i+1)+".<br/>";  
                                }
                                if ($("#serial_number").val().length != 12) {
                                    error += "- Serial number must consist of 12 digits for Device "+(i+1)+".<br/>";  
                                }
                            }
                        }
                        if ($(req_dynamic_labels[j]).html() === "Problem") {
                            
                            if ($(req_dynamic_labels[j]).next().val() === "") {
                                error += "- Problem is required for Device "+(i+1)+".<br/>";    
                            }
                        }
                    }
                }
                
                $("#num_devices").val(counter); //WOULD IT BE ALRIGHT TO KEEP THIS LINE HERE?
                return true; //INCLUDE JUST THIS AND COMMENT OUT THE BELOW FOR TESTING!!!
                
                /*
                //If an error message exists (i.e., isn't the empty string)
                if (error !== "") {

                    //Perhaps this is where all of the "YOU F'ED UP!" stylings should go here?
                    //DON'T FORGET TO ACTUALLY WRITE THE div WITH THE error ID!!!
                    $("#error").html('<div class="alert alert-danger" role="alert"><p><strong>There were error(s) in your form:</strong></p>' + error + '</div>');

                    return false;
                } else {
                    $("#num_devices").val(counter);
                    return true;
                }
                */
            });
                
            
            $("#contact_form").submit(function(e) {
                                
                var error = "";
                //If you decide to highlight the sections of the form corresponding to where the user F'ed up,
                //in these if statements might be where to do it....
                if ($("#contact_us_name").val() === "") {
                    error += "- Your name is required.<br/>";
                }
                if ($("#contact_us_email").val() === "") {
                    error += "- Your email address is required.<br/>";
                }
                if ($("#contact_us_subject").val() === "") {
                    error += "- The subject is required.<br/>";
                }
                if ($("#contact_us_msg").val() === "") {
                    error += "- A message is required.<br/>";
                }
                
                //If an error message exists (i.e., isn't the empty string)
                if (error !== "") {

                    //Perhaps this is where all of the "YOU F'ED UP!" stylings should go here?
                    //DON'T FORGET TO ACTUALLY WRITE THE div WITH THE error ID!!!
                    $("#contact_form_error").html('<div class="alert alert-danger" role="alert"><p><strong>There were error(s) in your form:</strong></p>' + error + '</div>');

                    return false;
                } else {
                    return true;
                }
                
            });
            
            
            function is_numeric(n) {
                return !isNaN(parseFloat(n)) && isFinite(n);
            }
            //^Got this from: http://stackoverflow.com/questions/18082/validate-decimal-numbers-in-javascript-isnumeric
            

        </script>
    </body>
</html>
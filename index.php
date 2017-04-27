<?php
    $error = ""; $successMessage = "";
    /*
    //If there's anything in the $_POST array...(wouldn't it be better to use isset?)
    if ($_POST) {
        if (!$_POST["email"]) {
            $error .= "An email address is required.<br>";
        }
        
        if ($_POST['email'] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
            $error .= "The email address is invalid.<br>";
        }
        
        
        if ($error != "") {
            $error = '<div class="alert alert-danger" role="alert"><p>There were error(s) in your form:</p>' . $error . '</div>';
        } else {
            $emailTo = "whoskhoahoang@gmail.com"; //FOR TESTING
            $headers = "From: ".$_POST['email'];
            
            if (mail($emailTo, "", "", $headers)) {
                $successMessage = '<div class="alert alert-success" role="alert">Your message was sent, we\'ll get back to you ASAP!</div>';
            } else {
                $error = '<div class="alert alert-danger" role="alert"><p><strong>Your message couldn\'t be sent - please try again later</div>';
            }
        }   
        
    }
    */
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
                    
                    <!--This "hamburger" button shows up and contains the navbar links once the viewport has been adequately collapsed collapsed-->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    
                    <!-- LOGO BEGIN -->
                    <a class="navbar-brand" data-toggle="modal" data-target="#clevertech_vid">
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
        <!-- Start Repair Modal -->
        <div id="start_repair_modal" class="modal fade" role="dialog">
            <div class="vertical-alignment-helper">
                <div class="modal-dialog vertical-align-center">
                    <div id="start_a_repair_dialog" class="modal-dialog">
                        
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div id="start_a_repair_body" class="modal-body">
                                

                                 
                                <form method="post"> <!-- Should I have action="/validate.php" ? -->
                                    <!--<p class="required">Name</p>-->

                                    <h3 style="color: #0f6a37;">Your Information</h3>
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
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    <p style="padding-bottom: 10px;">A confirmation email will be sent to your email address. The email will also be used as the contact for the order.</p>
                                    
                                    
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
                                                <select class="form-control" id="city" name="city" >
                                                    <option selected disabled>Select City</option>
                                                    <option>San Jose</option>
                                                    <option>Santa Clara</option>
                                                    <option>Milpitas</option>
                                                </select>
                                            </div>
                                            <div class="col-xs-6">
                                                <label class="required" for="state">State</label>
                                                <input class="form-control" id="state" name="state">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <label class="required" for="city">ZIP / Postal Code</label>
                                                <input class="form-control" id="zip_postal" name="zip_postal">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <h3 style="color: #0f6a37;">Device Information</h3>
                                    <hr/>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <label class="required" for="device_type">Device Type</label>
                                                <select class="form-control" id="device_type" name="device_type" >
                                                    <option selected disabled>Select Device Type</option>
                                                    <option>iMac</option>
                                                    <option>Macbook</option>
                                                    <option>iPhone</option>
                                                    <option>iPad</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- CHECK THAT THE LENGTH OF THIS VALUE IS 12!!!-->
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <label class="required" for="city">Serial Number</label>
                                                <input class="form-control" id="serial_number" name="serial_number">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <label for="city">Customer Reference #</label>
                                                <input class="form-control" id="cust_ref_num" name="cust_ref_num">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <label for="city">Other Information</label>
                                                <input class="form-control" id="other_info" name="other_info">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <label for="city">Symptoms / Needs</label>
                                                <textarea class="form-control" rows=4 id="symptoms_needs" name="symptoms_needs" style="resize: none;"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <h3 style="color: #0f6a37;">Pick-Up Information</h3>
                                    <hr/>
                                    
                                    <div class="form-group">
                                        <label class="required">Service Type</label><br/>
                                        <p><input name="service_type" type="radio"> &nbsp; Personal Hardware Service </p> 
                                        <p><input name="service_type" type="radio"> &nbsp; Business Hardware Service </p> 
                                    </div>
                                    
                                    <div id="error" style="display: hidden"></div>
                                    <!-- PUT THIS HERE FOR NOW -->
                                    
                                    <div class="form-group">
                                        <button type="submit" id="submit" class="btn" style="background-color: #0f6a37; color: white;">Submit</button>
                                    </div>
                                </form>
                            </div>
 
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        
        
        <!-- Select iMac Modal -->
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
                                    
                                    <!--The value of this element gets set to 1 when a model is chosen-->
                                    <input id="imac_device_chosen" type="radio" value=0 style="display: none;">
                                    
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

                                    <!--The value of this element gets set to 1 when a problem is chosen-->
                                    <input id="imac_problem_chosen" type="radio" value=0 style="display: none;">
                                    
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <!--Maybe I can make this a label instead of an anchor so that I can do that radio button trick agian...-->
                                            <input class="problem_select" type="radio" name="imac_problem_select_group" value="1" id="imac_problem_select1" />
                                            <label for="imac_problem_select1" class="problem_item btn btn-block" data-value="imac">Graphics Card</label>
                                        </div>
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="imac_problem_select_group" value="2" id="imac_problem_select2" />
                                            <label for="imac_problem_select2" class="problem_item btn btn-block" data-value="imac">SSD Upgrade</label>
                                        </div>
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="imac_problem_select_group" value="3" id="imac_problem_select3" />
                                            <label for="imac_problem_select3" class="problem_item btn btn-block" data-value="imac">LCD</label>
                                        </div>
                                    </div>
 

                                    <div class="row">
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="imac_problem_select_group" value="4" id="imac_problem_select4" />
                                            <label for="imac_problem_select4" class="problem_item btn btn-block" data-value="imac">Motherboard</label>
                                        </div>
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="imac_problem_select_group" value="5" id="imac_problem_select5" />
                                            <label for="imac_problem_select5" class="problem_item btn btn-block" data-value="imac">Optical Drive</label>
                                        </div>
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="imac_problem_select_group" value="6" id="imac_problem_select6" />
                                            <label for="imac_problem_select6" class="problem_item btn btn-block" data-value="imac">RAM</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="imac_problem_select_group" value="7" id="imac_problem_select7" />
                                            <label for="imac_problem_select7" class="problem_item btn btn-block" data-value="imac">Power Supply</label>
                                        </div>
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="imac_problem_select_group" value="8" id="imac_problem_select8" />
                                            <label for="imac_problem_select8" class="problem_item btn btn-block" data-value="imac">Data Recovery</label>
                                        </div>
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="imac_problem_select_group" value="9" id="imac_problem_select9" />
                                            <label for="imac_problem_select9" class="problem_item btn btn-block" data-value="imac">Virus Removal</label>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                                <div class="row" style="font-size: 15px;"> 
                                    <div class="col-xs-2 col-xs-offset-4">
                                        <label>Price: </label>
                                    </div>
                                    <div class="col-xs-2">
                                        <label class="price_value" style="float: right;"></label> 
                                        <!--^Need to make this depend on the items that were selected-->
                                    </div>
                                </div>
                                    
                                <div class="row"> 
                                    <button class="btn_from_device_modal btn col-xs-4 col-xs-offset-4" style="background-color: #0f6a37; color: white; margin-top: 10px;" data-dismiss="modal" data-toggle="modal" data-target="#start_repair_modal">Request Pick-Up</button>
                                    <!-- I might actually need to use some Javascript here for the pre-fillout behavior -->
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        
        <!-- Select Macbook Model -->
        <div id="macbook_device_select" class="modal fade" role="dialog">
            <div class="vertical-alignment-helper">
                <div class="modal-dialog vertical-align-center">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            
                            <!-- FOCUS HERE -->

                            <div class="modal-body">
                                <div class="row" style="text-align: center; z-index: 1">
                                    <h2>Macbook</h2>
                                </div>
                                
                                <div class="row" style="position: relative; top: -10px;"> 
                                    
                                    <!--The value of this element gets set to 1 when a model is chosen-->
                                    <input id="macbook_device_chosen" type="radio" value=0 style="display: none;">
                                    
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
                                    
                                    <!--The value of this element gets set to 1 when a problem is chosen-->
                                    <input id="macbook_problem_chosen" type="radio" value=0 style="display: none;">
                                    
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="macbook_problem_select_group" value="1" id="macbook_problem_select1" />
                                            <label for="macbook_problem_select1" class="problem_item btn btn-block" data-value="macbook">Graphics Card</label>
                                        </div>
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="macbook_problem_select_group" value="2" id="macbook_problem_select2" />
                                            <label for="macbook_problem_select2" class="problem_item btn btn-block" data-value="macbook">SSD Upgrade</label>
                                        </div>
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="macbook_problem_select_group" value="3" id="macbook_problem_select3" />
                                            <label for="macbook_problem_select3" class="problem_item btn btn-block" data-value="macbook">LCD</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="macbook_problem_select_group" value="4" id="macbook_problem_select4" />
                                            <label for="macbook_problem_select4" class="problem_item btn btn-block" data-value="macbook">Motherboard</label>
                                        </div>
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="macbook_problem_select_group" value="5" id="macbook_problem_select5" />
                                            <label for="macbook_problem_select5" class="problem_item btn btn-block" data-value="macbook">Keyboard</label>
                                        </div>
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="macbook_problem_select_group" value="6" id="macbook_problem_select6" />
                                            <label for="macbook_problem_select6" class="problem_item btn btn-block" data-value="macbook">RAM</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="macbook_problem_select_group" value="7" id="macbook_problem_select7" />
                                            <label for="macbook_problem_select7" class="problem_item btn btn-block" data-value="macbook">Battery</label>
                                        </div>
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="macbook_problem_select_group" value="8" id="macbook_problem_select8" />
                                            <label for="macbook_problem_select8" class="problem_item btn btn-block" data-value="macbook">Data Recovery</label>
                                        </div>
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="macbook_problem_select_group" value="9" id="macbook_problem_select9" />
                                            <label for="macbook_problem_select9" class="problem_item btn btn-block" data-value="macbook">Virus Removal</label>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row" style="font-size: 15px;"> 
                                    <div class="col-xs-2 col-xs-offset-4">
                                        <label>Price: </label>
                                    </div>
                                    <div class="col-xs-2">
                                        <label class="price_value" style="float: right;"></label> 
                                        <!--^Need to make this depend on the items that were selected-->
                                    </div>
                                </div>
                                
                                <div class="row"> 
                                    <button class="btn_from_device_modal btn col-xs-4 col-xs-offset-4" style="background-color: #0f6a37; color: white; margin-top: 10px;" data-dismiss="modal" data-toggle="modal" data-target="#start_repair_modal">Request Pick-Up</button>
                                </div>
                                
                            </div>
                                                     
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        
        <!-- Select iPhone Model -->
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
                                    
                                    <!--The value of this element gets set to 1 when a model is chosen-->
                                    <input id="iphone_device_chosen" type="radio" value=0 style="display: none;">
                                    
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
                                    <!--The value of this element gets set to 1 when a problem is chosen-->
                                    <input id="iphone_problem_chosen" type="radio" value=0 style="display: none;">
                                    
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="iphone_problem_select_group" value="1" id="iphone_problem_select1" />
                                            <label for="iphone_problem_select1" class="problem_item btn btn-block" data-value="iphone">Screen</label>                                            
                                        </div>
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="iphone_problem_select_group" value="2" id="iphone_problem_select2" />
                                            <label for="iphone_problem_select2" class="problem_item btn btn-block" data-value="iphone">Wifi</label>
                                        </div>
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="iphone_problem_select_group" value="3" id="iphone_problem_select3" />
                                            <label for="iphone_problem_select3" class="problem_item btn btn-block" data-value="iphone">Speakers</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="iphone_problem_select_group" value="4" id="iphone_problem_select4" />
                                            <label for="iphone_problem_select4" class="problem_item btn btn-block" data-value="iphone">Battery</label>
                                        </div>
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="iphone_problem_select_group" value="5" id="iphone_problem_select5" />
                                            <label for="iphone_problem_select5" class="problem_item btn btn-block" data-value="iphone">Headphone Jack</label>
                                        </div>
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="iphone_problem_select_group" value="6" id="iphone_problem_select6" />
                                            <label for="iphone_problem_select6" class="problem_item btn btn-block" data-value="iphone">Home Button</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="iphone_problem_select_group" value="7" id="iphone_problem_select7" />
                                            <label for="iphone_problem_select7" class="problem_item btn btn-block" data-value="iphone">Water Damage</label>
                                        </div>
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="iphone_problem_select_group" value="8" id="iphone_problem_select8" />
                                            <label for="iphone_problem_select8" class="problem_item btn btn-block" data-value="iphone">Charging Port</label>
                                        </div>
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="iphone_problem_select_group" value="9" id="iphone_problem_select9" />
                                            <label for="iphone_problem_select9" class="problem_item btn btn-block" data-value="iphone">Camera</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" style="font-size: 15px;"> 
                                    <div class="col-xs-2 col-xs-offset-4">
                                        <label>Price: </label>
                                    </div>
                                    <div class="col-xs-2">
                                        <label class="price_value" style="float: right;"></label> 
                                        <!--^Need to make this depend on the items that were selected-->
                                    </div>
                                </div>
                                
                                <div class="row"> 
                                    <button class="btn_from_device_modal btn col-xs-4 col-xs-offset-4" style="background-color: #0f6a37; color: white; margin-top: 10px;" data-dismiss="modal" data-toggle="modal" data-target="#start_repair_modal">Request Pick-Up</button>
                                </div>
                                
                            </div>
                                                     
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        
        <!-- Select iPad Model -->
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
                                    
                                    <!--The value of this element gets set to 1 when a model is chosen-->
                                    <input id="ipad_device_chosen" type="radio" value=0 style="display: none;">
                                    
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
                                    
                                    <!--The value of this element gets set to 1 when a problem is chosen-->
                                    <input id="ipad_problem_chosen" type="radio" value=0 style="display: none;">
                                    
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="ipad_problem_select_group" value="1" id="ipad_problem_select1" />
                                            <label for="ipad_problem_select1" class="problem_item btn btn-block" data-value="ipad">Glass Digitizer</label>
                                        </div>
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="ipad_problem_select_group" value="2" id="ipad_problem_select2" />
                                            <label for="ipad_problem_select2" class="problem_item btn btn-block" data-value="ipad">Wifi</label>
                                        </div>
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="ipad_problem_select_group" value="3" id="ipad_problem_select3" />
                                            <label for="ipad_problem_select3" class="problem_item btn btn-block" data-value="ipad">Speakers</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="ipad_problem_select_group" value="4" id="ipad_problem_select4" />
                                            <label for="ipad_problem_select4" class="problem_item btn btn-block" data-value="ipad">Battery</label>
                                        </div>
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="ipad_problem_select_group" value="5" id="ipad_problem_select5" />
                                            <label for="ipad_problem_select5" class="problem_item btn btn-block" data-value="ipad">Headphone Jack</label>
                                        </div>
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="ipad_problem_select_group" value="6" id="ipad_problem_select6" />
                                            <label for="ipad_problem_select6" class="problem_item btn btn-block" data-value="ipad">Home Button</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="ipad_problem_select_group" value="7" id="ipad_problem_select7" />
                                            <label for="ipad_problem_select7" class="problem_item btn btn-block" data-value="ipad">LCD</label>
                                        </div>
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="ipad_problem_select_group" value="8" id="ipad_problem_select8" />
                                            <label for="ipad_problem_select8" class="problem_item btn btn-block" data-value="ipad">Charging Port</label>
                                        </div>
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="ipad_problem_select_group" value="9" id="ipad_problem_select9" />
                                            <label for="ipad_problem_select9" class="problem_item btn btn-block" data-value="ipad">Camera</label>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row" style="font-size: 15px;"> 
                                    <div class="col-xs-2 col-xs-offset-4">
                                        <label>Price: </label>
                                    </div>
                                    <div class="col-xs-2">
                                        <label class="price_value" style="float: right;"></label> 
                                        <!--^Need to make this depend on the items that were selected-->
                                    </div>
                                </div>
                                
                                <div class="row"> 
                                    <button class="btn_from_device_modal btn col-xs-4 col-xs-offset-4" style="background-color: #0f6a37; color: white; margin-top: 10px;" data-dismiss="modal" data-toggle="modal" data-target="#start_repair_modal">Request Pick-Up</button>
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        <div id="clevertech_vid" class="modal fade" role="dialog">
            <div class="vertical-alignment-helper">
                <div class="modal-dialog vertical-align-center">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            
                            <div class="modal-body">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/QGKvYpL4DRU"></iframe>
                                </div>                    
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        <div id="contact_us" class="modal fade" role="dialog">
            <div class="vertical-alignment-helper">
                <div class="modal-dialog vertical-align-center">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            
                            <div class="modal-body">
                                <!-- Put form code here-->
                                <form method="post" style="padding: 20px;"> <!-- Should I have action="/validate.php" ? -->
                                    <!--<p class="required">Name</p>-->

                                    <div class="form-group">
                                        <label class="required" for="first_name">First Name</label>
                                        <input class="form-control" id="first_name" name="first_name">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="required" for="first_name">Email</label>
                                        <input class="form-control" id="first_name" name="first_name">
                                        <input type="checkbox"> Check here to receive email updates
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="required" for="first_name">Subject</label>
                                        <input class="form-control" id="first_name" name="first_name">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="required" for="first_name">Message</label>
                                        <textarea class="form-control" rows=4 id="symptoms_needs" name="symptoms_needs" style="resize: none;"></textarea>               
                                    </div>
                                    
                                    <div class="form-group">
                                        <button type="submit" id="submit" class="btn" style="background-color: #0f6a37; color: white;">Submit</button>
                                    </div>
                                </form>
                                
                            </div>
                            
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
                <h1>Welcome to CleverTech</h1>
                <p id="here_to_help">We're here to help.</p>
            </div>
        </div>
        <!-- SECTION 1 END -->


        <!-- SECTION 2 BEGIN -->
        <div class="jumbotron" id="how_it_works" style="text-align: center;">
            <div class="container" id="how_it_works_content">
                <div class="row">
                    <h1>From start to finish</h1>
                </div>
                <div class="row">
                    <div class="btn how_it_works_btn">Pick-Up</div>
                    <div class="btn how_it_works_btn">Repair</div>
                    <div class="btn how_it_works_btn">Drop-Off</div>
                </div>
                <div class="row">
                    <h1>3 days to complete</h1>
                </div>

            </div>
        </div>
        <!-- SECTION 2 END -->

        
        <!-- SECTION 3 BEGIN -->
        <div class="jumbotron" id="services" style="text-align: center;">
            
            <div class="container" id="services_content">  
                
                <div class="row">
                    <h1 style="position: relative; top: -50px;">Got Problems?<br/>Tell us your model</h1>
                </div>
                
                <div class="row">                   
                    <div class="col-xs-3 problem_device" data-toggle="modal" data-target="#imac_device_select" style="background-color: rgba(0,0,0,0.4); border-top-left-radius: 10px; border-bottom-left-radius: 10px;">
                        <!-- What if I got rid of this anchor tag. It added some unnecessary padding to <img>-->
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
                
                
                <div class="row" style="position: relative; top: 100px;">    
                    
                    <div class="row">
                        <h2 class="gonz_quote">
                            "I want to see a paradigm shift. We're going to be so good...It wouldn't make sense to go anywhere else."<br/><br/>
                            Gonzalo Martinez<br/>
                            Founder
                        </h2>
                    </div>
                    
                    <div class="row">
                        <div id="contact_us_btn" class="btn" data-toggle="modal" data-target="#contact_us">Contact Us</div>
                    </div>
                </div>
                

                
                <div class="row">
                    <br/>
                    <br/><br/><br/>
                    <br/><br/><br/>
                </div>
                
                
                <!-- FLANKED LAYOUT WITH BUTTONS ON THE RIGHT BEGIN -->
                <!--
                <div class="row" style="margin-top:50px;">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-xs-6 col-md-3">
                                <dl class="pull-right">
                                    <dt>Phone Number:</dt> 
                                    <dd>408.316.7600</dd><br/> 
                                    <dt>Address:</dt> 
                                    <dd>1150 Murphy Ave, Ste 205</dd> 
                                    <dd>San Jose, CA 9513</dd> <br/>
                                </dl>
                            </div>

                            <div class="col-xs-6 col-md-9">

                                <dl class="pull-left">
                                    <dd>Monday - Friday: <br/>9am - 7pm</dd>    
                                    <dd>Saturday - Sunday: <br/>10am - 6pm</dd>  <br/> 
                                    <dd>© CleverTech Corporation</dd>
                                </dl>
                            </div>   
                        </div>
                    </div>
                    
                    
                    <div class="col-md-4"> 
                        <div class="row">
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
                </div> 
                -->
                <!-- FLANKED LAYOUT WITH BUTTONS ON THE RIGHT END -->
                
                
                <!-- CENTERED INFO AND BUTTONS BEGIN-->
                <!--
                <div class="row">
                    <label>For the crazy ones:</label>
                    <div>
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
                
                <div class="row"> <br/> </div>
                
                <div class="row">
                    <div class="col-xs-6">
                        <div class="row" style="float:right;"> 
                            <dl>
                                <dt>Address:</dt> 
                                <dd>1150 Murphy Ave, Ste 205</dd> 
                                <dd>San Jose, CA 9513</dd>
                            </dl>
                            <dl>
                                <dt>Phone Number:</dt> 
                                <dd>408.316.7600</dd><br/> 
                            </dl>
                        </div>
                    </div>
                    
                    <div class="col-xs-6">
                        <div class="row" style="float: left; padding-left: 40px; padding-top: 10px;">
                            <dl>
                                <dt>Hours:</dt> 
                                <dd>Monday - Friday: <br/>9am - 7pm</dd>    
                                <dd>Saturday - Sunday: <br/>10am - 6pm</dd>  <br/> 
                            </dl>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                        © CleverTech Corporation
                </div>
                -->
                <!-- CENTERED INFO AND BUTTONS END-->
                
                
                
                <!-- FLANKED LAYOUT BEGIN -->
                <div class="row" style="margin-top:50px;">
                    <div class="col-md-4">
                        <div class="row">
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
                    
                    
                    <div class="col-md-8"> 
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
            //$(".problem_item").fitText(2, { minFontSize: '20px', maxFontSize: '25px' });
            //$(".services_device_type").fitText(2, { minFontSize: "15px", maxFontSize: "20px" });

            
            var duration = 300;  
            var welcome_top = $("#welcome").position().top;
            var how_it_works_top = $("#how_it_works").position().top; //485 on full viewport
            var services_top = $("#services").position().top;
            var stay_clever_top = $("#stay_clever").position().top; //1400 on full viewport
            
            
            //scroll() constantly keeps tabs on the position of the scrollbar?
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
                    // ##### BUG: move down button still exists when you move into stay_clever #####
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
                    // when done, add hash to url
                    // (default click behaviour)
                    window.location.hash = hash;
                });
            });
            
            
            // ============== Client-side form validation ==============
            $("form").submit(function(e) {

                
                var error = "";

                if ($("#first_name").val() === "" || $("#last_name").val() === "") {
                    error += "Your full name is required.<br/>";
                }
                if ($("#email").val() === "") {
                    error += "The email field is required.<br/>";
                }
                if ($("#phone").val() === "") {
                    error += "The phone field is required.<br/>";
                }
                if ($("#street_address").val() === "" || $("#city").val() === "" || $("#state").val() === "") {
                    error += "Your full street address is required.<br/>";
                }
                

                //If an error message exists (i.e., isn't the empty string)
                if (error !== "") {

                    //DON'T FORGET TO ACTUALLY WRITE THE div WITH THE error ID!!!
                    $("#error").html('<div class="alert alert-danger" role="alert"><p><strong>There were error(s) in your form:</strong></p>' + error + '</div>');

                    return false;
                } else {
                    return true;
                }
                
            });
            
            
            // ===================== For device select buttons =====================
            $(".device_select ~ label").click(function() {
                
                var device_type = $(this).data("value");
                //console.log("HEY " + device_type + "!");
                
                //$("#" + device_type + "_device_chosen").val("1");
                $("#" + device_type + "_device_chosen").val($(this).find("p").html());   //device chosen is device_type     
                //console.log($("#" + device_type + "_device_chosen").val());
                
                
                //$("#" + device_type + "_device_chosen").val(device_type);
                                
                if ($("#" + device_type + "_problem_chosen").val() !== "0") {
                    console.log("I'MA SET THE PRICE FROM MODEL!")
                    console.log("The Model Is: " + $(this).find("p").html()); //The device
                    console.log("The Problem Is: " + $("#" + device_type + "_problem_chosen").val()); //The problem
                    //To get the selected problem button, say:
                    //$('.button.problem_item_active') 
                    //^get attribute value, etc. Whatever you need. Will need to do this to set the price.
                    
                    
                    //If this is an imac... {
                    //   if the problem is problem1...set price
                    //   else if the problem is problem2...set price
                    //}
                    //Else if this is a macbook... {
                    //   if the problem is problem1...set price
                    //   else if the problem is problem2...set price
                    //}
                }
            });
            
            
            // ===================== For problem select buttons =====================
            $(".problem_item").click(function() { //Watch out how this basically applies to ALL buttons
                
                //Used to need this when I wasn't using the radio button + label trick (learned from Samich on SO)
                /*
                $(".problem_item").removeClass("problem_item_active"); 
                //Didn't want to use .active because then you would have had to override the default .active. You
                //generally strive to not override in case of any unexpected applications of the styling.
                $(this).addClass("problem_item_active");
                //^Have these two lines because I'm trying to make buttons act like radio buttons
                */

                var device_type = $(this).data("value");
                //console.log(device_type);
                //console.log(problem);
                
                //$("#" + device_type + "_problem_chosen").val("1");
                $("#" + device_type + "_problem_chosen").val($(this).html(););          

                
                if ($("#" + device_type + "_device_chosen").val() !== "0") {
                    console.log("I'MA SET THE PRICE FROM PROBLEM!")
                    console.log("The Model Is: " + $("#" + device_type + "_device_chosen").val()); //The device
                    console.log("The Problem Is: " + $("#" + device_type + "_problem_chosen").val()); //The problem
                    //To get the selected problem button, say:
                    //$('.button.problem_item_active') 
                    //^get attribute value, etc. Whatever you need. Will need to do this to set the price.
                }

            });


            
            /*
            //Used to need this when I wasn't using the radio button + label trick (learned from Samich on SO)
            $(".problem_device").hover(function(){
                $(this).find("p").css("color", "dimgray");
            }, function() {
                $(this).find("p").css("color", "white");
            });
            */
            

            
        </script>
    </body>
</html>
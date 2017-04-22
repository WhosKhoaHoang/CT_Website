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
                    <a href="#" class="navbar-brand">
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
                        <a href="#" id="start_repair_btn" class="btn" data-toggle="modal" data-target="#start_repair_modal">Start Repair</a>
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
                    <div class="modal-dialog">
                        
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-body">

                                <h3 style="color: green;">Request A Pick-Up</h3>
                                <p>Looking to request a pick-up for multiple devices? Click Here!</p>
                                
                                <h3 style="color: green;">Your Information</h3>
                                <hr/>
                                 
                                <form method="post"> <!-- Should I have action="/validate.php" ? -->
                                    <p>Name <span style="color:red;">*</span></p>

                                    <div class="row">
                                        <div class="form-group col-xs-6">
                                            <label for="first_name">First Name</label>
                                            <input class="form-control" id="first_name" name="first_name"> 
                                        </div>

                                        <div class="form-group col-xs-6">
                                            <label for="last_name">Last Name</label>
                                            <input class="form-control" id="last_name" name="last_name">
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="form-group col-xs-6">
                                            <label for="email">Email</label>
                                            <input class="form-control" type="email" id="email" name="email">
                                        </div>
                                    </div>
                                
                                    <div class="row">
                                        <!-- Should I use padding at this particular spot? -->
                                        <p style="padding: 20px;">A confirmation email will be sent to the email address provided. The email will also be used as the contact for the order</p>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-xs-6">
                                            <label for="phone">Phone</label>
                                            <input class="form-control" type="tel" id="phone" name="phone"> 
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="form-group col-xs-6">
                                            <label for="company_name">Company Name</label>
                                            <input class="form-control" id="company_name" name="company_name">
                                        </div>
                                    </div>    
                                    
                                    <p>Pick-Up Address <span style="color:red;">*</span></p>
 
                                    <div class="row">
                                        <div class="form-group col-xs-12">
                                            <label for="street_address">Street Address</label>
                                            <input class="form-control" id="street_address" name="street_address">
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="form-group col-xs-12">
                                            <label for="address_line2">Address Line 2</label>
                                            <input class="form-control" id="address_line2" name="address_line2">
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="form-group col-xs-6">
                                            <label for="city">City</label>
                                            <input class="form-control" id="city" name="city">
                                        </div>
                                        <div class="form-group col-xs-6">
                                            <label for="state">State</label>
                                            <input class="form-control" id="state" name="state">
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="form-group col-xs-6">
                                            <label for="city">ZIP / Postal Code</label>
                                            <input class="form-control" id="zip_postal" name="zip_postal">
                                        </div>
                                        <div class="form-group col-xs-6">
                                            <label for="state">Country</label>
                                            <input class="form-control" id="country" name="country">
                                        </div>
                                    </div>
                                    
                                    <h3 style="color: green;">Computer/Device Information</h3>
                                    <hr/>

                                    <div class="row">
                                        <div class="form-group col-xs-6">
                                            <label for="city">Device Type</label>
                                            <input class="form-control" id="device_type" name="device_type">
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="form-group col-xs-6">
                                            <label for="city">Serial Number</label>
                                            <input class="form-control" id="serial_number" name="serial_number">
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="form-group col-xs-6">
                                            <label for="city">Part / Type / Product Number</label>
                                            <input class="form-control" id="part_type_product_number" name="part_type_product_number">
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="form-group col-xs-6">
                                            <label for="city">Other Information</label>
                                            <input class="form-control" id="other_info" name="other_info">
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="form-group col-xs-6">
                                            <label for="city">Asset Tag</label>
                                            <input class="form-control" id="asset_tag" name="asset_tag">
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="form-group col-xs-6">
                                            <label for="city">Customer Reference #</label>
                                            <input class="form-control" id="cust_ref_num" name="cust_ref_num">
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="form-group col-xs-12">
                                            <label for="city">Symptoms / Needs</label>
                                            <textarea class="form-control" rows=4 id="symptoms_needs" name="symptoms_needs" style="resize: none;"></textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="form-group col-xs-12">
                                            <button type="submit" id="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
 
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        
        
        <!-- Select iMac Modal -->
        <div id="imac_device_select" class="modal fade" role="dialog">
            <div class="vertical-alignment-helper">
                <div class="modal-dialog vertical-align-center">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content" style="padding: 20px;">
                            <!--
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Modal Header</h4>
                            </div>
                            -->
                            
                            <div class="modal-body">
                                <div class="row" style="text-align: center; z-index: 1">
                                    <h2>iMac</h2>
                                </div>
                                
                                <div class="row" style="position: relative; top: -20px;"> 
                                    <div class="col-xs-1"></div>
                                    
                                    <div class="col-xs-5" style="text-align: center;">
                                        <img src="images/imac_black_sharp.png" style="width: 100%; height: 100%;">
                                        <p class="device_model">27'' Model</p>
                                    </div>
                                    
                                    <div class="col-xs-5" style="text-align: center;">
                                        <img src="images/imac_black21-5_sharp.png" style="width: 100%; height: 100%;">
                                        <p class="device_model">21.5'' Model</p>
                                    </div>
                                    
                                    <div class="col-xs-1"></div>
                                </div>
                                
                                <div clas="row" style="text-align: center;">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <a class="problem_item btn btn-block">Graphics Card</a>
                                        </div>
                                        <div class="col-xs-4">
                                            <a class="problem_item btn btn-block">SSD Upgrade</a>
                                        </div>
                                        <div class="col-xs-4">
                                            <a class="problem_item btn btn-block">LCD</a>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-4">
                                            <a class="problem_item btn btn-block">Motherboard</a>
                                        </div>
                                        <div class="col-xs-4">
                                            <a class="problem_item btn btn-block">Optical Drive</a>
                                        </div>
                                        <div class="col-xs-4">
                                            <a class="problem_item btn btn-block">RAM</a>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-4">
                                            <a class="problem_item btn btn-block">Power Supply</a>
                                        </div>
                                        <div class="col-xs-4">
                                            <a class="problem_item btn btn-block">Data Recovery</a>
                                        </div>
                                        <div class="col-xs-4">
                                            <a class="problem_item btn btn-block">Virus Removal</a>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            
                            <!--
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                            -->
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
                            
                            <!--
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Modal Header</h4>
                            </div>
                            -->
                            
                            <div class="modal-body">
                                <div class="row" style="text-align: center; z-index: 1">
                                    <h2>Macbook</h2>
                                </div>
                                
                                <div class="row" style="position: relative; top: -20px;"> 
                                    
                                    <div class="col-xs-4" style="text-align: center;">
                                        <img src="images/macbook_air_black.png" style="width: 100%; height: 100%;">
                                        <p class="device_model">Macbook Air</p>
                                    </div>
                                    
                                    <div class="col-xs-4" style="text-align: center;">
                                        <img src="images/macbook_pro_black.png" style="width: 100%; height: 100%;">
                                        <p class="device_model">Macbook Pro (non-Retina)</p>
                                    </div>
                                    
                                    <div class="col-xs-4" style="text-align: center;">
                                        <img src="images/macbook_pro_black.png" style="width: 100%; height: 100%;">
                                        <p class="device_model">21.5'' Model (Retina)</p>
                                    </div>
                                    
                                </div>
                                
                                <div clas="row" style="text-align: center;">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <a class="problem_item btn btn-block">Graphics Card</a>
                                        </div>
                                        <div class="col-xs-4">
                                            <a class="problem_item btn btn-block">SSD Upgrade</a>
                                        </div>
                                        <div class="col-xs-4">
                                            <a class="problem_item btn btn-block">LCD</a>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-4">
                                            <a class="problem_item btn btn-block">Motherboard</a>
                                        </div>
                                        <div class="col-xs-4">
                                            <a class="problem_item btn btn-block">Keyboard</a>
                                        </div>
                                        <div class="col-xs-4">
                                            <a class="problem_item btn btn-block">RAM</a>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-4">
                                            <a class="problem_item btn btn-block">Battery</a>
                                        </div>
                                        <div class="col-xs-4">
                                            <a class="problem_item btn btn-block">Data Recovery</a>
                                        </div>
                                        <div class="col-xs-4">
                                            <a class="problem_item btn btn-block">Virus Removal</a>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            
                            <!--
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                            -->                            
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
                            
                            <!--
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Modal Header</h4>
                            </div>
                            -->
                            
                            <div class="modal-body">
                                <div class="row" style="text-align: center; margin-bottom: 20px; z-index: 1">
                                    <h2>iPhone</h2>
                                </div>
                                
                                <div class="row" style="position: relative; top: -20px;"> 
                                    <div class="col-xs-3" style="text-align: center;">
                                        <img src="images/iphone_duo.png" style="width: 100%; height: 100%;">
                                        <p class="device_model">7 Plus &amp; 7</p>
                                    </div>                                    
                                    <div class="col-xs-3" style="text-align: center;">
                                        <img src="images/iphone_duo.png" style="width: 100%; height: 100%;">
                                        <p class="device_model">6s Plus &amp; 6s</p>
                                    </div>
                                    
                                    <div class="col-xs-3" style="text-align: center;">
                                        <img src="images/iphone_duo.png" style="width: 100%; height: 100%;">
                                        <p class="device_model">6 Plus &amp; 6</p>
                                    </div>
                                    
                                    <div class="col-xs-3" style="text-align: center;">
                                        <img src="images/iphone_alone.png" style="width: 100%; height: 100%;">
                                        <p class="device_model">5 SE/5s/5c/5</p>
                                    </div>                                
                                </div>
                                
                                <div clas="row" style="text-align: center;">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <a class="problem_item btn btn-block">Screen</a>
                                        </div>
                                        <div class="col-xs-4">
                                            <a class="problem_item btn btn-block">Wifi</a>
                                        </div>
                                        <div class="col-xs-4">
                                            <a class="problem_item btn btn-block">Speakers</a>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-4">
                                            <a class="problem_item btn btn-block">Battery</a>
                                        </div>
                                        <div class="col-xs-4">
                                            <a class="problem_item btn btn-block">Headphone Jack</a>
                                        </div>
                                        <div class="col-xs-4">
                                            <a class="problem_item btn btn-block">Home Button</a>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-4">
                                            <a class="problem_item btn btn-block">Water Damage</a>
                                        </div>
                                        <div class="col-xs-4">
                                            <a class="problem_item btn btn-block">Charging Port</a>
                                        </div>
                                        <div class="col-xs-4">
                                            <a class="problem_item btn btn-block">Camera</a>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            
                            <!--
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                            -->                            
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
                            
                            <!--
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Modal Header</h4>
                            </div>
                            -->
                            
                            <div class="modal-body">
                                <div class="row" style="text-align: center; margin-bottom: 20px; z-index: 1">
                                    <h2>iPad</h2>
                                </div>
                                
                                <div class="row" style="position: relative; top: -20px;"> 
                                    <div class="col-xs-3" style="text-align: center;">
                                        <img src="images/ipad_air.png" style="width: 100%; height: 100%;">
                                        <p class="device_model">iPad 2/3/4 &amp; Air</p>
                                    </div>                                    
                                    <div class="col-xs-3" style="text-align: center;">
                                        <img src="images/ipad_air.png" style="width: 100%; height: 100%;">
                                        <p class="device_model">iPad Air 2</p>
                                    </div>
                                    
                                    <div class="col-xs-3" style="text-align: center;">
                                        <img src="images/ipad_mini.png" style="width: 100%; height: 100%;">
                                        <p class="device_model">iPad Mini 1/2/3</p>
                                    </div>
                                    
                                    <div class="col-xs-3" style="text-align: center;">
                                        <img src="images/ipad_mini.png" style="width: 100%; height: 100%;">
                                        <p class="device_model">iPad Mini 4</p>
                                    </div>                                
                                </div>
                                
                                <div clas="row" style="text-align: center;">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <a class="problem_item btn btn-block">Glass Digitizer</a>
                                        </div>
                                        <div class="col-xs-4">
                                            <a class="problem_item btn btn-block">Wifi</a>
                                        </div>
                                        <div class="col-xs-4">
                                            <a class="problem_item btn btn-block">Speakers</a>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-4">
                                            <a class="problem_item btn btn-block">Battery</a>
                                        </div>
                                        <div class="col-xs-4">
                                            <a class="problem_item btn btn-block">Headphone Jack</a>
                                        </div>
                                        <div class="col-xs-4">
                                            <a class="problem_item btn btn-block">Home Button</a>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-4">
                                            <a class="problem_item btn btn-block">LCD</a>
                                        </div>
                                        <div class="col-xs-4">
                                            <a class="problem_item btn btn-block">Charging Port</a>
                                        </div>
                                        <div class="col-xs-4">
                                            <a class="problem_item btn btn-block">Camera</a>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            
                            <!--
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                            -->
                            
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
                <p>We're here to help.</p>
            </div>
        </div>
        <!-- SECTION 1 END -->


        <!-- SECTION 2 BEGIN -->
        <div class="jumbotron" id="how_it_works" style="text-align: center;">
            <div id="how_it_works_content">
                <h1 style="position: relative; top: -50px;">How It Works</h1>
                
                <div class="btn how_it_works_btn">1. Device &amp; Problem</div>
                <div class="btn how_it_works_btn">2. Schedule Pick-Up</div>
                <div class="btn how_it_works_btn">3. Get It Fixed</div>

            </div>
        </div>
        <!-- SECTION 2 END -->

        
        <!-- SECTION 3 BEGIN -->
        <div class="jumbotron" id="services" style="text-align: center;">
            
            <div class="container" id="services_content">  
                
                <div class="row">
                    <h1 style="position: relative; top: -50px;">Select Your Device &amp; Tell Us Your Problem</h1>
                </div>
                
                <div class="row">                   
                    <div class="col-xs-3" style="background-color: rgba(0,0,0,0.4);">
                        <a class="device_selection" href="" data-toggle="modal" data-target="#imac_device_select">
                            <img src="images/imac_white2.png" style="width: 100%; height: 100%;">
                            <p>iMac</p>
                        </a>
                    </div>                       
                    <div class="col-xs-3" style="background-color: rgba(0,0,0,0.4);">
                        <a class="device_selection" href="" data-toggle="modal" data-target="#macbook_device_select">
                            <img src="images/macbook_white2.png" style="width: 100%; height: 100%;">
                            <p>Macbook</p>
                        </a>
                    </div>
                   <div class="col-xs-3" style="background-color: rgba(0,0,0,0.4);">
                        <a class="device_selection" href="" data-toggle="modal" data-target="#iphone_device_select">
                            <img src="images/iphone_white2.png" style="width: 100%; height: 100%;">
                            <p>iPhone</p>
                       </a>
                    </div>   
                   <div class="col-xs-3" style="background-color: rgba(0,0,0,0.4);">
                        <a class="device_selection" href="" data-toggle="modal" data-target="#ipad_device_select">
                            <img src="images/ipad_white2.png" style="width: 100%; height: 100%;">
                            <p>iPad</p>
                       </a>
                    </div>   
                </div>
                
            </div>
        
        
        </div>
        <!-- SECTION 3 END -->
        
        
        
        <!-- STAY CLEVER BEGIN -->
        <div class="jumbotron" id="stay_clever" style="text-align: center;">
            <div class="container" id="stay_clever_content">
                
                
                <div class="row" style="position: relative; top: 100px;">    
                    
                    <h2 class="gonz_quote">
                        "I want to see a paradigm shift. We're going to be so good...It wouldn't make sense to go anywhere else."<br/><br/>
                        Gonzalo Martinez<br/>
                        Founder
                    </h2>

                </div>
                
                <div class="row">
                    <br/><br/><br/>
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
            $(".gonz_quote").fitText(2, { minFontSize: '20px', maxFontSize: '25px' });
            
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
            
            
            // ============== Client-side form validation ==============
            $("form").submit(function(e) {

                /*
                var error = "";

                if ($("first_name").val() === "" && $("last_name").val() === "") {
                    error += "Please enter your full name.<br/>";
                }
                if ($("#email").val() === "") {
                    error += "The email field is required.<br/>";
                }
                if ($("#phone").val() === "") {
                    error += "The phone field is required.<br/>";
                }
                if ($("street_address").val() === "" && $("city").val() === "" && $("state").val() === "") {
                    error += "Please enter your full address.<br/>";
                }
                

                //If an error message exists (i.e., isn't the empty string)
                if (error !== "") {

                    //DON'T FORGET TO ACTUALLY WRITE THE div WITH THE error ID!!!
                    $("#error").html('<div class="alert alert-danger" role="alert"><p><strong>There were error(s) in your form:</strong></p>' + error + '</div>');

                    return false;
                } else {
                    return true;
                }
                */
            });
            
        </script>
    </body>
</html>
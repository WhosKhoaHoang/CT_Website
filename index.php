<?php
    $my_arr = array(
        array("device"          => "iMac",
              "device_models"   => array(array("name"=>"27''",
                                               "image_path"=>"images/imac_black_sharp.png"),
                                         array("name"=>"21.5''",
                                               "image_path"=>"images/imac_black21-5_sharp.png")
                                       ),
              "device_problems" => array("Video Card", "SSD", "LCD",
                                         "Motherboard", "DVD Drive", "RAM",
                                         "Power Supply", "Data Recovery", "Virus"
                                        ),
        ),
        array("device"          => "Mac",
              "device_models"   => array(array("name"=>"Macbook Air",
                                               "image_path"=>"images/macbook_air_black.png"),
                                         array("name"=>"Macbook Pro (non-Retina)",
                                               "image_path"=>"images/macbook_pro_black.png"),
                                         array("name"=>"Macbook Pro (Retina)",
                                               "image_path"=>"images/macbook_pro_black.png"),
                                       ),
              "device_problems" => array("Video Card", "SSD", "LCD",
                                         "Motherboard", "Keyboard", "RAM",
                                         "Battery", "Data Recovery", "Virus"
                                        ),
        ),
        array("device"          => "iPhone",
              "device_models"   => array(array("name"=>"7 Plus / 7",
                                               "image_path"=>"images/iphone_duo.png"),
                                         array("name"=>"6s Plus / 6s",
                                               "image_path"=>"images/iphone_duo.png"),
                                         array("name"=>"6 Plus / 6",
                                               "image_path"=>"images/iphone_duo.png"),
                                         array("name"=>"5 SE/5s/5c/5",
                                               "image_path"=>"images/iphone_alone.png"),
                                       ),
              "device_problems" => array("Screen", "Wifi", "Speakers",
                                         "Battery", "Headphone", "Home Button",
                                         "Water Damage", "Charge Port", "Camera"
                                        ),
        ),
        array("device"          => "iPad",
              "device_models"   => array(array("name"=>"2/3/4/Air",
                                               "image_path"=>"images/ipad_air.png"),
                                         array("name"=>"Air 2",
                                               "image_path"=>"images/ipad_air.png"),
                                         array("name"=>"Mini 1/2/3",
                                               "image_path"=>"images/ipad_mini.png"),
                                         array("name"=>"Mini 4",
                                               "image_path"=>"images/ipad_mini.png"),
                                       ),
              "device_problems" => array("Screen", "Wifi", "Speakers",
                                         "Battery", "Headphone", "Home Button",
                                         "LCD", "Charge Port", "Camera"
                                        ),
        ),
    )
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags always come first -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <!--[if lt IE 9]> <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script> <![endif]-->
        <title>CleverTech</title>
        <!-- Include this link on every HTML page of the website! -->
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
        <!-- import Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- Add icon library from Perfect Icons-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- import your own styles -->
        <link rel="stylesheet" href="styles.css" />
    </head>

    <body data-spy="scroll" data-target="#my_navbar">
        
        <!-- ==================================== THE NAVBAR BEGIN ==================================== -->
        <nav class="navbar navbar-fixed-top" id="my_navbar">
            <div class="container">
                <div class="navbar-header">
                    <!--This "hamburger" button shows up and contains the navbar links once the viewport has been adequately shrinked -->
                    <button type="button" class="navbar-toggle collapsed pull-left" data-toggle="collapse" data-target="#collapsed_menu" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar top-bar"></span> <!-- Each icon-bar is a line for the hamburger -->
                        <span class="icon-bar middle-bar"></span>
                        <span class="icon-bar bottom-bar"></span>
                    </button>
                    <!-- LOGO BEGIN -->
                    <a class="navbar-brand" href="#welcome">
                        <img id="brand_logo" src="images/navbar_logo2.png" alt="">
                    </a>
                    <!-- LOGO END -->  
                </div>

                <!-- Collect the navbar links into the "hamburger" for toggling when user collapses window -->
                <div class="collapse navbar-collapse" id="collapsed_menu">
                    <!--<ul class="nav navbar-nav" style="float: left;">-->
                    <ul class="nav navbar-nav" style="text-align: center;">
                        <li class="nav-item"><a href="#how_it_works" class="nav-link">How It Works</a></li>
                        <li role="separator" class="divider"></li>
                        
                        <li class="nav-item"><a href="#services" class="nav-link">Services</a></li>
                        <li role="separator" class="divider"></li>

                        <li class="nav-item"><a href="#stay_clever" class="nav-link">Stay Clever</a></li>
                        <li role="separator" class="divider"></li>

                        <li><button class="btn pick_up_request_btn" data-toggle="modal" data-target="#pick_up_request_modal">Request Pick-Up</button></li>
                        <li role="separator" class="divider" id="request_pick_up_divider"></li>
                    </ul>
                    
                    <!-- PICK-UP REQUEST BUTTON BEGIN -->
                    <div class="navbar-right" style="padding: 10px;">
                        <button class="btn pick_up_request_btn" data-toggle="modal" data-target="#pick_up_request_modal">Request Pick-Up</button>
                    </div>

                    <!-- Keep this here for testing start_repair_btn. Weird how no hover behavior occurs when you set start_repair_btn as the id...-->
                    <!--
                    <div class="navbar-right" style="padding-top: 10px; padding: 10px; display:block;">
                        <a href="#" id="start_repair_btn" class="btn" data-toggle="modal" data-target="#pick_up_request_modal">Request Pick-Up</a>
                    </div>
                    -->
                    <!-- PICK-UP REQUEST BUTTON BUTTON END -->
                </div>

            </div>
        </nav>
        <!-- ==================================== THE NAVBAR END ==================================== -->
        
        
        
        <!-- =================================== THE MODALS BEGIN =================================== -->
        <!--Thanks to Ren De Nobel from SO: http://stackoverflow.com/questions/18053408/vertically-centering-bootstrap-modal-window-->
        <!-- PICK-UP REQUEST MODAL BEGIN -->
        <div id="pick_up_request_modal" class="modal fade" role="dialog">
            <div class="vertical-alignment-helper">
                <div class="modal-dialog vertical-align-center">
                    <div id="pick_up_request_dialog" class="modal-dialog">
                        
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div id="pick_up_request_body" class="modal-body">
                                
                                <div class="form-group" style="margin-bottom: 30px;">
                                    <button type="button" class="close" data-dismiss="modal" style="float: left;">&times;</button>
                                </div>

                                <form id="pick_up_request_form">
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
                                                <p>We will send you a confirmation email to this address.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <label class="required" for="phone">Phone Number</label>
                                                <input class="form-control" type="tel" id="phone" name="phone">
                                                <p>Enter your 10-digit phone number</p>
                                            </div>
                                        </div>
                                    </div> 
                                    
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <label for="company">Company</label>
                                                <input class="form-control" id="company" name="company">
                                            </div>
                                        </div>
                                    </div>                                     

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
                                                    <option style="display:none;" selected>Select City</option>
                                                    <option>Atherton</option>
                                                    <option>Berkeley</option>
                                                    <option>Burlingame</option>
                                                    <option>Campbell</option>
                                                    <option>Cupertino</option>
                                                    <option>Concord</option>
                                                    <option>Foster City</option>
                                                    <option>Los Altos</option>
                                                    <option>Menlo Park</option>
                                                    <option>Milpitas</option>
                                                    <option>Mountain View</option>
                                                    <option>Palo Alto</option>
                                                    <option>Portola Valley</option>
                                                    <option>Redwood City</option>
                                                    <option>San Carlos</option>
                                                    <option>San Jose</option>
                                                    <option>San Mateo</option>
                                                    <option>Santa Clara</option>
                                                    <option>Sunnyvale</option>
                                                    <option>Woodside</option>
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
                                                            <!--<option selected disabled>Select Model Type</option>-->
                                                            <option style="display:none;" selected>Select Model Type</option>
                                                            <option>27''</option>
                                                            <option>21.5''</option>
                                                            <option>Macbook Air</option>
                                                            <option>Macbook Pro (non-Retina)</option>
                                                            <option>Macbook Pro (Retina)</option>
                                                            <option>7 Plus / 7</option>
                                                            <option>6s Plus / 6s</option>
                                                            <option>6 Plus / 6</option>
                                                            <option>5 SE/5s/5c/5</option>
                                                            <option>2/3/4/Air</option>
                                                            <option>Air 2</option>
                                                            <option>Mini 1/2/3</option>
                                                            <option>Mini 4</option>
                                                            <option>PC</option>
                                                        </select>  
                                                    </div>
                                                    <!-- CHECK THAT THE LENGTH OF THIS VALUE IS 12!!!-->
                                                    <div class="col-xs-6">
                                                        <label class="required" for="serial_number">12-Character Serial #</label>
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
                                                        <label for="other_info">Other Info</label>
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
                                        <label class="required">Service Type</label>
                                        <input type="radio" id="hidden_service_type" class="service_type" name="service_type"  value="" style="display: none" checked>
                                        <p><input type="radio" class="service_type" name="service_type"  value="Personal Service"> &nbsp; Personal Hardware Service </p> 
                                        <p><input type="radio" class="service_type" name="service_type"  value="Business Service"> &nbsp; Business Hardware Service </p>
                                    </div>

                                    <div id="legal_info" class="form-group">
                                        <p>*Important Information and Limitations of Liability:</p>
                                        
                                        <p>
                                        CleverTech is not responsible for lost or stolen data, or damage/loss to third party protective cases, caused by any reason.</p>

                                        <p>Every repair comes with a Limited 90 Day Warranty.</p>

                                        <p>Physical damage nullifies warranty. Software &amp; data is not covered under any warranty.</p>

                                        <p>When we come for the pick-up, an initial diagnostic of your device will be made and an estimated service cost will be given. If you decline the repair for this device, a pick-up fee ($50) will be charged. If you approve the repair, the pick-up fee will be waived.</p> 

                                        <p>Submitting this request indicates that you have read and understand the TERMS &amp; CONDITIONS and agree to them; you agree to pay in full for the service provided.</p>

                                        <p>Please have the machine ready for pickup when you submit this service request. Pick-up requests submitted before 10:30 am are usually picked up same day. If submitted after 10:30 am, expect a phone call to schedule a next day pick-up. If the machine is not easily accessible at the front desk, during all business hours, please include instructions for the driver in the "Other Info" text box. Any instructions/tips for the driver to access your building or parking, are greatly appreciated. Thank you for your cooperation.</p>
                                        
                                        <p class="required">
                                            <input type="radio" id="hidden_agree_to_terms" class="agree_to_terms" name="agree_to_terms" value="" style="display: none;" checked>
                                            <input type="radio" class="agree_to_terms" name="agree_to_terms" value="1">&nbsp;&nbsp;I agree to these terms
                                        </p>
                                    </div>

                                    <div id="error" style="display: hidden"></div>
                                </form>
                                
                                <button id="pick_up_request_inner_submit" class="btn" style="background-color: #0f6a37; color: white; float: left; margin-bottom: 30px;" data-toggle="modal" data-target="#pick_up_request_result">Submit</button>
                            </div>
 
                            <div class="modal-footer" id="pick_up_request_footer">
                                <button id="pick_up_req_submit_btn" class="btn" style="background-color: #0f6a37; color: white; float: left;" data-toggle="modal" data-target="#pick_up_request_result">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- PICK-UP REQUEST MODAL END -->
    
        
        <!-- PICK-UP REQUEST RESULT BEGIN -->
        <div class="modal fade in" id="pick_up_request_result" >
            <div class="vertical-alignment-helper">
                <div class="modal-dialog vertical-align-center">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <h3 id="processing_msg">Processing your request...</h3>
                                <div id="pick_up_request_result_msg"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- PICK-UP REQUEST RESULT END -->

        
        <!-- SELECT SERVICE BEGIN -->
        <?php for ($i = 0; $i < count($my_arr); $i++){ ?>
        <div id="<?php echo strtolower($my_arr[$i]["device"]) ?>_device_select" class="modal fade" role="dialog">
            <div class="vertical-alignment-helper">
                <div class="modal-dialog vertical-align-center">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">

                                <div class="form-group" style="margin-bottom: 30px;">
                                    <button type="button" class="close" data-dismiss="modal" style="float: left;">&times;</button>
                                </div>

                                <div class="row" style="text-align: center; z-index: 1">
                                    <h2><?php echo $my_arr[$i]["device"] ?></h2>
                                </div>

                                <div class="row" style="position: relative; top: -20px;">
                                    <!-- ============== MODEL SELECTION BEGIN ============== -->
                                    <p style="text-align: center; margin-top: 10px;">Choose Your Model: </p>
                                    <!--The value of this element gets set to a model when a model is chosen-->
                                    <input id="<?php echo strtolower($my_arr[$i]["device"]) ?>_model_chosen" type="radio" value=0 style="display: none;">
                                    <?php
                                        $col_xs_int = null;
                                        switch (count($my_arr[$i]["device_models"])) {
                                            case 2:
                                                $col_xs_int = 5;
                                                break;
                                            case 3:
                                                $col_xs_int = 4;
                                                break;
                                            case 4:
                                                $col_xs_int = 3;
                                                break;
                                        }

                                        $col_offset_class = "";
                                        if (count($my_arr[$i]["device_models"]) < 3) {
                                            $col_offset_class = " col-xs-offset-1"; //leading space is intentional!
                                        }
                                    ?>
                                    <?php for ($j = 0; $j < count($my_arr[$i]["device_models"]); $j++){ ?>
                                    <div class="col-xs-<?php echo $col_xs_int ?><?php echo $j == 0 ? $col_offset_class : '' ?>" style="text-align: center;">
                                        <input class="device_select" type="radio" name="<?php echo strtolower($my_arr[$i]["device"]) ?>_select_group" value="<?php echo $j+1 ?>" id="<?php echo strtolower($my_arr[$i]["device"]) ?>_select<?php echo $j+1 ?>" />
                                        <label for="<?php echo strtolower($my_arr[$i]["device"]) ?>_select<?php echo $j+1 ?>" data-value="<?php echo strtolower($my_arr[$i]["device"]) ?>">
                                            <img src="<?php echo $my_arr[$i]["device_models"][$j]["image_path"] ?>" style="width: 100%; height: 100%;">
                                            <p class="device_model"><?php echo $my_arr[$i]["device_models"][$j]["name"] ?></p>
                                        </label>
                                    </div>
                                    <?php } ?>
                                    <!-- ============== MODEL SELECTION END ============== -->
                                </div>

                                <div clas="row" style="text-align: center;">
                                    <!-- ============== PROBLEM SELECTION BEGIN ============== -->
                                    <!-- The value attribute of this input element gets set
                                         to the problem when a problem is chosen -->
                                    <input id="<?php echo strtolower($my_arr[$i]["device"]) ?>_problem_chosen" type="radio" value=0 style="display: none;">
                                    <?php
                                        $num_problem_rows = (int)(count($my_arr[$i]["device_problems"]) / 3);
                                        $so_far = 0;
                                    ?>
                                    <?php for ($j = 0; $j < $num_problem_rows; $j++){ ?>
                                    <div class="row">
                                        <?php for ($k = 0; $k < 3; $k++) { ?>
                                        <div class="col-xs-4">
                                            <input class="problem_select" type="radio" name="<?php echo strtolower($my_arr[$i]["device"]) ?>_problem_select_group" id="<?php echo strtolower($my_arr[$i]["device"]) ?>_problem_select<?php echo $k+$so_far+1 ?>" />
                                            <label for="<?php echo strtolower($my_arr[$i]["device"]) ?>_problem_select<?php echo $k+$so_far+1 ?>" class="problem_item btn btn-block" data-value="<?php echo strtolower($my_arr[$i]["device"]) ?>"><?php echo $my_arr[$i]["device_problems"][$k+$so_far] ?></label>
                                        </div>
                                        <?php } $so_far += $k ?>
                                    </div>
                                    <?php } ?>
                                    <!-- ============== PROBLEM SELECTION END ============== -->
                                </div>

                                <div class="row" style="font-size: 15px; text-align: center;"> 
                                    <div class="col-xs-12">
                                        <div class="row">
                                            <label class="price_label" style="display: block;">Service Price: </label>
                                        </div>
                                        <div class="row">
                                            <label id="<?php echo strtolower($my_arr[$i]["device"]) ?>_repair_price" class="price_value">&nbsp;</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <button class="btn_from_device_modal btn col-xs-4 col-xs-offset-4" style="background-color: #0f6a37; color: white; margin-top: 10px;" data-dismiss="modal" data-toggle="modal" data-target="#pick_up_request_modal" id="<?php echo strtolower($my_arr[$i]["device"]) ?>_service_pickup">Request Pick-Up</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        <!-- SELECT SERVICE END -->


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
                    <div class="modal-dialog" id="contact_us_modal_dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="form-group" style="margin-bottom: 30px;">
                                    <button type="button" class="close" data-dismiss="modal" style="float: left;">&times;</button>
                                </div>
                                <form id="contact_form" style="padding: 20px;">

                                    <div class="form-group" style="text-align: center;">
                                        <h3>Send Us A Message!</h3>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="required" for="contact_us_name">Name</label>
                                        <input class="form-control" id="contact_us_name" name="contact_us_name">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="required" for="contact_us_email">Email</label>
                                        <input class="form-control" type="email" id="contact_us_email" name="contact_us_email">
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
                                    
                                </form>
                            </div>

                            <div class="modal-footer">
                                <button id="contact_submit_btn" class="btn" style="background-color: #0f6a37; color: white;" data-toggle="modal" data-target="#contact_us_result">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- CONTACT US MODAL END -->


        <!-- MESSAGE INFO BEGIN -->
        <div id="msg_info_modal" class="modal" role="dialog" data-color="none">
            <div class="vertical-alignment-helper">
                <div class="modal-dialog vertical-align-center">
                    <div id="msg_info_modal_dialog" class="modal-dialog">
                        <div class="modal-content"> <!-- Use this div if you want to change color of modal -->
                            <div id="msg_info_modal_body" class="modal-body">

                                <!-- For the close button -->
                                <div class="form-group" style="margin-bottom: 30px;">
                                    <button type="button" class="close" data-dismiss="modal" style="float: left;">&times;</button>
                                </div>
                      
                                <div style="text-align: center; margin-top: 10px;">
                                    <a id="envelope" style="color: green;" data-toggle="modal" data-target="#contact_us_modal"><span style="font-size: 30px;" class="glyphicon glyphicon-envelope"></span></a>
                                </div>

                                <div style="text-align: center; margin-top: 10px;">
                                    <a style="color: green;" href="tel:408-316-7600">
                                        <span style="font-size: 20px;" class="glyphicon glyphicon-earphone"></span>
                                        <span style="font-size: 20px; position: relative; top: -3px;">(408) 316-7600</span>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- MESSAGE INFO END -->
        
        
        <!-- CONTACT US RESULT BEGIN -->
        <div class="modal fade in" id="contact_us_result" >
            <div class="vertical-alignment-helper">
                <div class="modal-dialog vertical-align-center">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div id="contact_us_result_msg"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- CONTACT US RESULT END -->


        <!-- FETCHING DIRECTIONS BEGIN -->
        <div class="modal fade in" id="fetching_directions" >
            <div class="vertical-alignment-helper">
                <div class="modal-dialog vertical-align-center">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body" style="text-align: center;">
                                <img src="images/ct_icon.png">
                                <h4 id="dir_msg">Sit tight! We'll have your directions in a moment...</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- FETCHING DIRECTIONS BEGIN END -->
        
        
        <!-- Note how you didn't center this modal. It was causing weird stuff to happen during resizing. -->
        <div class="modal fade in" id="pick_up_info_modal" tabindex="-1" role="dialog" aria-hidden="true">

            <div class="modal-dialog modal-lg" style="margin-top: 100px;">
                <div class="modal-content">

                    <div class="modal-body" style="padding-left: 50px; padding-right: 50px; text-align: center;">
                        
                        <div class="form-group" style="margin-bottom: 30px;">
                            <button type="button" class="close" data-dismiss="modal" style="float: left;">&times;</button>
                        </div>
                        
                        <div class="row">
                            <h1>Smart Pick-Up</h1>
                        </div>
                        
                        <div class="row">
                            <p class="how_it_works_text">CleverTech performs home &amp; business computer pick-ups the day after a pick-up request is submitted. In some cases (when possible) the day of submission. After submitting a request, we will call you to verify time and location for the computer pick-up. It's easy!</p>
                        </div>
                        

                        <div class="row" style="margin-top: 20px;">
                            <a class="how_it_works_text" style="cursor: pointer; color: green;" data-dismiss="modal" data-toggle="modal" data-target="#pick_up_request_modal">Start your pick-up request here ></a>
                        </div>
                        

                        <div class="row" style="margin-top: 70px;">
                            <h1>What to expect</h1>
                        </div>
                        <div class="row">
                            <p class="how_it_works_text">Pick-up requests submitted before 10:30 am are usually picked up same day. If submitted after 10:30 am, expect a phone call to schedule a next day pick-up. If you need to cancel or reschedule a pick-up, please call us at 408-316-7600. When we come for the pick-up, an initial diagnostic of your device will be made and an estimated service cost will be given. If you decline the repair for this device, a pick-up fee ($50) will be charged. If you approve the repair, the pick-up fee will be waived.</p>
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
                        
                        <div class="form-group" style="margin-bottom: 30px;">
                            <button type="button" class="close" data-dismiss="modal" style="float: left;">&times;</button>
                        </div>
                        
                        <div class="row">
                            <h1>CleverTech Repair</h1>
                        </div>
                        
                        <div class="row">
                            <p class="how_it_works_text">We're here to help. CleverTech repairs are performed by experts who use genuine Apple parts. All parts from 2006 till now are in stock. This allows us to turnaround repairs in 2-3 days no matter what model computer or issue you're experiencing. We're so good, it doesn't make sense to go anywhere else!</p>
                        </div>
                        

                        <div class="row" style="margin-top: 20px;">
                            <a class="how_it_works_text" style="cursor: pointer; color: green;" data-dismiss="modal" data-toggle="modal" data-target="#pick_up_request_modal">Start your pick-up request here ></a>
                        </div>
                        

                        <div class="row" style="margin-top: 70px;">
                            <h1>The CleverWay!</h1>
                        </div>
                        <div class="row">
                            <p class="how_it_works_text">Every repair comes with a 90 Day Limited Warranty and up to 365 days of coverage on parts with Manufacturer Warranties. The limited warranty provides that if within 90 days from the repair date of your CleverTech repair your device fails to operate for reasons related to the original repair, CleverTech will perform any labor related to the original repair free of charge.</p>
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
                        <div class="form-group" style="margin-bottom: 30px;">
                            <button type="button" class="close" data-dismiss="modal" style="float: left;">&times;</button>
                        </div>
                        
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
                        
                        <div class="form-group" style="margin-bottom: 30px;">
                            <button type="button" class="close" data-dismiss="modal" style="float: left;">&times;</button>
                        </div>
                        
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

                                · service@iclevertech.com<br/><br/>

                                Contact: (408) 316-7600<br/><br/><br/><br/>



                                WARRANTY EXCLUSIONS<br/><br/>

                                CLEVERTECH does not offer technical support for any software including installed OS or other programs. Technical support should be pursued through channels offered by the software’s individual tech support. CLEVERTECH accepts no liability for problems caused by after-market software or hardware modifications or additions. CLEVERTECH is not responsible for giving any technical support concerning the installation or integration of any software or component the customer did not pay CLEVERTECH to install. CLEVERTECH is not responsible for loss of data or time, even with hardware failure. Customers are responsible for backing up any data for their own protection. CLEVERTECH is not responsible for any loss of work (“down time”) caused by a product requiring service. This warranty is null and void if the defect or malfunction was due to damage resulting from operation not within manufacturer specifications. It will also be null and void if there are indications of misuse and/or abuse. CLEVERTECH has the option of voiding the warranty if anyone other than a CLEVERTECH technician attempts to service the product. CLEVERTECH will not warrant any problems arising from an act of (lighting, flooding, tornado, etc.), electrical spikes or surges, or problems arising out of hardware, software, or additional devices added to complement any system/component bought at CLEVERTECH. Under no circumstances will CLEVERTECH be responsible for any refund or remuneration exceeding the original purchase price of the product less any shipping fees. CLEVERTECH will not be held responsible for typographical errors on sales receipts, repair tickets, or on our website. CLEVERTECH makes every effort to make sure all information on our website is correct.
                            </p>
                        </div>
  
                    </div>

                </div>
            </div>
        </div>
        <!-- =================================== THE MODALS END =================================== -->



        <!-- ============================== THE CONTENT BEGIN ==================================== -->

        <!------------------ SECTION 1 BEGIN ------------------>
        <!-- keep id="welcome" and not id="section1" for the sake of aesthetics in the addess bar -->
        <section class="jumbotron" id="welcome">
            <div id="welcome_content">
                <div class="container">

                    <div class="row" style="margin-top: -10%">
                        <h1 id="sec1_header">CleverTech</h1>
                        <p id="sec1_subtitle">Trusted Mac Technicians</p>
                    </div>

                    <div class="row">
                        <div class="col-xs-10 col-xs-offset-2">
                            <div class="trans_btn col-xs-3" data-toggle="modal" data-target="#pick_up_request_modal">
                                <label class="sec1_label" for="truck_pic">Book</label>
                                <img class="img-responsive" id="truck_pic" 
                                     src="images/truck_square.png" style="margin: 0 auto;">
                            </div>

                            <a href="tel:408-316-7600" style="color: white;">
                                <div class="col-xs-3">
                                    <label class="sec1_label" for="call_pic">Call</label>
                                    <img class="img-responsive" id="call_pic" 
                                         src="images/white_phone.png" style="margin: 0 auto;">
                                </div>
                            </a>

                            <div class="trans_btn col-xs-3" onclick="get_location()" data-toggle="modal" data-target="#fetching_directions">
                                <label class="sec1_label" for="directions_pic">Directions</label>
                                <img class="img-responsive" id="directions_pic" 
                                     src="images/directions.png" style="margin: 0 auto;">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!------------------ SECTION 1 END ------------------>


        <!------------------ SECTION 2 BEGIN ------------------>
        <section class="jumbotron" id="how_it_works">
            <div class="container" id="how_it_works_content">

                <div class="row">
                    <h1 id="sec2_header">It's Easy!</h1>
                </div>

                <div class="row" style="margin-top: 2%">
                    <div class="col-xs-10 col-xs-offset-2">
                        <div class="trans_btn col-xs-3" data-toggle="modal" data-target="#pick_up_info_modal">
                            <label class="sec2_label" for="truck_pic">Pick-Up</label>
                            <img class="img-responsive" id="truck_pic" 
                                 src="images/truck_square.png" style="margin: 0 auto;">
                        </div>

                        <div class="trans_btn col-xs-3" data-toggle="modal" data-target="#repair_info_modal">
                            <label class="sec2_label" for="repair_pic">Repair</label>
                            <img class="img-responsive" id="repair_pic" 
                                 src="images/tools.png" style="margin: 0 auto;">
                        </div>

                        <div class="trans_btn col-xs-3" data-toggle="modal" data-target="#drop_off_info_modal">
                            <label class="sec2_label" for="dropoff_pic">Drop-Off</label>
                            <img class="img-responsive" id="dropoff_pic" 
                                 src="images/checkmark.png" style="margin: 0 auto;">
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!------------------ SECTION 2 END ------------------>


        <!------------------ SECTION 3 BEGIN ------------------>
        <section class="jumbotron" id="services">
            <div class="container" id="services_content">
                <div id="services_icon_grid">
                    <div class="row">
                        <h1 id="services_header">Services</h1>
                    </div>

                    <div class="row">
                        <!-- Add solid color to this div to see how nicely the color consumes the whole menu item -->
                        <div class="col-md-offset-3 col-md-3 col-xs-offset-2 col-xs-4 problem_device" style="background-color: rgba(0,0,0,0.4); border-top-left-radius: 10px;" data-toggle="modal" 
                             data-target="#imac_device_select">
                            <img class="services_icon" src="images/imac_white2.png">
                            <p class="services_device_type">iMac</p>
                        </div>                       
                        <div class="col-md-3 col-xs-4 problem_device" style="background-color: rgba(0,0,0,0.4); border-top-right-radius: 10px;" data-toggle="modal" data-target="#mac_device_select">
                            <img class="services_icon" src="images/macbook_white2.png">
                            <p class="services_device_type">Mac</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-offset-3 col-md-3 col-xs-offset-2 col-xs-4 problem_device" style="background-color: rgba(0,0,0,0.4); border-bottom-left-radius: 10px;" data-toggle="modal" data-target="#iphone_device_select">
                            <img class="services_icon" src="images/iphone_white2.png">
                            <p class="services_device_type">iPhone</p>
                        </div>   
                        <div class="col-md-3 col-xs-4 problem_device" style="background-color: rgba(0,0,0,0.4); border-bottom-right-radius: 10px;" data-toggle="modal" data-target="#ipad_device_select">
                            <img class="services_icon" src="images/ipad_white2.png">
                            <p class="services_device_type">iPad</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!------------------ SECTION 3 END ------------------>
        
        
        <!------------------ SECTION 4 BEGIN ------------------>
        <section class="jumbotron" id="stay_clever">
            <div class="container" id="stay_clever_content">

                <div class="row" id="gonz_quote"> <!-- testing -->
                    <p>
                        "At CleverTech we believe in a better way. For everyone else making this world a better place we want to give back the best way we know how. CleverTech, your Apple Computer Specialist."<br/><br/>
                        Gonzalo Martinez<br/>
                        Founder
                    </p>
                </div>

                <!-- FLANKED LAYOUT BEGIN -->
                <div class="row" id="soc_media_and_store_info">

                    <div class="row">

                        <div id="soc_media" class="col-md-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <label>For the crazy ones:</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <ul class="soc">
                                        <li><a target="_blank" href="https://www.facebook.com/iclevertech/" class="fa fa-facebook"></a></li>
                                        <li><a target="_blank" href="https://www.instagram.com/iclevertech/" class="fa fa-instagram"></a></li>
                                        <li><a target="_blank" href="https://clevertech.tumblr.com/" class="fa fa-tumblr"></a></li>
                                        <li><a target="_blank" href="https://twitter.com/iclevertech" class="fa fa-twitter"></a></li>
                                        <li><a target="_blank" href="https://www.youtube.com/channel/UCovKD5sxU6jku8OTAo2NN7Q" class="fa fa-youtube"></a></li>
                                        <li><a target="_blank" href="https://www.yelp.com/biz/clevertech-san-jose-6" class="fa fa-yelp"></a></li>
                                    </ul>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div id="contact_us_btn" class="btn" data-toggle="modal" data-target="#contact_us_modal">Contact Us</div>
                                <p>service@iclevertech.com</p>
                            </div>
                        </div>


                        <div id="store_info" class="col-md-8"> 
                            <div class="row">
                                <div class="col-xs-6 col-md-9">
                                    <dl class="pull-right">
                                        <dt>Address:</dt> 
                                        
                                        <dd>Palo Alto</dd>
                                        <dd>3159 El Camino Real</dd>
                                        <dd>Palo Alto, CA 94306</dd>
                                        <dd>650-272-6973</dd><br/> 
                                        <dd>San Jose</dd>
                                        <dd>1150 Murphy Ave, Ste 205</dd>
                                        <dd>San Jose, CA 9513</dd>
                                        <dd>408-316-7600</dd><br/>
                                    </dl>
                                </div>

                                <div class="col-xs-6 col-md-3">

                                    <dl class="pull-left">
                                        <dd>Monday - Friday: <br/>9am - 7pm</dd>    
                                        <dd>Saturday - Sunday: <br/>10am - 6pm</dd>  <br/> 
                                        <dd>© CleverTech LLC</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- FLANKED LAYOUT END -->
            </div>
            
        </section>
        <!------------------ SECTION 4 END ------------------>

        <!-- ============================== THE CONTENT END ============================== -->

        <!-- Arrow Button Code -->
        <a id="move_up" href="#"></a>
        <a id="move_down" style="display: inline;" href="#"></a>

        <!-- For the message icon -->
        <a id="msg_info_icon" style="display: inline;" href="#" data-toggle="modal" data-target="#msg_info_modal">
            <!--<span class="glyphicon glyphicon-info-sign"></span>-->
            <img id="speech_bubble" src="images/speech_bubble_light_green.png">
        </a>
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> 
        <!-- Fit Text import -->
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/FitText.js/1.2.0/jquery.fittext.min.js"></script>-->
        <script src="index.js"></script>
    </body>
</html>
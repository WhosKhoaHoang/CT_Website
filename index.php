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
    </head>
    
    <body data-spy="scroll" data-target="#my_nav_bar"> <!--data-spy and data-target are for jumping to particular sections of the page through links-->
        
        <!-- THE NAVBAR -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <!--This "accordion" button shows up and contains the navbar links once the viewport has been adequately collapsed collapsed-->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    
                    <!-- START REPAIR BUTTON BEGIN -->
                    <!--Setting this div with class navbar-form aligns everything properly.-->
                    <!--navbar-right will push this button to the far right.-->
                    <div class="navbar-right" style="padding-top: 10px; padding-left: 10px;">
                        <a href="#" id="open_ticket_btn" href="http://google.com" class="btn-sm">Start Repair</a>
                        <!--<button id="open_ticket_btn" class="btn" onclick="load_open_ticket()">Open a Ticket</button>-->
                    </div>
                    <!-- START REPAIR BUTTON END -->
                </div>

                <!-- Collect the nav links, forms, and other content for toggling when user collapses window -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav" style="float: right;">
                    <!--<ul class="nav navbar-nav" style="position: relative; left: 20%;">-->
                        <li class="nav-item"><a href="#" class="nav-link">Services</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">How It Works</a></li>
                        <!--<li class="nav-item"><a class="nav-link" onclick="load_store()">Store (WILL DROP)</a></li>-->
                        <!--<li class="nav-item"><a class="nav-link" onclick="load_contact()">Contact (WILL DROP)</a></li>-->
                        <li class="nav-item"><a href="#" class="nav-link">Stay Clever</a></li>  
                        <!--If i remove onclick and just use an href, does this get rid of the AJAX functionality? I think it does...-->
                        <!--Perhaps I should just stick with going for the illusion for now...-->
                        <li>
                            <!-- LOGO BEGIN -->
                            <a href="#" class="navbar-brand-righ">
                                <img src="http://localhost/clevertech/images/ct_small_logo.png" width="25" height="25" alt="" style="display:inline"> CleverTech
                            </a>
                            <!-- LOG END -->   
                        </li>
                        
                    </ul>
   
                </div>
            </div>
        </nav>
        <!--CleverTech logo with subtitle-->
        <!--<div style="padding:35px"><img id="ct_logo_subtitles" src="images/CT_with_subtitle.png"> </div>-->

    
        <!-- THE CONTENT BEGIN-->

        
        <!--Perhaps I should add back the carousel code here?-->
        <!--
        <div class="row">
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <div id="years_exp_jumbo" class="jumbotron">
                        
                    </div>
                </div>

                <div class="item">
                    <div id="free_diag_jumbo" class="jumbotron">

                    </div>
                </div>

                <div class="item">
                    <div id="repair_jumbo" class="jumbotron">

                    </div>
                </div>

                <div class="item">
                    <div id="comm_jumbo" class="jumbotron">

                    </div>
                </div>

                <div class="item">
                    <div id="your_clev_jumbo" class="jumbotron">

                    </div>
                </div>

            </div>

            <a class="left carousel-control" href="#my_carousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            </a>
            <a class="right carousel-control" href="#my_carousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            </a>
        </div>
        -->
        
        
        <!-- SECTION 1 BEGIN -->
        <div class="row" id="section1" >
            <h2>Select Your Device To Start Repair</h2>

            <div class="center">
                <!-- THUMBNAILS BEGIN -->
                <div class="col-md-3">
                    <a href="http://localhost/clevertech/index.php?uri=services" class="thumbnail">
                        <img src="http://localhost/clevertech/images/imac_r.jpg">
                        <label class="rep_pic_label">iMac</label>
                    </a>
                </div>

                <div class="col-md-3">
                    <a href="http://localhost/clevertech/index.php?uri=services" class="thumbnail">
                        <img src="http://localhost/clevertech/images/iphone_r.jpg">
                        <label class="rep_pic_label">iPhone</label>
                    </a>
                </div>

                <div class="col-md-3">
                    <a href="http://localhost/clevertech/index.php?uri=services" class="thumbnail">
                        <img src="http://localhost/clevertech/images/ipad_r.jpg">
                        <label class="rep_pic_label">iPad</label>
                    </a>
                </div>

                <div class="col-md-3">
                    <a href="http://localhost/clevertech/index.php?uri=services" class="thumbnail">
                        <img src="http://localhost/clevertech/images/macbook_r.jpg">
                        <label class="rep_pic_label">Macbook</label>
                    </a>
                </div>
                <!-- THUMBNAILS BEGIN -->
            </div>
        </div>
        <!-- SECTION 1 END -->



        <!-- SECTION 2 BEGIN -->
        <div class="row" id="section2">
            <div class="center">
                <div class="col-sm-4">
                    <p style="text-align: center; font-size: 20px;">Device &amp; Problem</p>
                </div>
                <div class="col-sm-4">
                    <p style="text-align: center; font-size: 20px;">Schedule or Walk In</p>
                </div>
                <div class="col-sm-4">
                    <p style="text-align: center; font-size: 20px;">Get fixed</p>
                </div>
            </div>
        </div>
        <!-- SECTION 2 END -->




        <!-- SECTION 3 BEGIN -->
        <div class="row" id="section3">

                
                <div class="col-md-6 col-md-offset-3" id="ct_vid">

                        <div class="embed-responsive embed-responsive-16by9" style="border-radius: 10px; width: 100%; overflow: hidden;">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/QGKvYpL4DRU?ecver=2"></iframe>
                        </div>

                        <ul class="soc" style="padding-top: 30px;">
                            <li><a class="soc-facebook" href="#"></a></li>
                            <li><a class="soc-instagram" href="#"></a></li>
                            <li><a class="soc-tumblr" href="#"></a></li>
                            <li><a class="soc-twitter" href="#"></a></li>
                            <li><a class="soc-youtube" href="#"></a></li>
                            <li><a class="soc-yelp soc-icon-last" href="#"></a></li>
                            <!--<li><a class="soc-yelp" href="#"></a></li>-->
                        </ul>

                        <div id="contact_info">
                            <dl style="display: inline-block;">
                                <dt>Address:</dt>
                                <dd>1150 Murphy Ave, Ste 205</dd>
                                <dd>San Jose, CA 95131<df/>
                            </dl>
                            
                            <dl style="display: inline-block; padding-left: 30px;">
                                <dt>Hours:</dt>
                                <dd>MON - FRI : 9AM - 7PM</dd>
                                <dd>SAT - SUN : 10AM - 6PM</dd>
                                <!--<a style="display:inline-block" href="#"><img src="http://localhost/clevertech/images/phone_call.png"></a>-->
                                <!--Let this anchor tag have a display of inline-block so it doesn't extend across the thumbnail-->
                            </dl>

                            <dl>
                                <dt>Phone Number:</dt>
                                <dd>408-316-7600</dd>
                            </dl>


                        </div>

                </div>
            
        </div>
        
        <footer class="row">
            <p style="text-align: center; padding-top: 15px;"><strong>CleverTech © ALL RIGHTS RESERVED.</strong></p>
        </footer>
        <!-- THE CONTENT END -->
        
        
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>  
        <script language="JavaScript" type="text/javascript">
            
            $("#mac_repr_btn").click(function() {

                //console.log($("#mac_repairs").css("display"));
                
                if ($("#mac_repairs").css("display") === "none") {
                    $("#tab_mob_repairs").css("display", "none");
                    $("#mac_repairs").css("display", "block");
                }
            });
            
            
            $("#tab_mob_repr_btn").click(function() {
                //console.log($("#tab_mob_repairs").css("display"));
                
                if ($("#tab_mob_repairs").css("display") === "none") {
                    
                    $("#mac_repairs").css("display", "none");
                    $("#tab_mob_repairs").css("display", "block");
                }
            })
            
            
            $(document).ready(function(){
                $('.carousel').carousel({
                //interval: 6000
                interval: false  //Just say false for testing!
                })
            });
            
            
            function load_home() {
                $.ajax("views/home.php").done(function(data) {
                    
                    $("#content").html(data);
                    
                }).fail(function() {

                    alert("Could not get data!");

                });   
            }
            
            
            function load_services() {                
                
                $.ajax("views/services.html").done(function(data) {
                //$.ajax("http://localhost/clevertech/index.php?uri=services").done(function(data) { //Actually loads the entire index.php?
                    $("#content").html(data);
                    
                    //window.history.pushState("Details", "Title", "/services");
                    
                    //window.history.pushState("Details", "Title", "<? //php echo(base_url()); ?>/services");
                    //WEIRD. uncommenting php echo() would make it so that references to these javascript functions no longer exist
                    
                }).fail(function() {

                    alert("Could not get data!");

                });      
            }

            
            function load_store() {                
                
                $.ajax("views/store.html").done(function(data) {
                    
                    $("#content").html(data);
                    
                }).fail(function() {

                    alert("Could not get data!");

                });       
            }
  

            function load_contact() {                
                
                $.ajax("views/contact.html").done(function(data) {
                    
                    $("#content").html(data);
                    
                }).fail(function() {

                    alert("Could not get data!");

                });       
            }
            
            
            function load_stay_clever() {                
                
                $.ajax("views/stay_clever.html").done(function(data) {
                    
                    $("#content").html(data);
                    //window.history.pushState("Details", "Title", "/services");
                    
                }).fail(function() {

                    alert("Could not get data!");

                });       
            }
            
            
            function load_open_ticket() {
                $.ajax("views/open_ticket.html").done(function(data) {
                    
                    $("#content").html(data);
                    
                }).fail(function() {

                    alert("Could not get data!");

                });  
            }
            
            
            $("#mac_repr_btn").click(function() {

                if ($("#mac_repairs").css("display") === "none") {
                    $("#tab_mob_repairs").css("display", "none");
                    $("#mac_repairs").css("display", "block");
                }
            });


            $("#tab_mob_repr_btn").click(function() {
                //console.log("HELLO!");

                if ($("#tab_mob_repairs").css("display") === "none") {

                    $("#mac_repairs").css("display", "none");
                    $("#tab_mob_repairs").css("display", "block");
                }
            })
        </script>
    </body>
</html>
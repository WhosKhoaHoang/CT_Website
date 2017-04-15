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
    
    <body data-spy="scroll" data-target="#my_navbar"> <!--data-spy and data-target are for jumping to particular sections of the page through links-->
        
        <!-- THE NAVBAR BEGIN -->
        <nav class="navbar navbar-default navbar-fixed-top" id="my_navbar">
            <div class="container">
                <div class="navbar-header">
                    <!--This "accordion" button shows up and contains the navbar links once the viewport has been adequately collapsed collapsed-->
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
                    <!-- LOG END -->  
                </div>

                <!-- Collect the nav links, forms, and other content for toggling when user collapses window -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav" style="float: left;">
                        <li class="nav-item"><a href="#services" class="nav-link">Services</a></li>
                        <li class="nav-item"><a href="#how_it_works" class="nav-link">How It Works</a></li>
                        <li class="nav-item"><a href="#stay_clever" class="nav-link">Stay Clever</a></li>  
                    </ul>
                    
                    <!-- START REPAIR BUTTON BEGIN -->
                    <!--Setting this div with class navbar-form aligns everything properly.-->
                    <!--navbar-right will push this button to the far right.-->
                    <div class="navbar-right" style="padding-top: 10px; padding: 10px;">
                        <a href="#" id="open_ticket_btn" class="btn">Start Repair</a>
                        <!--<button id="open_ticket_btn" class="btn" onclick="load_open_ticket()">Open a Ticket</button>-->
                    </div>
                    <!-- START REPAIR BUTTON END -->
                </div>

            </div>
        </nav>
        <!-- THE NAVBAR END-->
        <!--CleverTech logo with subtitle-->
        <!--<div style="padding:35px"><img id="ct_logo_subtitles" src="images/CT_with_subtitle.png"> </div>-->
        
        
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
        <div class="jumbotron" id="services" style="text-align: center;">
            <div id="services_content">
                <h1>Select Your Device &amp; Tell Us Your Problem</h1>
            </div>
        </div>
        <!-- SECTION 2 END -->




        <!-- SECTION 3 BEGIN -->
        <div class="jumbotron" id="how_it_works" style="text-align: center;">
            <div id="how_it_works_content">
                <h1 style="position: relative; top: -100px;">How It Works</h1>
                
                <div class="btn how_it_works_btn">1. Device &amp; Problem</div>
                <div class="btn how_it_works_btn">2. Schedule Pick-Up</div>
                <div class="btn how_it_works_btn">3. Get It Fixed</div>

            </div>
        </div>
        <!-- SECTION 3 END -->

        
        
        <!-- STAY CLEVER BEGIN -->
        <div class="jumbotron" id="stay_clever" style="text-align: center;">
            <div id="stay_clever_content">
                <h1>Welcome to CleverTech</h1>
                <p>We're here to help.</p>
            </div>
        </div>
        <!-- STAY CLEVER END -->


        <!-- THE CONTENT END -->
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>  
        <script language="JavaScript" type="text/javascript">
            
            $("body").scrollspy({ target: "#my_navbar" });

            
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
                interval: 6000
                //interval: false  //Just say false for testing!
                })
            });
            

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
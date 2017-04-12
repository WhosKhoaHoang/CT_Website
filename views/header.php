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
        <link rel="stylesheet" href="//fonts.googleapis.com/css?family=PT+Sans" />
    </head>
    
    <body data-spy="scroll" data-target="#my_nav_bar">
        
        <!--THE NAVBAR-->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <!--This "accordion" button shows up and contains the navbar links once the viewport has been adequately collapsed collapsed-->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="http://localhost/clevertech/index.php?uri=" class="navbar-brand">
                        <img src="http://localhost/clevertech/images/ct_small_logo.png" width="25" height="25" alt="" style="display:inline"> CleverTech
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="nav-item"><a href="http://localhost/clevertech/index.php?uri=" class="nav-link">Home</a></li>
                        <li class="nav-item"><a href="http://localhost/clevertech/index.php?uri=services" class="nav-link">Services</a></li>
                        <!--<li class="nav-item"><a class="nav-link" onclick="load_store()">Store (WILL DROP)</a></li>-->
                        <!--<li class="nav-item"><a class="nav-link" onclick="load_contact()">Contact (WILL DROP)</a></li>-->
                        <li class="nav-item"><a href="http://localhost/clevertech/index.php?uri=stay_clever" class="nav-link">Stay Clever</a></li>  
                        <!--If i remove onclick and just use an href, does this get rid of the AJAX functionality? I think it does...-->
                        <!--Perhaps I should just stick with going for the illusion for now...-->
                    </ul>

                    <!--Setting this div with class navbar-form aligns everything properly.-->
                    <!--navbar-right will push this button to the far right.-->
                    <div class="navbar-form navbar-right">
                        <a href="http://localhost/clevertech/index.php?uri=open_ticket" id="open_ticket_btn" href="http://google.com" class="btn">Open a Ticket</a>
                        <!--<button id="open_ticket_btn" class="btn" onclick="load_open_ticket()">Open a Ticket</button>-->
                    </div>
                </div>
            </div>
        </nav>
        
        <div id="content">

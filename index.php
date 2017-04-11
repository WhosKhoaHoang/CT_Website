<?php include("views/header.php"); ?>

    <div id="content">
        
        <?php 
            //Should all links clicked on any webpage be redirected to index.php? This is made possible by
            //what's written in .htaccess. Think: it makes sense for this to happen, since an index is something
            //that would be used to navigate the contents of something -- e.g., a website!!!
            
            //All the following is for if the user wants to go to a particular page directly from the address bar
            $uriGetParam = isset($_GET["uri"])? "/".$_GET["uri"] : "/";
            if ($uriGetParam == "/") {
                echo("IN HOME!!!!!");
                include("views/home.php");
                
            }
            else if ($uriGetParam == "/services") {
                echo("IN SERVICES!!!!!");
                include("views/services.html");
                
            }
            else if ($uriGetParam == "/stayclever"){
                echo("IN STAY CLEVER!!!!!");
                include("views/stay_clever.html");
            }
            
        ?>
        
    </div>

<?php include("views/footer.php"); ?>
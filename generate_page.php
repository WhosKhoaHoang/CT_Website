<!--Should I have something like this?-->
<div id="content">
    <?php

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
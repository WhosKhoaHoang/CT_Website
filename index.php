<?php include("views/header.php"); ?>

    <div id="content">
        
        <?php 
            //echo $test = isset($_GET["uri"])? "/".$_GET["uri"] : "/";
            //echo(isset($_GET["uri"]));    
            
            /*
            if ($_GET["uri"] == "/") {
        
                include("views/home.php");
            }
            */
            include("views/home.php");

        ?>
    </div>

<?php include("views/footer.php"); ?>
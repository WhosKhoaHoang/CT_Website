<?php

    /*
    $error = ""; $successMessage = "";
    function phpAlert($msg) {
        echo '<script type="text/javascript">alert("' . $msg . '")</script>';
    }

    //If there's anything in the $_POST array...(wouldn't it be better to use isset? No because $_POST is always
    //gonna be set with something so the inside of the if block would always be executed?
    if ($_POST) { //I.e., return true was executed in the the submit() method.
                
        if (!$_POST["contact_us_name"]) {
            $error .= "- Your full name is required.<br/>";
        }
        if (!$_POST["contact_us_email"]) {
            $error .= "- Your email is required.<br/>";
        }
        if ($_POST["contact_us_email"] && filter_var($_POST["contact_us_email"], FILTER_VALIDATE_EMAIL === false)) {
            $error .= "- The email address you entered is not valid.<br/>";
        }
        if (!$_POST["contact_us_subject"]) {
            $error .= "- A subject is required<br/>";
        }
        if (!isset($_POST["contact_us_msg"])) {
            $error .= "- Your city is required<br/>";
        }

    }
    */

    //echo "<script language='javascript'>alert('COOL!')</scipt>";
    header("Location: index.php");

?>
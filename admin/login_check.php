<?php

include_once "includes/html_top.php";

$heading = "Website Management"; 

include_once "includes/php_header.php";

include_once "includes/html_header.php";

if(!isset($_SESSION['loggedin']) || $_SESSION["loggedin"] != true) {

echo "<p id='login'>You need to <a href='login.php'>log in</a> before you can access this content.</p>";
       
exit;

}

?>
<?php

include_once "includes/html_top.php";

session_start();

include_once "login_check.php";

include_once "includes/php_header.php";

$heading = "Messages Management";

include_once "includes/html_header.php";

?>

<h1><?php echo $heading; ?></h1>

<h2>Welcome to the website management!</h2>

<h3><?php echo date("F j, Y g:d a") ?></h3>

To view and delete messages, please click the relative link.

<?php

include_once "/includes/footer.php";

?>


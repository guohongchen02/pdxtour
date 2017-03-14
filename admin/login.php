<?php

include_once "includes/html_top.php";

include_once "includes/php_header.php";

$heading = "Login Form"

?>

<?php

include_once "includes/html_header.php";

?>


<h1><?php echo $heading; ?></h1>
<h2><?php echo $programmer_name; ?></h2>

<?php  

if(isset($_GET["logout"]) && $_GET["logout"]==1){
          echo "<em>Successfully logged out.</em>";
}

?>

<form style="text-align:center;" id="form1" method="post" action="login2.php">

<p>Username: <input type="text" name="username"></p>

<p>Password: <input name="password" type="password"></p>

<input type="submit" value="Log in"><br />

</form>

<script>document.getElementById('form1').elements[0].focus();</script>

</body>

</html>

<?php

include_once "includes/footer.php";

?>
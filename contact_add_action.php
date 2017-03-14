<!DOCTYPE html>

<html lang="en">
	
<head>
	
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="author" content="Guohong Chen">
	
<title>Contact Us | Portland Historical Tours</title>	
	
<link rel="stylesheet" href="css/style.css">
<script src='script/jquery.min.js'></script>	
<script src="script/menu.js"></script>	
	
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<script src=”http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js”></script>
<![endif]-->


	
</head>
	
<body>

  <header>
	<a href="index.php"><img src="images/Logo.png" alt="Portland Tours Logo"></a>
    <h1>Welcome to Portland</h1>
  </header>
	
<?php require_once ('includes/nav.php'); ?>
	
  <section>
    <article>
      <h2>If you have any question, please contact us.</h2>
<?php
		
// ARRAYS

// -- CREATE ARRAY OF FORM FIELD NAMES SO WE CAN LOOP THROUGH THEM
//    This is an associative array, meaning that each of the variables in the array is given a name.

$form_fields=array();
		
$form_fields["name"]="text";
$form_fields["email"]="text";
$form_fields["subject"]="text";
$form_fields["message"]="textarea";



// ==========================================================		

include_once "admin/includes/functions.php";		
		
// -- CHECK EACH FIELD FOR MISSING DATA AND SANITIZE

foreach ($form_fields as $key => $value) { // Loop through form fields. Key is the name of the field, value is type of field

     check_submitted($key, $value, $missing_count);

     sanitize($key, $value, $_POST[$key]); // ESPECIALLY IMPORTANT NOW THAT WE ARE INSERTING INTO A DATABASE
     
}

// exit if missing data in any but checkboxes

if($missing_count > 0) {

     echo "<br />Please <a href='contact.php'>Go Back</a> and fill in the missing data.<br>";
     exit;

}
		
		
		
// ASSIGN DATA TO VARIABLES FOR EASIER HANDLING
$name=$_POST["name"];
$email=$_POST["email"];
$subject=$_POST["subject"];
$message=$_POST["message"];



// CONNECT TO DATABASE (Step 1)

include_once "admin/includes/connection.php";

// SQL STATEMENT

$sql="INSERT INTO contact(name, email, subject, message)"
 . " VALUES('$name', '$email', '$subject', '$message');"; 

     
// Display SQL for learning and trouble-shooting
     
// echo "<p>2. Your message: " . $sql . "</p>";
echo "<p>2. Your message: <br>" . "Name: " . $name . "<br>Email" . $email . "<br>Subject: " . $subject . "<br>Message: " . $message . "</p>";		

// RUN QUERY
     
// Run a query
try {
     $result = $connection->query($sql);
     echo "<p>3. Your message has been successfully submitted!</p>";
} 
catch (PDOException $e) {
     die("<p>3. Query failed! </p>" . $e->getMessage());
}

// link to view guestbook page
echo "<p><a href='contact.php'>BACK!</a></p>";

?>
    </article>
  
     <?php require_once ('includes/aside.php'); ?>
   
  </section>
	
  <footer>Call: 971-722-5695 <br>
	      Address: Cascade Campus, TEB 206, Portland Community College<br>
	 	  Copyright @ 2017 Portland Historical Tours<br>
  </footer>
	
</body>
	
</html>

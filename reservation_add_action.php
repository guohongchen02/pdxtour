<!DOCTYPE html>

<html lang="en">
	
<head>
	
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="author" content="Guohong Chen">
	
<title>Book a Reservation | Portland Historical Tours</title>	
	
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
      <h2>Book a Reservation</h2>
		
<?php
		
// ARRAYS

// -- CREATE ARRAY OF FORM FIELD NAMES SO WE CAN LOOP THROUGH THEM
//    This is an associative array, meaning that each of the variables in the array is given a name.

$form_fields=array();
		
$form_fields["tour"]="select";
$form_fields["firstname"]="text";
$form_fields["lastname"]="text";
$form_fields["email"]="text";
$form_fields["phone"]="text";
$form_fields["tdate"]="select";
$form_fields["participants"]="text";
$form_fields["comments"]="textarea";

// ==========================================================		

include_once "admin/includes/functions.php";		
		
// -- CHECK EACH FIELD FOR MISSING DATA AND SANITIZE

foreach ($form_fields as $key => $value) { // Loop through form fields. Key is the name of the field, value is type of field

     check_submitted($key, $value, $missing_count);

     sanitize($key, $value, $_POST[$key]); // ESPECIALLY IMPORTANT NOW THAT WE ARE INSERTING INTO A DATABASE
     
}

// exit if missing data in any but checkboxes

if($missing_count > 0) {

     echo "<p>Please <a href='reservation.php'>Go Back</a> and fill in the missing data.</p>";
     exit;

}
		
		
		
// ASSIGN DATA TO VARIABLES FOR EASIER HANDLING
$tour=$_POST["tour"];
$firstname=$_POST["firstname"];
$lastname=$_POST["lastname"];
$email=$_POST["email"];
$phone=$_POST["phone"];
$tdate=$_POST["tdate"];
$participants=$_POST["participants"];
$comments=$_POST["comments"];



// CONNECT TO DATABASE (Step 1)

include_once "admin/includes/connection.php";

// SQL STATEMENT

$sql="INSERT INTO reservation(tour, firstname, lastname, email, phone, tdate, participants, comments)"
. " VALUES('$tour', '$firstname', '$lastname', '$email', '$phone', '$tdate', '$participants', '$comments');"; 

     
// Display SQL for learning and trouble-shooting
     
// echo "<p>2. Your Reservation: " . $sql . "</p>";
echo "<p>2. Your Reservation: " . "<br>Tour: " . $tour . "<br>First Name: " . $firstname . "<br>Last Name: " . $lastname . "<br>Email" . $email . "<br>Phone: " . $phone . "<br>Tour date: " . $tdate . "<br>Total Participants: " . $participants . "<br>Comments: " . $comments . "</p>"; 
	

// RUN QUERY
     
// Run a query
try {
     $result = $connection->query($sql);
     echo "<p>3. Your Reservation has been successfully submitted!</p>";
} 
catch (PDOException $e) {
     die("<p>3. Query failed! </p>" . $e->getMessage());
}

// link to view guestbook page
echo "<p><a href='reservation.php'>BACK!</a></p>";

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

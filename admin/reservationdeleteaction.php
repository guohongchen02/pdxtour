<?php

include_once "includes/html_top.php";

session_start();

include_once "login_check.php";

include_once "includes/php_header.php";

$heading = "Reservation Delete Action Page";

$form_fields=array();

$form_fields["id"]="select";

include_once "includes/functions.php";

include_once "includes/html_header.php";

echo "<h1>" . $heading . "</h1>";


if(!isset($_POST["confirm_delete"])) {  // Run only if coming from the current page

    foreach ($form_fields as $key => $value) { // Loop through form fields. Key is the name of the field, value is type of field

         check_submitted($key, $value, $missing_count);

         sanitize($key, $value, $_POST[$key]); // ESPECIALLY IMPORTANT NOW THAT WE ARE INSERTING INTO A DATABASE
     
    }
	
    // exit if missing data in any but checkboxes
	
    if($missing_count > 0) {
         echo "<br />Please <a href='reservationdelete.php'>Go Back</a> and fill in the missing data.<br /><br /></body></html>";
         exit;
    }
	
    // ASSIGN DATA TO VARIABLES FOR EASIER HANDLING
    $id = $_POST['id'];
	
    // CONNECT TO DATABASE (Step 1)

    include_once "includes/connection.php";

    // SQL STATEMENT: Find record that is about to be deleted
	
    $sql="SELECT *"
    . " FROM reservation"
    . " WHERE reservation.ID=$id;";
		
    // Display SQL for learning and trouble-shooting
		
    echo "<br>2. SQL: " . $sql . "<br>";
	
    // RUN QUERY
	
     try {
          $result = $connection->query($sql);
          echo "3. Query succeeded! " . $result->rowCount() . " rows returned.<br>";
     } 
     catch (PDOException $e) {
          die("3. Query failed! " . $e->getMessage());
     }
	
    // GET DATA FOR RECORD THEY SELECTED
    // Assign array elements to variables for easier handling
    while($rows = $result->fetch(PDO::FETCH_ASSOC)) {
	

		 $id = $rows["id"];
		 $tour = $rows["tour"];
		 $firstname = $rows["firstname"];
		 $lastname = $rows["lastname"];
		 $email = $rows["email"];
		 $phone = $rows["phone"];
		 $tdate = $rows["tdate"];
		 $participants = $rows["participants"];
		 $comments = $rows["comments"];

    } 
	
     // WARN THE USER 

     echo "<p style='color:red;'>You are about to delete the following data:</p>";
   
     echo "ID: " .  $id  . "<br />";
	 echo "Tour: " .  $tour  . "<br />";
	 echo "Firstname: " .  $firstname  . "<br />";
	 echo "Lastname: " .  $lastname  . "<br />";
	 echo "Email: " .  $email  . "<br />";
	 echo "Phone: " .  $phone  . "<br />";
	 echo "Tdate: " .  $tdate  . "<br />";
	 echo "Participants: " .  $participants  . "<br />";
	 echo "Comments: " .  $comments  . "<br />";

     echo "<form method='post' action='reservationdeleteaction.php'>"; // Submitting to this same page again
     echo "<br />Are you SURE you want to delete this record (Y/N)? ";
     
          // Display select box with 2 options
     echo "<select name='confirm_delete'>";
     echo "<option value='N'>N</option>";
     echo "<option value='Y'>Y</option>";
     echo "</select>";
     
     echo "<input type='hidden' name='id' value='$id'>"; // Send id back to page when we submit it

     echo "<input type='submit' value='Submit'>";

     echo "</form>";
     echo "<br />";

     echo "<a href='reservationdelete.php'>Return to Delete Form</a>";

     exit;

} // END IF BLOCK $_POST["id"] (started in step 4)

// PROCESS DELETE IF "Y" CHOSEN (only runs after this page has been submitted back to itself)

if ($_POST["confirm_delete"] == "Y") {
	
	// CONNECT TO DATABASE (Steps 1 and 2)
	
	include_once "includes/connection.php";
	
	// ASSIGN SUBMITTED ID TO A VARIABLE FOR EASIER HANDLING
	
	$id = $_POST["id"];
	
	// SQL STATEMENT
	
     $sql="DELETE"
     . " FROM reservation"
     . " WHERE reservation.id=$id"
     . " LIMIT 1;"; 
     
	// Display SQL for learning and trouble-shooting
		
	echo "<br>2. SQL: " . $sql . "<br>";
	
		// RUN QUERY
	
 try {
          $result = $connection->query($sql);
          echo "Query succeeded! The record was deleted.<br>";
     } 
     catch (PDOException $e) {
          die("3. Query failed! " . $e->getMessage());
     }
    
     // link to view page
     echo "<p><a href='reservation.php'>View Reservation</a></p>";
	
} // END IF BLOCK $_POST["confirm_delete"]...
	
     
else { // If they got this far, they submitted this page and chose "N" -- they do *not* want to delete.

	echo "<p style='color:red;'>Action canceled.</p>";
	
	echo "<p><a href='reservationdelete.php'>Return to Delete Form</a></p>";

}

// ===================================================== 
// FOOTER -->

include_once "includes/footer.php";

?>
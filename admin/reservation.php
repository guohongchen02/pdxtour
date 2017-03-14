<?php

include_once "includes/html_top.php";

session_start();

include_once "login_check.php";
 
include_once "includes/php_header.php";

$heading = "View Reservation";

$form_fields=array();

$form_fields["tour"]="text";
$form_fields["firstname"]="text";
$form_fields["lastname"]="text";
$form_fields["email"]="text";
$form_fields["phone"]="text";
$form_fields["tdate"]="text";
$form_fields["participants"]="text";
$form_fields["comments"]="text";

include_once "includes/functions.php";

include_once "includes/html_header.php";

echo "<h1>" . $heading . "</h1>";

include_once "includes/connection.php";

$sql="SELECT *"
. " FROM reservation"
. " ORDER BY reservation.id;";

echo "<br>2. SQL: " . $sql . "<br>";

try {
     $result = $connection->query($sql);
     echo "3. Query succeeded! " . $result->rowCount() . " rows returned.<br>";
} 
catch (PDOException $e) {
     die("3. Query failed! " . $e->getMessage());
}

echo "<table class='shade viewTable'>";
echo "<tr>";
echo "<th>ID</th><th>Tour</th><th>First Name</th><th>Last Name</th><th>E-mail</th><th>Phone</th><th>Tour Date</th><th>Total Participants</th><th>Other</th><th>Date/Time</th>";
echo "</tr>";

while($rows = $result->fetch(PDO::FETCH_ASSOC)) {
     
	 $mydate = $rows['datetime'];
	 $rows['datetime'] = date('m/d/y h:i a', strtotime($mydate));
	
     echo "<tr>";
     
     echo "<td>" . $rows['id'] . "</td>";
     echo "<td>" . $rows['tour'] . "</td>";
     echo "<td>" . $rows['firstname'] . "</td>";
	 echo "<td>" . $rows['lastname'] . "</td>";
	 echo "<td>" . $rows['email'] . "</td>";
	 echo "<td>" . $rows['phone'] . "</td>";
	 echo "<td>" . $rows['tdate'] . "</td>";
	 echo "<td>" . $rows['participants'] . "</td>";
	 echo "<td>" . $rows['comments'] . "</td>";
     echo "<td>" . $rows['datetime'] . "</td>";
     
     echo "</tr>";
}

echo "</table>";

include_once "includes/footer.php";

?>
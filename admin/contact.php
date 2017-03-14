<?php

include_once "includes/html_top.php";

session_start();

include_once "login_check.php";
 
include_once "includes/php_header.php";

$heading = "Contact messages View";

$form_fields=array();

$form_fields["name"]="text";
$form_fields["email"]="text";
$form_fields["subject"]="text";
$form_fields["message"]="text";

include_once "includes/functions.php";

include_once "includes/html_header.php";

echo "<h1>" . $heading . "</h1>";

include_once "includes/connection.php";

$sql="SELECT *"
. " FROM contact"
. " ORDER BY contact.id;";

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
echo "<th>ID</th><th>Name</th><th>E-mail</th><th>Subject</th><th>Message</th><th>Date/Time</th>";
echo "</tr>";

while($rows = $result->fetch(PDO::FETCH_ASSOC)) {
     
	 $mydate = $rows['datetime'];
	 $rows['datetime'] = date('m/d/y h:i a', strtotime($mydate));
	
     echo "<tr>";
     
     echo "<td>" . $rows['id'] . "</td>";
     echo "<td>" . $rows['name'] . "</td>";
	 echo "<td>" . $rows['email'] . "</td>";
	 echo "<td>" . $rows['subject'] . "</td>";
	 echo "<td>" . $rows['message'] . "</td>";
     echo "<td>" . $rows['datetime'] . "</td>";
     
     echo "</tr>";
}

echo "</table>";

include_once "includes/footer.php";

?>
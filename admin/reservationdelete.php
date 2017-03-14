<?php

include_once "includes/html_top.php";

session_start();

include_once "login_check.php";
 
include_once "includes/php_header.php";

$heading = "Reservation Delete Page";

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

echo "<form id='form1' name='form1' method='post' action='reservationdeleteaction.php'>";

echo "<table class='viewTable shade'>";
echo "<tr class='addRecord'>";
echo "<td class='col1'>Choose a record to delete:</td>";
echo "</tr>";

echo "<tr class='addRecord'>";
echo "<td class='col1'>";

$field_name1 = "id";

$field_name2 = "tour";

$field_name3 = "firstname";

$field_name4 = "lastname";

$field_name5 = "email";

$field_name6 = "phone";

$field_name7 = "tdate";

$field_name8 = "participants";

$field_name9 = "comments";

$list = multi_select_box1($field_name1, $field_name2, $field_name3, $field_name4, $field_name5, $field_name6, $field_name7, $field_name8, $field_name9, $result);

echo "$list";

echo "</td>";
echo "</tr>";

echo "<tr class='addRecord'>";

echo "<td class='col1'><input type='submit' name='Submit' value='Submit' /></td>";

echo "</tr>";

echo "</table>";

echo "</form>";

echo "<script>document.getElementById('form1').elements[0].focus();</script>"; 

include_once "includes/footer.php";

?>
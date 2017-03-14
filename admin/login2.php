<?php

session_start();

$missing_count = 0;

$username = $_POST["username"];
$password = $_POST["password"];
   
$hashed_password=sha1($password);

include_once "includes/functions.php";

foreach ($_POST as $key => $value) { // Loop through form fields. Key is the name of the field, value is type of field

     check_submitted($key, $value, $missing_count);

     sanitize($key, $value, $_POST[$key]); // ESPECIALLY IMPORTANT NOW THAT WE ARE INSERTING INTO A DATABASE
     
}

if($missing_count > 0) {

     echo "<br />Please <a href='login.php'>Go Back</a> and fill in the missing data.<br /><br /></body></html>";
     exit;

}

include_once "includes/connection.php";
   
$sql = "SELECT username, permissions "
         . "FROM admin "
         . "WHERE username = '$username' "
         . "AND password = '$hashed_password' "
         . "LIMIT 1;";
 
echo "<br>3. SQL: " . $sql . "<br>";

try {
     $result = $connection->query($sql);
     echo "3. Query succeeded! " . $result->rowCount() . " rows returned.<br>";
} 
catch (PDOException $e) {
     die("3. Query failed! " . $e->getMessage());
}
         
if($result->rowCount()==1){
        
          $found_user = $result->fetch(PDO::FETCH_ASSOC);

          $_SESSION["loggedin"] = true;
          $_SESSION["username"] = $found_user["username"];
          $_SESSION["permissions"] = $found_user["permissions"];

          header("Location: index.php");
} 

 else {
          echo "<p class='red' id='login'>Wrong username or password! Please <a href='login.php'>Go Back</a> and try again.</p>";
 }

include_once("includes/footer.php");

?>

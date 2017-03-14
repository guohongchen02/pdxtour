<?php

define("DB_DSN", "mysql:host=localhost;dbname=pdxtours;charset=utf8");
define("DB_USER", "root");
define("DB_PASS", "");


try {
     
     $connection = new PDO(DB_DSN,DB_USER,DB_PASS);
     
     $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     
     echo "<p>1. Congratulations!</p>";
} 
catch (PDOException $e) {
     die("<p>1. Database connection failed: </p>" . $e->getMessage());
}

?>

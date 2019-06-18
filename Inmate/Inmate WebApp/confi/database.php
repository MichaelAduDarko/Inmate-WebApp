<?php
$host = "localhost:8889";
$db_name= "jail";
$username= "root";
$password = "root";

try {
    $con =new PDO("mysql:host={$host}; dbname={$db_name}",$username, $password);

}
     //show error
     catch (PDOException $execption){
         echo "Connection error: ". $exception->getMessage();
     }
?>

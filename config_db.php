<?php
$servername = "localhost";
$username="root";
$password ="";
$dbname="gallery";

try{
$conn = new mysqli($servername,$username,$password,$dbname);}
catch(Exception $e){
    die("Connection failed: ".$conn->connect_error);
}

?>
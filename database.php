<?php
$servername = "setapproject.org";
$username = "csc412";
$password = "csc412";
$dbname = "csc412";

// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);
 // Check connection
 if ($con->connect_error) {
     die("Connection failed: " . $con->connect_error);
 }else {
         echo 'Connection successful.';
         echo PHP_EOL;
     }
 
$quote = mysqli_real_escape_string($con, $_GET['quote']);     
$author = mysqli_real_escape_string($con, $_GET['author']);     

if (!($quote == '' || $author == '')){
    $sql = "INSERT INTO KhalidsTable (quote, author) VALUES ('$quote', '$author')";
    
    if (!mysqli_query($con, $sql)){
    die('Error: ' . mysqli_error($con));
    }
}

$result = mysqli_query($con, "SELECT * FROM KhalidsTable");

echo $result;


mysqli_close($con);
 ?> 
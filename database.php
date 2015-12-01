<?php
$servername = "setapproject.org";
$username = "csc412";
$password = "csc412";
$dbname = "csc412";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
 // Check connection
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 }else {
         echo 'Connection successful';    
     }
 
$quote = mysqli_real_escape_string($conn, $_GET('Quote'));     
$author = mysqli_real_escape_string($conn, $_GET('Author'));     

if (!($quote == '' || $author == '')){
    $sql = "INSERT INTO Khalid'sTable VALUES ('Quote', 'Author')";
    mysql_query($sql);
    if (!mysqli_query($conn, $sql)){
    die('Error: ' . mysqli_errno($conn));
    }
}

$result = mysqli_query($conn, "SELECT * FROM Khalid'sTable");

echo $result;

$conn->close();
 ?> 
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
         echo "Connection successful.\n\n";
     }
 
$name = mysqli_real_escape_string($con, $_GET['name']);     
$email = mysqli_real_escape_string($con, $_GET['email']);
$number = mysqli_real_escape_string($con, $_GET['number']); 

if (!($quote == '' || $author == '')){
    $sql = "INSERT INTO KhalidsTable2 (name, email, number) VALUES ('$name', '$email', '$number')";
    
    if (!mysqli_query($con, $sql)){
    die('Error: ' . mysqli_error($con));
    }
}

$query = "SELECT name, email, number FROM KhalidsTable2 ORDER BY KhalidsTable.index DESC LIMIT 1";

if ($result = mysqli_query($con, $query)) {
    
    printf("Data sent:");
    
    while ($row = mysqli_fetch_assoc($result)) {
        printf ("\nName: %s\nEmail: %s\nPhone Number: %s", $row["name"], $row["email"], $row["number"]);
    }

    mysqli_free_result($result);
}

mysqli_close($con);

 ?> 
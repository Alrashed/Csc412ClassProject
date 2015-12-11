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
      
$email = mysqli_real_escape_string($con, $_GET['email']);
$message = mysqli_real_escape_string($con, $_GET['message']); 

if (!($email == '' || $message == '')){
    $sql = "INSERT INTO KhalidsTable2 (email, message) VALUES ('$email', '$message')";
    
    if (!mysqli_query($con, $sql)){
    die('Error: ' . mysqli_error($con));
    }
}

$query = "SELECT email, message FROM KhalidsTable2 ORDER BY KhalidsTable2.index DESC LIMIT 1";

if ($result = mysqli_query($con, $query)) {
    
    printf("Data sent:");
    
    while ($row = mysqli_fetch_assoc($result)) {
        printf ("\nEmail: %s\nMessage: %s", $row["email"], $row["message"]);
    }

    mysqli_free_result($result);
}

mysqli_close($con);

 ?> 
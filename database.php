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
 
$quote = mysqli_real_escape_string($con, $_GET['quote']);     
$author = mysqli_real_escape_string($con, $_GET['author']);     

if (!($quote == '' || $author == '')){
    $sql = "INSERT INTO KhalidsTable (quote, author) VALUES ('$quote', '$author')";
    
    if (!mysqli_query($con, $sql)){
    die('Error: ' . mysqli_error($con));
    }
}

$query = "SELECT quote, author FROM KhalidsTable ORDER BY KhalidsTable.index DESC LIMIT 1";

if ($result = mysqli_query($con, $query)) {
    
    printf("Submitted:");
    
    while ($row = mysqli_fetch_assoc($result)) {
        printf ("\n%s (%s).", $row["quote"], $row["author"]);
    }

    mysqli_free_result($result);
}

mysqli_close($con);

 ?> 
<html>
 <body>

 Welcome <?php echo $_POST["name"]; ?><br>
 Your email address is: <?php echo $_POST["email"]; ?>
 
 <?php
$myfile = fopen("loginphp.txt", "a") or die("Unable to open file!");
$txt = "<br>".$_POST["name"]." ".$_POST["email"]."<br>";
fwrite($myfile, $txt);
fclose($myfile); 
 

$myfile = fopen("loginphp.txt", "r") or die("Unable to open file!");
echo fread($myfile,filesize("loginphp.txt"));
fclose($myfile);
?> 

 </body>
 </html> 
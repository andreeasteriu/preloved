
<?php
// Enter your Host, username, password, database below.
$con = mysqli_connect("localhost","root","","preloved");
// Check connection

if(! $con ){
    die('Could not connect: ' . mysqli_error($con));
 }
 echo 'Connected successfully';
 mysqli_close($con);
?>
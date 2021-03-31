<?php
ob_start();
session_start();
require_once '../dbconnectNewCR11.php';

// if session is not set this will redirect to login page
if( !isset($_SESSION['admin' ]) && !isset($_SESSION['user']) ) {
 header("Location: index_CR11.php");
 exit;
}
if( isset($_SESSION['user' ]) ) {
  header("Location: home_CR11.php");
  exit;
}
// select logged-in users details
$res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['admin']);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);

if ($_POST) {
   $name = $_POST['name'];
   $age = $_POST['age'];
   $type = $_POST[ 'type'];
   $fk_location_id = $_POST[ 'fk_location_id'];
   $description = $_POST[ 'description'];
   $hobbies = $_POST[ 'hobbies'];
   $image = $_POST['image'];

   $sql = "INSERT INTO animal (name, age, type, fk_location_id, description, hobbies, image) VALUES ('$name', '$age', '$type', '$fk_location_id', '$description', '$hobbies', '$image')";
    if($conn->query($sql) === TRUE) {
       echo "<p>New Record Successfully Created</p>" ;
       echo "<a href='../create_CR11.php'><button type='button'>Back</button></a>";
        echo "<a href='../admin_CR11.php'><button type='button'>Home</button></a>";
   } else  {
       echo "Error " . $sql . ' ' . $conn->connect_error;
   }

   $conn->close();
}




?>
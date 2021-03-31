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
   $age= $_POST[ 'age'];
   $type= $_POST[ 'type'];
   $description = $_POST['description'];
   $hobbies= $_POST[ 'hobbies'];
   $image= $_POST[ 'image'];
   $fk_location_id= $_POST[ 'fk_location_id'];

   $name = $_POST['name'];



$sql = "UPDATE animal SET age = '$age', type = '$type', description = '$description', hobbies = '$hobbies', image = '$image', fk_location_id = '$fk_location_id' WHERE name = '$name' " ;
   if($conn->query($sql) === TRUE) {
       echo  "<p>Successfully Updated</p>";
       echo "<a href='../admin_CR11.php'><button type='button'>Home_admin</button></a>";
   } else {
        echo "Error while updating record : ". $conn->error;
   }

   $conn->close();

}


?>

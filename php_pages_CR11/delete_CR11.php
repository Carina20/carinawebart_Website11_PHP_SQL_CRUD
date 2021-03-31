<?php

ob_start();
session_start();

require_once 'dbconnectNewCR11.php';


if( !isset($_SESSION['admin' ]) && !isset($_SESSION['user']) ) {
 header("Location: index_CR11.php");
 exit;
}
if(isset($_SESSION['user' ]) ) {
  header("Location: home_CR11.php");
  exit;
}

$res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['admin']);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);


if ($_GET['name']) {
   $name = $_GET['name'];

   $sql = "SELECT * FROM animal WHERE name = '$name'" ;
   $result = $conn->query($sql) or die($conn->error);  
   $data = $result->fetch_assoc();

   $conn->close();
?>


<!DOCTYPE html>
<html>
<head>
   <title>Delete record</title>
</head>
<body>

<h3>Do you really want to delete this record?</h3>
<form action = "actions/a_deleteCR11.php" method="post">

   <input type="hidden" name="name" value="<?php echo $data['name']  ?>" />
   <button type="submit">Yes, delete it!</button>
   <a href="admin_CR11.php"><button type="button">No, go back!</button></a>
</form>

</body>
</html>

<?php
}
?>

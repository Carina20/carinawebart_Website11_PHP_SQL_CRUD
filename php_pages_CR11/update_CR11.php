<?php
ob_start();
session_start();
require_once 'dbconnectNewCR11.php';

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


if ($_GET['name']) {
   $name = $_GET['name'];

   $sql = "SELECT * FROM animal WHERE name = '$name' ";
   $result = mysqli_query($conn,$sql);
   $data = $result->fetch_assoc();

   $conn->close();

?>

<!DOCTYPE html>
<html>
<head>
   <title> Admin_Update records </title>

   <style type= "text/css">
       fieldset {
           margin: auto;
            margin-top: 100px;
           width: 50% ;
       }

       table tr th  {
           padding-top: 20px;
       }
   </style>

</head>
<body>

<fieldset>
   <legend>Update records</legend>

   <form action="actions/a_updateCR11.php" method= "post">
       <b><table cellspacing= "3" cellpadding="3"> 
           
           <tr>
               <td>Age</td>
               <td><input  type="number" name= "age" value ="<?php echo $data['age'] ?>" /></td> 
           </tr>
           <tr>
               <td>Type</td>
               <td><input type="text"  name="type" value ="<?php echo $data['type'] ?>" /></td>
           </tr>
           <tr>
               <td>Description</td>
               <td><input  type="text" name= "description" value ="<?php echo $data['description'] ?>" /></td> 
           </tr>
            <tr>
               <td>Hobbies</td>
               <td><input  type="text" name= "hobbies" value ="<?php echo $data['hobbies'] ?>" /></td>
           <tr>
               <td>Image</td>
               <td><input  type="file" name= "image" /></td>
            <tr>
               <td>fk_location_id</td>
               <td><input  type="number" name= "fk_location_id" value ="<?php echo $data['fk_location_id'] ?>" /></td>
           </tr>
           <tr>
            <input type= "hidden" name= "name" value= "<?php echo $data['name']?>" />
               <td><br><button type ="submit">Update</button></td>
               <td><br><a href= "admin_CR11.php"><button type="button">Back</button></a></td>
           </tr>
       </table></b>
   </form>

</fieldset>

</body>
</html>

<?php
}
?>
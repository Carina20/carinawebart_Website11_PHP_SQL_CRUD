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
?>


<!DOCTYPE html>
<html>
<head>
   <title> Admin_Add animal </title>

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
   <legend>Add animal</legend>

   <form action="actions/a_createCR11.php" method= "post">
       <b><table cellspacing= "3" cellpadding="3"> 
           <tr>
               <td>Name</td>
               <td><input  type="text" name="name" /></td>
           </tr>    
           <tr>
               <td>Age</td>
               <td><input  type="text" name="age"  /></td>
           </tr>
           <tr>
               <td>Type</td>
               <td><input type="text"  name="type" /></td>
           </tr>
           <tr>
               <td>fk_location_id</td>
               <td><input  type="text" name="fk_location_id" /></td>
           </tr>
           <tr>
               <td>Description</td>
               <td><input  type="text" name="description" /></td>
           </tr>
            <tr>
               <td>Hobbies</td>
               <td><input  type="text" name= "hobbies"  /></td>
           </tr>
           <tr>
               <td>Image</td>
               <td><input  type="file" name="image" enctype="multipart/form-data" /></td>
           </tr>
           <tr>
               <td><br><button type ="submit">Insert</button></td>
               <td><br><a href= "admin_CR11.php"><button type="button">Back</button></a></td>
           </tr>
       </table></b>
   </form>

</fieldset >

</body>
</html>
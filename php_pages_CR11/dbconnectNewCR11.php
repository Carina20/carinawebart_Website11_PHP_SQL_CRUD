<?php
error_reporting( ~E_DEPRECATED & ~E_NOTICE );
define ('DBHOST', 'localhost');
define('DBUSER', 'u187800db1');
define('DBPASS', '8ntjbpbytrh');
define ('DBNAME', 'u187800db1');
$conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);
if  ( !$conn ) {
 die("Connection failed : " . mysqli_error());
}
?>
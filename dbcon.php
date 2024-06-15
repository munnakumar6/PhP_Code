<?php
//error_reporting(0);
$host="localhost";
$username="root";
$password="";
$dbname="munna";

//connection establishment with the MYsql database
$con=mysqli_connect("$host","$username","$password","$dbname");

if(!$con){
    echo "Connection Not Established";
  //header("Location: ../error/dberror.php");
  die();

}
?>

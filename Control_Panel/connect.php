<?php 
$host="127.0.0.1";
$user="root";
$password="";
$database="version1";
$connection=mysqli_connect($host,$user,$password,$database);
mysqli_set_charset($connection,'utf8'); //To Accept Arabic Language In Mysql
if(mysqli_connect_errno()){
    die("connection error ". mysqli_connect_error());
}else{
  // echo " connect done";
}

?>

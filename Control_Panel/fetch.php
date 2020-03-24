<?php
include 'init.php';
//fetch.php
if(isset($_POST["action"]))
{
 
 $output = '';
 if($_POST["action"] == "Level")
 {
  $query = "SELECT * FROM levels_department WHERE Department_Level_ID  = '".$_POST["query"]."' GROUP BY Department_Name";
  $result = mysqli_query($connection, $query);
  $output .= '<option value="">Select Department</option>';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '<option value="'.$row["Department_ID"].'">'.$row["Department_Name"].'</option>';
  }
 }
 if($_POST["action"] == "Department")
 {
  $query = "SELECT * FROM wish_statment WHERE Wish_Department_ID = '".$_POST["query"]."'";
  $result = mysqli_query($connection, $query);
  $output .= '<option value="">Select Division</option>';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '<option value="'.$row["Wish_ID"].'">'.$row["Wish_Name"].'</option>';
  }
 }
 echo $output;
}

include $tpl.'footer.php'; 
?>
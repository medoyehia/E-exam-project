<?php
//fetch.php;
if(isset($_POST["view"]))
{
 include("connect.php");
 if($_POST["view"] != '')
 {
  $update_query = "UPDATE respons_to_request SET status=1 WHERE status=0";
  mysqli_query($connection, $update_query);
 }
 $query = "SELECT * FROM respons_to_request ORDER BY Respons_ID DESC LIMIT 5";
 $result = mysqli_query($connection, $query);
 $output = '';
 
 if(mysqli_num_rows($result) > 0)
 {
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
   <li>
    <a href="#">
     <strong>'.$row["Requester_Replay"].'</strong><br />
     <small><em>'.$row["Requester_message"].'</em></small>
    </a>
   </li>
   <li class="divider"></li>
   ';
  }
 }
 else
 {
  $output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
 }
 
 $query_1 = "SELECT * FROM respons_to_request WHERE status=0";
 $result_1 = mysqli_query($connection, $query_1);
 $count = mysqli_num_rows($result_1);
 $data = array(
  'notification'   => $output,
  'unseen_notification' => $count
 );
 echo json_encode($data);
}
?>
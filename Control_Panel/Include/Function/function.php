<?php
/*
**Title Function v1.0
** Title Function The Echo The Page Title In Case The Page
** Has The Variable $pageTitle And Echo Defult Title For Other Pages
*/

function getTitle()
{
    global $pageTitle;
    
    if(isset($pageTitle)){ echo $pageTitle; }else{ echo 'Defult'; }
}

/*
**Home Redirect Function [This Function Accept Parameters]
**$errorMsg = Echo The Error Message
** url = the link you want redirect to
**$seconds=Seconds Before Redirecting
*/
/*function redirectHome($errorMsg,$seconds = 3){
    echo "<div class='alert alert-danger'>$errorMsg </div>";
    echo "<div class='alert alert-info'>You Will Be Redirected to HomePage After $seconds Seconds.</div>";
    header("refresh:$seconds;url=index.php");
    exit();

}*/
//v2.0
function redirectHome($theMsg ,$url = null ,$seconds = 3){
    if($url === null){
        $url='index.php';
        $link= 'Home Page';
    }else{
        if(isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !== ''){
            $url=$_SERVER['HTTP_REFERER'];
            $link="Previos page";
        }else{
            $url='index.php';
            $link="Home page";
        }
       
        }
    echo $theMsg;
    echo "<div class='alert alert-info'>You Will Be Redirected to $link After $seconds Seconds.</div>";
    //header("refresh:$seconds;url=$url");
    exit();

}

/*
**Check Items Function v1.0
**Function to check item in DB [Function accept parameter]
** $Select =The item to select[Ex:student,sttaf]
** $From   = The table to select from [Ex:student ,sttaf]
** $Value  = the value of select [Ex: ahmed ,wish ,student ]
*/
function checkItem($select,$table,$value){
    global $connection;
    $query="SELECT $select FROM $table WHERE $select = '".$value."' ";
    $result=mysqli_query($connection,$query);
    $count=mysqli_num_rows($result);
    /*if($count > 0){
        return $count;
    }*/
    
        return $count;
}
function pagination($select,$table){
    global $connection;
    $query="SELECT $select FROM $table ";
    $result=mysqli_query($connection,$query);
    $count=mysqli_num_rows($result);
    /*if($count > 0){
        return $count;
    }*/
    
        return $count;
}
/*
**Check Number Of Items v1.0
**Function to count numbers of Items Rows
*/
function countItems($item,$table,$condition,$vaule){
    global $connection;
        $query="SELECT $item FROM $table WHERE $condition='".$vaule."' ";
        $result=mysqli_query($connection,$query);
        $count=mysqli_num_rows($result);
        return $count;
}
/*
**Get Latest Records Function v1.0
**Function to get latest Items from DB [Staff,Items,Comments]
**
*/
function getLatest($select,$table,$condition,$value,$order,$limit =5){
    global $connection;
     $query="SELECT * FROM $table Where $condition='$value' ORDER BY $order DESC LIMIT $limit";
     $result=mysqli_query($connection,$query);
     /*$row=mysqli_fetch_row($result);
     $count=mysqli_num_rows($result);
    for($i=0;$i < 6;$i++){
        echo $row[$i].'<br>';
    }*/

     while($row=mysqli_fetch_array($result)){
         echo'<ul class="list-unstyled u">';
            echo '<li>';
            echo $row["$select"];
                echo  '<a href="staff.php?do=Edit&Student_ID='.$row["$order"].' " >';
                    echo '<span class="btn btn-success float-right">';
                        echo ' <i class="fa fa-edit"></i> Edit';
                            echo '<a href="staff.php?do=Delete&Student_ID='.$row["$order"].'" class="btn btn-danger confirm float-right">
                                        <i class="fa fa-user-times"></i>
                                        Reject
                                        </a>';
                      if($row['Student_Accept']== 0){
                            echo '<a href="staff.php?do=Activate&Student_ID='.$row["$order"].'" class=" btn btn-info float-right activate">
                                        <i class="fa fa-user-check"></i>
                                        Accept
                                        </a>';
                                }
                        echo '</span>';
                echo '</a>';
            echo '</li>';
         echo'</ul>';
     }

}


?>
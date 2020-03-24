<?php

    session_start();
    $noNavbar='';
    $Sidebar='';
    $pageTitle='Login';
    if(isset($_SESSION['username']))
    {
        header("Location:dashboard.php");  
    }

    include 'init.php';

    //Check If User Coming From HTTP POST Request

    if($_SERVER['REQUEST_METHOD']== 'POST')
    {
        
        
        $username=$_POST['user'];
        $password=$_POST['pass'];
        $hashedpass= sha1($password);

        //Chech If Admin Exist In Database
        $query="select Student_Name,Student_SSN,Student_ID from student where Student_Name= '".$username."' and Student_SSN='".$hashedpass."' Limit 1 ";
        $result=mysqli_query($connection,$query);

        //If Count Greater Than 0 This Mean That Admin Registered In Database
        $count=mysqli_num_rows($result);

        if($count > 0)
        {
            $row=mysqli_fetch_array($result);
            
            
            $_SESSION['username']=$username;// Register Session UserName
            $_SESSION['Student_ID']=$row['Student_ID']; // Register Session ssn
            $_SESSION['Student_SSN']=$row['Student_SSN'];
            //$_SESSION['variable']= value in database

            //Redirect to test.php
            header("Location:dashboard.php");        
            exit();

        }else
        {
            echo 'false';
        }
    }

?>

<form class="login" action="<?php $_SERVER['PHP_SELF']?>" method="post">
    <h4 class="text-center">Admin Login</h4>
    <input class="form-control" type="text" name="user" placeholder="Username" autocomplete="off">
    <input class="form-control" type="password" name="pass" placeholder="Password" autocomplete="new-password">
    <input class="btn btn-primary btn-block" type="submit" name="submit" value="Login">
 </form>
     
<?php include $tpl.'footer.php'; ?>
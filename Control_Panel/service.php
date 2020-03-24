<?php
    session_start();
    $pageTitle='Services_page';
    if(isset($_SESSION['username'])) 
    {
        
         include 'init.php';
        
        $do=isset($_GET['do'])?$_GET['do']:'Manage';
        ///////////////////////////////////////////////////// Show All Requests ///////////////////////////////////////////////// 
        if($do == 'Manage'){
        
             //Select All Admin Except Manager 
            $query="Select * From services";
            $result=mysqli_query($connection,$query);
            if(!$result)
            {
                die("errror");
            }
        ?>
     <h1 class="text-center">Manage Service</h1>
        <div class="container">
            <div class="table-responsive">
                <table class="main-table manage-members text-center table table-bordered">
                    <tr>
                      <td>ID</td>
                      <td>FileName</td>
                      <td><?php echo lang('ACTION_T') ?></td>
                    </tr>
                    
        <?php
               while($row=mysqli_fetch_array($result))
               {
                   echo'<tr>';
                       echo'<td>'.$row['ID'].'</td>';
                       echo'<td>'.$row['Filename'].'</td>';
                      echo'<td>';
                                echo '<a href="service.php?do=Edit&ID='.$row['ID'].'" class="btn btn-success">
                                <i class="fa fa-edit"></i>';
                                echo lang('EDIT_T');
                                echo '</a>';

                                echo '&nbsp;<a href="service.php?do=Delete&ID='.$row['ID'].'" class="btn btn-danger confirm">
                                <i class="fa fa-user-times"></i>';
                                echo lang('DELETE_T');
                                echo'</a>';

                        echo '</td>';
                   echo'</tr>';
               }
        ?>
                 
            </table>
        </div>
        <a href="service.php?do=Add" class="btn btn-primary"><i class="fas fa-user-plus"></i>Add New File</a>
    </div>

        <?php ///////////////////////////////////////////////////// ADD Requests /////////////////////////////////////////////////////
        }elseif($do == 'Add') {?>
            <div class="container" > 
            <h1 class="text-center"> Add File Page </h1>
            <form action="?do=Insert" method="post" enctype="multipart/form-data">
              <div class="card">
                  <div class="card-header text-center colcard" style="font-size:25px;">
                    Add New File  
                  </div>
                  <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                         <input type="text" name="filename" id="filename" class="form-control input"  placeholder="Enter Your Name" required="required">
                        </div>
                     <div class="form-group col-md-12">
                      <input type="file" name="image" class="custom-file-input" id="customFile">
                      <label class="custom-file-label" for="customFile"><?php echo lang('CHOOSE_IMAGE') ?></label>                    
                    </div>
                    <div class="form-group col-md-12">
                      <button type="submit" class="btn btn-info col-md-12 center-block"><i class="fas fa-file"></i>  Add File</button>       </div>
                   </div>
                  </div>
                </div>
            </form>
                
         
            </div>  
        <?php ///////////////////////////////////////////////////// Insert Requests In DataBase //////////////////////////////////////
        }elseif($do == 'Insert') {
             echo '<div class="container" > ';

        if($_SERVER['REQUEST_METHOD']=='POST')
        {
             echo"<h1 class='text-center'>Insert File</h1>";
                //Get Variable from Form
                $FileName  = $_POST['filename'];
                //Upload image
                $ImageName = $_FILES['image']['name'];
                $ImageSize = $_FILES['image']['size'];
                $ImageTmp  =  $_FILES['image']['tmp_name'];
                $ImageType = $_FILES['image']['type'];
                //List Of Allowed Type To Upload
                $imageAllowedExtension=array("jpeg","png","jpg","gif");
                //Get Image Extension
                $imageExtension=strtolower(end(explode('.',$ImageName)));
                $FormErrors=array();
            
                if(!empty($ImageName) && !in_array($imageExtension,$imageAllowedExtension)){
                $FormErrors[]='This Extension Not <strong>Allowed</strong>';
                }
                if($ImageSize > 44){
                    $FormErrors[]='Size of Image Not Procced <strong>4MB</strong>';
                }
                if(empty($FileName))
                {
                    $FormErrors[]='Please Enter The File Name';
                }
                foreach($FormErrors as $error){
                    echo'<div class="alert alert-danger">' .$error .'</div>';
                }
            
                 if(empty($FormErrors)){
                     
                    $iamges= rand(0,100000000).'_'.$ImageName;
                    move_uploaded_file($ImageTmp,"Upload\\".$iamges);
                    $query="Insert into services(Filename,File) VALUES ('".$FileName."','".$iamges."')";
                    $result=mysqli_query($connection,$query);
                     
                if(!empty($result)){
                    $theMsg= '<div class="alert alert-success alert-dismissible fade show" role="alert" >File is Inserted</div>';
                    redirectHome($theMsg,'back');

                    } 
                }
        }else{
                     echo '<div class="container">';
                        $theMsg= '<div class="alert alert-danger">Sorry You Not Can Brows This Page Direct</div>';
                       redirectHome($theMsg,'back');
                     echo '</div>';
                        }
        /*End Class Container */
         echo '</dive>'; 
                
        
        ///////////////////////////////////////////////////// Edit Requests ////////////////////////////////////////////////////
        }elseif($do == 'Edit') {
            echo '<div class="container" > ';
            
            $id=isset($_GET['ID']) && is_numeric($_GET['ID'])?intval($_GET['ID']):0; //content ssn own admin
            
            
            $query="select * from services where ID='".$id."' Limit 1 ";
            
            $result=mysqli_query($connection,$query);
            
            $count=mysqli_num_rows($result);
            
            $row=mysqli_fetch_array($result);
            
            if($count > 0)
            {?>
                
            <div class="container" > 
            <h1 class="text-center text-info">Edit Service</h1>
             <form action="?do=Update" method="post" enctype="multipart/form-data"> <!--redircte to same page but send insert by GET -->
                <div class="card">
                  <div class="card-header text-center colcard" style="font-size:25px;">
                    Edit File
                  </div>
                  <div class="card-body">
                    <input type="hidden" name="ID" value="<?php echo $id ?>" >
                    <div class="form-row">
                        <div class="form-group col-md-12">
                        <input type="text" name="filename" id="filename" class="form-control input"  placeholder="Enter Your FileName" value="<?php echo $row['Filename'] ?>">
                        </div>
                     <div class="form-group col-md-12">
                      <input type="file" name="image" class="custom-file-input" id="customFile">
                      <label class="custom-file-label" for="customFile"><?php echo lang('CHOOSE_IMAGE') ?></label>                    
                    </div>
                    <div class="form-group col-md-12">
                      <button type="submit" class="btn btn-info col-md-12 center-block"><i class="fas fa-save"></i> Save Change</button>       </div>
                   </div>
                  </div>
                </div>
                 
            </form>
        
        <?php 
                //If $count not include data this else excuted
            }else{
               
                echo '<div class="container">';
                    $theMsg= '<div class="alert alert-danger">There is not such ID</div>';
                    redirectHome($theMsg);
                 echo '</div>';
                
            }
            echo '</div>';
       ///////////////////////////////////////////////////// Update Requests In DataBase //////////////////////////////////////
        }elseif($do == 'Update') {
                echo '<h1 class="text-center">Update Page</h1>';
                echo '<div class="container" > ';
                if($_SERVER['REQUEST_METHOD']=='POST'){
                //Get Variable from Form
                $Id = $_POST['ID'];
                $FileName = $_POST['filename'];
                      //Upload image
                $ImageName = $_FILES['image']['name'];
                $ImageSize = $_FILES['image']['size'];
                $ImageTmp  =  $_FILES['image']['tmp_name'];
                $ImageType = $_FILES['image']['type'];
                //List Of Allowed Type To Upload
                $imageAllowedExtension=array("jpeg","png","jpg","gif","pdf");
                //Get Image Extension
                $imageExtension=strtolower(end(explode('.',$ImageName)));
                   //Validate The Form 
                $FormErrors=array();
                
                 if(empty($FileName))
                {
                    $FormErrors[]='Please Enter The File Name';
                }
                if(!empty($ImageName) && !in_array($imageExtension,$imageAllowedExtension)){
                    $FormErrors[]='This Extension Not <strong>Allowed</strong>';
                }
                if($ImageSize > 4194304){
                    $FormErrors[]='Size of Image Not Procced <strong>4MB</strong>';
                }
                foreach($FormErrors as $error){
                    echo'<div class="alert alert-danger">' .$error .'</div>';
                }
                //Chech If There's No Error Proceed The Update Operation
                if(empty($FormErrors)){
                    $iamges= rand(0,100000000).'_'.$ImageName;
                    move_uploaded_file($ImageTmp,"Upload\\".$iamges);
                    //Update The DB Whith This Info
                    $query="UPDATE services SET Filename='".$FileName."',File='".$iamges."'  WHERE ID= '".$Id."' ";
                    $result=mysqli_query($connection,$query);
                    if(!empty($result))
                        $theMsg= '<div class="alert alert-success alert-dismissible fade show" role="alert" >File is Updated</div>';
                        redirectHome($theMsg,'back');
                    }
                }else{
                echo '<div class="container">';
                    $theMsg= '<div class="alert alert-danger">Sorry You Not Can Brows This Page Direct</div>';
                    redirectHome($theMsg,'back');
                 echo '</div>';
                
            }
                echo '</div>';
            
        
        ///////////////////////////////////////////////////// Delete Requests In DataBase //////////////////////////////////////
        }elseif($do == 'Delete') {
          //Delete page
            echo '<h1 class="text-center">Delete Page</h1>';
            echo '<div class="container" > ';
                    $Id=isset($_GET['ID']) && is_numeric($_GET['ID'])?intval($_GET['ID']) : 0;

                    $check=checkItem("ID","services",$Id);
                    if($check > 0)
                    {
                           $query="DELETE FROM services WHERE ID='".$Id."' "; 
                             $result=mysqli_query($connection,$query);
                            if(!empty($result))
                                $theMsg= '<div class="alert alert-success alert-dismissible fade show" role="alert" >This File Is Deleted </div>';
                                redirectHome($theMsg,'back');


                    }else{
                        $theMsg='<div class="alert alert-danger">this id is not exist</div>';
                        redirectHome($theMsg);

                    }
        }elseif($do=='ManageStudent'){
                         //Select All Admin Except Manager 
            $query="Select * From services";
            $result=mysqli_query($connection,$query);
            if(!$result)
            {
                die("errror");
            }
        ?>
     <h1 class="text-center text-info">Manage Service</h1>
        <div class="container">
            <div class="table-responsive">
                <table class="main-table manage-members text-center table table-bordered">
                    <tr>
                      <td>ID</td>
                      <td>FileName</td>
                      <!--  <td>File</td>-->
                      <td><?php echo lang('ACTION_T') ?></td>
                    </tr>
                    
        <?php
             //<button class="btn btn-info" onclick="window.print();">Print</button>
               while($row=mysqli_fetch_array($result))
               {
                   echo'<tr>';
                       echo'<td> '.$row['ID'].'</td>';
                       echo'<td class="text-info">'.$row['Filename'].'</td>';
                       // echo'<td><img src="Upload/'.$row['File'].'" alt=" This Image Not Supported" /></td>';
                       echo'<td>';
                                echo '<a href="Upload//'.$row['File'].'" download class="btn btn-info">
                                <i class="fa fa-download"></i>';
                                echo ' Download';
                                echo '</a>';
                                echo '&nbsp;<button class="btn btn-success" onclick="window.print();"><i class="fa fa-print"></i> Print</button>';
                                
                       echo '</td>';
                   echo'</tr>';
               }
        ?>
                 
            </table>
        </div>
        <a href="service.php?do=Add" class="btn btn-danger"><i class="fas fa-user-plus"></i>Add New File</a>
             <br><br>
    </div>
                        
                <?php }
        
                echo '</div>';
        
      include $tpl.'footer.php';
        
    }else {
        
        header('location:index.php');
        exit();
        
    }
 ?>
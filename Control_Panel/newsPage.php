<?php
    session_start();
   
    $pageTitle='Faculty news page';
    
    if(isset($_SESSION['username'])) 
    {
        
         include 'init.php';
        
        $do=isset($_GET['do'])?$_GET['do']:'Manage';
        ///////////////////////////////////////////////////// Show All Requests ///////////////////////////////////////////////// 
        if($do == 'Manage'){
             
            $query="Select * From news ORDER BY News_ID DESC";
            $result=mysqli_query($connection,$query);
            if(!$result)
            {
                die("errror");
            }


?>
                <br><br>
                
                <div class="table-responsive">
                <table id="example" class="table table-bordered" style="width:100%">
                    <thead class="main-table ">
                        <tr>
                            <!--<td>News_Student_SSN</td>-->
                            <td>News_Title</td>  
                           <!-- <td >News_Body</td>-->
                            <td >News_Link</td>
                            <td >News_Other_Link</td>
                            <td >News_Visible</td>
                            <td >Date</td>
                        </tr>
                    </thead>
                    
                   <?php
                        while($row = $row = mysqli_fetch_array($result)){
                            // <td>'.$row["News_Body"].'</td>
                            echo '<tr>
                               
                                <td>'.$row["News_Title"].'</td>
                                <td>'.$row["News_Link"].'</td>
                                <td>'.$row["News_Other_Link"].'</td>
                                <td>'.$row["News_Visible"].'</td>
                                <td>'.$row["Date"].'</td>
                                </tr>';
                        }
                   ?>

                </table>
             </div>
        
      <?php ///////////////////////////////////////////////////// ADD Requests /////////////////////////////////////////////////////
       }elseif($do == 'Add') {?>
            <div class="container" > 
                <br><br>
                <form action="?do=Insert" method="post" enctype="multipart/form-data">
                  <div class="card">
                      <div class="card-header text-center colcard" style="font-size:25px;">
                        Add New Post 
                      </div>
                      <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                 <input type="text" name="postTitle" id="name" class="form-control input"  placeholder="Enter Post Title" required="required" autocomplete="off">
                                 <span id="nameMeg"></span>
                                </div>
                           </div>
                           <div class="form-row">
                             <div class="form-group col-md-12">
                                <textarea name="body" id="body" class="form-control input" rows="6" placeholder="Enter The Description"></textarea>
                                 <span id="bodyMeg"></span>
                            </div>
                           </div>
                          <div class="form-row">
                              <div class="form-group col-md-12">
                              <input type="email" name="link" id="email" class="form-control input" placeholder="Enter The Links">
                              <span id="emailMeg"></span>
                              </div>
                          </div>
                          <div class="form-row">
                              <div class="form-group col-md-12">
                              <input type="email" name="otherLink" id="otherEmail" class="form-control input" placeholder="Enter The Other Links">
                              <span id="otherEmailMeg"></span>
                              </div>
                          </div>
                          <div class="form-row">
                             <div class="form-group col-md-12">
                              <input type="file" name="image" class="custom-file-input" id="customFile">
                              <label class="custom-file-label" for="customFile"><?php echo lang('CHOOSE_IMAGE') ?></label>                    
                            </div>
                          </div>
                            <div class="form-row">
                              <div class="form-group col-md-12">
                                  <select name="visiblity" class="form-control">
                                      <option value="0" selected>Public</option>
                                      <option value="1">Private</option>
                                  </select>
                              </div>
                          </div>
                          <div class="form-row">
                              <div class="form-group col-md-12 text-center">
                              <button type="submit" class="btn btn-danger col-md-6 center-block"><i class="fas fa-plus"></i>  Add Post</button>
                            </div>
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
             echo"<h1 class='text-center'>Insert Posts</h1>";
                //Get Variable from Form 
                $News_Student_SSN   = $_SESSION['Student_SSN'];
                $News_Title         = $_POST['postTitle'];
                $News_Body          = $_POST['body'];
                $News_Link          = $_POST['link'];
                $News_Other_Link    = $_POST['otherLink'];
                $News_Visible       = $_POST['visiblity'];
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
                if($ImageSize > 4194304){
                    $FormErrors[]='Size of Image Not Procced <strong>4MB</strong>';
                }
                foreach($FormErrors as $error){
                    echo'<div class="alert alert-danger">' .$error .'</div>';
                }
                 if(empty($FormErrors))
                 {
                     
                    $iamges= rand(0,100000000).'_'.$ImageName;
                    move_uploaded_file($ImageTmp,"Upload\\".$iamges);
                    $query="Insert into news(News_Student_SSN,News_Title,News_Body,News_Link,News_Other_Link,News_Image,News_Visible,Date) VALUES ('".$News_Student_SSN."','".$News_Title."','".$News_Body."','".$News_Link."','".$News_Other_Link."','".$iamges."'
                    ,'".$News_Visible."',now())";
                    $result=mysqli_query($connection,$query);
                     
                    if(!empty($result)){
                        $theMsg= '<div class="alert alert-success alert-dismissible fade show" role="alert" >Data is Inserted</div>';
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
            // Check If GET Request SSN Is Numeric & Get The Integer Value Of It 
            
            echo '<div class="container" > ';
            
            $News_id=isset($_GET['News_ID']) && is_numeric($_GET['News_ID'])?intval($_GET['News_ID']):0; //content ssn own admin
            
            
            //Select All Data From DB Depend On This SSN
            $query="select * from news where News_ID='".$News_id."' Limit 1 ";
            
            //Execute Query
            $result=mysqli_query($connection,$query);
            
            //If Select Content The Data $count Content The Number Of Row Featched
            $count=mysqli_num_rows($result);
            
            //Fetch The Data and Store In Var $row
            $row=mysqli_fetch_array($result);
            
            //If $count value greater than from 0 .. return data in inputs
            if($count > 0)
            {?>
            
                <br><br>
                <h1 class="text-center">Edit Faculty Post</h1>
                <form action="?do=Update" method="post" enctype="multipart/form-data">
                     <input type="hidden" name="ID" value="<?php echo $News_id; ?>" >
                  <div class="card">
                      <div class="card-header text-center colcard" style="font-size:25px;">
                        Edit Post 
                      </div>
                      <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                 <input type="text" name="postTitle" id="name" class="form-control input" value="<?php echo $row['News_Title'] ?>" required="required" autocomplete="off" >
                                 <span id="nameMeg"></span>
                                </div>
                           </div>
                           <div class="form-row">
                             <div class="form-group col-md-12">
                                <textarea name="body" id="body" class="form-control input" rows="6" required="required">
                                    <?php echo $row['News_Body'] ?>
                                </textarea>
                                 <span id="bodyMeg"></span>
                            </div>
                           </div>
                          <div class="form-row">
                              <div class="form-group col-md-12">
                              <input type="email" name="link" id="email" class="form-control input" value="<?php echo $row['News_Link'] ?>">
                              <span id="emailMeg"></span>
                              </div>
                          </div>
                          <div class="form-row">
                              <div class="form-group col-md-12">
                              <input type="email" name="otherLink" id="otherEmail" class="form-control input" value="<?php echo $row['News_Other_Link'] ?>">
                              <span id="otherEmailMeg"></span>
                              </div>
                          </div>
                          <div class="form-row">
                             <div class="form-group col-md-12">
                              <input type="file" name="image" class="custom-file-input" id="customFile" value="<?php echo $row['News_Image'] ?>">
                              <label class="custom-file-label" for="customFile"><?php echo lang('CHOOSE_IMAGE') ?></label>                    
                            </div>
                          </div>
                            <div class="form-row">
                              <div class="form-group col-md-12">
                                  <select name="visiblity" class="form-control" value="<?php echo $row['News_Visible'] ?>">
                                      <option value="0">Public</option>
                                      <option value="1">Private</option>
                                  </select>
                              </div>
                          </div>
                          <div class="form-row">
                              <div class="form-group col-md-12 text-center">
                              <button type="submit" class="btn btn-danger col-md-6 center-block"><i class="fas fa-plus"></i>  Add Post</button>
                            </div>
                          </div>
                      </div>
                  </div>
                </form>
             <?php 
                //If $count not include data this else excuted
            }else{
               
                echo '<div class="container">';
                    $theMsg= '<div class="alert alert-danger">There is not such SSN</div>';
                    //redirectHome($theMsg);
                 echo '</div>';
                
            }
            echo '</div>';  
        ///////////////////////////////////////////////////// Update Requests In DataBase //////////////////////////////////////
        }elseif($do == 'Update') {
            echo '<div class="container" > ';
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
             echo"<h1 class='text-center'>Insert Posts</h1>";
                //Get Variable from Form 
                $News_Id            = $_POST['ID'];
                $News_Title         = $_POST['postTitle'];
                $News_Body          = $_POST['body'];
                $News_Link          = $_POST['link'];
                $News_Other_Link    = $_POST['otherLink'];
                $News_Visible       = $_POST['visiblity'];
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
                if($ImageSize > 4194304){
                    $FormErrors[]='Size of Image Not Procced <strong>4MB</strong>';
                }
                foreach($FormErrors as $error){
                    echo'<div class="alert alert-danger">' .$error .'</div>';
                }
                 if(empty($FormErrors))
                 {
                    $iamges= rand(0,100000000).'_'.$ImageName;
                    move_uploaded_file($ImageTmp,"Upload\\".$iamges);
                    $query="
                    UPDATE
                    news
                    SET
                    News_Title          = '".$News_Title."',
                    News_Body           = '".$News_Body."',
                    News_Link           = '".$News_Link."',
                    News_Other_Link     = '".$News_Other_Link."',
                    News_Image          = '".$iamges."',
                    News_Visible        = '".$News_Visible."'
                    WHERE News_ID       = '".$News_Id."' ";
                     
                    $result=mysqli_query($connection,$query);
                     
                    if(!empty($result)){
                        $theMsg= '<div class="alert alert-success alert-dismissible fade show" role="alert" >Post is Updated</div>';
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
        ///////////////////////////////////////////////////// Delete Requests In DataBase //////////////////////////////////////
        }elseif($do == 'Delete') {
                    //Delete page
                    echo '<h1 class="text-center">Delete Post</h1>';
                    echo '<div class="container" > ';

                    $News_Id=isset($_GET['News_ID']) && is_numeric($_GET['News_ID'])?intval($_GET['News_ID']) : 0; 
            
                    $check=checkItem("News_ID","news",$News_Id);

                    //If $count value greater than from 0 .. return data in inputs
                    if($check > 0)
                    {
                           $query="DELETE FROM news WHERE News_ID='".$News_Id."' "; 
                             $result=mysqli_query($connection,$query);
                            if(!empty($result))
                                $theMsg= '<div class="alert alert-success alert-dismissible fade show" role="alert" >This Staff Is Deleted </div>';
                                redirectHome($theMsg,'back');


                    }else{
                        $theMsg='<div class="alert alert-danger">this id is not exist</div>';
                        redirectHome($theMsg);

                    }
        
                echo '</div>';
        ///////////////////////////////////////////////////// Activate Requests In DataBase //////////////////////////////////////    
        }
        
        include $tpl.'footer.php';
        
    }else {
        
        header('location:index.php');
        exit();
        
    }
 ?>
                    
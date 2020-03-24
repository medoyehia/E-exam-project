<?php
     session_start();
     $pageTitle='Student_Staff';
     $Sidebar='';
    if(isset($_SESSION['username']))
    {
       
        include 'init.php';
        
        $do=isset($_GET['do'])?$_GET['do']:'Manage';
/******************************************************** Start Manage Page Code ****************************************************************/
    if($do=='Manage')
    { 
            
            // If You Coming From Staff.php?do=Manage&page=Pending 
            
            $querys='';
            if(isset($_GET['page']) && $_GET['page']=='Pending'){
                $querys='AND Student_Accept= 0';
            }
              
            //Select All Admin Except Manager 
            $query="Select * From student where Student_Type = 'Admin' $querys ";
            $result=mysqli_query($connection,$query);
            if(!$result)
            {
                die("errror");
            }
/******************************************************** End Manage Page Code ****************************************************************/
?>
<!------------------------------------------------------- Start Manage Page Body ------------------------------------------------------------->

    <h1 class="text-center"><?php echo lang('MANAGE_STAFF_TITLE') ?></h1>
   <div class="container">
        <div class="table-responsive">
        <table id="example" class="table table-bordered" style="width:100%">
                    <thead class="main-table ">
                <tr>
                  <td><?php echo lang('STAFF_ID_T') ?></td>
                  <td><?php echo lang('USERNAME_T') ?></td>
                  <td><?php echo lang('EMAILE_T') ?></td>
                  <td><?php echo lang('PHONE_T') ?></td>
                  <td><?php echo lang('REGISTERED_DATE_T') ?></td>
                  <td><?php echo lang('ACTION_T') ?></td>
                </tr>
                  </thead>  
        <?php
               while($row=mysqli_fetch_array($result))
               {
                   echo'<tr>';
                       echo'<td>'.$row['Student_ID'].'</td>';
                       echo'<td>'.$row['Student_Name'].'</td>';
                       echo'<td>'.$row['Student_Email'].'</td>';
                       echo'<td>'.$row['Student_Phone'].'</td>';
                       echo'<td>'.$row['Date'].'</td>';
                       echo'<td>';
                                echo '<a href="staff.php?do=Edit&Student_ID='.$row['Student_ID'].'" class="btn btn-success">
                                <i class="fa fa-edit"></i>';
                                echo lang('EDIT_T');
                                echo '</a>';

                                echo '&nbsp;<a href="staff.php?do=Delete&Student_ID='.$row['Student_ID'].'" class="btn btn-danger confirm">
                                <i class="fa fa-user-times"></i>';
                                echo lang('DELETE_T');
                                echo'</a>';

                                if($row['Student_Accept']== 0)
                                {
                                echo'&nbsp;<a href="staff.php?do=Activate&Student_ID='.$row['Student_ID'].'" class=" btn btn-info activate">
                                <i class="fa fa-user-check"></i>';
                                echo lang('ACTIVE_T');
                                echo'</a>';
                                }

                       echo '</td>';
                   echo'</tr>';
               }
        ?>
                 
            </table>
        </div>
        <a href="staff.php?do=Add" class="btn btn-primary"><i class="fas fa-user-plus"></i><?php echo lang('ADD_NEW_STAFF_B') ?></a>
   </div>
<!------------------------------------------------------- End Manage Page Body ------------------------------------------------------------->
<?php
/******************************************************** Start ManageStudent Page ****************************************************************/
    }elseif($do == 'ManageStudent'){
        
            // If You Coming From Staff.php?do=Manage&page=Pending 
            
            $querys='';
            if(isset($_GET['page']) && $_GET['page']=='PendingStudent'){
                $querys='AND Student_Accept = 0';
            }
              
            //Select All Admin Except Manager 
            $query="Select * From student where Student_Type = 'Student' $querys ";
            $result=mysqli_query($connection,$query);
            if(!$result)
            {
                die("errror");
            }
/******************************************************** End Manage Page Code ****************************************************************/
?>
<!------------------------------------------------------- Start Manage Page Body ------------------------------------------------------------->

    <h1 class="text-center"><?php echo lang('MANAGE_STUDENT_TITLE') ?></h1>

        <div class="table-responsive">
        <table id="example" class="table table-bordered" style="width:100%">
                    <thead class="main-table ">
                <tr>
                  <td><?php echo lang('USERNAME_T') ?></td>
                  <td><?php echo lang('EMAILE_T') ?></td>
                  <td><?php echo lang('STUDENT_CODE_T') ?></td>
                  <td><?php echo lang('STUDENT_LEVEL_ID_T') ?></td>
                  <td><?php echo lang('REGISTERED_DATE_T') ?></td>
                  <td><?php echo lang('ACTION_T') ?></td>
                </tr>
                </thead>    
        <?php
              
                   while($row=mysqli_fetch_array($result))
                   {
                   echo'<tr>';
                       echo'<td>'.$row['Student_Name'].'</td>';
                       echo'<td>'.$row['Student_Email'].'</td>';
                       echo'<td>'.$row['Student_Code'].'</td>';
                       if($row['Student_Level_ID'] == 1){
                           echo'<td>First Level</td>';
                       }elseif($row['Student_Level_ID'] == 2){
                            echo'<td>Second Level</td>';
                       }elseif($row['Student_Level_ID'] == 3){
                            echo'<td>Third Level</td>';
                       }else{
                            echo'<td>Fourth Level</td>';
                       }
                       echo'<td>'.$row['Date'].'</td>';
                       echo'<td>';
                                echo '<a href="staff.php?do=Edit&Student_ID='.$row['Student_ID'].'" class="btn btn-success">
                                <i class="fa fa-edit"></i>';
                                echo lang('EDIT_T');
                                echo '</a>';

                                echo '&nbsp;<a href="staff.php?do=Delete&Student_ID='.$row['Student_ID'].'" class="btn btn-danger confirm">
                                <i class="fa fa-user-times"></i>';
                                echo lang('DELETE_T');
                                echo'</a>';

                                if($row['Student_Accept']== 0)
                                {
                                echo'&nbsp;<a href="staff.php?do=Activate&Student_ID='.$row['Student_ID'].'" class=" btn btn-info activate">
                                <i class="fa fa-user-check"></i>';
                                echo lang('ACTIVE_T');
                                echo'</a>';
                                }

                       echo '</td>';
                   echo'</tr>';
                   }
               
        ?>
                 
            </table>
        </div>
        <a href="staff.php?do=Add" class="btn btn-primary"><i class="fas fa-user-plus"></i><?php echo lang('ADD_NEW_STAFF_B') ?></a>
    
<!------------------------------------------------------- End Manage Page Body -------------------------------------------------------------> 

        
   <?php }elseif($do =='Add'){ 
/******************************************************** Start Add Page ****************************************************************/        
?>
<!------------------------------------------------------- Start Add Page Body ------------------------------------------------------------->
    <div class="container" > 
        <br><br>
        <form action="?do=Insert" method="post" enctype="multipart/form-data"> <!--redircte to same page but send insert by GET -->
           <div class="card">
                  <div class="card-header text-center colcard" style="font-size:25px;">
                    Add New Staff Or Student
                  </div>
                <div class="card-body">
            <!-- Start row one -->
            <div class="form-row">
                <!-- Start Field Staff SSN -->
                <div class="form-group col-md-6">
                    <input type="password" name="password" class="form-control" autocomplete="new-passowrd" placeholder="<?php echo lang('E_PASSWORD') ?>" required="required">

                </div>
                <!-- End Field Staff SSN -->

                <!-- Start Field Staff Name -->
                <div class="form-group col-md-6">
                    <input type="text" name="username" class="form-control" placeholder="<?php echo lang('E_USERNAME') ?>" required="required" >
                </div>
                <!-- End Field Staff Name -->
            </div>
            <!-- End row one -->

            <!-- Start row tow -->
            <div class="form-row">
                <!-- Start Field Staff Email -->
                <div class="form-group col-md-6">
                  <input type="email" name="email" class="form-control" autocomplete="off" placeholder="<?php echo lang('E_EMAIL') ?>" required="required">
                </div>
                <!-- End Field Staff Email -->

                <!-- Start Field Staff Phone -->
                <div class="form-group col-md-6">
                    <input type="text" name="phone" class="form-control" id="inputAddress" placeholder="<?php echo lang('E_PHONE') ?>" required="required" >
                </div>
                <!-- End Field Staff Phone -->
            </div>
            <!-- End row Tow -->
            <!-- Start row three -->
            <div class="form-row">
                <!-- Start Field Staff Email -->
                <div class="form-group col-md-6">
                  <input type="text" name="scode" class="form-control" autocomplete="off" placeholder="<?php echo lang('E_STUDENT_CODE') ?>">
                </div>
                <!-- End Field Staff Email -->

                <!-- Start Field Staff Phone -->
                <div class="form-group col-md-6">
                    <input type="text" name="address" class="form-control" id="inputAddress" placeholder="<?php echo lang('E_ADDRESS') ?>">
                </div>
                <!-- End Field Staff Phone -->
            </div>
            <!-- End row three -->
            
            <!-- Start row Three -->
            <!-- Start Field Staff Type -->
            <div class="form-row">
                <div class="form-group col-md-6">
                  <select name="type" id="inputState" class="form-control">
                      <option><?php echo lang('S_TYPE') ?></option>
                      <option value="Manager"><?php echo lang('MANAGER') ?></option>
                      <option value="Admin"><?php echo lang('ADMIN') ?></option>
                      <option value="Student"><?php echo lang('STUDENT') ?></option>
                  </select>
                </div>
            <!-- End Field Staff Type -->
            <!-- Start Field Staff_Levels_ID-->
            <div class="form-group col-md-6">
              <select name="fun" class="form-control">
                  <option><?php echo lang('S_LEVELS') ?></option>
                  <option  value="1"><?php echo lang('FIRST_LEVEL') ?></option>
                  <option value="2"><?php echo lang('SECOUND_LEVEL') ?></option>
                  <option value="3"><?php echo lang('THIRD_LEVEL') ?></option>
                  <option value="4"><?php echo lang('FOURTH_LEVEL') ?></option>
                  <option value="0"><?php echo lang('NOTHING') ?></option>
              </select>
            </div>
            <!-- End Field Staff_Levels_ID -->
            </div>
            <!-- End row Three -->
            <!-- Start row Four -->
            <div class="form-row">
                <!-- Start Field Staff Email -->
                <div class="form-group col-md-6">
                   <select name="gender" id="inputState" class="form-control">
                      <option><?php echo lang('S_GANDER') ?></option>
                      <option value="Male"><?php echo lang('MALE') ?></option>
                      <option value="Female"><?php echo lang('FEMALE') ?></option>
                  </select>
                </div>
                <!-- End Field Staff Email -->

                <!-- Start Field Staff Phone -->
                <div class="form-group col-md-6">
                    <input type="text" name="gpa" class="form-control" id="inputAddress" placeholder="<?php echo lang('E_GPA') ?>">
                </div>
                <!-- End Field Staff Phone -->
            </div>
            <!-- End row Four -->
            <!-- Start row Five -->
            <div class="form-row">
              <div class="form-group col-md-6">
                  <input type="file" name="image" class="custom-file-input" id="customFile">
                  <label class="custom-file-label" for="customFile"><?php echo lang('CHOOSE_IMAGE') ?></label>
              </div>
            </div>
            <!-- Start row Five -->

            <!-- Button to Sent Data to Insert Page -->
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-danger col-md-4 center-block"><i class="fas fa-user-plus"></i><?php echo lang('ADD_NEW_STAFF_B')?></button>
            </div>
            </div>
            </div>
        </form>
    </div>
<!------------------------------------------------------- End Add Page Body ----------------------------------------------------------------->
         
<?php 
/******************************************************** Start Insert Page Code ***********************************************************/

    }elseif($do=='Insert')
    {
            //Insert New Staff
           // echo $_POST['username']. $_POST['password'] .$_POST['email'] .$_POST['admin'] .$_POST['fun'];
            
    echo '<div class="container" > ';

        if($_SERVER['REQUEST_METHOD']=='POST')
        {
             echo"<h1 class='text-center'>Insert Staff</h1>";
            //Get Variable from Form
            $PassSSN  = $_POST['password'];
            $Username = $_POST['username'];
            $Email    = $_POST['email'];
            $Phone    = $_POST['phone'];
            $Scode    = $_POST['scode'];
            $Address = $_POST['address'];
            $Type    = $_POST['type'];
            $FunClass = $_POST['fun'];
            $Gender   = $_POST['gender'];
            $GPA    = $_POST['gpa'];
            
            $hashPass=sha1($_POST['password']);


            //Upload image
            $ImageName = $_FILES['image']['name'];
            $ImageSize = $_FILES['image']['size'];
            $ImageTmp  =  $_FILES['image']['tmp_name'];
            $ImageType = $_FILES['image']['type'];
            //List Of Allowed Type To Upload
            $imageAllowedExtension=array("jpeg","png","jpg","gif");
            //Get Image Extension
            $imageExtension=strtolower(end(explode('.',$ImageName)));




            //Validate The Form 
            $FormErrors=array();

            if(strlen($Username)< 4 || strlen($Username) >20 ){
                $FormErrors[]=
                    'UserName Not Can Less Than <strong> 4 Characters</strong> And Greater Than <strong> 20 Characters</strong> ';
            }
            if(empty($Username) ||empty($Email) || empty($Phone) || empty($Type) || empty($PassSSN) || empty($ImageName) )
            {
                $FormErrors[]='All Filed Required';
            }
            if(!empty($ImageName) && !in_array($imageExtension,$imageAllowedExtension)){
                $FormErrors[]='This Extension Not <strong>Allowed</strong>';
            }
            if($ImageSize > 4194304){
                $FormErrors[]='Size of Image Not Procced <strong>4MB</strong>';
            }
            if(strlen($PassSSN) != 14){
                $FormErrors[]='Enter The SSN that Consist From <strong>14 Numbers</strong>';
            }


            foreach($FormErrors as $error){
                echo'<div class="alert alert-danger">' .$error .'</div>';
            }
            //Chech If There's No Error Proceed The Update Operation
            if(empty($FormErrors)){
                $iamges= rand(0,100000000).'_'.$ImageName;
               move_uploaded_file($ImageTmp,"Upload\\".$iamges);

                $check=checkItem("Student_Name","student",$Username);
                $checkSSN=checkItem("Student_SSN","student",$hashPass);

                if($check == 1 || $checkSSN ==1 ){
                    $theMsg= '<div class="alert alert-danger" >sorry this user exist</div>';
                    redirectHome($theMsg,'back');
                }else{
                    //Insert The DB Whith This Info
                $query="Insert into student(Student_SSN,Student_Name,Student_Email,Student_Phone,Student_Code,Student_Address,Student_Type,Student_Level_ID,Student_Gender,Student_GPA,Date,Student_Accept,Student_Image) VALUES('".$hashPass."','".$Username."','".$Email."','".$Phone."','".$Scode."','".$Address."','".$Type."','".$FunClass."','".$Gender."','".$GPA."',now(),1,'".$iamges."')";
                $result=mysqli_query($connection,$query);
                if(!empty($result)){

                $theMsg= '<div class="alert alert-success alert-dismissible fade show" role="alert" >Data is Inserted</div>';
                redirectHome($theMsg,'back');

                    } 
                }
           }
        }else
        {
         echo '<div class="container">';
            $theMsg= '<div class="alert alert-danger">Sorry You Not Can Brows This Page Direct</div>';
            redirectHome($theMsg,'back');
         echo '</div>';

        }
        /*End Class Container */
    echo '</dive>'; 
/******************************************************** End Insert Page Code ***********************************************************/
    
    }elseif($do =='Edit'){ //Edit Page
            
            // Check If GET Request SSN Is Numeric & Get The Integer Value Of It 
            
            echo '<div class="container" > ';
            
            $Student_id=isset($_GET['Student_ID']) && is_numeric($_GET['Student_ID'])?intval($_GET['Student_ID']):0; //content ssn own admin
            
            
            //Select All Data From DB Depend On This SSN
            $query="select * from student where Student_ID='".$Student_id."' Limit 1 ";
            
            //Execute Query
            $result=mysqli_query($connection,$query);
            
            //If Select Content The Data $count Content The Number Of Row Featched
            $count=mysqli_num_rows($result);
            
            //Fetch The Data and Store In Var $row
            $row=mysqli_fetch_array($result);
            
            //If $count value greater than from 0 .. return data in inputs
            if($count > 0)
            {?>
                <h1 class="text-center">Edit Profile Staff</h1>
                <form action="?do=Update" method="post" enctype="multipart/form-data"> <!--redircte to same page but send insert by GET -->
                    <input type="hidden" name="ID" value="<?php echo $Student_id; ?>" >
                    <!-- Start row one -->
                    <div class="form-row">
                        <!-- Start Field Staff SSN -->
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Password (Notional ID)</label>
                            <input type="hidden" name="oldpassword" value="<?php echo $row['Student_SSN'] ?>" >
                            <input type="password" name="newpassword" class="form-control" autocomplete="new-passowrd" placeholder="Leave Blank If You Don't Want Change">

                        </div>
                        <!-- End Field Staff SSN -->

                        <!-- Start Field Staff Name -->
                        <div class="form-group col-md-6">
                            <label >UserName</label>
                            <input type="text" name="username" value="<?php echo $row['Student_Name']?>" class="form-control" placeholder="Name Must Be Valid" required="required" >
                        </div>
                        <!-- End Field Staff Name -->
                    </div>
                    <!-- End row one -->

                    <!-- Start row tow -->
                    <div class="form-row">
                        <!-- Start Field Staff Email -->
                        <div class="form-group col-md-6">
                          <label>E-mail</label>
                          <input type="text" name="email" value="<?php echo $row['Student_Email']?>" class="form-control" autocomplete="off" placeholder="E-mail Must Be Valid" required="required">
                        </div>
                        <!-- End Field Staff Email -->

                        <!-- Start Field Staff Phone -->
                        <div class="form-group col-md-6">
                            <label>Phone</label>
                            <input type="text" name="phone" value="<?php echo $row['Student_Phone']?>" class="form-control" placeholder="Phone" required="required" >
                        </div>
                        <!-- End Field Staff Phone -->
                    </div>
                    <!-- End row Tow -->
                     <!-- Start row three -->
                    <div class="form-row">
                        <!-- Start Field Staff Email -->
                        <div class="form-group col-md-6">
                          <label ><?php echo lang('STUDENT_CODE') ?></label>
                          <input type="text" name="scode" value="<?php echo $row['Student_Code']?>" class="form-control" >
                        </div>
                        <!-- End Field Staff Email -->

                        <!-- Start Field Staff Phone -->
                        <div class="form-group col-md-6">
                            <label ><?php echo lang('ADDRESS') ?></label>
                            <input type="text" name="address" value="<?php echo $row['Student_Address']?>" class="form-control">
                        </div>
                        <!-- End Field Staff Phone -->
                    </div>
                    <!-- End row three -->
                    <!-- Start row Three -->
                     <!-- Start Field Staff Type -->
            <div class="form-row">
                <div class="form-group col-md-6">
                  <label><?php echo lang('STAFF_TYPE') ?></label>
                  <select name="type" class="form-control">
                      <option>                  <?php echo lang('S_TYPE') ?>     </option>
                      <option value="Manager" > <?php echo lang('MANAGER') ?>    </option>
                      <option value="Admin"   > <?php echo lang('ADMIN') ?>      </option>
                      <option value="Student" > <?php echo lang('STUDENT') ?>    </option>
                  </select>
                </div>
                <!-- End Field Staff Type -->
                <!-- Start Field Staff_Levels_ID-->
                <div class="form-group col-md-6">
                  <label><?php echo lang('STUDY_LEVELS') ?></label>
                  <select name="fun" class="form-control">
                      <option>          <?php echo lang('S_LEVELS') ?>          </option>
                      <option value="1"><?php echo lang('FIRST_LEVEL') ?>       </option>
                      <option value="2"><?php echo lang('SECOUND_LEVEL') ?>     </option>
                      <option value="3"><?php echo lang('THIRD_LEVEL') ?>       </option>
                      <option value="4"><?php echo lang('FOURTH_LEVEL') ?>      </option>
                      <option value="5"><?php echo lang('NOTHING') ?>           </option>
                  </select>
                </div>
            <!-- End Field Staff_Levels_ID -->
            </div>
            <!-- End row Three -->
            <!-- Start row Four -->
            <div class="form-row">
                <!-- Start Field Staff Email -->
                <div class="form-group col-md-6">
                  <label><?php echo lang('GANDER') ?></label>
                   <select name="gender" class="form-control">
                      <option><?php echo lang('S_GANDER') ?></option>
                      <option value="Male"   ><?php echo lang('MALE') ?></option>
                      <option value="Female" ><?php echo lang('FEMALE') ?></option>
                  </select>
                </div>
                <!-- End Field Staff Email -->

                <!-- Start Field Staff Phone -->
                <div class="form-group col-md-6">
                    <label ><?php echo lang('GPA') ?></label>
                    <input type="text" name="gpa" value="<?php echo $row['Student_GPA']?>" class="form-control">
                </div>
                <!-- End Field Staff Phone -->
            </div>
            <!-- End row Four -->

                    <!-- Start row Four -->
                    <div class="form-row">
                      <div class="form-group col-md-6">
                          <input type="file" name="image" class="custom-file-input">
                          <label class="custom-file-label" for="customFile">Choose Image</label>
                      </div>
                    </div>
                    <!-- Start row Four -->

                    <!-- Button to Sent Data to Insert Page -->
                    <div class="col-md-12 text-center">
                       <button type="submit" class="btn btn-primary col-md-4 center-block"><i class="far fa-save"></i> &nbsp;Save Change</button>
                    </div>
                </form>
 <?php 
                //If $count not include data this else excuted
            }else{
               
                echo '<div class="container">';
                    $theMsg= '<div class="alert alert-danger">There is not such SSN</div>';
                   // redirectHome($theMsg);
                 echo '</div>';
                
            }
            echo '</div>';
}elseif($do=='Update'){ // Update Page
    echo '<h1 class="text-center">Update Page</h1>';
    echo '<div class="container" > ';
    if($_SERVER['REQUEST_METHOD']=='POST'){
        //Get Variable from Form
        $Student_Id = $_POST['ID'];
        $Username = $_POST['username'];
        $Email    = $_POST['email'];
        $Phone    = $_POST['phone'];
        $Scode    = $_POST['scode'];
        $Address  = $_POST['address'];
        $Type     = $_POST['type'];
        $FunClass = $_POST['fun'];
        $Gender   = $_POST['gender'];
        $GPA      = $_POST['gpa'];

        //Password code
        /*$pass='';if(empty($_POST['newpassword'])){$pass=$_POST['oldpassword'];}else{$pass=sha1($_POST['newpassword']);}*/

         $pass=empty($_POST['newpassword']) ? $_POST['oldpassword']: sha1($_POST['newpassword']);

        //echo $ssn . $username . $password;

        //Upload image
        $ImageName = $_FILES['image']['name'];
        $ImageSize = $_FILES['image']['size'];
        $ImageTmp  = $_FILES['image']['tmp_name'];
        $ImageType = $_FILES['image']['type'];
        //List Of Allowed Type To Upload
        $imageAllowedExtension=array("jpeg","png","jpg","gif");
        //Get Image Extension
        $imageExtension=strtolower(end(explode('.',$ImageName)));




        //Validate The Form 
        $FormErrors=array();

        if(strlen($Username)< 4 || strlen($Username) >20 ){
            $FormErrors[]='UserName Not Can Less Than <strong> 4 Characters</strong> And Greater Than <strong> 20 Characters</strong> ';
        }
        if(strlen($_POST['newpassword'])>15){
            $FormErrors[]='Please Enter SSN <strong> 14 Numbers</strong>';
        }
        if(empty($Username) ||empty($Email) || empty($Phone) || empty($Type) || empty($ImageName) )
        {
            $FormErrors[]='All Filed Required';
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
            $query=
            "UPDATE 
            student
            SET 
            Student_SSN     =   '".$pass."',
            Student_Name    =   '".$Username."',
            Student_Email   =   '".$Email."',
            Student_Phone   =   '".$Phone."',
            Student_Code    =   '".$Scode."',
            Student_Address =   '".$Address."',
            Student_Type    =   '".$Type."',
            Student_Level_ID=   '".$FunClass."',
            Student_Gender  =   '".$Gender."',
            Student_GPA     =   '".$GPA."',
            Student_Image   =   '".$iamges."' 
            WHERE Student_ID=   '".$Student_Id."' "; 
            $result=mysqli_query($connection,$query);
            if(!empty($result))
            $theMsg= '<div class="alert alert-success alert-dismissible fade show" role="alert" >Data is Updated</div>';redirectHome($theMsg,'back');
                        
            }
        }else{
        echo '<div class="container">';
            $theMsg= '<div class="alert alert-danger">Sorry You Not Can Brows This Page Direct</div>';
            redirectHome($theMsg,'back');
         echo '</div>';

    }
        echo '</div>';


}elseif($do == 'Activate'){
             echo '<h1 class="text-center">Activate Page</h1>';
            echo '<div class="container" > ';
                       // Check If GET Request SSN Is Numeric & Get The Integer Value Of It 

                    $Student_Id=isset($_GET['Student_ID']) && is_numeric($_GET['Student_ID'])?intval($_GET['Student_ID']) : 0; //content ssn own admin


                    //Select All Data From DB Depend On This SSN
                    //$query="select * from staff where Staff_ID='".$Staff_id."' Limit 1 ";
                    $check=checkItem("Student_ID","student",$Student_Id);

               
                    //If $count value greater than from 0 .. return data in inputs
                    if($check > 0)
                    {
                           $query="UPDATE student SET Student_Accept =1 WHERE Student_ID='".$Student_Id."' "; 
                             $result=mysqli_query($connection,$query);
                            if(!empty($result))
                                $theMsg= '<div class="alert alert-success alert-dismissible fade show" role="alert" >This Staff Is Activated </div>';
                                redirectHome($theMsg,'back');


                    }else{
                        $theMsg='<div class="alert alert-danger">this id is not exist</div>';
                        redirectHome($theMsg);

                    }
        
                echo '</div>';
        
        
}elseif($do='Delete'){
            
                    //Delete page
                    echo '<h1 class="text-center">Delete Page</h1>';
                    echo '<div class="container" > ';
                       // Check If GET Request SSN Is Numeric & Get The Integer Value Of It 

                    $Student_Id=isset($_GET['Student_ID']) && is_numeric($_GET['Student_ID'])?intval($_GET['Student_ID']) : 0; //content ssn own admin


                    //Select All Data From DB Depend On This SSN
                    //$query="select * from staff where Staff_ID='".$Staff_id."' Limit 1 ";
                    $check=checkItem("Student_ID","student",$Student_Id);

                    //Execute Query
                  //$result=mysqli_query($connection,$query);

                    //If Select Content The Data $count Content The Number Of Row Featched
                   // $count=mysqli_num_rows($result);

                    //If $count value greater than from 0 .. return data in inputs
                    if($check > 0)
                    {
                           $query="DELETE FROM student WHERE Student_ID='".$Student_Id."' "; 
                             $result=mysqli_query($connection,$query);
                            if(!empty($result))
                                $theMsg= '<div class="alert alert-success alert-dismissible fade show" role="alert" >This Staff Is Deleted </div>';
                                redirectHome($theMsg,'back');


                    }else{
                        $theMsg='<div class="alert alert-danger">this id is not exist</div>';
                        redirectHome($theMsg);

                    }
        
                echo '</div>';
        }
        
       include $tpl.'footer.php'; 
        
    }else{
        // If Not Register In Session Redirected To index.php 
        header('location:index.php');
        exit();
    }

?>
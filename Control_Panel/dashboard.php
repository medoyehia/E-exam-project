<?php
    session_start();
    $noNavbar='';
    $navSider='';
    $pageTitle='Dashboard';
    if(isset($_SESSION['username']))
    {
       
        include 'init.php';
         $numLatest=5;
         
?>
 <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4" style="font-family: serif; color:#08526d">Control panel</h1>
                       <!-- <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Search</li>
                        </ol>-->
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-info text-white mb-4">
                                    <div class="card-body"><i class="fa fa-users s"></i> Total Staff<br>
                                     <span><?php echo countItems("Student_ID","student","Student_Type","Admin"); ?>%</span>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="staff.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body"> <i class="fa fa-user-graduate s"></i> Total Student<br>
                                   <span><?php echo countItems("Student_ID","student","Student_Type","Student"); ?>%</span>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="staff.php?do=ManageStudent">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body"> <i class="fa fa-user-plus s"></i> Pending Student <br>
                                     <span><?php echo checkItem("Student_Accept","student",0); ?>%</span>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="staff.php?do=ManageStudent&page=PendingStudent">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body"><i class="fa fa-comments s"></i> Total Requests <br>
                                    27%
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                     </div>
               
        <div class="latest">
            <div class="container">
                <div class="row latest">
                    <div class="col-sm-6">
                    <div class="card">
                            <div class="card-header colcard ">
                            <i class="fa fa-users"></i> Latest <?php echo $numLatest;?> Student Registerations 
                                <span class="toggle-info float-right">
                                    <i class="fa fa-plus fa-lg"></i>
                                </span>
                             </div>
                              <div class="card-body">

                             <?php 
                             echo  getLatest("Student_Name","student","Student_Type","Student","Student_ID",$numLatest); 
                             ?>

                              </div>
                          </div>
                        </div>
                    <div class="col-sm-6">
                    <div class="card">
                            <div class="card-header colcard ">
                            <i class="fa fa-users"></i> Latest <?php echo $numLatest;?> Staff Registerations 
                                <span class="toggle-info float-right">
                                    <i class="fa fa-plus fa-lg"></i>
                                </span>
                             </div>
                              <div class="card-body">

                             <?php 
                             echo  getLatest("Student_Name","student","Student_Type","Admin","Student_ID",$numLatest); 
                             ?>

                              </div>
                          </div>
                </div>
            </div>
        </div>
    </div>
 </main>
    <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; developer team</div>
                            <div>
                                <a href="#">FCI SE Dept 2019-2020</a>
                            </div>
                        </div>
                    </div> </footer>
            </div>
        </div>
<?php 
        /*End Dashboard Page*/
        include $tpl.'footer.php'; 
        
    }else{
        // If Not Register In Session Redirected To index.php 
        header('location:index.php');
    }

?>

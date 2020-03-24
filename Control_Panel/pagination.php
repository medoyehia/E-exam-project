 <?php 
             include 'connect.php';
             $record_per_page = 3;  
             $page = '';  
             $output = '';  
             if(isset($_GET["page"]))  
             {  
                  $page = $_GET["page"];  
             }  
             else  
             {  
                  $page = 1;  
             } 
            $start_from = ($page - 1)*$record_per_page;  
            //Select All Admin Except Manager 
            $query="SELECT request.*,student.Student_Name,student.Student_Code,levels.Level_Name,levels_department.Department_Name,wish_statment.Wish_Name,services.Filename
            FROM request
            INNER JOIN
            student
            ON
            student.Student_ID=request.Request_Student_ID
            INNER JOIN
            levels
            ON
            levels.Level_ID=request.Request_Level_ID
            INNER JOIN
            levels_department
            ON
            levels_department.Department_ID=request.Request_Dept_ID
            INNER JOIN
            wish_statment
            ON
            wish_statment.Wish_ID=request.Request_Wish_ID
            INNER JOIN
            services
            ON
            services.ID=request.Request_Classification
            LIMIT 
            $start_from, $record_per_page
            ";
            $result=mysqli_query($connection,$query);
            if(!$result)
            {
                die("errror");
            }
           
            
            
?>

   
<?php 
     $output .= '  <div class="table-responsive" id="pagination_data">
                    <table class="main-table text-center table table-bordered">
                        <tr>
                          <td>Student Name</td>
                          <td>Studen Code</td>
                          <td>Level Name</td>
                          <td>Department Name</td>
                          <td>Wish Name </td>
                          <td>Division</td>
                          
                            <td>Action </td>

                        </tr>'; 
        
               while($row=mysqli_fetch_array($result))
               { $output .= '<tr>  
                       <td>'.$row['Student_Name'].'</td>
                       <td>'.$row['Student_Code'].'</td>
                       <td>'.$row['Level_Name'].' </td>
                       <td>'.$row['Department_Name']. '</td>
                       <td>'.$row['Wish_Name']. '</td>
                       <td>'.$row['Request_Division'].' </td>
                      
                       <td> 
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myReplay'.$row['Request_ID'].'"><i class="fa fa-reply-all"></i> Reply</button>

                            <a href="Requests.php?do=Delete&Request_ID='.$row['Request_ID'].' " class="btn btn-danger confirm">
                            <i class="fa fa-user-times"></i>
                           Delete
                            </a>

                           <button type="button" class="btn btn-warning text-white" data-toggle="modal" data-target="#myModal'.$row['Request_ID'].'"><i class="fa fa-eye"></i> View</button>
                    </td>
                  </tr> ';
               
                   
                ?>
                 <div id="myModal<?php echo $row['Request_ID'] ?>" class="modal fade bd-example-modal-lg" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header colcard">
                                 <h5 class="modal-title text-white">Request detailes</h5>
                                 <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                             <div class="container">
                                 <div class="row">
                                     <div class="col col-sm-4">
                                        <label class="text-info">Student Name :</label>
                                     </div>
                                     <div class="col col-sm-4">
                                        <?php echo $row['Student_Name']; ?>
                                     </div>
                                </div>
                                 <div class="row">
                                     <div class="col col-sm-4">
                                        <label class="text-info">Student Email :</label>
                                     </div>
                                     <div class="col col-sm-4">
                                        <?php echo $row['Requester_Email']; ?>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col col-sm-4">
                                        <label class="text-info">Level :</label>
                                     </div>
                                     <div class="col col-sm-4">
                                        <?php echo $row['Level_Name']; ?>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col col-sm-4">
                                        <label class="text-info">Department :</label>
                                     </div>
                                     <div class="col col-sm-4">
                                        <?php echo $row['Department_Name']; ?>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col col-sm-4">
                                        <label class="text-info">Wish Name :</label>
                                     </div>
                                     <div class="col col-sm-4">
                                        <?php echo $row['Wish_Name']; ?>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col col-sm-4">
                                        <label class="text-info">Division :</label>
                                     </div>
                                     <div class="col col-sm-4">
                                        <?php echo $row['Request_Division']; ?>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col col-sm-4">
                                        <label class="text-info">Filename :</label>
                                     </div>
                                     <div class="col col-sm-4">
                                        <?php echo $row['Filename']; ?>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col col-sm-4">
                                        <label class="text-info">Request Other Title :</label>
                                     </div>
                                     <div class="col col-sm-4">
                                        <?php echo $row['Request_Other_Title']; ?>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col col-sm-4">
                                        <label class="text-info">Request Priority :</label>
                                     </div>
                                     <div class="col col-sm-4">
                                        <?php echo $row['Request_Priority']; ?>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col col-sm-4">
                                        <label class="text-info">Position Recruitment :</label>
                                     </div>
                                     <div class="col col-sm-4">
                                        <?php echo $row['Position_Recruitment']; ?>
                                     </div>
                                 </div>
                                 
                             </div>
                            </div>
                            <div class="modal-footer">
                               <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
		          </div>
<!----------------------------------------------------------------Rplay--------------------------------------------------------->
               <div id="myReplay<?php echo $row['Request_ID'] ?>" class="modal fade bd-example-modal-lg" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header colcard">
                                 <h5 class="modal-title text-white">Reply</h5>
                                 <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                             <div class="container">
                                 <div class="row">
                                     <div class="col col-sm-12">
                                         <input type="text" id="name" class="form-control input"  placeholder="Enter Your Name" required="required">
                                     </div>
                                 </div>
                                 <br>
                                <div class="row">
                                    &nbsp; &nbsp; 
                                    <div class="col col-sm-11">
                                         <input type="file" name="image" class="custom-file-input" id="customFile">
                                         <label class="custom-file-label" for="customFile">CHOOSE_IMAGE</label>
                                     </div>
                                </div>
                                 <br>
                                   <div class="row">
                                    <div class="col col-sm-12">
                                    <button type="submit" class="btn btn-info col-sm-12 center-block"><i class="fas fa-reply-all"></i>
                                        Replay    
                                    </button>                               
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
               <?php } ?>
       <?php
             $output .= '</table></div><br /><div align="center">';  
                 $page_query = "SELECT request.*,student.Student_Name,student.Student_Code,levels.Level_Name,levels_department.Department_Name,wish_statment.Wish_Name,services.Filename
                FROM request
                INNER JOIN
                student
                ON
                student.Student_ID=request.Request_Student_ID
                INNER JOIN
                levels
                ON
                levels.Level_ID=request.Request_Level_ID
                INNER JOIN
                levels_department
                ON
                levels_department.Department_ID=request.Request_Dept_ID
                INNER JOIN
                wish_statment
                ON
                wish_statment.Wish_ID=request.Request_Wish_ID
                INNER JOIN
                services
                ON
                services.ID=request.Request_Classification";  
                 $page_result = mysqli_query($connection, $page_query);
                 $total_records = mysqli_num_rows($page_result);  
                 $total_pages = ceil($total_records/$record_per_page); 
                $Previous  =$page - 1;
                if($Previous == 0)
                 $Previous   =1;
                 $Next       =$page + 1;
                 $output .= "<span class='pagination_link' style='cursor:pointer;background-color:#fff;padding:12px; border:1px solid #bdc3c7;color:#3498db;border-top-left-radius: 5px; border-bottom-left-radius: 5px;font-weight: bold;' id='".$Previous."'>Previous</span>";
                  for($i=1; $i<=$total_pages; $i++)  
                         {  
                            
                            $output .= "<span class='pagination_link' style='cursor:pointer;background-color:#fff;padding:12px; border:1px solid #bdc3c7;color:#3498db;font-weight: bold;' id='".$i."'>".$i."</span>";  
                         }
                 $output .= "<span class='pagination_link' style='cursor:pointer;background-color:#fff;padding:12px; border:1px solid #bdc3c7;color:#3498db;border-top-right-radius: 5px;border-bottom-right-radius: 5px;font-weight: bold;' id='".$Next."'>Next</span>";
                 $output .= '</div><br /><br />';  
                 echo $output; 
        ?>
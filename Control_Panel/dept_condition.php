<?php
    session_start();
    $pageTitle='Services_page';
    if(isset($_SESSION['username'])) 
    {
        
         include 'init.php';
        
        $do=isset($_GET['do'])?$_GET['do']:'Manage';
        if($do == 'Manage'){
        
            
            $query="Select * From tests";
            $result=mysqli_query($connection,$query);
            if(!$result)
            {
                die("errror");
            }
        ?>


    <div class="latest">
      <div class="container">
          <div class="row">
              <div class="col-sm-10">
              <div class="card">
                      <div class="card-header colcard ">
                          <h3 class="text-right"> شروط القبول بالأقسام العلمية (الأنتظام/ الانتساب) فى العام الجامعى 2019-2020م </h3>
                          <div class="option lext-left">
                               <label class="text-warning">Display:</label>
                              <span  data-view="full" >Full</span>
                              <span class="active" data-view="helf">| Hlef</span>
                          </div>
                          
                      </div>
                      <div class="card-body text-right">
                          <?php
                            while($row=mysqli_fetch_array($result))
                            {
                                echo'<div class="condition">';
                                    echo'<h3 class="text-success">'.$row['Name'].' <i class="far fa-check-square text-warning"></i></h3>';
                                    echo'<div class="full-view" >';
                                        echo'<p>'.$row['Description'].'</p>';
                                        echo'<button class="btn btn-info "> تحميل الرغبات </button>';
                                    echo '</div>';
                                echo '</div>';
                            }
                          ?>
                      </div>
                      <div class="card-footer">
                          <div class="row">
                              <div class="col col-sm-12">
                                  <button class="btn btn-success col-sm-4 center-block" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                             </div> 
                          </div>
                        
                      </div>
              </div>
          </div>
          </div>
        </div>
    </div>

        <?php ///////////////////////////////////////////////////// ADD Requests /////////////////////////////////////////////////////
        }elseif($do == 'Add') {
         ///////////////////////////////////////////////////// Insert Requests In DataBase //////////////////////////////////////
        }elseif($do == 'Insert') {
        ///////////////////////////////////////////////////// Edit Requests ////////////////////////////////////////////////////
        }elseif($do == 'Edit') {
       ///////////////////////////////////////////////////// Update Requests In DataBase //////////////////////////////////////
        }elseif($do == 'Update') {
               
        ///////////////////////////////////////////////////// Delete Requests In DataBase //////////////////////////////////////
        }elseif($do == 'Delete') {
            
        }
         
        
                echo '</div>';
        
      include $tpl.'footer.php';
        
    }else {
        
        header('location:index.php');
        exit();
        
    }

 ?>
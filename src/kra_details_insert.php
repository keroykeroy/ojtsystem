<?php
    require_once("../conn/connection.php");
    include_once("../conn/session.php");
?>


<?php  

  if(!empty($_POST)){ 
      
      $output = '';  
      $message = ''; 

      $kra_target_perc = mysqli_real_escape_string($connection, $_POST["kra_target_perc"]);   
      $kra_item_perc = mysqli_real_escape_string($connection, $_POST["kra_item_perc"]);  
      $kra_obj = mysqli_real_escape_string($connection, $_POST["kra_objective"]);  
      $kra_quality = mysqli_real_escape_string($connection, $_POST["kra_quality"]);  
      $kra_eff = mysqli_real_escape_string($connection, $_POST["kra_eff"]);  
      $kra_time = mysqli_real_escape_string($connection, $_POST["kra_time"]);  
      $kra_no = mysqli_real_escape_string($connection, $_POST["kra_no"]);
        
      if($_POST["kra_id"] != ''){

        $query = "UPDATE users_kra SET `kra_item_percentage`='$kra_item_perc',`kra_objective`='$kra_obj',`kra_quality`='$kra_quality',`kra_efficiency`='$kra_eff', `kra_timeliness` = '$kra_time' WHERE kra_id='".$_POST["kra_id"]."' AND t_id = '$u_id'";  

        $query_x = "UPDATE users_kra SET `kra_target_percentage` = '$kra_target_perc' WHERE kra_no = '$kra_no' AND t_id = '$u_id'";
        $message = 'Data Updated';  

      }else{
        $query = "SELECT * from users_kra where t_id = '$u_id' ORDER BY kra_no ASC";  
      }


      if(mysqli_query($connection, $query) AND mysqli_query($connection,$query_x)){  

           $output .= '<center>';
           $output .= '<div id="success-alert">
                        <label class="text-success">' . $message . '</label>
                      </div>';  
           $output .='</center>';
           $select_query = "SELECT * FROM users_kra where t_id = '$u_id' ORDER BY kra_no ASC";  
           $result = mysqli_query($connection, $select_query);  
           $output .= '  
              <div id="employee_table"> 
                 <div class="table-wrapper-scroll-y">
                      <table class="table table-hover" id="crud_table">
                          <thead class="thead">
                            <tr>
                              <th width="5%">KRA No</th>
                              <th width="50%">Objective</th>
                              <th width="10%">Quality</th>          
                              <th width="10%">Efficiency</th>
                              <th width="10%">Timeliness</th>
                              <th width="5%">Item Percentage</th>
                              <th width="5%">Target Percentage</th>
                              <th width="5%" colspan="2">Active</th>
                            </tr>
                          </thead>
           ';  
           while($row = mysqli_fetch_array($result)){  
                $output .= '              <tbody>
                                            <tr>
                                                <td>'.$row['kra_no'] .".".$row['kra_items'].'</td>
                                                <td>'.$row['kra_objective'].'</td>
                                                <td>';
                                                if($row["kra_quality"] == 1){ 
                $output .=                           "Required"; 
                                                  }else{ 
                $output .=                           "Not Required"; 
                                                  }
                $output .=                      '</td>
                                                <td>';
                                                if($row["kra_efficiency"] == 1){ 
                $output .=                            "Required"; 
                                                }else{ 
                $output .=                            "Not Required"; 
                                                }
                $output .=                      '</td>
                                                <td>';
                                                  if($row["kra_timeliness"] == 1){ 
                $output .=                             "Required"; 
                                                  }else{ 
                $output .=                             "Not Required"; 
                                                  } 
                $output .=                      '</td>          
                                                <td>'.$row['kra_item_percentage']. "%" .'</td> 
                                                <td>'.$row['kra_target_percentage']. "%" .'</td> 
                                                <td><input type="button" name="edit" value="Update" id="'.$row["kra_id"].'  " class="btn btn-info btn-sm edit_data" /></td>         
                                                <td><input type="button" name="kra_del" value="Delete" data-id="'. $row["kra_id"].'" class="btn btn-danger btn-sm kra_del"></td> 
                                            </tr>  
                                          </tbody>
                ';  
           }  
           $output .= '</table>'. '</div> ' . '</div>'; 
           echo $output;  
      }  
   }
 ?>
 
  <script>
    $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
    $("#success-alert").slideUp(500);
    });
  </script>
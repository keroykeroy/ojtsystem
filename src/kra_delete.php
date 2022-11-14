<?php
    require_once("../conn/connection.php");
    include_once("../conn/session.php");
?>

<?php
    if(isset($_POST['kra_del'])){

    	$message = "";

	    $id = $_POST['kra_del'];
	    // query to find kra_id,kra_item,kra,no
	    $query = mysqli_query($connection, "SELECT * FROM users_kra WHERE kra_id ='$id' AND t_id ='$u_id'");
	    $row = mysqli_fetch_assoc($query);

	    $item_del = $row["kra_items"];
	    $kra_no = $_SESSION["kra_no"] = $row["kra_no"];

	    if($query){
	    	// query to locate kra/s
	    	$query2 = mysqli_query($connection, "SELECT * from users_kra where kra_no = '$kra_no' AND t_id ='$u_id' ORDER by kra_no ASC");

	    	while($row2 = mysqli_fetch_assoc($query2)){

	    		if($item_del < $row2["kra_items"]){
	    			$kra_id = $row2["kra_id"];
	    			$newval = $row2["kra_items"] - 1;
	    			$query3_ukra = mysqli_query($connection, "UPDATE `users_kra` SET `kra_items`= '$newval' WHERE kra_id = '$kra_id' AND t_id ='$u_id'");
	    			$query3_pikra = mysqli_query($connection, "UPDATE `kra_pi` SET `kra_items`= '$newval' WHERE kra_id = '$kra_id' AND t_id ='$u_id'");
	    			$query3_monkra = mysqli_query($connection, "UPDATE `kra_monitoring` SET `kra_item`= '$newval' WHERE kra_id = '$kra_id' AND t_id ='$u_id'");
	    		}else{
	    			// FK cons
	    			$query4 = mysqli_query($connection,"DELETE from kra_pi where kra_id = '$id' AND t_id ='$u_id'");
	    			if($query4){
	    			$query5 = mysqli_query($connection,"DELETE from kra_monitoring where kra_id = '$id' AND t_id ='$u_id'");
	    				if($query5){
	    					$query6 = mysqli_query($connection,"DELETE from users_kra where kra_id = '$id' AND t_id ='$u_id'");
	    				}
	    			}
	    		}
	    	}

		  // AFTER WHILE OUTPUT
		      $output = '';  
		      $message = "Data Deleted"; 
		           $output .= '<center>';
		           $output .= '<div id="success-alert">
		                        <label class="text-danger">' . $message . '</label>
		                      </div>';  
		           $output .='</center>';
		           $select_query = "SELECT * FROM users_kra WHERE t_id ='$u_id'";  
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
		           unset($kra_no);

	    }
    }
 ?>

  <script>
    $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
    $("#success-alert").slideUp(500);
    });
  </script>

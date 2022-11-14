<?php
    require_once("../conn/connection.php");
    include_once("../conn/session.php");
?>


<?php  
 if(isset($_POST["kra_id"]))  
 {    
      $query = "SELECT * FROM users_kra_view WHERE kra_id = '".$_POST["kra_id"]."' AND t_id = '$u_id'";  
      $result = mysqli_query($connection, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);   
 }else if(isset($_POST["pi_id"]))  
 {    
      $query = "SELECT * FROM kra_pi WHERE pi_id = '".$_POST["pi_id"]."' AND t_id = '$u_id'";  
      $result = mysqli_query($connection, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
   
 }else if(isset($_POST["id"]))  
 {    
      $query = "SELECT * FROM kra_monitoring_view WHERE id = '".$_POST["id"]."' AND t_id = '$u_id'";  
      $result = mysqli_query($connection, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
   
 } 
 ?>
 
 
 
<?php
    require_once("../conn/connection.php");
    include_once("../conn/session-admin.php");
?>


<?php  
if(isset($_POST["id"]))  
	 {    
	      $query = "SELECT * FROM kra_monitoring_view WHERE id = '".$_POST["id"]."'";  
	      $result = mysqli_query($connection, $query);  
	      $row = mysqli_fetch_array($result);  
	      echo json_encode($row);  
	 } 
 ?>
 
 
 
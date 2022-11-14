<?php
    require_once("../conn/connection.php");
    // include_once("../conn/session.php");
?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>

<?php  
   
      $message = ''; 
      $pi_qual = mysqli_real_escape_string($connection, $_POST["pi_qual"]);   
      $pi_eff = mysqli_real_escape_string($connection, $_POST["pi_eff"]);  
      $pi_time = mysqli_real_escape_string($connection, $_POST["pi_time"]);  
      $kra_id = mysqli_real_escape_string($connection, $_POST["modal-kra-id"]);  
      

        
      if($_POST["pi_id"] != ''){

        $query = "UPDATE kra_pi SET `pi_quality` = '$pi_qual', `pi_efficiency` = '$pi_eff', `pi_timeliness` = '$pi_time' WHERE pi_id='".$_POST["pi_id"]."'";  
        $message = 'Data Updated';  

      }else{
        $query = "SELECT * FROM kra_pi where kra_id = '$kra_id'";
      }

 ?>

 <?php       
      if(mysqli_query($connection, $query)){
            $querykra = mysqli_query($connection,"SELECT * FROM users_kra where kra_id = '$kra_id'");
            $checkrow = mysqli_num_rows($querykra);
            $krarow = mysqli_fetch_assoc($querykra);
        

            // ALGO FOR KRA QUALITY,EFF,TIME = 1,0
            $check1 = "";
            $check2 = "";
            $check3 = "";

            if($checkrow == 1){ 
                if($krarow["kra_quality"] == 0 ){
                    $check1 = "* Not required";
                }
                if($krarow["kra_efficiency"] == 0 ){
                    $check2 = "* Not required";
                }
                if($krarow["kra_timeliness"] == 0 ){
                    $check3 = "* Not required";
                }   
            }
  




          echo '<center>
          <label class="text-success" id="success-alert">' . $message . '</label>
          </center>';
          $count = 0;
          $rowx = 0;
          $select_query = "SELECT * FROM kra_pi where kra_id = '$kra_id'";
          $result = mysqli_query($connection, $select_query);}  
          echo '<div id="pi_table">  
                <div class="table-wrapper-scroll-y">         
                  <table class="table table-hover" id="crud_table">
                    <thead>
                      <tr>
                        <th width="5%">Kra No</th>
                        <th width="5%">Item No</th>
                        <th width="5%">PI No</th>
                        <th width="28%">Quality</th>
                        <th width="28%">Efficiency</th>
                        <th width="29%">Timeliness</th>
                        <th  width="5%">Active</th>
                      </tr>
                    </thead>
           ';  
          while($row = mysqli_fetch_array($result)):?>
      
                  <tbody>
                    <tr>            
                      <td><strong class="<?php if($row["pi_no"] != 5){echo "opac";}?>"><?php echo $row["kra_no"]; ?></strong> </td>
                      <td><strong class="<?php if($row["pi_no"] != 5){echo "opac";}?>"><?php echo $row["kra_no"] . "." . $row["kra_items"]; ?></strong></td>
                      <td><?php echo $row["pi_no"]; ?></td>
                      <td class=""><?php if(empty($check1)){ echo $row["pi_quality"]; }else{echo $check1; } ?></td>
                      <td class=""><?php if(empty($check2)){ echo $row["pi_efficiency"]; }else{echo $check2; } ?></td>
                      <td class=""><?php if(empty($check3)){ echo $row["pi_timeliness"]; }else{echo $check3; } ?></td>
                      <td><input type="button" name="edit" value="Update" id="<?php echo $row['pi_id']; ?>" class="btn btn-info btn-sm edit_data" /></td>       
                    </tr>
                  </tbody>
      <?php endwhile;?>
          </table>
        </div>
      </div>
</body>
</html>

 <script>
        $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
        $("#success-alert").slideUp(500);
});
 </script>
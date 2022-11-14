<?php
    require_once("../conn/connection.php");
?>

<?php
    //fetch.php
    $output = '';
    if(isset($_POST["query"])){
      $search = mysqli_real_escape_string($connection, $_POST["query"]);
      $query = " SELECT * FROM join_users_details_view WHERE t_id LIKE '%".$search."%' OR control_id LIKE '%".$search."%' OR t_firstname LIKE '%".$search."%' OR t_midname LIKE '%".$search."%' OR t_lastname LIKE '%".$search."%' OR t_fullname LIKE '%".$search."%' OR u_rp_relation LIKE '%".$search."%'";
    }
    else
    {
      $query = "SELECT * FROM join_users_details_view";
    }
    
    $result = mysqli_query($connection, $query);
    
    if(mysqli_num_rows($result) > 0){
     $output .= '

    <table class="table table-hover" id="example">
      <thead style="background-color:#F5F5DC;">
        <tr>
          <th>Control ID</th>
          <th>Name</th>
          <th>Sex</th>
          <th>Email</th>
          <th>Phone Number</th>
          <th>Job Group</th>
        </tr>
      </thead>';

     while($row = mysqli_fetch_array($result)){
      $output .= '
      <tr>
        <td><a href="displayusers.php?id='.$row["t_id"].'"></a>'.$row["control_id"].'</td>
        <td>'.$row["t_fullname"].'</td> 
        <td>'.$row["t_sex"].'</td>
        <td>'.$row["t_email"].'</td>
        <td>'.$row["t_phonenumber"].'</td>
        <td>'.$row["u_rp_relation"].'</td>
      </tr>';
       }
      $output .= '</table>';
        echo $output;
    }
    else
    {
     echo  'Data Not Found';
    }
?>

<script>
  $(document).ready(function() {

      $('#example tr').click(function() {
          var href = $(this).find("a").attr("href");
          if(href) {
              window.location = href;
          }
      });

  });
</script>
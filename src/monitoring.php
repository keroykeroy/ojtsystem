<?php
    require_once("../conn/connection.php");
    include_once("../conn/session.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Monthly Monitoring Display</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="../img/icon/deped_icon.png"/>

    <link rel="stylesheet" href="../css/bootstrap.min.css"> 
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../css/responsive.css">

<style>
body {margin:0;}

    /*header title*/
    .header-title{
        font-family: calibri;
        text-shadow: 2px 2px 2px black;
        letter-spacing: 5px;
        font-size: 50px;
        color:white;
        width: 100%;
    }
    /*header div*/
    .header-title-div{
        padding:1px;
        width: 100%;
        background-color: darkgreen;
    }

    /*table bordered*/
    table,tr,td,th{ 
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse; 
        border: 1px solid darkgray;
        font-size: 13px;
    }

    /*all table fixed*/
    table{
    table-layout: fixed;
    overflow-wrap: break-word;
    }

    /*table 1*/
    .tb1{
        font-size: 12px;
    }

    /*div options*/
    .div-options{
        margin-bottom: 25px;
        margin-top: 25px;
    }

    /*a href css*/
    .options{
        margin: 0 20px;
        min-width: 220px;

    }

    /*txt style and align*/
    .txt-align-center{
        text-align: center;
    }

    .txt-style{
        font-style: italic;
    }

    /*td bgcolor*/
    .td-color{
        background-color: black;
    }

    /*VERTICALLY CENTER*/
    .modal-dialog{
      position: relative;
      top: 20%;
      transform: translateY(-50%);
    }

</style>
</head>

<body>

    <!-- RP details -->
    <?php 
        $id = $row["t_id"];
        //  1st query for employee data
        $rp_d_query = mysqli_query($connection, "SELECT * FROM users_rp_details WHERE t_id = '$id'");
        $rp_count = mysqli_num_rows($rp_d_query);
        $rowrp = mysqli_fetch_assoc($rp_d_query);
        
        // 2nd query for user data
        $usersquery = mysqli_query($connection,"SELECT * FROM users where t_id = '$id'");
        $rowusers = mysqli_fetch_assoc($usersquery);
    ?>


    <!-- AFTER SELECTED -->
    <?php
    $kra_id = "";
        if(isset($_POST["kra_id"])){
            $kra_id = mysqli_escape_string($connection,$_POST["kra_id"]);
        }
    ?>



    <div align="center" class="header-title-div">
        <h1 class="header-title">MONTHLY MONITORING</h1>
    </div>

    <table class="table table-striped tb1">
        <tr>
            <td width="10%">
                <label>Name</label>
            </td>
            <td width="90%">
                <?php 
                
                $fcharacter  = $rowusers["t_midname"];

                echo $rowusers["t_lastname"] . ", " . $rowusers["t_firstname"] . " " . $fcharacter[0] ."."; ?>
            </td>
        </tr>
        <tr>
            <td width="10%">
                <label >Position</label>
            </td>
            <td width="90%">
                <?php echo $rowrp["u_rp_position"]; ?>
            </td>
        </tr>
        <tr>
            <td width="10%">
                <label>Section</label>
            </td>
            <td width="90%">
                <?php echo $rowrp["u_rp_office"]; ?>
            </td>
        </tr>
        <tr>
            <td width="10%">
                <label>Rating Period</label>
            </td>
            <td width="90%">
                <?php 
                    if($rp_count != 0){ 
                        if($rowrp["u_rp_relation"] == "Non Teaching")
                        {   
                            $tricks = $rowrp["u_rp_dateper"];
                            $tricks = intval($tricks);
                            if($tricks == 0){
                                echo "CY" . " undefined";
                            }else{
                                echo "CY" . " " . $tricks;
                            }
                        }
                        else{
                            echo $rowrp["u_rp_dateper"];
                        } 
                    }
                ?>
            </td>
        </tr>   
    </table>

    <!-- COLLAPSE BOOTSTRAP -->
    <div align="center" class="div-options">
        <button type="button" class="btn btn-danger options openmid">MID YEAR REVIEW</button>
        <button type="button" class="btn btn-warning options openyearend">YEAR END</button>
        <button type="button" class="btn btn-success options opensummary">SUMMARY</button>
    </div>
    <!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" id="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title" id="modal-title" style="text-align: center;"></h3>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

    <!-- ALGO KRA ITEMS-->
    <?php 
        $id = $row["t_id"];
        $item_array[0] = "0";
        $id_array[0] = "0";
        $count = 1;
        $query = mysqli_query($connection,"SELECT * FROM users_kra WHERE t_id ='$id' ORDER BY kra_no ASC");
        if($query){
            while($data = mysqli_fetch_assoc($query)){
                $kra_item = $data["kra_no"] .".". $data["kra_items"];
                $item_array[$count] = $kra_item;
                $id_array[$count] = $data["kra_id"];
                $count++;
            }
        } 

    ?>

    <form method="post">
        <select name="kra_id" id="kra_id" onchange='if(this.value != "0"){ this.form.submit(); }'>
            <?php foreach($id_array as $index => $data_id): ?>
                <!-- make 1st data disabled,make 1st data selected -->
                    <option <?php if($data_id == "0"){ echo "disabled";}?> <?php if($data_id == "0"){ echo "selected";}?> value="<?php echo $data_id ?>"<?php if($kra_id == $data_id){echo "selected";}?>> 
                            <!-- PRINT TO OPTION -->
                            <?php if($item_array[$index] == 0){echo "SELECT KRA";}else{echo "KEY RESULT AREA    " . $item_array[$index];} ?>
                    </option>
            <?php endforeach ?>
        </select>
    </form>



    <table class="table table-hover" style="width: 100%;">
        <colgroup>
            <col style="width: 150px">
            <col style="width: 70px">
            <col style="width: 70px">
            <col style="width: 70px">
            <col style="width: 70px">
            <col style="width: 70px">
            <col style="width: 70px">
            <col style="width: 30px">
            <col style="width: 30px">
            <col style="width: 30px">
            <col style="width: 30px">
            <col style="width: 30px">
            <col style="width: 30px">
            <col style="width: 30px">
            <col style="width: 30px">
            <col style="width: 30px">
            <col style="width: 30px">
            <col style="width: 30px">
            <col style="width: 30px">
        </colgroup>

    <tr>
        <th rowspan="3" class="txt-align-center"><br>JOB DUTIES <br>AND <br>RESPONSIBILITIES</th>
        <th rowspan="3" class="txt-align-center"><br><br>TARGET</th>
        <th rowspan="3" class="txt-align-center"><br><br>ACTUAL</th>
        <th rowspan="3" class="txt-align-center"><br><br>% COMPLETION</th>
        <th rowspan="3" class="txt-align-center"><br>REMARKS <br>ON<br> QUALITY</th>
        <th rowspan="3" class="txt-align-center"><br>REMARKS <br>ON<br>  EFFICIENCY</th>
        <th rowspan="3" class="txt-align-center"><br>REMARKS <br>ON<br> TIMELINESS</th>
        <th colspan="12" class="txt-align-center">MONTHLY PERFORMANCE</th>
      </tr>
    <tr>
        <td class="txt-style">Jan</td>
        <td class="txt-style">Feb</td>
        <td class="txt-style">Mar</td>
        <td class="txt-style">Apr</td>
        <td class="txt-style">May</td>
        <td class="txt-style">Jun</td>
        <td class="txt-style">Jul</td>
        <td class="txt-style">Aug</td>
        <td class="txt-style">Sep</td>
        <td class="txt-style">Oct</td>
        <td class="txt-style">Nov</td>
        <td class="txt-style">Dec</td>
    </tr>
    <tr>

        <div >
        <!-- Month -->
        <td class="txt-align-center">
            <input type="checkbox" name="jan" id="jan">
        </td>
        <td class="txt-align-center">
            <input type="checkbox" name="feb" id="feb">
        </td>
        <td class="txt-align-center">
            <input type="checkbox" name="march" id="march">
        </td>
        <td class="txt-align-center">
            <input type="checkbox" name="april" id="april">
        </td>
        <td class="txt-align-center">
            <input type="checkbox" name="may" id="may">
        </td>
        <td class="txt-align-center">
            <input type="checkbox" name="june" id="june">
        </td>
        <td class="txt-align-center">
            <input type="checkbox" name="july" id="july">
        </td>
        <td class="txt-align-center">
            <input type="checkbox" name="aug" id="aug">
        </td>
        <td class="txt-align-center">
            <input type="checkbox" name="sept" id="sept">
        </td>
        <td class="txt-align-center">
            <input type="checkbox" name="oct" id="oct">
        </td>
        <td class="txt-align-center">
            <input type="checkbox" name="nov" id="nov">
        </td>
        <td class="txt-align-center">
            <input type="checkbox" name="dec" id="dec">
        </td>

    </tr>

    <!-- ALGO DATA -->
    <?php 
        $count = 0;
        $obj = mysqli_query($connection,"SELECT kra_objective FROM users_kra WHERE kra_id = '$kra_id'"); 
        $objrow = mysqli_fetch_assoc($obj);
        $obj = $objrow["kra_objective"];
        if($rowrp["u_rp_relation"] == "Non Teaching"){
            $sql = mysqli_query($connection,"SELECT * FROM kra_monitoring_view_jan_dec WHERE kra_id = '$kra_id'"); 
        }else{
            $sql = mysqli_query($connection,"SELECT * FROM kra_monitoring_view_july_june WHERE kra_id = '$kra_id'"); 
        }
    ?>

    <?php while($sqlrow = mysqli_fetch_assoc($sql)) :?>

        <tr id="<?php echo $sqlrow["kra_mon_month"]; ?>">
            <td><?php if($count == 0){echo $sqlrow["kra_no"] . "." . $sqlrow["kra_item"] . ")&emsp;" . $obj; } ?></td>
            <td><?php echo $sqlrow["kra_mon_target"]; ?></td>
            <td><?php echo $sqlrow["kra_mon_actual"]; ?></td>
            <td><?php echo $sqlrow["kra_mon_completion"] . "%"; ?></td>
            <td><?php echo $sqlrow["rmks_quality"]; ?></td>
            <td><?php echo $sqlrow["rmks_efficiency"]; ?></td>
            <td><?php echo $sqlrow["rmks_timeliness"]; ?></td>
            <td <?php if($sqlrow["kra_mon_month"] == "January"){ echo "style='background-color:#D73030';";} ?>></td>
            <td <?php if($sqlrow["kra_mon_month"] == "February"){ echo "style='background-color:#D03075';";} ?>></td>
            <td <?php if($sqlrow["kra_mon_month"] == "March"){ echo "style='background-color:#9530D0';";} ?>></td>
            <td <?php if($sqlrow["kra_mon_month"] == "April"){ echo "style='background-color:#3250CA';";} ?>></td>
            <td <?php if($sqlrow["kra_mon_month"] == "May"){ echo "style='background-color:#2A97B7';";} ?>></td>
            <td <?php if($sqlrow["kra_mon_month"] == "June"){ echo "style='background-color:#2EB595';";} ?>></td>
            <td <?php if($sqlrow["kra_mon_month"] == "July"){ echo "style='background-color:#2EB568';";} ?>></td>
            <td <?php if($sqlrow["kra_mon_month"] == "August"){ echo "style='background-color:#56B52E';";} ?>></td>
            <td <?php if($sqlrow["kra_mon_month"] == "September"){ echo "style='background-color:#9AB52E';";} ?>></td>
            <td <?php if($sqlrow["kra_mon_month"] == "October"){ echo "style='background-color:#DADE51';";} ?>></td>
            <td <?php if($sqlrow["kra_mon_month"] == "November"){ echo "style='background-color:#CA8E34';";} ?>></td>
            <td <?php if($sqlrow["kra_mon_month"] == "December"){ echo "style='background-color:#AE5827';";} ?>></td>
        </tr>
        <?php $count = 1; endwhile; ?>
    </table>


  <!-- jquery
        ============================================ -->
    <script src="../js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
        ============================================ -->
    <script src="../js/bootstrap.min.js"></script>
    <!-- wow JS
        ============================================ -->
    <script src="../js/wow.min.js"></script>
    <!-- price-slider JS
        ============================================ -->
    <script src="../js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
        ============================================ -->
    <script src="../js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
        ============================================ -->
    <script src="../js/owl.carousel.min.js"></script>
    <!-- sticky JS
        ============================================ -->
    <script src="../js/jquery.sticky.js"></script>
    <!-- scrollUp JS
        ============================================ -->
    <script src="../js/jquery.scrollUp.min.js"></script>
    <!-- counterup JS
        ============================================ -->
    <script src="../js/counterup/jquery.counterup.min.js"></script>
    <script src="../js/counterup/waypoints.min.js"></script>
    <script src="../js/counterup/counterup-active.js"></script>
    <!-- mCustomScrollbar JS
        ============================================ -->
    <script src="../js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
        ============================================ -->
    <script src="../js/metisMenu/metisMenu.min.js"></script>
    <script src="../js/metisMenu/metisMenu-active.js"></script>
    <!-- morrisjs JS
        ============================================ -->
    <script src="../js/morrisjs/raphael-min.js"></script>
    <script src="../js/morrisjs/morris.js"></script>
    <script src="../js/morrisjs/morris-active.js"></script>
    <!-- morrisjs JS
        ============================================ -->
    <script src="../js/sparkline/jquery.sparkline.min.js"></script>
    <script src="../js/sparkline/jquery.charts-sparkline.js"></script>
    <script src="../js/sparkline/sparkline-active.js"></script>
    <!-- calendar JS
        ============================================ -->
    <script src="../js/calendar/moment.min.js"></script>
    <script src="../js/calendar/fullcalendar.min.js"></script>
    <script src="../js/calendar/fullcalendar-active.js"></script>
    <!-- plugins JS
        ============================================ -->
    <script src="../js/plugins.js"></script>
    <!-- main JS
        ============================================ -->
    <script src="../js/main.js"></script>


</body>
</html>

<script>
    var jan = document.getElementById("January");
    var feb = document.getElementById("February");
    var mar = document.getElementById("March");
    var apr = document.getElementById("April");
    var may = document.getElementById("May");
    var jn = document.getElementById("June");
    var jl = document.getElementById("July");
    var aug = document.getElementById("August");
    var sep = document.getElementById("September");
    var oct = document.getElementById("October");
    var nov = document.getElementById("November");
    var dec = document.getElementById("December");

    if(jan != null){
        $('#jan').prop('checked', true);
    }
    if(feb != null){
        $('#feb').prop('checked', true);
    }
    if(mar != null){
        $('#march').prop('checked', true); 
    }
    if(apr != null){
        $('#april').prop('checked', true); 
    }    
    if(may != null){
        $('#may').prop('checked', true); 
    }   
    if(jn != null){
        $('#june').prop('checked', true); 
    }
    if(jl != null){
        $('#july').prop('checked', true); 
    }
    if(aug != null){
        $('#aug').prop('checked', true); 
    }
    if(sep != null){
        $('#sept').prop('checked', true); 
    }
    if(oct != null){
        $('#oct').prop('checked', true); 
    }
    if(nov != null){
        $('#nov').prop('checked', true); 
    }
    if(dec != null){
        $('#dec').prop('checked', true); 
    }
</script>

<script>
    $('#jan').change(function(){
        $('#January').toggle();
    });
    $('#feb').change(function(){
        $('#February').toggle();
    });
    $('#march').change(function(){
        $('#March').toggle();
    });
    $('#april').change(function(){
        $('#April').toggle();
    });
    $('#may').change(function(){
        $('#May').toggle();
    });
    $('#june').change(function(){
        $('#June').toggle();
    });
    $('#july').change(function(){
        $('#July').toggle();
    });
    $('#aug').change(function(){
        $('#August').toggle();
    });
    $('#sept').change(function(){
        $('#September').toggle();
    });
    $('#oct').change(function(){
        $('#October').toggle();
    });
    $('#nov').change(function(){
        $('#November').toggle();
    });
    $('#dec').change(function(){
        $('#December').toggle();
    });
</script>



<!-- MODALS -->
<script>


$('.openmid').on('click',function(){
    var kra_id = "<?php echo $kra_id; ?>";
    $('.modal-body').load("getcontent.php?",{id:1,kra_id:kra_id},function(){
        $('#myModal').modal({show:true});
        $('#modal-title').html("MID YEAR REVIEW");
        $("#modal-header").css("background-color","#d9534f");
    });
});
</script>


<!-- MODALS -->
<script>
$('.openyearend').on('click',function(){
    var kra_id = "<?php echo $kra_id; ?>";
    $('.modal-body').load('getcontent.php?',{id:2,kra_id:kra_id},function(){
        $('#myModal').modal({show:true});
        $('#modal-title').html("YEAR END");
        $("#modal-header").css("background-color","#f0ad4e");
    });
});
</script>



<!-- MODALS -->
<script>
$('.opensummary').on('click',function(){
    var kra_id = "<?php echo $kra_id; ?>";
    $('.modal-body').load('getcontent.php?',{id:3,kra_id:kra_id},function(){
        $('#myModal').modal({show:true});
        $('#modal-title').html("SUMMARY");
        $("#modal-header").css("background-color","#5cb85c");
    });
});
</script>
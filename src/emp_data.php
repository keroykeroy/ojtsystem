<?php
    require_once("../conn/connection.php");
    include_once("../conn/session.php");
    ob_start();
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Employee Data</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <link rel="shortcut icon" type="image/x-icon" href="../img/icon/deped_icon.png"/>
    
    <!-- <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet"/> -->

    <!-- Bootstrap CSS
        ============================================ -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Bootstrap CSS
        ============================================ -->
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <!-- owl.carousel CSS
        ============================================ -->
    <link rel="stylesheet" href="../css/owl.carousel.css">
    <link rel="stylesheet" href="../css/owl.theme.css">
    <link rel="stylesheet" href="../css/owl.transitions.css">
    <!-- animate CSS
        ============================================ -->
    <link rel="stylesheet" href="../css/animate.css">
    <!-- normalize CSS
        ============================================ -->
    <link rel="stylesheet" href="../css/normalize.css">
    <!-- meanmenu icon CSS
        ============================================ -->
    <link rel="stylesheet" href="../css/meanmenu.min.css">
    <!-- main CSS
        ============================================ -->
    <link rel="stylesheet" href="../css/main.css">
    <!-- educate icon CSS
        ============================================ -->
    <link rel="stylesheet" href="../css/educate-custon-icon.css">
    <!-- morrisjs CSS
        ============================================ -->
    <link rel="stylesheet" href="../css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
        ============================================ -->
    <link rel="stylesheet" href="../css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
        ============================================ -->
    <link rel="stylesheet" href="../css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="../css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
        ============================================ -->
    <!-- <link rel="stylesheet" href="../css/calendar/fullcalendar.min.css"> -->
    <!-- <link rel="stylesheet" href="../css/calendar/fullcalendar.print.min.css"> -->
    <!-- style CSS
        ============================================ -->
    <link rel="stylesheet" href="../style.css">
    <!-- responsive CSS
        ============================================ -->
    <link rel="stylesheet" href="../css/responsive.css">
    <!-- modernizr JS
        ============================================ -->
    <!-- datepicker -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet"/>

</head>

<style type="text/css">

    /*title header top */

    .title{
        font-size: 20.5px;
        color: white;
        font-family: Engravers MT;  
        text-shadow: 2px 2px 2px black;
        margin-top:18px;
        margin-left: -50px; 
    }

    /*input form*/
    .form-control{
        border-radius: 5px;
        border-color: lightgray;
    }

 /*   input type focus*/
    input[type=text]:focus, input[type=password]:focus {
      background-color: #C1E1FF;
      outline: none;
    }

    /*top hr*/
    hr.style-four {
        height: 12px;
        border: 0;
        box-shadow: inset 0 12px 12px -12px rgba(0, 0, 0, 0.5);
    }

    .content{
        width: 60%;
        position: relative;
        left: 57%;
        margin-left: -37.5%;
    }

</style>

<body>

    <?php 

        $query_rp = mysqli_query($connection,"SELECT * FROM users_rp_details WHERE t_id = '$u_id'");
        $count = mysqli_num_rows($query_rp);

        if($count == 1){
            $rp_row = mysqli_fetch_assoc($query_rp);
        }else{
            $rp_row = mysqli_fetch_assoc($query_rp);
            $count == 0;
        }


        // $urp_off = $urp_pos = $urp_des = $urp_syear = $urp_eyear = $urp_des_date = $urp_date_hired = "";

        if(isset($_POST["urp_submit_detail"])){

                $urp_pos_rel = mysqli_escape_string($connection,$_POST["sel1"]);
                if($urp_pos_rel == "a"){
                    $urp_pos_rel = "Teacher";
                }else if($urp_pos_rel == "b"){
                    $urp_pos_rel = "Teacher Related";
                }else{
                    $urp_pos_rel = "Non Teaching";
                }

                $urp_pos = mysqli_escape_string($connection,$_POST["sel2"]);
                $urp_off = mysqli_escape_string($connection,$_POST["urp_office"]);
                $urp_des = mysqli_escape_string($connection,$_POST["urp_des"]);
                $urp_syear = mysqli_escape_string($connection,$_POST["urp_syear"]);
                $urp_eyear = mysqli_escape_string($connection,$_POST["urp_eyear"]);
                $urp_des_date = mysqli_escape_string($connection,$_POST["urp_des_date"]);
                $urp_date_hired = mysqli_escape_string($connection,$_POST["urp_date_hired"]);
                $urp_rating_period = $urp_syear  . " - " . $urp_eyear;
                $u_id = $row["t_id"];

            if($count == 0){

                $query = mysqli_query($connection,"INSERT INTO `users_rp_details`(`u_rp_id`, `u_rp_office`, `u_rp_relation`, `u_rp_position`, `u_rp_designation`, `u_rp_dateper`,`u_rp_designation_date`,`u_rp_datehired`,`t_id`,`urp_date_start`,`urp_date_end`) VALUES ('','$urp_off','$urp_pos_rel','$urp_pos','$urp_des','$urp_rating_period','$urp_des_date','$urp_date_hired','$u_id','$urp_syear','$urp_eyear')");
                
                if($query){
                    header("location:emp_details.php"); 
                    ob_end_flush(); 
                }else{
                    echo "WRONG";
                }

            }else{
                $query = mysqli_query($connection,"UPDATE `users_rp_details` SET `u_rp_office`='$urp_off', `u_rp_relation`='$urp_pos_rel', `u_rp_position`='$urp_pos',`u_rp_datehired`='$urp_date_hired',`u_rp_designation`= '$urp_des',`u_rp_designation_date`='$urp_des_date',`urp_date_start`='$urp_syear',`urp_date_end`= '$urp_eyear',`u_rp_dateper`= '$urp_rating_period' WHERE t_id = '$u_id'");
                if($query){
                    header("location:emp_details.php"); 
                }
            }

        }

    ?>
 <!-- Start Left menu area -->
 <?php require("menu/menu_main.php");?>

    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">
                                    <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                        <div class="menu-switcher-pro">
                                            <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                                    <i class="educate-icon educate-nav"></i>
                                                </button>
                                        </div>
                                    </div>

                                    <div class="col-lg-0 col-md-0 col-sm-6 col-xs-12">
                                        <div class="header-top-menu tabl-d-n">
                                            <h1 class="title">PERFORMANCE MONITORING SYSTEM</h1>
                                        </div>
                                    </div>

                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                                
                                                
                                                <li class="nav-item">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                            <img src="../img/icon/admin_icon.png" alt="" />
                                                            <!-- <span class="admin-name" style="font-size: 15px; letter-spacing: 0.5px;"></span> -->
                                                            <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                                        </a>
                                                    <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                        <li><a href="../conn/destroyer.php"><span class="edu-icon edu-locked author-log-ic"></span>Log Out</a>
                                                        </li>
                                                    </ul>
                                                </li> 
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <!-- Mobile Menu start -->
        <?php require("menu/menu_mb.php"); ?>      
        </div>
                       
        <br>
        <center>
            <h1 style="font-family: courier new; font-size: 40px; ">EMPLOYEE DATA</h1>
            <hr class="style-four">
        </center>


        <div class="content" align="center">
            <br>
            <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="POST">
                <div class="row">
                    <div class='col-sm-4'>    
                        <div class="form-group">
                            <label for="position">Select Relation</label>
                            <select id="select1" class="form-control" name="sel1" onchange="giveSelection(this.value)">
                                <option selected="true" disabled="true">Select Job Group</option>
                                <option value="a" <?php if($count == 1){ if($rp_row["u_rp_relation"] == "Teacher") { echo "selected";}}?>>Teacher</option>
                                <option value="b" <?php if($count == 1){ if($rp_row["u_rp_relation"] == "Teacher Related") { echo "selected";}}?>>Teacher Related</option>
                                <option value="c" <?php if($count == 1){ if($rp_row["u_rp_relation"] == "Non Teaching") { echo "selected";}}?>>Non Teaching</option>
                            </select>
                        </div>
                    </div>

                    <div class='col-sm-8'> 
                        <div class="form-group">
                            <label for="position">Select Current Item Position</label>
                            <select id="select2" class="form-control" name="sel2">
                                <!-- Teacher -->
                                <option data-option="a" <?php if($rp_row["u_rp_position"] == "Teacher1"){echo "selected";}?>>Teacher I</option>
                                <option data-option="a" <?php if($rp_row["u_rp_position"] == "Teacher II"){echo "selected";}?>>Teacher II</option>
                                <option data-option="a" <?php if($rp_row["u_rp_position"] == "Teacher III"){echo "selected";}?>>Teacher III</option>
                                <option data-option="a" <?php if($rp_row["u_rp_position"] == "Master Teacher I"){echo "selected";}?>>Master Teacher I</option>
                                <option data-option="a" <?php if($rp_row["u_rp_position"] == "Master Teacher II"){echo "selected";}?>>Master Teacher II</option>
                                <option data-option="a" <?php if($rp_row["u_rp_position"] == "Master Teacher III"){echo "selected";}?>>Master Teacher III</option>
                                <option data-option="a" <?php if($rp_row["u_rp_position"] == "SPED Teacher I"){echo "selected";}?>>SPED Teacher I</option>
                                <option data-option="a" <?php if($rp_row["u_rp_position"] == "SPED Teacher II"){echo "selected";}?>>SPED Teacher II</option>
                                <option data-option="a" <?php if($rp_row["u_rp_position"] == "SPED Teacher III"){echo "selected";}?>>SPED Teacher III</option>
                                <option data-option="a" <?php if($rp_row["u_rp_position"] == "Kinder Teacher I"){echo "selected";}?>>Kinder Teacher I</option>
                                <option data-option="a" <?php if($rp_row["u_rp_position"] == "Kinder Teacher II"){echo "selected";}?>>Kinder Teacher II</option>
                                <option data-option="a" <?php if($rp_row["u_rp_position"] == "Kinder Teacher III"){echo "selected";}?>>Kinder Teacher III</option>
                                <!-- Teacher related -->
                                <option data-option="b" <?php if($rp_row["u_rp_position"] == "Head Teacher I"){echo "selected";}?>>Head Teacher I</option>
                                <option data-option="b" <?php if($rp_row["u_rp_position"] == "Head Teacher II"){echo "selected";}?>>Head Teacher II</option>
                                <option data-option="b" <?php if($rp_row["u_rp_position"] == "Head Teacher III"){echo "selected";}?>>Head Teacher III</option>
                                <option data-option="b" <?php if($rp_row["u_rp_position"] == "Head Teacher IV"){echo "selected";}?>>Head Teacher IV</option>
                                <option data-option="b" <?php if($rp_row["u_rp_position"] == "Head Teacher V"){echo "selected";}?>>Head Teacher V</option>
                                <option data-option="b" <?php if($rp_row["u_rp_position"] == "Head Teacher VI"){echo "selected";}?>>Head Teacher VI</option>
                                <option data-option="b" <?php if($rp_row["u_rp_position"] == "Principal I"){echo "selected";}?>>Principal I</option>
                                <option data-option="b" <?php if($rp_row["u_rp_position"] == "Principal II"){echo "selected";}?>>Principal II</option>
                                <option data-option="b" <?php if($rp_row["u_rp_position"] == "Principal III"){echo "selected";}?>>Principal III</option>
                                <option data-option="b" <?php if($rp_row["u_rp_position"] == "Principal IV"){echo "selected";}?>>Principal IV</option>
                                <option data-option="b" <?php if($rp_row["u_rp_position"] == "Guidance"){echo "selected";}?>>Guidance</option>
                              
                                <!-- Non Teaching -->
                                <option data-option="c" <?php if($rp_row["u_rp_position"] == "Accountant I"){echo "selected";}?>>Accountant I</option>
                                <option data-option="c" <?php if($rp_row["u_rp_position"] == "Accountant II"){echo "selected";}?>>Accountant II</option>
                                <option data-option="c" <?php if($rp_row["u_rp_position"] == "Accounting Clerk II"){echo "selected";}?>>Accounting Clerk II</option>
                                <option data-option="c" <?php if($rp_row["u_rp_position"] == "Administrative Aide I"){echo "selected";}?>>Administrative Aide I</option>
                                <option data-option="c" <?php if($rp_row["u_rp_position"] == "Administrative Aide II"){echo "selected";}?>>Administrative Aide II</option>
                                <option data-option="c" <?php if($rp_row["u_rp_position"] == "Administrative Aide III"){echo "selected";}?>>Administrative Aide III</option>
                                <option data-option="c" <?php if($rp_row["u_rp_position"] == "Administrative Aide VI"){echo "selected";}?>>Administrative Aide VI</option>
                                <option data-option="c" <?php if($rp_row["u_rp_position"] == "Administrative Aide V"){echo "selected";}?>>Administrative Aide V</option>
                                <option data-option="c" <?php if($rp_row["u_rp_position"] == "Administrative Aide VI"){echo "selected";}?>>Administrative Aide VI</option>
                                <option data-option="c" <?php if($rp_row["u_rp_position"] == "Administrative Assitant I"){echo "selected";}?>>Administrative Assitant I</option>
                                <option data-option="c" <?php if($rp_row["u_rp_position"] == "Administrative Assitant II"){echo "selected";}?>>Administrative Assitant II</option>
                                <option data-option="c" <?php if($rp_row["u_rp_position"] == "Administrative Assitant III"){echo "selected";}?>>Administrative Assitant III</option>
                                <option data-option="c" <?php if($rp_row["u_rp_position"] == "Administrative Officer I"){echo "selected";}?>>Administrative Officer I</option>
                                <option data-option="c" <?php if($rp_row["u_rp_position"] == "Administrative Officer II"){echo "selected";}?>>Administrative Officer II</option>
                                <option data-option="c" <?php if($rp_row["u_rp_position"] == "Administrative Officer III"){echo "selected";}?>>Administrative Officer III</option>
                                <option data-option="c" <?php if($rp_row["u_rp_position"] == "Administrative Officer IV"){echo "selected";}?>>Administrative Officer IV</option>
                                <option data-option="c" <?php if($rp_row["u_rp_position"] == "Administrative Officer V"){echo "selected";}?>>Administrative Officer V</option>
                                <option data-option="c" <?php if($rp_row["u_rp_position"] == "Attorney I"){echo "selected";}?>>Attorney I</option>
                                <option data-option="c" <?php if($rp_row["u_rp_position"] == "Dental Aide"){echo "selected";}?>>Dental Aide</option>
                                <option data-option="c" <?php if($rp_row["u_rp_position"] == "Dentist I"){echo "selected";}?>>Dentist I</option>
                                <option data-option="c" <?php if($rp_row["u_rp_position"] == "Dentist II"){echo "selected";}?>>Dentist II</option>
                                <option data-option="c" <?php if($rp_row["u_rp_position"] == "Dentist III"){echo "selected";}?>>Dentist III</option>
                                <option data-option="c" <?php if($rp_row["u_rp_position"] == "Education Program Specialist I"){echo "selected";}?>>Education Program Specialist I</option>
                                <option data-option="c" <?php if($rp_row["u_rp_position"] == "Education Program Specialist II"){echo "selected";}?>>Education Program Specialist II</option>
                                <option data-option="c" <?php if($rp_row["u_rp_position"] == "Education Program Supervisor"){echo "selected";}?>>Education Program Supervisor</option>
                                <option data-option="c" <?php if($rp_row["u_rp_position"] == "Guidance Coordinator I"){echo "selected";}?>>Guidance Coordinator I</option>
                                <option data-option="c" <?php if($rp_row["u_rp_position"] == "Guidance Coordinator II"){echo "selected";}?>>Guidance Coordinator II</option>
                                <option data-option="c" <?php if($rp_row["u_rp_position"] == "Guidance Councilor I"){echo "selected";}?>>Guidance Councilor I</option>
                                <option data-option="c" <?php if($rp_row["u_rp_position"] == "Guidance Councilor II"){echo "selected";}?>>Guidance Councilor II</option>
                                <option data-option="c" <?php if($rp_row["u_rp_position"] == "Health Education and Promotion officer I"){echo "selected";}?>>Health Education and Promotion officer I</option>
                                <option data-option="c" <?php if($rp_row["u_rp_position"] == "Health Education and Promotion officer II"){echo "selected";}?>>Health Education and Promotion officer II</option>
                                <option data-option="c" <?php if($rp_row["u_rp_position"] == "Human Resource Management I"){echo "selected";}?>>Human Resource Management I</option>
                                <option data-option="c" <?php if($rp_row["u_rp_position"] == "Human Resource Management II"){echo "selected";}?>>Human Resource Management II</option>
                                <option data-option="c" <?php if($rp_row["u_rp_position"] == "Information Technology Officer I"){echo "selected";}?>>Information Technology Officer I</option>
                                <option data-option="c" <?php if($rp_row["u_rp_position"] == "Information Technology Officer II"){echo "selected";}?>>Information Technology Officer II</option>
                                <option data-option="c" <?php if($rp_row["u_rp_position"] == "Legal Aide"){echo "selected";}?>>Legal Aide</option>
                                <option data-option="c" <?php if($rp_row["u_rp_position"] == "Legal Assistant I"){echo "selected";}?>>Legal Assistant I</option>
                                <option data-option="c" <?php if($rp_row["u_rp_position"] == "Librarian I"){echo "selected";}?>>Librarian I</option>
                                <option data-option="c" <?php if($rp_row["u_rp_position"] == "Librarian II"){echo "selected";}?>>Librarian II</option><option data-option="c" <?php if($rp_row["u_rp_position"] == "Medical Officer I"){echo "selected";}?>>Medical Officer I</option>
                                <option data-option="c" <?php if($rp_row["u_rp_position"] == "Medical Officer II"){echo "selected";}?>>Medical Officer II</option>
                                <option data-option="c" <?php if($rp_row["u_rp_position"] == "Nurse I"){echo "selected";}?>>Nurse I</option>
                                <option data-option="c" <?php if($rp_row["u_rp_position"] == "Nurse II"){echo "selected";}?>>Nurse II</option>
                                <option data-option="c" <?php if($rp_row["u_rp_position"] == "Planning Officer I"){echo "selected";}?>>Planning Officer I</option>
                                <option data-option="c" <?php if($rp_row["u_rp_position"] == "Planning Officer II"){echo "selected";}?>>Planning Officer II</option>
                                <option data-option="c" <?php if($rp_row["u_rp_position"] == "Project Development Officer I"){echo "selected";}?>>Project Development Officer I</option>
                                <option data-option="c" <?php if($rp_row["u_rp_position"] == "Project Development Officer II"){echo "selected";}?>>Project Development Officer II</option>
                                <option data-option="c" <?php if($rp_row["u_rp_position"] == "Project Development Officer III"){echo "selected";}?>>Project Development Officer III</option>
                                <option data-option="c" <?php if($rp_row["u_rp_position"] == "Public Schools District Supervisor"){echo "selected";}?>>Public Schools District Supervisor</option>
                                <option data-option="c" <?php if($rp_row["u_rp_position"] == "Registrar I"){echo "selected";}?>>Registrar I</option>
                                <option data-option="c" <?php if($rp_row["u_rp_position"] == "School Librarian I"){echo "selected";}?>>School Librarian I</option>
                                <option data-option="c" <?php if($rp_row["u_rp_position"] == "School Librarian II"){echo "selected";}?>>School Librarian II</option>
                                <option data-option="c" <?php if($rp_row["u_rp_position"] == "Security Guard I"){echo "selected";}?>>Security Guard I</option>
                                <option data-option="c" <?php if($rp_row["u_rp_position"] == "Senior Book keepe"){echo "selected";}?>>Senior Book keeper</option>
                                <option data-option="c" <?php if($rp_row["u_rp_position"] == "Supply Officer I"){echo "selected";}?>>Supply Officer I</option>
                                <option data-option="c" <?php if($rp_row["u_rp_position"] == "Supply Officer II"){echo "selected";}?>>Supply Officer II</option>
                                <option data-option="c" <?php if($rp_row["u_rp_position"] == "Watchman I"){echo "selected";}?>>Watchman I</option>                             
                        </select>
                        </div>
                    </div>
                </div>


                <div class="row">  
                    <div class='col-sm-8'> 
                        <div class="form-group">
                            <label for="office">School/Office/Section</label>
                            <input type="text" id="office" class="form-control" name="urp_office" value="<?php if($count==1){echo $rp_row["u_rp_office"];} ?>">
                        </div>
                    </div>


                    <div class='col-sm-4'> 
                        <label for="datehired">Date Hired</label>
                        <div class="input-group date" data-provide="datepicker">
                                <input type="text" id="datehired" class="form-control" name="urp_date_hired" value="<?php if($count==1){echo $rp_row["u_rp_datehired"];} ?>">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class='col-sm-8'> 
                        <div class="form-group">
                            <label for="des">Designation</label>
                            <input type="text" id="des" class="form-control" name="urp_des" value="<?php  if($count==1){echo $rp_row["u_rp_designation"];}?> ">
                        </div>
                    </div>
                            
                    <div class='col-sm-4'> 
                        <label for="desdate">Designation Date</label>
                        <div class="input-group date" data-provide="datepicker">
                                <input type="text" id="desdate" class="form-control" name="urp_des_date" value="<?php if($count==1){echo $rp_row["u_rp_designation_date"];} ?>">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                        </div>
                    </div>
                </div> 
                
                <label for="desdate">Rating Period Date</label>
                <div class="row">
                    <div class='col-sm-6'> 
                        <div class="form-group">
                            <div class="form-group">
                                <i>Start&nbsp;&nbsp;</i>
                                <input type="text" class="form-control" id="datepicker1" name="urp_syear" value="<?php if($count == 1){echo $rp_row["urp_date_start"];} ?>"/>  
                            </div>
                        </div>
                    </div>

                    <div class='col-sm-6'> 
                        <div class="form-group">
                            <i>End&nbsp;&nbsp;&nbsp;</i>
                            <input type="text" class="form-control" id="datepicker2" name="urp_eyear" name="urp_drp_end" value="<?php if($count == 1){echo $rp_row["urp_date_end"];} ?>"/>
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-group">    
                    <input type="submit" class="btn btn-primary" value="<?php if($count == 1){echo "Update"; }else{echo "Save Details"; }?>" name="urp_submit_detail" style="width: 20%;">
                </div>     
            </form>     
        </div>

                    
        <!-- footer -->
        <div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-copy-right">
                            <p>DepEd Performance Management System © 2019</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  <!-- jquery
        ============================================ -->
    <!-- <script src="../js/vendor/jquery-1.12.4.min.js"></script> -->
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


<script type="text/javascript">
var sel1 = document.querySelector('#select1');
var sel2 = document.querySelector('#select2');
var options2 = sel2.querySelectorAll('option');

function giveSelection(selValue) {
  sel2.innerHTML = '';
  // console.log(options2.length);

  for(var i = options2.length-1; i>= 0; i--) {
    if(options2[i].dataset.option === selValue) {
      sel2.appendChild(options2[i]);
    }

  }

}
giveSelection(sel1.value);

</script>




<!-- date picker -->
<script type="text/javascript">
    $("#datepicker1").datepicker({
    format: "yyyy",
    viewMode: "years", 
    minViewMode: "years"
});
    $("#datepicker2").datepicker({
    format: "yyyy",
    viewMode: "years", 
    minViewMode: "years"
});

</script> 
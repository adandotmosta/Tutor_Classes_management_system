<?php
include 'connexion.php';
$class_id = $_GET['id'];
if(isset($_POST['sub'])){
    $dt2=date("Y-m-d H:i:s");
    $s_date = date('Y-m-d H:i:s',strtotime($_POST['session_start']));
    $e_date = date('Y-m-d H:i:s',strtotime($_POST['session_end']));
    //$s_date = $_POST['session_start'];
    //$e_date = $_POST['session_end'];
    mysqli_query($db,"INSERT INTO session_ VALUES(NULL,'$s_date','$e_date',$class_id);");
    mysqli_query($db,"UPDATE class SET Number_Of_Sections=Number_Of_Sections + 1 WHERE Class_Id = $class_id");
    $res =  mysqli_query($db,"SELECT `Session_Id`, `Session_Start`, `Session_End`, `Class_Id` FROM `session_` WHERE Session_Start='$s_date' AND Session_End='$e_date' AND Class_Id=$class_id;");
    $s_id = mysqli_fetch_row($res);
    $session_id = $s_id[0];
   // mysqli_query($db,"INSERT INTO absence VALUES($class_id,$s_id,0);");
   $students_in_class=mysqli_query($db,"SELECT Student_Id FROM study WHERE Class_Id=$class_id");
   while($fetcher=mysqli_fetch_assoc($students_in_class)){
    $s_id = $fetcher['Student_Id'];
    mysqli_query($db,"INSERT INTO absence VALUES($s_id,$session_id,0)");

   }
    
}


?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from preschool.dreamguystech.com/html-template/fees.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Oct 2021 11:11:50 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Preskool - Fees</title>

    <link rel="shortcut icon" href="assets/img/favicon.png">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&amp;display=swap">

    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">

    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

<div class="main-wrapper">
         <div class="header">
            <div class="header-left">
               <a href="index.php" class="logo">
               <img src="assets/img/logo.png" alt="Logo">
               </a>
               <a href="index.php" class="logo logo-small">
               <img src="assets/img/logo-small.png" alt="Logo" width="30" height="30">
               </a>
            </div>
            <a href="javascript:void(0);" id="toggle_btn">
            <i class="fas fa-align-left"></i>
            </a>
            <a class="mobile_btn" id="mobile_btn">
            <i class="fas fa-bars"></i>
            </a>
            <ul class="nav user-menu">
               <li class="nav-item dropdown has-arrow">
                  <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                  <span class="user-img"><img class="rounded-circle" src="assets/img/profiles/avatar-01.jpg" width="31" alt="Ryan Taylor"></span>
                  </a>
                  <div class="dropdown-menu">
                     <div class="user-header">
                        <div class="avatar avatar-sm">
                           <img src="assets/img/profiles/avatar-01.jpg" alt="User Image" class="avatar-img rounded-circle">
                        </div>
                        <div class="user-text">
                           <h6>Administrator</h6>
                           <p class="text-muted mb-0">Administrator</p>
                        </div>
                     </div>
                     <a class="dropdown-item" href="login.html">Logout</a>
                  </div>
               </li>
            </ul>
         </div>
         <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
               <div id="sidebar-menu" class="sidebar-menu">
                  <ul>
                     <li class="menu-title">
                        <span>Main Menu</span>
                     </li>
                     <li class="submenu">
                        <a href="index.php"><i class="fas fa-user-graduate"></i> <span> Dashboard</span> <span class="menu-arrow"></span></a>
                        <ul>
                           <li><a href="index.php">Admin Dashboard</a></li>
                        </ul>
                     </li>
                     <li class="submenu">
                        <a href="#"><i class="fas fa-user-graduate"></i> <span> Students</span> <span class="menu-arrow"></span></a>
                        <ul>
                           <li><a href="students.php">Student List</a></li>
                          
                           <a href="#"><i class="fas fa-user-graduate"></i> <span> Add student / supervisor</span> <span class="menu-arrow"></span></a>
                           <ul>
                           <li><a href="add-supervisor.php">Supervisor</a></li>
                           <li><a href="add-student.php">student</a></li>

                           </ul>
                    
                        </ul>
                     </li>
                     <li class="submenu">
                        <a href="#"><i class="fas fa-chalkboard-teacher"></i> <span> Teachers</span> <span class="menu-arrow"></span></a>
                        <ul>
                           <li><a href="teachers.php">Teacher List</a></li>
                           <li><a href="add-teacher.php">Teacher Add</a></li>
                        </ul>
                     </li>
                   
<li class="submenu">
<a href="#"><i class="fas fa-building"></i> <span> Classes</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="departments.php">Class List</a></li>
<li><a href="add-department.php" >Class Add</a></li>
<!-- <li><a href="edit-department.php">Department Edit</a></li> -->
</ul>
</li>
                     <li class="submenu">
                        <a href="#"><i class="fas fa-book-reader"></i> <span> Subjects</span> <span class="menu-arrow"></span></a>
                        <ul>
                           <li><a href="subjects.php">Subject List</a></li>
                           <li><a href="add-subject.php">Subject Add</a></li>
                        </ul>
                     </li>


                     <li>
                        <a href="fees.php"><i class="fas fa-comment-dollar"></i> <span>Fees</span></a>
                     </li>
                     <li>
                            <a href="absence.php"><i class="fas fa-holly-berry"></i> <span>absence</span></a>
                        </li>
                        <li>
<a href="event.php"><i class="fas fa-calendar-day"></i> <span>Ressources</span></a>
</li>




 


                  </ul>
               </div>
            </div>
         </div>



        <div class="page-wrapper">
            <div class="content container-fluid">

            
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST">
                                    <div class="row">

                                        <div class="col-12">
                                            <h5 class="form-title"><span>Add A session</span></h5>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Session Start Date</label>
                                                <input type="datetime-local" class="form-control" name="session_start" >
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Session End Date</label>
                                                <input type="datetime-local" class="form-control" name="session_end" >
                                            </div>
                                        </div>



                                        <div class="col-12">
                                            <input type="submit" class="btn btn-primary" value="Add" name="sub">
                                        </div>

                                    </div>
                                </form>


                            </div>
                        </div>
                    </div>
                </div>
                <?php 

$query = "SELECT * FROM session_ Where Class_Id=$class_id";
$res = mysqli_query($db,$query);
$query = mysqli_query($db,"SELECT class_name FROM class WHERE Class_Id = $class_id ");
                                                $class_row  = mysqli_fetch_row($query);
                                                $class_name = $class_row[0];
$i = 1;
//$arr = array("BelarbiAbdenour","Azemdroub malek","Boukhalfa Houssem eddine","salamani amine","Amrouche faycal","bendi abderraouf","Hamou nadir");
// var_dump($arr); printing type of variable
?>
                <div class="row">

                    <div class="col-sm-12">
                        <div class="card card-table">
                            <div class="card-body">
                                <div class="table-responsive">
                                        <table class="table table-hover table-center mb-0 datatable">
                                            <thead>
                                                <tr>
                                                    <th>SessionNumber</th>
                                                    <th>Session Start date</th>
                                                    <th>Session End date</th>
                                                    <th>Class</th>
                                                    <th class="text-right">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                            while($row=mysqli_fetch_assoc($res)){
                                                
                                                $session_start = $row['Session_Start'];
                                                $session_end = $row['Session_End'];
                                            
                                                

                                            
                                    


                                             ?>
                                                <tr>

                                                    <td>
                                                         <?php  echo "Session ".$i;  ?>
                                                    </td>
                                                    <td>
                                                        <?php  echo $session_start  ?>
                                                    </td>
                                                    <td>
                                                        <?php  echo $session_end  ?>
                                                    </td>
                                                    <td>
                                                        <?php  echo $class_name  ?>
                                                    </td>

                                                    <td class="text-right">
                                                        <div class="actions">
                                                            <a href="edit-session.php?s_id='<?php echo $row['Session_Id'] ?>'&c_id='<?php echo $class_id ?>'"
                                                                class="btn btn-sm bg-success-light mr-2">
                                                                <i class="fas fa-pen"></i>
                                                            </a>
                                                            <a href="delete-session.php?s_id='<?php echo $row['Session_Id'] ?>'&c_id='<?php echo $class_id ?>'"
                                                                class="btn btn-sm bg-danger-light mr-2">
                                                                <i class="fas fa-trash"></i>
                                                            </a>
                                                            
                                                           

                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php
                                            $i++;

                                            }
                                            ?>

                                                <?php 
                                      //    header("Refresh:0");
                                 




?>
                                </div>




                                </tbody>
                                </table>
                            </div>

                        </div>

                    </div>
                </div>

            </div>

            <footer>
                <p>G6 21 guys.</p>
            </footer>

        </div>

    </div>


    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <script src="assets/js/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="assets/plugins/datatables/datatables.min.js"></script>

    <script src="assets/js/script.js"></script>
</body>

<!-- Mirrored from preschool.dreamguystech.com/html-template/fees.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Oct 2021 11:11:51 GMT -->

</html>
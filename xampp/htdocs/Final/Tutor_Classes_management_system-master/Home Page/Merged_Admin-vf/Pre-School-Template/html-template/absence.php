




<?php
session_start();
$school_id = $_SESSION['School_Id'];

?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from preschool.dreamguystech.com/html-template/absence.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Oct 2021 11:11:50 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Preskool - absence</title>

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
                  <div class="dropdown-menu">
                     <div class="user-header">
                        
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
                          
                           <a href="#"><i class="fas fa-user-graduate"></i> <span> Add Student / Supervisor</span> <span class="menu-arrow"></span></a>
                           <ul>
                           <li><a href="add-supervisor.php">Supervisor</a></li>
                           <li><a href="add-student.php">Student</a></li>

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
                            <a href="absence.php"><i class="fas fa-holly-berry"></i> <span>Absence</span></a>
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

                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Absence</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item active">Absence</li>
                            </ul>
                        </div>
                        <div class="col-auto text-right float-right ml-auto">
                            <a href="add-absence.php" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-table">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-center mb-0 datatable">
                                        <thead>
                                            <tr>
                                                <th>StudentName</th>
                                                <th>ClassName</th>
                                                <th>SessionTime</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                     <?php 
  include 'connexion.php';
  $query = "SELECT * FROM absence JOIN session_ ON absence.Session_Id = session_.Session_Id JOIN (SELECT Class_Id FROM class WHERE school_Id = $school_id) c ON session_.Class_Id = c.Class_Id ORDER BY session_.Class_Id, session_.Session_Start ASC;";
  $res = mysqli_query($db,$query);
  while($fetched = mysqli_fetch_assoc($res)){
$class_id= $fetched['Class_Id'];
$student_id = $fetched['Student_Id'];
$absent = $fetched['absent'];
$class_name = mysqli_query($db,"SELECT class_name FROM class WHERE Class_Id = $class_id");
$cls_name = mysqli_fetch_row($class_name);
$c_name = $cls_name[0];
$student_name = mysqli_query($db,"SELECT CONCAT(Student_LastName,' ',Student_FirstName) AS Fullname FROM Student WHERE Student_Id=$student_id");
$std_name = mysqli_fetch_row($student_name);
$s_name = $std_name[0];
$session_id = $fetched['Session_Id'];
$session_time = mysqli_query($db,"SELECT Session_Start FROM session_ WHERE Session_Id= $session_id");
$sess_time = mysqli_fetch_row($session_time);
$s_time  = $sess_time[0];
?>
                                            <tr>
                            
                                            
                                                <td> <?php  echo $s_name  ?></td>
                                                <td> <?php   echo $c_name ?>     </td>
                                                <td><?php   echo $s_time  ?></td>
                                                <form method="post">   <td> <input type="radio" name='marker' value="true#<?php echo "".$student_id."#".$session_id ;?>" id="rad1" onclick="clickedradio(this)" <?php  if(($absent)){ echo "checked";} ?>     />Absent <input type="radio" name='marker' value="false#<?php echo "".$student_id."#".$session_id ;?>" id="rad2" onclick="clickedradio(this)" <?php  if(!($absent)){ echo "checked";} ?>  />Not Absent </td> </form>
                                                
                                                
                                                  
                                            </tr>
                                            <?php 
  }
if(isset($_POST["stat"]) && isset($_POST["id_s"]) && isset($_POST['id_c'])){
  
    $status = $_POST['stat'];
    $id_s = $_POST['id_s'];
    $id_c  = $_POST['id_c'];
    if($status=="true"){
        mysqli_query($db,"UPDATE absence SET absent=TRUE WHERE Student_Id=$id_s AND Session_Id = $id_c");
    } else {
        mysqli_query($db,"UPDATE absence SET absent=FALSE WHERE Student_Id=$id_s AND Session_Id=$id_c");
        
    }

    
    exit;
} ?>


                                                  

                                        </tbody>
                                 
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        

        </div>

    </div>

    <script>   

function clickedradio(radio){


    const str = radio.value;
    const [boolVar, numVar, strVar] = str.split("#");
  $.ajax({
            type: 'post',
            data: {stat: boolVar,id_s: numVar,id_c: strVar},
            success: function(response){
                console.log("Absenteism :",boolVar);
                console.log("id_s : ",numVar);
                console.log("id_c: ",strVar);
              
               
            }
         });
}


       
      
   
   </script>





    <script src="assets/js/jquery-3.6.0.min.js"></script>
    	

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="hal.js" ></script>

    <script src="assets/plugins/datatables/datatables.min.js"></script>

    <script src="assets/js/script.js"></script>
</body>

<!-- Mirrored from preschool.dreamguystech.com/html-template/absence.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Oct 2021 11:11:50 GMT -->

</html>
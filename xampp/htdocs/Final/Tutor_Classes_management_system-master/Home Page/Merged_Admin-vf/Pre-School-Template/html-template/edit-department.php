<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from preschool.dreamguystech.com/html-template/edit-department.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Oct 2021 11:11:50 GMT -->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<title>Preskool - Department</title>

<link rel="shortcut icon" href="assets/img/favicon.png">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&amp;display=swap">

<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

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
<h3 class="page-title">Edit Department</h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="departments.html">Department</a></li>
<li class="breadcrumb-item active">Edit Department</li>
</ul>
</div>
</div>
</div>
<?php


include "connexion.php";
if(!$db){
    echo "error";
}
if(isset( $_GET["idd"])){
    $idclass = $_GET["idd"];
    $sql = "SELECT * FROM class where Class_Id = '$idclass'";
    $q = mysqli_query($db ,$sql);
    $rows = mysqli_fetch_assoc($q);
    $nom = $rows['class_name'];
    $start = $rows['Starting_Date'];
    $end = $rows['Finishing_Date'];
    $numsess = $rows['Number_Of_Sections'];
    $capacity = $rows['Class_Capacity'];
    $price = $rows['Class_Price'];
}






?>
<div class="row">
<div class="col-sm-12">
<div class="card">
<div class="card-body">
<form method='post'>
<div class="row">
<div class="col-12">
<h5 class="form-title"><span>Department Details</span></h5>
</div>
<div class="col-12 col-sm-6">
<div class="form-group">
<label>Department Name</label>
<input type="text" name="className" class="form-control" value="<?php  if(isset($_GET['idd'])){
    echo $nom ;
} ?>">
</div>
</div>
<div class="col-12 col-sm-6">
<div class="form-group">
<label>Start Date</label>
<input type="date" name="StartDate" class="form-control" value="<?php  if(isset($_GET['idd'])){
    echo $start ;
} ?>">
</div>
</div>
<div class="col-12 col-sm-6">
<div class="form-group">
<label>End Date</label>
<input type="date" name="endDate" class="form-control" value="<?php  if(isset($_GET['idd'])){
    echo $end ;
} ?>">
</div>
</div>
<div class="col-12 col-sm-6">
<div class="form-group">
<label>Capaciy</label>
<input type="text" name="Capacity" class="form-control" value="<?php  if(isset($_GET['idd'])){
    echo $capacity ;
} ?>">
</div>
</div>

<div class="col-12 col-sm-6">
<div class="form-group">
<label>Number of Sessions</label>
<input type="text" name="numSessions" class="form-control" value="<?php  if(isset($_GET['idd'])){
    echo $numsess ;
} ?>">
</div>
</div>
<div class="col-12 col-sm-6">
<div class="form-group">
<label>Class Price</label>
<input type="text" name="Price" class="form-control" value="<?php  if(isset($_GET['idd'])){
    echo $price ;
} ?>">
</div>
</div>
<div class="col-12">
<button type="submit" name='confirm' class="btn btn-primary">Confirm</button>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // The form has been submitted
    if(isset($_POST["confirm"]))
    // Retrieve the form data
    $className = $_POST["className"];
    $price = $_POST["Price"];
    $start = $_POST["StartDate"];
    $end =  $_POST["endDate"];
    $numsessions = $_POST["numSessions"];
    $capacity =  $_POST["Capacity"];

    // Do something with the form data, such as sending an email or inserting it into a database
    $sql = "UPDATE class SET class_name = '$className', Class_Price = $price ,Starting_Date = '$start', Finishing_Date = '$end', Class_Capacity = $capacity, Number_Of_Sections = $numsessions WHERE Class_Id = '$idclass'";
    // Redirect the user to a thank you page or display a success message
    $result = $db->query($sql);
    echo'<script>window.location.href="departments.php"</script>';

}
?>


?>
</div>


<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/js/popper.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="assets/js/script.js"></script>
</body>

<!-- Mirrored from preschool.dreamguystech.com/html-template/edit-department.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Oct 2021 11:11:50 GMT -->
</html>
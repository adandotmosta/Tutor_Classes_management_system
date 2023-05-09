<?php
 include 'connexion.php';
session_start();
$school_id = $_SESSION['School_Id'];
//check connection 
if($db -> connect_error){
    die('connection failed' . $db -> connect_error);
}

?>

<!DOCTYPE html>
<html lang="en">


<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<title>Preskool - Holiday</title>

<link rel="shortcut icon" href="assets/img/favicon.png">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&amp;display=swap">

<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">

<link rel="stylesheet" href="assets/plugins/fullcalendar/fullcalendar.min.css">

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
<h3 class="page-title">Ressources Bank</h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
<li class="breadcrumb-item active">resources</li>
</ul>
</div>
<div class="col-auto text-right float-right ml-auto">
<a href="add-events.php" class="btn btn-primary"><i class="fas fa-plus"></i></a>
</div>
</div>
</div>

<?php
$sql = "SELECT * FROM resources WHERE Class_Id IN (SELECT Class_Id from class WHERE School_Id=$school_id)";
$result = mysqli_query($db, $sql);
$resources = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>


  <?php if (empty($resources)): ?>
    <p class="lead mt-3">There is no ressources</p>
  <?php endif; ?>

  <?php foreach ($resources as $item): ?>
    <div class="card my-3 w-75">
     <div class="card-body text-center">
       <?php echo $item['Resource_Text']; ?>
       <div class="text-secondary mt-2">to class <?php echo $item[
         'Class_Id'
       ]; ?> due <?php echo date_format(
   date_create($item['Resource_DueTime']),
   'l jS F Y'
 ); ?></div>
      <a href="edit-event.php?id=<?php echo $item['Resource_Id']; ?>" class="btn btn-primary mt-3">Edit</a>
      <button class="btn btn-danger mt-3" data-toggle="modal" data-target="#deleteModal-<?php echo $item['Resource_Id']; ?>" name="delete">Delete</button>
      <!-- Delete Modal -->
      <div class="modal fade" id="deleteModal-<?php echo $item['Resource_Id']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel-<?php echo $item['Resource_Id']; ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="deleteModalLabel-<?php echo $item['Resource_Id']; ?>" name="confirm">Confirm Delete</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Are you sure you want to delete this resource?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <a href="delete-event.php?id=<?php echo $item['Resource_Id']; ?>" class="btn btn-danger">Delete</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
  

<footer>
<p>Copyright © 2023 LBENDIIII.</p>
</footer>

</div>

</div>


<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/js/popper.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="assets/js/moment.min.js"></script>
<script src="assets/js/bootstrap-datetimepicker.min.js"></script>

<script src="assets/js/jquery-ui.min.js"></script>
<script src="assets/plugins/fullcalendar/fullcalendar.min.js"></script>
<script src="assets/plugins/fullcalendar/jquery.fullcalendar.js"></script>

<script src="assets/js/script.js"></script>
</body>


</html>
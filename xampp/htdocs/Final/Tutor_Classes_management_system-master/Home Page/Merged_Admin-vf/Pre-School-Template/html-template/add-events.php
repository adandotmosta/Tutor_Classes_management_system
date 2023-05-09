<?php



//create connection 
include 'connexion.php';

//check connection 
if($db -> connect_error){
    die('connection failed' . $db -> connect_error);
}

$Resource_Text  = $Class_Id = $Resource_Link = $Resource_DueTime = '';
$TextErr = $IdErr = $TimeErr = '';
$today = date("m-d-Y");

//form submit 
if(isset($_POST['submit'])){
    //validate text
    if(empty($_POST['Resource_Text'])){
            $TextErr = 'this is Required';
        }else{
            $Resource_Text = filter_input(INPUT_POST, 'Resource_Text', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }
        //validate class
        if(empty($_POST['Class_Id'])){
            $IdErr = 'wrong id or empty id';
        }else{
            $Class_Id = filter_input(INPUT_POST, 'Class_Id', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        //validate link
        if(empty($_POST['Resource_Link'])){
            $Resource_Link = 'No attachements';
        }else{
            $Resource_Link = filter_input(INPUT_POST, 'Resource_Link', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }
        //validate date
        if(empty($_POST['Resource_DueTime'])){
            $TimeErr = 'you should set a due date';
        }else{
            $Resource_DueTime = filter_input(INPUT_POST, 'Resource_DueTime', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }
        if(empty($TimeErr) && empty($IdErr) && empty($TextErr)){
            //adding to DB
            $sql = "INSERT INTO resources (Resource_Text, Class_Id, Resource_Link, Resource_DueTime) VALUES ('$Resource_Text', '$Class_Id', '$Resource_Link', '$Resource_DueTime')";
        if(mysqli_query($db, $sql)){
            //success
            echo "<script>window.location = 'event.php'</script>";
        }else{
           //Error
            echo "Error: " . mysqli_error($db);
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<title>Preskool - Events</title>

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
<h3 class="page-title">Add Event</h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="event.html">Events</a></li>
<li class="breadcrumb-item active">Add Event</li>
</ul>
</div>
</div>
</div>

<div class="row">
<div class="col-sm-12">
<div class="card">
<div class="card-body">
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div class="row">
        <div class="col-12">
            <h5 class="form-title"><span>Event Information</span></h5>
        </div>
        <div class="col-12 col-sm-6">
            <div class="form-group">
                <label>Information</label>
                <input type="text" class="form-control <?php echo !$TextErr ?:
           'is-invalid'; ?>" placeholder="brief description of the content" value="<?php echo $Resource_Text; ?>" name="Resource_Text">
            </div>
        </div>
        <div class="col-12 col-sm-6">
            <div class="form-group">
                <label>Classes concerned</label>
                <input type="text" class="form-control <?php echo !$IdErr ?:
           'is-invalid'; ?>" placeholder="class here" value="<?php echo $Class_Id; ?>" name="Class_Id">
            </div>
        </div>
        <div class="col-12 col-sm-6">
            <div class="form-group">
                <label>Due Date</label>
                <input type="date" class="form-control <?php echo !$TimeErr ?:
           'is-invalid'; ?>" placeholder="deadline" value="<?php echo $Resource_DueTime; ?>" name="Resource_DueTime">
            </div>
        </div>
        <div class="col-12 col-sm-6">
            <div class="form-group">
                <label>Useful links</label>
                <input type="text" class="form-control " placeholder="Links related to the assignments document" value="<?php echo $Resource_Link; ?>" name="Resource_Link">
            </div>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </div>
    </div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>

</div>


<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/js/popper.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="assets/js/script.js"></script>
</body>

</html>
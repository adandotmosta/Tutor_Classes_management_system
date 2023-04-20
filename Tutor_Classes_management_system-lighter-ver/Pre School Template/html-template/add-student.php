<!DOCTYPE html>
<html lang="en">
<!-- lbendii -->
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
      <title>Students</title>
       
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
               
               </a>
               <a href="index.php" class="logo logo-small">
                
               </a>
            </div>
            <a href="javascript:void(0);" id="toggle_btn">
            <i class="fas fa-align-left"></i>
            </a>
            <div class="top-nav-search">
               <form>
                  <input type="text" class="form-control" placeholder="Search here">
                  <button class="btn" type="submit"><i class="fas fa-search"></i></button>
               </form>
            </div>
            <a class="mobile_btn" id="mobile_btn">
            <i class="fas fa-bars"></i>
            </a>
            <ul class="nav user-menu">
               <li class="nav-item dropdown noti-dropdown">
                  <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                  <i class="far fa-bell"></i> <span class="badge badge-pill">3</span>
                  </a>
                  <div class="dropdown-menu notifications">
                     <div class="topnav-dropdown-header">
                        <span class="notification-title">Notifications</span>
                        <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
                     </div>
                     <div class="topnav-dropdown-footer">
                        <a href="#">View all Notifications</a>
                     </div>
                  </div>
               </li>
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
                           <h6>Ryan Taylor</h6>
                           <p class="text-muted mb-0">Administrator</p>
                        </div>
                     </div>
                     <a class="dropdown-item" href="profile.html">My Profile</a>
                     <a class="dropdown-item" href="inbox.html">Inbox</a>
                     <a class="dropdown-item" href="login.php">Logout</a>
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
                        <a href="#"><i class="fas fa-user-graduate"></i> <span> Dashboard</span> <span class="menu-arrow"></span></a>
                        <ul>
                           <li><a href="index.php">Admin Dashboard</a></li>
                           <li><a href="student-dashboard.html">Student Dashboard</a></li>
                        </ul>
                     </li>
                     <li class="submenu active">
                        <a href="#"><i class="fas fa-user-graduate"></i> <span> Students</span> <span class="menu-arrow"></span></a>
                        <ul>
                           <li><a href="students.php">Student List</a></li>
                          
                           <li><a href="add-student.php" class="active">Student Add</a></li>
                    
                        </ul>
                           <li class="submenu">
                           </li>
                        </ul>
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
                        <h3 class="page-title">Add Students</h3>
                        <ul class="breadcrumb">
                           <li class="breadcrumb-item"><a href="students.php">Students</a></li>
                           <li class="breadcrumb-item active">Add Students</li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-12">
                     <div class="card">
                        <div class="card-body">
                           <form  method="POST">
                              <div class="row">
                                 <div class="col-12">
                                    <h5 class="form-title"><span>Student Information</span></h5>
                                 </div>
                                 <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                       <label>First Name</label>
                                       <input type="text" class="form-control" name="Student_FirstName">
                                    </div>
                                 </div>
                                 <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                       <label>Last Name</label>
                                       <input type="text" class="form-control" name="Student_LastName">
                                    </div>
                                 </div>
                                 
                                 <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                       <label>Student email</label>
                                       <input type="Student_Mail" class="form-control" name="Student_Mail">
                                    </div>
                                 </div>
                                 <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                       <label>Date of Birth</label>
                                       <div>
                                          <input type="date" class="form-control" name="Student_Birthday">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                       <label>Mobile Number</label>
                                       <input type="text" class="form-control" name="Student_Phone_number">
                                    </div>
                                 </div>
                                 <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                       <label>Student Image</label>
                                       <input type="file" class="form-control" name="image">
                                    </div>
                                 </div>
                                 <div class="col-12">
                                    <h5 class="form-title"><span>Supervisor Information</span></h5>
                                 </div>
                                 <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                       <label>Supervisor's Last Name</label>
                                       <input type="text" class="form-control" name="Supervisor_LastName">
                                    </div>
                                 </div>
                                 <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                       <label>Supervisor's First Name</label>
                                       <input type="text" class="form-control" name="Supervisor_FirstName">
                                    </div>
                                 </div>
                                 <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                       <label>Supervisor's ID</label>
                                       <input type="text" class="form-control" name="Supervisor_Id">
                                    </div>
                                 </div>
                                 <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                       <label>Supervisor's Mobile</label>
                                       <input type="text" class="form-control" name="Mobile_number">
                                    </div>
                                 </div>
                                 <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                       <label>Supervisor's Email</label> 
                                       <input type="email" class="form-control" name="Supervisor_Mail">
                                    </div>
                                 </div>
                                 <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                       <label>School ID</label> 
                                       <input type="text" class="form-control" name="School_Id">
                                    </div>
                                 </div>
                                 <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                       <label> Student_Password</label>
                                       <input type="Student_Password" class="form-control" name="Student_Password">
                                    </div>
                                 </div>
                                 <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                       <label>Confirm Student_Password</label>
                                       <input type="Student_Password" class="form-control">
                                    </div>
                                 </div>

                                 <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                       <label>Current Student_address</label>
                                       <textarea class="form-control" name="Student_address"></textarea>
                                    </div>
                                 </div>
                                 <div class="col-12">
                                    <button type="submit" class="btn btn-primary" name="Register">Add</button>
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>

               <?php
if(isset($_POST["Register"])) {
  $studentID = $_POST["Student_Id"];
  $Student_Mail = $_POST["Student_Mail"];
  $Student_Password = md5($_POST["Student_Password"]);
  $Sp_id = $_POST["Supervisor_Id"];
  $firstname = $_POST["Student_FirstName"];
  $lastname = $_POST["Student_LastName"];
  $phonenumber = $_POST["Student_Phone_number"];
  $dataofbirth = $_POST["Student_Birthday"];
  $Student_address = $_POST["Student_address"];
  $image = $_POST["image"];
  $schoolID = $_POST["School_Id"];

  $supervisorId = $_POST["Supervisor_Id"];
  $Supervisor_Mail = $_POST["Supervisor_Mail"];
  $firstnameSP = $_POST["Supervisor_FirstName"];
  $lastnameSP = $_POST["Supervisor_LastName"];
  $phonenumberSP = $_POST["Mobile_number"];

  $db = new mysqli("localhost","root","","db_tutoring_classes");

  function validateStudent_Mail($Student_Mail) {
    $v = "/[a-zA-Z0-9_-.+]+@[a-zA-Z0-9-]+.[a-zA-Z]+/";
    return (bool)preg_match($v, $Student_Mail);
  }

  if($db->connect_error){
    die("connection field" .$db->connect_error);
  } else {
    $query2 = "INSERT INTO supervisor (Supervisor_Id, Supervisor_Mail, Supervisor_FirstName, Supervisor_LastName, Mobile_number, Password_User, School_Id) VALUES ('$supervisorId', '$Supervisor_Mail', '$firstnameSP', '$lastnameSP', '$phonenumberSP', '$Student_Password', '$schoolID')";
    mysqli_query($db, $query2);

    $query = "INSERT INTO student (Student_Id, Supervisor_Id, Student_FirstName, Student_LastName, Student_Mail, Student_Password, Student_Birthday, Student_address, Student_Phone_number, image) VALUES ('$studentID', '$supervisorId', '$firstname', '$lastname', '$Student_Mail', '$Student_Password', '$dataofbirth', '$Student_address', '$phonenumber', '$image')";
    mysqli_query($db, $query);

    echo "Registration successfully";
    $db->close();
  }
}
?>
    
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
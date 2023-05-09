<?php
session_start();
$school_id = $_SESSION['School_Id'];

?>
<!DOCTYPE html>
<html lang="en">
   
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
      <title>Preskool - Dashboard</title>
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
         <?php 
         include 'connexion.php';
         ?>
         <div class="page-wrapper">
            <div class="content container-fluid">
               <div class="page-header">
                  <div class="row">
                     <div class="col-sm-12">
                        <h3 class="page-title">Welcome <?php  echo $_SESSION['School_Name']; ?></h3>
                        <ul class="breadcrumb">
                           <li class="breadcrumb-item active">Dashboard</li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-xl-3 col-sm-6 col-12 d-flex">
                     <div class="card bg-one w-100">
                        <div class="card-body">
                           <div class="db-widgets d-flex justify-content-between align-items-center">
                              <div class="db-icon">
                                 <i class="fas fa-user-graduate"></i>
                              </div>
                              <div class="db-info">
                                 



                                 <h3> <?php
// Assuming you have already established a connection to the database

// Query to count the number of instances in the student table
$sql = "SELECT COUNT(*) AS total_students FROM student WHERE Supervisor_Id IN (SELECT Supervisor_Id FROM supervisor WHERE School_Id =$school_id)";

// Execute the query
$result = mysqli_query($db, $sql);

// Check if the query executed successfully
if (!$result) {
    die('Error: ' . mysqli_error($db));
}

// Get the total number of students
$row = mysqli_fetch_assoc($result);
$total_students = $row['total_students'];

// Display the total number of students
echo  $total_students;

// Close the connection
?></h3>
                                 <h6>Students</h6>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-3 col-sm-6 col-12 d-flex">
                     <div class="card bg-two w-100">
                        <div class="card-body">
                           <div class="db-widgets d-flex justify-content-between align-items-center">
                              <div class="db-icon">
                                 <i class="fas fa-crown"></i>
                              </div>
                              <div class="db-info">
                                 <h3>
                                    <?php
                                    $sql = "SELECT COUNT(*) AS total_teachers FROM teacher WHERE School_Id=$school_id";
                                    $result = mysqli_query($db, $sql);
                                    $row = mysqli_fetch_assoc($result);
$total_students = $row['total_teachers'];

// Display the total number of students
echo  $total_students;

// Close the connection
                                    


                                    ?>
                                 </h3>
                                 <h6>Teachers</h6>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-3 col-sm-6 col-12 d-flex">
                     <div class="card bg-three w-100">
                        <div class="card-body">
                           <div class="db-widgets d-flex justify-content-between align-items-center">
                              <div class="db-icon">
                                 <i class="fas fa-building"></i>
                              </div>
                              <div class="db-info">
                                 <h3> <?php
// Assuming you have already established a connection to the database

// Query to count the number of instances in the student table
$sql = "SELECT COUNT(*) AS total_students FROM class WHERE School_Id=$school_id";

// Execute the query
$result = mysqli_query($db, $sql);

// Check if the query executed successfully
if (!$result) {
    die('Error: ' . mysqli_error($db));
}

// Get the total number of students
$row = mysqli_fetch_assoc($result);
$total_students = $row['total_students'];

// Display the total number of students
echo  $total_students;

// Close the connection
?></h3></h3>
                                 <h6>classes</h6>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-3 col-sm-6 col-12 d-flex">
                     <div class="card bg-four w-100">
                        <div class="card-body">
                           <div class="db-widgets d-flex justify-content-between align-items-center">
                              <div class="db-icon">
                                 <i class="fas fa-file-invoice-dollar"></i>
                              </div>
                              <div class="db-info">
                                 <h3><?php
// Assuming you have already established a connection to the database

// Query to count the number of instances in the student table
$sql = "SELECT COUNT(*) AS total_students FROM module WHERE School_Id = $school_id";

// Execute the query
$result = mysqli_query($db, $sql);

// Check if the query executed successfully
if (!$result) {
    die('Error: ' . mysqli_error($db));
}

// Get the total number of students
$row = mysqli_fetch_assoc($result);
$total_students = $row['total_students'];

// Display the total number of students
echo  $total_students;

// Close the connection
?></h3>
                                 <h6>Modules</h6>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <br><br><br>
               <div class="column">
                  <div class="">
                     <div class="card flex-fill">
                        <div class="card-header">
                           <h5 class="card-title">Recently Joined Students</h5>
                        </div>
                        <div class="card-body">
                           <div class="table-responsive">
                              <table class="table table-hover table-center">
                                 <thead class="thead-light">
                                    <tr>
                                       <th>First Name</th>
                                       <th>Last Name</th>
                                       <th class="text-center">Birthday</th>
                                       <th class="text-center">Email</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                    include 'connexion.php';
                                    $_SESSION["School_Id"];
                                    $sql = " SELECT * FROM student WHERE Supervisor_Id IN (SELECT Supervisor_Id FROM supervisor WHERE School_Id =$school_id)  ORDER BY Student_Id DESC LIMIT 15 ";  
           
                                    $result = mysqli_query($db,$sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                       echo '<tr>';
                                       echo "<td class='text-nowrap'> " . $row["Student_FirstName"] . "</td>";
                                       echo "<td class='text-nowrap'> " . $row["Student_LastName"] . "</td>";
                                       echo "<td class='text-nowrap'> " . $row["Student_Birthday"] . "</td>";
                                       echo "<td class='text-nowrap'> " . $row["Student_Mail"] . "</td>";

                                       
                                       // ...
                                       echo "</tr>"; // Add a horizontal rule between rows
                                     }
                                    ?>
                                    
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                     
                     <div >
                      <br><br><br>
                  <div class="">
                     <div class="card flex-fill">
                        <div class="card-header">
                           <h5 class="card-title">Teachers </h5>
                        </div>
                        <div class="card-body">
                           <div class="table-responsive">
                              <table class="table table-hover table-center">
                                 <thead class="thead-light">
                                    <tr>
                                       <th>First Name</th>
                                       <th>Last Name</th>
                                       <th class="text-center">Email</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                    include 'connexion.php';
                                    $_SESSION["School_Id"];
                                    $sql = " SELECT * FROM Teacher WHERE School_Id=$school_id  ";  
           
                                    $result = mysqli_query($db,$sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                       echo '<tr>';
                                       echo "<td class='text-nowrap'> " . $row["Teacher_FirstName"] . "</td>";
                                       echo "<td class='text-nowrap'> " . $row["Teacher_LastName"] . "</td>";
                                       echo "<td class='text-nowrap'> " . $row["Teacher_Mail"] . "</td>";

                                       
                                       // ...
                                       echo "</tr>"; // Add a horizontal rule between rows
                                     }
                                    ?>
                                    
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
                 
               </div>
              
            <footer>
               
            </footer>
         </div>
      </div>
      <script src="assets/js/jquery-3.6.0.min.js"></script>
      <script src="assets/js/popper.min.js"></script>
      <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
      <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
      <script src="assets/plugins/apexchart/apexcharts.min.js"></script>
      <script src="assets/plugins/apexchart/chart-data.js"></script>
      <script src="assets/js/script.js"></script>
   </body>
   
</html>
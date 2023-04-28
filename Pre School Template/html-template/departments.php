<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from preschool.dreamguystech.com/html-template/departments.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Oct 2021 11:11:50 GMT -->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<title>Preskool - Departments</title>

<link rel="shortcut icon" href="assets/img/favicon.png">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&amp;display=swap">

<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

<link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">
<script   src="https://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">

</head>
<body>
<?php
     session_start();


?>
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
                           <h6>session_start();<?php  echo $_SESSION['School_Name']; ?></h6>
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

<div class="page-header">
<div class="row align-items-center">
<div class="col">
<h3 class="page-title">Classes</h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
<li class="breadcrumb-item active">Classes</li>
</ul>
</div>
<div class="col-auto text-right float-right ml-auto">
<a href="#" class="btn btn-outline-primary mr-2"><i class="fas fa-download"></i> Download</a>
<a href="add-department.php" class="btn btn-primary"><i class="fas fa-plus"></i></a>
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
<th>Name</th>
<th>Teacher</th>
<th>Module</th>
<th>Price</th>
<th>Start date</th>
<th>End date</th>
<th>Class capacity</th>
<th>Number of Students </th>
<th>Number of sessions</th>
<div id="dialogBox" style="display:none">
  Adding a student to this Class : <br>
  <form action="./../../classesphp/addstudentclass.php" method='post'>
<select id='countries' class="form-control"  name='studentclass[]' multiple>
<?php

$conn = mysqli_connect("localhost", "root", "", "db_tutoring_classes");

// Fetch data for the select element
$result = mysqli_query($conn, "SELECT * FROM student ");

while ($row = mysqli_fetch_assoc($result)) {
        
   echo '<option  value ="' .$row['Student_Id'] . '">' . $row['Student_FirstName']. "  " .$row['Student_LastName'] .'</option>';
}

// Close database connection
mysqli_close($conn);




?>
</select>
<div class="col-12">
  <input type="hidden" name="classid" id="classid"  >




  <br><br>
<button type="submit" name='addstudenttoclass'  onclick="hideDialog()" class="btn btn-primary">Add</button>
<br><br>
</form>
  
</div>
<th class="text-right">Action</th>
</tr>
</thead>
<tbody id="classes-display">
<?php

     $conn = mysqli_connect('localhost','root','','db_tutoring_classes');
     if(!$conn){
         echo "error";
     }
     
     $sessions = $_SESSION['School_Id'];
     
    $sql = "SELECT * FROM class AS class JOIN teacher ON class.Teacher_Id = teacher.Teacher_Id JOIN module ON class.Module_Id = module.Module_Id WHERE class.School_Id ='$sessions' ";

$result = $conn->query($sql);

// Check if there are any results
if ($result->num_rows > 0) {
  // Output data of each row
  $ind=0;
  while($row = $result->fetch_assoc()) {
    
    echo "<tr>";
    //echo "<td>" . $row["Class_Id"]. "</td>";
    echo "<td style='font-weight: bold; color: green;text-transform: capitalize;'>" . $row["class_name"]. "</td>";
    echo "<td> ". $row["Teacher_FirstName"]." " . $row["Teacher_LastName"]. "</td>";
    echo "<td> ". $row["Module_Name"]. "</td>";
    echo "<td><h2><a>". $row["Class_Price"]. "</a></h2></td>";
    echo "<td> ". $row["Starting_Date"]. "</td>";
    echo "<td> ". $row["Finishing_Date"]. "</td>";
    echo "<td> ". $row["Class_Capacity"]. "</td>";
    echo "<td> 0</td>";
    echo "<td> ". $row["Number_Of_Sections"]. "</td>";




    echo'
    <td class="text-right">
    <div class="actions">
    <a href="edit-department.php?idd='.$row["Class_Id"].'" class="btn btn-sm bg-success-light mr-2">
    <i class="fas fa-pen"></i>
    </a>
    <a href="./../../classesphp/delete-class.php?idd='.$row["Class_Id"].'" class="btn btn-sm bg-danger-light">
    <i class="fas fa-trash"></i>
    </a>
    </a>
     <a value = ' .$row["Class_Id"]. '  class="btn btn-sm bg-danger-light">
    <i class="fa-solid fa-user-plus rrssrr"  value = ' .$row["Class_Id"]. ' onclick="showDialog('.$ind.')"></i>
    </a>
    <a href="./classstudentsshow.php?iddddd='.$row["Class_Id"].'&namo='.$row["class_name"].'" class="btn btn-sm bg-danger-light">
    <i class="fa-solid fa-user-plus"  value = '.$row["Class_Id"].' ></i>
    </a>
    <a href="Session.php?id='.$row["Class_Id"].'" class="btn btn-sm bg-success-light">
    <i class="fa-solid fa-user-plus"  value = '.$row["Class_Id"].' ></i>
    </a>

    </div>
    </td>
    </tr>
    ';
    $ind = $ind+1;
  }
} else {
  echo "0 results";
}

$conn->close();

?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>

<footer>
<p>Copyright © 2020 Dreamguys.</p>
</footer>

</div>

</div>


<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/js/popper.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="assets/plugins/datatables/datatables.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>
<script src="assets/js/script.js"></script>
<script src="./../../classesphp/show.js"></script>

</body>

<!-- Mirrored from preschool.dreamguystech.com/html-template/departments.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Oct 2021 11:11:50 GMT -->
</html>
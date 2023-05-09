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

<link rel="stylesheet" href="assets/plugins/simple-calendar/simple-calendar.css">

<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<?php
        include "connexion.php";
        $Id =$_GET['s_id'];
         session_start();
         $_SESSION['Student_Id']=$Id;
         $sql = "SELECT Student_FirstName FROM student WHERE Student_Id=$Id";
         $result = $db->query($sql);

        if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row["Student_FirstName"];
        } else {
        $name = "User";
        }
      
        // Retrieve courses info from database
        $sql = "SELECT class.class_name, class.Class_Id, study.Student_Absence FROM study JOIN class ON study.Class_Id = class.Class_Id WHERE study.Student_Id = $Id ORDER BY study.Student_Starting_Date DESC";
        $result_course = $db->query($sql);
        // Retrieve fees info
        $sql = "SELECT Fees_Amount, Fees_Status FROM fees WHERE Student_Id = '$Id'";
        $result_fees = $db->query($sql);
        // Retrieve assignments info
        $sql = "SELECT r.Resource_Text, r.Resource_DueTime 
        FROM resources r 
        JOIN study s ON r.class_id = s.class_id
        WHERE s.Student_Id = '$Id' 
        ORDER BY r.Resource_DueTime DESC 
        LIMIT 3";
        $result_assignments = $db->query($sql);
        //KPIs 
        // count number of absences 
        $sql = "SELECT COUNT(absence.absent) as count FROM absence WHERE Student_Id = $Id; ";
        $result = $db->query($sql);
        $row = $result->fetch_assoc();
        $absences = $row['count'];
        // number of ressources available to the user 
        $sql = "SELECT COUNT(Resource_Id) as resources FROM resources JOIN study ON resources.Class_Id = study.Class_Id WHERE Student_Id = $Id; ";
        $result = $db->query($sql);
        $row = $result->fetch_assoc();
        $resources = $row['resources'];
        // number of courses attended
        $sql = "SELECT COUNT(Class_Id) as courses FROM study  WHERE Student_Id = $Id; ";
        $result = $db->query($sql);
        $row = $result->fetch_assoc();
        $courses = $row['courses'];

?>
<div class="main-wrapper">

<div class="header">

<div class="header-left">
<a href="index.html" class="logo">
<img src="assets/img/logo.png" alt="Logo">
</a>
<a href="index.html" class="logo logo-small">
<img src="assets/img/logo-small.png" alt="Logo" width="30" height="30">
</a>
</div>

<a href="javascript:void(0);" id="toggle_btn">
<i class="fas fa-align-left"></i>
</a>


</div>
<?php include "sidebar.php";
include "navbar.php";
?>


<div class="page-wrapper">
<div class="content container-fluid">

<div class="page-header">
<div class="row">
<div class="col-sm-12">
<h3 class="page-title">Welcome to Your Dashboard, <?php echo $name; ?>!</h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
<li class="breadcrumb-item active">Student Dashboard</li>
</ul>
</div>
</div>
</div>

<div class="row">
<div class="col-xl-3 col-sm-6 col-12 d-flex">
<div class="card bg-nine w-100">
<div class="card-body">
<div class="db-widgets d-flex justify-content-between align-items-center">
<div class="db-icon">
<i class="fas fa-book-open"></i>
</div>
<div class="db-info">
<h3><?php echo "$courses" ?></h3>
<h6>Courses Attended</h6>
</div>
</div>
</div>
</div>
</div>
<div class="col-xl-3 col-sm-6 col-12 d-flex">
<div class="card bg-six w-100">
<div class="card-body">
<div class="db-widgets d-flex justify-content-between align-items-center">
<div class="db-icon">
<i class="fas fa-file-alt"></i>
</div>
<div class="db-info">
<h3><?php echo "$resources" ?></h3>
<h6>Available Ressources</h6>
</div>
</div>
</div>
</div>
</div>
<div class="col-xl-3 col-sm-6 col-12 d-flex">
<div class="card bg-eleven w-100">
<div class="card-body">
<div class="db-widgets d-flex justify-content-between align-items-center">
<div class="db-icon">
<i class="fas fa-clipboard-check"></i>
</div>
<div class="db-info">
<h3><?php echo "$absences"; ?></h3>
<h6>Absences</h6>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="row">
<div class="container mt-4">
<h2>Courses</h2>
    <table class="table">
      <thead>
        <tr>
          <th>Course Name</th>
          <th>Class ID</th>
          <th>Absences</th>
        </tr>
      </thead>
      <tbody>
        <?php while($row = $result_course->fetch_assoc()): ?>
        <tr>
          <td><?php echo $row["class_name"]; ?></td>
          <td><?php echo $row["Class_Id"]; ?></td>
          <td><?php echo $row["Student_Absence"]; ?></td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>

    <h2>Fees</h2>
    <table class="table">
      <thead>
        <tr>
          <th>Amount</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php while($row = $result_fees->fetch_assoc()): ?>
        <tr>
          <td><?php echo $row["Fees_Amount"]; ?></td>
          <?php if($row["Fees_Status"] == 1){?>
            <td>Paid</td>
          <?php }else{ ?>
            <td>Unpaid</td>
          <?php } ?>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
    <h2>Assignments</h2>
    <table class="table">
      <thead>
        <tr>
          <th>Name</th>
          <th>Due Date</th>
        </tr>
      </thead>
      <tbody>
        <?php while($row = $result_assignments->fetch_assoc()): ?>
        <tr>
          <td><?php echo $row["Resource_Text"]; ?></td>
          <td><?php echo $row["Resource_DueTime"]; ?></td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
    </div>
<footer>
<p>LBENDIII .</p>
</footer>

</div>

</div>


<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/js/popper.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="assets/plugins/apexchart/apexcharts.min.js"></script>
<script src="assets/plugins/apexchart/chart-data.js"></script>

<script src="assets/plugins/simple-calendar/jquery.simple-calendar.js"></script>
<script src="assets/js/calander.js"></script>

<script src="assets/js/circle-progress.min.js"></script>

<script src="assets/js/script.js"></script>
</body>

</html>
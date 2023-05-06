<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
     
       
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&amp;display=swap">
      <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
      <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
      <link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">
      <link rel="stylesheet" href="assets/css/style.css">
   </head>
   <body>    
      
       
            <div class="content container-fluid">
               <div class="page-header">
                  <div class="row align-items-center">
                     <div class="col">
                        <h3 class="page-title">Supervised student(s)</h3>
                        <ul class="breadcrumb">
                           <li class="breadcrumb-item"><a href="index.html">Table</a></li>
                           <li class="breadcrumb-item active">Supervised student(s)</li>
                        </ul>
                     </div>
                    
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-12">
                     <div class="card card-table">
                        <div class="card-body">
                           <div class="table-responsive">
                           <?php
include "connexion.php";
session_start();

$supervisorId = $_SESSION['Supervisor_Id'];
$sql = "SELECT s.image, s.Student_Id, s.Student_LastName, s.Student_FirstName, s.Student_Mail, s.Student_Birthday, s.Student_Phone_number, s.Student_address 
        FROM student s 
        JOIN supervisor st ON s.Supervisor_Id = st.Supervisor_Id 
        WHERE s.Supervisor_Id = '$supervisorId' ";
$result=mysqli_query($db,$sql);
?>
<table class="table table-hover table-center mb-0 datatable" table-center>
   <thead>
      <tr>
         <th>Image</th>
         <th>Student ID</th>
         <th>LAST NAME</th>
         <th>FIRST NAME</th>
         <th>Email</th>
         <th>DOB</th>
         <th>Mobile Number</th>
         <th>Address</th>
         
      </tr>
   </thead>
   <tbody>
      <?php
         while($info=$result->fetch_assoc()) {
      ?>
      <tr>
         <td>
            <h5 class="table-avatar">
               <a href="student-details.php?id=<?php echo "{$info["Student_Id"]}"; ?>" class="avatar avatar-sm mr-2">
               <?php
if (isset($info['image'])) {
    $image = $info['image'];
    echo '<img class="avatar-img rounded-circle" src="data:image/jpeg;base64,'.base64_encode($image).'" alt="">';
} else {
    // If the image is not available, don't show anything
}
?>

               </a>
               <a href="index.php?s_id=<?php echo "{$info["Student_Id"]}"; ?>">
                  <?php echo "{$info["Student_LastName"]} {$info["Student_FirstName"]}";
                   ?>
               </a>
               <?php
               
               ?>
         
            </h5>
            <?php $id =$info["Student_Id"]; ?>
         </td>
         <td><?php echo "{$info["Student_Id"]}"; ?></td>
         <td><?php echo "{$info["Student_LastName"]}"; ?></td>
         <td><?php echo "{$info["Student_FirstName"]}"; ?></td>
         <td><?php echo "{$info["Student_Mail"]}"; ?></td>
         <td><?php echo "{$info["Student_Birthday"]}"; ?></td>
         <td><?php echo "{$info["Student_Phone_number"]}"; ?></td>
         <td><?php echo "{$info["Student_address"]}"; ?></td>
        
      </tr>
      <?php } ?>
   </tbody>
</table>
<button onclick="location.href='../login.php'">Logout</button>


                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <footer>
               
            </footer>
         </div>
      </div>
      <table class="table table-hover table-center mb-0 datatable mx-auto">

      <script src="assets/js/jquery-3.6.0.min.js"></script>
      <script src="assets/js/popper.min.js"></script>
      <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
      <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
      <script src="assets/plugins/datatables/datatables.min.js"></script>
      <script src="assets/js/script.js"></script>
   </body>
   <!-- Mirrored from preschool.dreamguystech.com/html-template/students.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Oct 2021 11:11:49 GMT -->
</html>
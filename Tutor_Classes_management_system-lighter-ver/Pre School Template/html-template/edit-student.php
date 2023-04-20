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
               <a href="index.html" class="logo">
               
               </a>
               <a href="index.html" class="logo logo-small">
                
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
                     <div class="noti-content">
                        <ul class="notification-list">
                           <li class="notification-message">
                              <a href="#">
                                 <div class="media">
                                    <span class="avatar avatar-sm">
                                    <img class="avatar-img rounded-circle" alt="User Image" src="assets/img/profiles/avatar-02.jpg">
                                    </span>
                                    <div class="media-body">
                                       <p class="noti-details"><span class="noti-title">Carlson Tech</span> has approved <span class="noti-title">your estimate</span></p>
                                       <p class="noti-time"><span class="notification-time">4 mins ago</span></p>
                                    </div>
                                 </div>
                              </a>
                           </li>
                           <li class="notification-message">
                              <a href="#">
                                 <div class="media">
                                    <span class="avatar avatar-sm">
                                    <img class="avatar-img rounded-circle" alt="User Image" src="assets/img/profiles/avatar-11.jpg">
                                    </span>
                                    <div class="media-body">
                                       <p class="noti-details"><span class="noti-title">International Software Inc</span> has sent you a invoice in the amount of <span class="noti-title">$218</span></p>
                                       <p class="noti-time"><span class="notification-time">6 mins ago</span></p>
                                    </div>
                                 </div>
                              </a>
                           </li>
                           <li class="notification-message">
                              <a href="#">
                                 <div class="media">
                                    <span class="avatar avatar-sm">
                                    <img class="avatar-img rounded-circle" alt="User Image" src="assets/img/profiles/avatar-17.jpg">
                                    </span>
                                    <div class="media-body">
                                       <p class="noti-details"><span class="noti-title">John Hendry</span> sent a cancellation request <span class="noti-title">Apple iPhone XR</span></p>
                                       <p class="noti-time"><span class="notification-time">8 mins ago</span></p>
                                    </div>
                                 </div>
                              </a>
                           </li>
                           <li class="notification-message">
                              <a href="#">
                                 <div class="media">
                                    <span class="avatar avatar-sm">
                                    <img class="avatar-img rounded-circle" alt="User Image" src="assets/img/profiles/avatar-13.jpg">
                                    </span>
                                    <div class="media-body">
                                       <p class="noti-details"><span class="noti-title">Mercury Software Inc</span> added a new product <span class="noti-title">Apple MacBook Pro</span></p>
                                       <p class="noti-time"><span class="notification-time">12 mins ago</span></p>
                                    </div>
                                 </div>
                              </a>
                           </li>
                        </ul>
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
                           <li><a href="index.html">Admin Dashboard</a></li>
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
               </div>
            </div>
         </div>
         <div class="page-wrapper">
            <div class="content container-fluid">
               <div class="page-header">
                  <div class="row align-items-center">
                     <div class="col">
                        <h3 class="page-title">Edit Students</h3>
                        <ul class="breadcrumb">
                           <li class="breadcrumb-item"><a href="students.php">Students</a></li>
                           <li class="breadcrumb-item active">Edit Students</li>
                        </ul>
                     </div>
                  </div>
               </div>
               <?php 
               include "connect.php";
               $ID=$_GET["updateid"];
               $Query="SELECT * FROM student where Student_Id=$ID;";
               $res= mysqli_query($db,$Query);
               $row=mysqli_fetch_row($res);
               $Query2="SELECT * FROM supervisor where Supervisor_Id=$row[1];";
               $res2= mysqli_query($db,$Query2);
               $row2=mysqli_fetch_row($res2);
               ?>
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
                                       <input type="text" class="form-control" name="Student_FirstName" value="<?php echo $row[2]?>">
                                    </div>
                                 </div>
                                 <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                       <label>Last Name</label>
                                       <input type="text" class="form-control" name="Student_LastName"  value="<?php echo $row[3]?>">
                                    </div>
                                 </div>
                                 <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                       <label>Student Id</label>
                                       <input type="text" class="form-control" name="Student_Id"  value="<?php echo $row[0]?>">
                                    </div>
                                 </div>
                                 <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                       <label>Student email</label>
                                       <input type="Student_Mail" class="form-control" name="Student_Mail"  value="<?php echo $row[4]?>">
                                    </div>
                                 </div>
                                 <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                       <label>Gender</label>
                                       <select class="form-control">
                                          <option>Select Gender</option>
                                          <option>Female</option>
                                          <option>Male</option>
                                          <option>Others</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                       <label>Date of Birth</label>
                                       <div>
                                          <input type="date" class="form-control" name="Student_Birthday"  value="<?php echo $row[5]?>">
                                       </div>
                                    </div>
                                 </div>
                                
                                 </div>
                                 <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                       <label>Mobile Number</label>
                                       <input type="text" class="form-control" name="Student_Phone_number"  value="<?php echo $row[8]?>">
                                    </div>
                                 </div>
                                 
                                 <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                       <label>Student Image</label>
                                       <input type="file" class="form-control" name="image" >
                                    </div>
                                 </div>
                                 <div class="col-12">
                                    <h5 class="form-title"><span>Parent Information</span></h5>
                                 </div>
                                 <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                       <label>Father's Name</label>
                                       <input type="text" class="form-control" value="<?php echo $row2[2]?>">
                                    </div>
                                 </div>
                                 
                                 <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                       <label>Father's Mobile</label>
                                       <input type="text" class="form-control" value="<?php echo $row2[6]?>">
                                    </div>
                                 </div>
                                 <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                       <label>Father's id</label>
                                       <input type="Student_Mail" class="form-control" name="Supervisor_Id" value="<?php echo $row2[0]?>">
                                    </div>
                                 </div>
                                 <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                       <label> Student_Password</label>
                                       <input type="Student_Password" class="form-control" name="Student_Password" value="<?php echo $row2[5]?>">
                                    </div>
                                 </div>
                                 
                                 <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                       <label>Present Student_address</label>
                                       <input class="form-control" name="Student_address" value="<?php echo $row[7]?>"></textarea>
                                    </div>
                                 </div>
                                 <div class="col-12">
                                    <input type="submit" class="btn btn-primary" name="SUBMIT" VALUES="update">
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
               <?php
                           include "connect.php";
                           $id=$_GET["updateid"];
                           if(isset($_POST["SUBMIT"]))
                           {
                  $studentID= $_POST["Student_Id"];
                  $Student_Mail= $_POST["Student_Mail"];
                  $Student_Password= $_POST["Student_Password"];
                  $Sp_id= $_POST["Supervisor_Id"];
                  $firstname= $_POST["Student_FirstName"];
                  $lastname= $_POST["Student_LastName"];
                  $phonenumber= $_POST["Student_Phone_number"];
                  $dataofbirth= $_POST["Student_Birthday"];
                  $Student_address= $_POST["Student_address"];
                  $image= $_POST["image"];

                  function validateStudent_Mail($Student_Mail) {
                     $v = "/[a-zA-Z0-9_-.+]+@[a-zA-Z0-9-]+.[a-zA-Z]+/";
                  
                     return (bool)preg_match($v, $Student_Mail);
                  }
                  
                  if($db->connect_error){
                  die("connection field" .$db->connect_error);}
                  else{
                     $query = "UPDATE `student` SET `Student_Id`='{$studentID}', `Student_FirstName`='{$firstname}', `Student_LastName`='{$lastname}', `Student_Mail`='{$Student_Mail}', `Student_Password`='{$Student_Password}', `Student_Birthday`='{$dataofbirth}', `Student_address`='{$Student_address}', `Student_Phone_number`={$phonenumber}, `image`='{$image}' WHERE `Student_Id`='{$id}'";


                     mysqli_query($db, $query);
                     echo "profile updated successfully";
                     $db->close();
                     
                  }}
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
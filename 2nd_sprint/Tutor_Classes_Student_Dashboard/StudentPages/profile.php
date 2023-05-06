<?php include "connexion.php"; 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
   <!-- Mirrored from preschool.dreamguystech.com/html-template/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Oct 2021 11:11:38 GMT -->
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
      <title>Preskool - Profile</title>
      <link rel="shortcut icon" href="assets/img/favicon.png">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&amp;display=swap">
      <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
      <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
      <link rel="stylesheet" href="assets/css/style.css">
   </head>
   <body>
      <?php include "navbar.php";
      ?>
        <?php include "sidebar.php";
        ?>
         </div>
         <div class="page-wrapper">
            <div class="content container-fluid">
               <div class="page-header">
                  <div class="row">
                     <div class="col">
                        <h3 class="page-title">Profile</h3>
                        <ul class="breadcrumb">
                           <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                           <li class="breadcrumb-item active">Profile</li>
                        </ul>
                     </div>
                  </div>
               </div>
               <?php 
                    $StdID=$_SESSION['Student_Id'];
                     $sql="SELECT image,Student_Id,Student_LastName,Student_Mail,Student_FirstName,Student_Birthday,Student_Phone_number,Student_address FROM student WHERE Student_Id = $StdID";
                     $result = mysqli_query($db,$sql);
                     $info=$result->fetch_assoc();
                     $fullname=  $info["Student_FirstName"]." ".$info["Student_LastName"];
                     ?>
               <div class="row">
                  <div class="col-md-12">
                     <div class="profile-header">
                        <div class="row align-items-center">
                           <div class="col-auto profile-image">
                              <a href="#">
                              <img class="rounded-circle" alt="User Image" src="<?php if(isset($info['image'])){ echo 'data:image/jpeg;base64,'.base64_encode($info['image']); } else{ echo ''; } ?>">
                              </a>
                           </div>
                           <div class="col ml-md-n2 profile-user-info">
                              <h4 class="user-name mb-0"><?php echo $fullname ?></h4>
                              <h6 class="text-muted">Software Engineering Team</h6>
                              <div class="user-Location"><i class="fas fa-map-marker-alt"></i> Algiers</div>
                              <div class="about-text">Software Developer</div>
                           </div>
                           
                        </div>
                     </div>
                     <div class="profile-menu">
                        <ul class="nav nav-tabs nav-tabs-solid">
                           <li class="nav-item">
                              <a class="nav-link active" data-toggle="tab" href="#per_details_tab">About</a>
                           </li>
                        </ul>
                     </div>
                    

                     <div class="tab-content profile-tab-cont">
                        <div class="tab-pane fade show active" id="per_details_tab">
                           <div class="row">
                              <div class="col-lg-9">
                                 <div class="card">
                                    <div class="card-body">
                                       <h5 class="card-title d-flex justify-content-between">
                                          <span>Personal Details</span>
                                         
                                       </h5>
                                       <div class="row">
                                          <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Name</p>
                                          <p class="col-sm-9"><?php echo $info["Student_FirstName"] ?></p>
                                       </div>
                                       <div class="row">
                                          <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Date of Birth</p>
                                          <p class="col-sm-9"><?php echo $info["Student_Birthday"] ?></p>
                                       </div>
                                       <div class="row">
                                          <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Email ID</p>
                                          <p class="col-sm-9"><?php echo $info["Student_Mail"] ?></p>
                                       </div>
                                       <div class="row">
                                          <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Mobile</p>
                                          <p class="col-sm-9"><?php echo $info["Student_Phone_number"] ?></p>
                                       </div>
                                       <div class="row">
                                          <p class="col-sm-3 text-muted text-sm-right mb-0">Address</p>
                                          <p class="col-sm-9 mb-0"><?php echo $info["Student_address"] ?><br>
                                          </p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              
                                 
                                 <div class="card">
                                    <div class="card-body">
                                       <h5 class="card-title d-flex justify-content-between">
                                          <span>Skills </span>
                                          
                                       </h5>
                                       <div class="skill-tags">
                                          <span>Html5</span>
                                          <span>CSS3</span>
                                          <span>WordPress</span>
                                          <span>Javascript</span>
                                          <span>Android</span>
                                          <span>iOS</span>
                                          <span>Angular</span>
                                          <span>PHP</span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div id="password_tab" class="tab-pane fade">
                           <div class="card">
                              <div class="card-body">
                                 <h5 class="card-title">Change Password</h5>
                                 <div class="row">
                                    <div class="col-md-10 col-lg-6">
                                       <form>
                                          <div class="form-group">
                                             <label>Old Password</label>
                                             <input type="password" class="form-control">
                                          </div>
                                          <div class="form-group">
                                             <label>New Password</label>
                                             <input type="password" class="form-control">
                                          </div>
                                          <div class="form-group">
                                             <label>Confirm Password</label>
                                             <input type="password" class="form-control">
                                          </div>
                                          <button class="btn btn-primary" type="submit">Save Changes</button>
                                       </form>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery-3.6.0.min.js"></script>
      <script src="assets/js/popper.min.js"></script>
      <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
      <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
      <script src="assets/js/script.js"></script>
   </body>
   <!-- Mirrored from preschool.dreamguystech.com/html-template/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Oct 2021 11:11:39 GMT -->
</html>
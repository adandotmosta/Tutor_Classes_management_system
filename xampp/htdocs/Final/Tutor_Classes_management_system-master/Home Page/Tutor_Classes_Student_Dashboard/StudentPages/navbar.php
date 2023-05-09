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
                            <?php 
                                include "connexion.php";
                                $Id = $_GET['s_id'];
                                $query = "SELECT  DISTINCT teacher.Teacher_LastName, teacher.Teacher_FirstName, resources.Resource_Text, Class.class_name
                                 FROM resources JOIN class ON resources.Class_Id=class.Class_Id JOIN teacher ON class.Teacher_Id=teacher.Teacher_Id ;";
                                 $send_query = mysqli_query($db,$query);
                                 while($arr = mysqli_fetch_assoc($send_query)){
                                ?>
                                <li class="notification-message">
                                    <a href="#">
                                        <div class="media">
                                            <div class="media-body">
                                                <p class="noti-details"><span class="noti-title"><?php echo "teacher : ".$arr['Teacher_LastName']." ".$arr['Teacher_FirstName']; ?></span> has
                                                    has released a new ressource for class : <?php echo $arr['class_name'];   ?> <span class="noti-title"><?php echo $arr['Resource_Text']; ?></span></p>
                                                <p class="noti-time"><span class="notification-time">4 mins ago</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <?php }
?>
                
                            </ul>
                        </div>
                        <div class="topnav-dropdown-footer">
                            <a href="#">View all Notifications</a>
                        </div>
                    </div>
                </li>


                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <span class="user-img"><img class="rounded-circle" src="assets/img/profiles/avatar-01.jpg"
                                width="31" alt="Ryan Taylor"></span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="user-header">
                            <div class="avatar avatar-sm">
                                <img src="assets/img/profiles/avatar-01.jpg" alt="User Image"
                                    class="avatar-img rounded-circle">
                            </div>
                            <div class="user-text">
                                <h6></h6>
                                <p class="text-muted mb-0">Student</p>
                            </div>
                        </div>
                        <a class="dropdown-item" href="profile.php">My Profile</a>
                        <a class="dropdown-item" href="children.php">Logout</a>
                    </div>
                </li>

            </ul>

        </div>
<?php
include 'connexion.php';
session_start();
$School_id = $_SESSION['School_Id'];
if(isset($_POST['search'])){
    $searched =$_POST['search'];
    $query = "SELECT * FROM student WHERE Student_LastName LIKE '%{$searched}%' AND Student_Id IN (SELECT Student_Id FROM Supervisor WHERE School_Id=$School_id);";
    $result = mysqli_query($db,$query);
    $html ='<ul class="list-group">';
    if(mysqli_num_rows($result)>0){

    while($row = $result->fetch_assoc()){
        $html .="<li class='list-group-item' ><a>".$row['Student_LastName'] ." ".$row['Student_FirstName']."  </a></li>";
        
    }

}
   $html .='</ul>';
   
   exit($html);
}

 /*   if(isset($_POST['cls_id'])){
        $cls_id =$_POST['cls_id'];
        $query = "SELECT Student_Id, CONCAT(Student_LastName,' ',Student_FirstName) AS full_name FROM student join study ON Class_Id WHERE Class_Id=$cls_id; ;";
        $result = mysqli_query($db,$query);
$option = '';
$arr=  array();
while ($row = $result->fetch_assoc()) {
    $arr = $row;
}
echo "<script>test();</script>";

    
}*/
    
    ?>   
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from preschool.dreamguystech.com/html-template/add-fees.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Oct 2021 11:12:21 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Preskool - Fees</title>

    <link rel="shortcut icon" href="assets/img/favicon.png">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&amp;display=swap">

    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="assets/css/style.css">
    <script src="
https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
    </script>
  
    <script src="
https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js">
    </script>
  
    <script src="
https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js">
    </script>
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
                            <h3 class="page-title">Add Fees</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="fees.php">Fees</a></li>
                                <li class="breadcrumb-item active">Add Fees</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST">
                                    <div class="row">
                                        
                                            <div class="col-12">
                                                <h5 class="form-title"><span>Fees Information</span></h5>
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <div class="form-group">
                                                    <label>Student_Name</label>
                                                    <input  class="form-control" type="text" onkeyup="lister(this)" autocomplete="off" name="s_name" id="searchbox">
                                                    <div id="response"> </div>
                                                    
                                                                  
       
                                                </div>
                                            </div>
                                    
                                            <div class="col-12 col-sm-6">
                                                <div class="form-group">

                                                    <label>Status</label>
                                                    <select class="form-control" name="status">
                                                        <option value="1">Paid</option>
                                                        <option value="0">Unpaid</option>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <div class="form-group">
                                                    <label>Fees Amount</label>
                                                    <input type="text" class="form-control" name="amount">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <div class="form-group">
                                                    <label>Paying date</label>
                                                    <input type="date" class="form-control" name="Fees_Date" value="<?php echo date('Y-m-d'); ?>" />
                                                </div>
                                            </div>

                                            <div class="col-12 col-sm-6">

                                                <?php
$que="SELECT * FROM class WHERE School_Id=$School_id";
$result = mysqli_query($db,$que);
$options = '';

while ($row = $result->fetch_assoc()) {
    $options .= '<option  value="' . $row['Class_Id'] . '">' . $row['class_name'] . '</option>';
}



?>
                                                <div class="form-group">
                                                    <label>Class</label>
                                                    <select class="form-control" name="id_c" onclick="send(this)">
                                                        <?php echo $options ?>
                                                    </select>
                                                </div>

                                            </div>
                                            
                                          
                                            <div class="col-12">
                                                <input type="submit" class="btn btn-primary" name="sub">
                                            </div>
                                        
                                    </div>
</form>

                            </div>
                        </div>
                    </div>
                </div>
                <?php  
                if(isset($_POST['sub'])){
                    $student_name = explode(" ",$_POST['s_name']);
                    $res = mysqli_query($db,"SELECT Student_Id FROM student WHERE Student_LastName='$student_name[0]' AND Student_FirstName='$student_name[1]' ");

                    $id_student = mysqli_fetch_row($res);
                    $id_s = $id_student[0];

                    $id_c = $_POST['id_c'];
                    $amount = $_POST['amount'];
                    $status = $_POST['status'];
                    $date = date('Y-m-d',strtotime($_POST['Fees_Date']));
                    
                    $add_fee = "INSERT INTO `fees` VALUES (NULL,$amount, $id_s, $id_c,$status,'$date'); ";
                    mysqli_query($db,$add_fee);

                }


                  ?>
            </div>
        </div>

    </div>

    <script>
       
           function send(button){ 
                
                var search_query = button.value;
                
                    $.ajax({
                        type: "post",
                        data: {
                            cls_id: search_query
                        },
                        success: function(response) {
                        
                            console.log(search_query);
                        }
                    });
              
            }
            
        
    </script>

    <script>
       
           function lister(button){ 
                
                var search_query = button.value;
                console.log("h");
                if (search_query != "") {
                    $.ajax({
                        type: "post",
                        data: {
                            search: search_query
                        },
                        success: function(data) {
                        
                            $("#response").html(data);
                        },
                        dataType:'text'
                    });
                } 
            
        }
        
            
        
    </script>
    <script>
        $(document).on('click', 'li', function () {
            var name = $(this).text();
            console.log("hello");
            $("#searchbox").val(name);
            $("#response").html("");


        });
        </script>



    <script src="assets/js/popper.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

   
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="assets/js/script.js"></script>
</body>

<!-- Mirrored from preschool.dreamguystech.com/html-template/add-fees.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Oct 2021 11:12:21 GMT -->

</html>
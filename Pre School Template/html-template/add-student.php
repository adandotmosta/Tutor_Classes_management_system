
<?php
     session_start();
$school_id = $_SESSION['School_Id'];
include 'connexion.php';
if(isset($_POST['search'])){
    $searched =$_POST['search'];
    $query = "SELECT * FROM supervisor WHERE Supervisor_LastName LIKE '%{$searched}%';";
    $result = mysqli_query($db,$query);
    $html ='<ul class="list-group">';
    if(mysqli_num_rows($result)>0){

    while($row = $result->fetch_assoc()){
        $html .="<li id='check_me' class='list-group-item' ><a>".$row['Supervisor_LastName'] ." ".$row['Supervisor_FirstName']."  </a></li>";
        
    }

}
   $html .='</ul>';
   exit($html);
}

?>
<!DOCTYPE html>
<html lang="en">
   <!-- Mirrored from preschool.dreamguystech.com/html-template/add-student.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Oct 2021 11:11:50 GMT -->
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
      <title>Preskool - Students</title>
      <link rel="shortcut icon" href="assets/img/favicon.png">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&amp;display=swap">
      <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
      <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
      <link rel="stylesheet" href="assets/css/style.css">
       <link rel="shortcut icon" href="assets/img/favicon.png">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&amp;display=swap">


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
                  <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                  <span class="user-img"><img class="rounded-circle" src="assets/img/profiles/avatar-01.jpg" width="31" alt="Ryan Taylor"></span>
                  </a>
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
                                 <div class="col-12 col-sm-6" id="sup_list" style="display:none;">
                                                <div class="form-group">
                                                    <label>Supervisor_Name</label>
                                                    <input  class="form-control" type="text" onkeyup="lister(this)" autocomplete="off" name="s_name" id="searchbox">
                                                    <div id="response"> </div>
                                                    
                                                                  
       
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                       <input type="radio" name="choice" onclick="choose(this)" id="choice" value="1"/>Supervised<input type="radio" value="0" name="choice" onclick="choose(this)" id="choice"/>Not SuperVised
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

  $Student_Mail = $_POST["Student_Mail"];
  $Student_Password = md5($_POST["Student_Password"]);
  $firstname = $_POST["Student_FirstName"];
  $lastname = $_POST["Student_LastName"];
  $phonenumber = $_POST["Student_Phone_number"];
  $dataofbirth = $_POST["Student_Birthday"];
  $Student_address = $_POST["Student_address"];
  $image = $_POST["image"];
  $choice = $_POST["choice"];

  $schoolID = $school_id;
  $supervisorId=0;

 


  function validateStudent_Mail($Student_Mail) {
    $v = "/[a-zA-Z0-9_-.+]+@[a-zA-Z0-9-]+.[a-zA-Z]+/";
    return (bool)preg_match($v, $Student_Mail);
  }

  if($db->connect_error){
    die("connection field" .$db->connect_error);
  } else { 
   
    if($choice==0){
      $query = "INSERT INTO `supervisor`(`Supervisor_Id`, `Supervisor_FirstName`, `Supervisor_LastName`, `School_Id`, `Supervisor_Mail`, `Password_User`, `Mobile_number`) VALUES (NULL,?,?,?,?,?,?)";
      $stmt = $db->prepare($query);
      $stmt->bind_param("ssissi", $firstname, $lastname, $school_id, $Student_Mail, $Student_Password, $phonenumber);
      $res = $stmt->execute();
      
      $supervisorId = mysqli_insert_id($db);
      $query = "INSERT INTO student (Student_Id, Supervisor_Id, Student_FirstName, Student_LastName, Student_Mail, Student_Password, Student_Birthday, Student_address, Student_Phone_number, image) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
      $stmt = $db->prepare($query);
      $stmt->bind_param("issssssis", $supervisorId, $firstname, $lastname, $Student_Mail, $Student_Password, $dataofbirth, $Student_address, $phonenumber, $image);
      $res = $stmt->execute();
      
      
   

    } else{
      if(isset($_POST['accept'])){
         echo "<script> alert(' am kana walou')</script>";
           $student_name = explode(" ",$_POST['s_name']);
                               $res = mysqli_query($db,"SELECT Supervisor_Id FROM Supervisor WHERE Supervisor_LastName='$student_name[0]' AND Supervisor_FirstName='$student_name[1]';");
         
                             $id_student = mysqli_fetch_row($res);
                             $id_s = $id_student[0];
                             $supervisorId=$id_s;
                             header("Location:add-teacher.php");
                 
         
           }
      $query = "INSERT INTO student (Student_Id, Supervisor_Id, Student_FirstName, Student_LastName, Student_Mail, Student_Password, Student_Birthday, Student_address, Student_Phone_number, image) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
      $stmt = $db->prepare($query);
      $stmt->bind_param("issssssis", $supervisorId, $firstname, $lastname, $Student_Mail, $Student_Password, $dataofbirth, $Student_address, $phonenumber, $image);
    
      $res = $stmt->execute();

      

    }

    echo "Registration successfully";
    $db->close();
  }
}
?>
    
            </div>
         </div>
      </div>
      
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
                            console.log("item is  "+search_query);
                        },
                        dataType:'text'
                    });
                } 
            
        }
        
            
        
    </script>
        <script>
        $(document).on('click', '#check_me', function () {
            var name = $(this).text();
            console.log("successed");
            $("#searchbox").val(name);
            $("#response").html("");
            $.ajax({
                        type: "post",
                        data: {
                            accept: name
                        },
                        success: function(data) {
                             console.log("choosed li");
                       
                           
                        },
                        dataType:'text'
                    });


        });
        </script>
           
        <script>
       function choose(button){
            var name = button.value;
            var accepted="accepted";
            if(name=="1"){
               $("#sup_list").css("display","block");


               
            }else{
                $("#sup_list").css("display","none");

            }
      



         }
        </script>
      <script src="assets/js/jquery-3.6.0.min.js"></script>
      <script src="assets/js/popper.min.js"></script>
      <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
      <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="assets/js/script.js"></script>
   </body>
  
</html>
<div class="page-wrapper">
         <div class="content container-fluid">
            <div class="page-header">
               <div class="row align-items-center">
                  <div class="col">
                     <h3 class="page-title">Add Supervisors</h3>
                     <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="students.php">Supervisors</a></li>
                        <li class="breadcrumb-item active">Add Supervisors</li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-sm-12">
                  <div class="card">
                     <div class="card-body">
                        <form method="POST" >
                           <div class="row">
                              <div class="col-12">
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
                              </div>
                              <div class="col-12 col-sm-6">
                                 <div class="form-group">
                                    <label> Password</label>
                                    <input type="Student_Password" class="form-control" name="Student_Password">
                                 </div>
                              </div>
                              <div class="col-12 col-sm-6">
                                 <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="Student_Password" class="form-control">
                                 </div>
                              </div>

                              <div class="col-12 col-sm-6">
                                 <div class="form-group">
                                    <label>Current Supuervisor_address</label>
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
  $Student_Password = md5($_POST["Student_Password"]);
  $Student_address = $_POST["Student_address"];


  $Supervisor_Mail = $_POST["Supervisor_Mail"];
  $firstnameSP = $_POST["Supervisor_FirstName"];
  $lastnameSP = $_POST["Supervisor_LastName"];
  $phonenumberSP = $_POST["Mobile_number"];
  include 'connexion.php';
  function validateStudent_Mail($Supervisor_Mail) {
    $v = "/[a-zA-Z0-9_-.+]+@[a-zA-Z0-9-]+.[a-zA-Z]+/";
    return (bool)preg_match($v, $Supervisor_Mail);
  }

  if($db->connect_error){
    die("connection field" .$db->connect_error);
  } else {
    $query2 = "INSERT INTO supervisor (Supervisor_Id, Supervisor_Mail, Supervisor_FirstName, Supervisor_LastName, Mobile_number, Password_User, School_Id) VALUES ('', '$Supervisor_Mail', '$firstnameSP', '$lastnameSP', '$phonenumberSP', '$Student_Password', '$schoolID')";
    mysqli_query($db, $query2);
    echo "Registration successfully";
  }
}
?>

         </div>
      </div>
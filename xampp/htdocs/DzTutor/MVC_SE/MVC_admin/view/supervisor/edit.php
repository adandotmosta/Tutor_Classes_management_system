<div class="page-wrapper">
   <div class="content container-fluid">
      <div class="page-header">
         <div class="row align-items-center">
            <div class="col">
               <h3 class="page-title">Add Supervisors</h3>
               <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="Supervisors.php">Supervisors</a></li>
                  <li class="breadcrumb-item active">Add Supervisors</li>
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
                           <h5 class="form-title"><span>Supervisor Information</span></h5>
                        </div>
                        <div class="col-12 col-sm-6">
                           <div class="form-group">
                              <label>First Name</label>
                              <input type="text" class="form-control" name="Supervisor_FirstName"
                                 value="<?php echo $f_name;?>">
                           </div>
                        </div>
                        <div class="col-12 col-sm-6">
                           <div class="form-group">
                              <label>Last Name</label>
                              <input type="text" class="form-control" name="Supervisor_LastName"
                                 value="<?php echo $l_name;?>">
                           </div>
                        </div>

                        <div class="col-12 col-sm-6">
                           <div class="form-group">
                              <label>Supervisor email</label>
                              <input type="Supervisor_Mail" class="form-control" name="Supervisor_Mail"
                                 value="<?php echo $email;?>">
                           </div>
                        </div>

                        <div class="col-12 col-sm-6">
                           <div class="form-group">
                              <label>Mobile Number</label>
                              <input type="text" class="form-control" name="Supervisor_Phone_number"
                                 value="<?php echo $mobile_number;?>">
                           </div>
                        </div>

                     </div>
                     <div class="col-12">
                        <input type="submit" class="btn btn-primary" name="Register">
                     </div>
               
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
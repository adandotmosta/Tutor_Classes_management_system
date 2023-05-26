<div class="page-wrapper">
   <div class="content container-fluid">
      <div class="page-header">
         <div class="row align-items-center">
            <div class="col">
               <h3 class="page-title">Students</h3>
               <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                  <li class="breadcrumb-item active">Students</li>
               </ul>
            </div>
            <div class="col-auto text-right float-right ml-auto">
               <a href="index.php?action=addstudent" class="btn btn-primary"><i class="fas fa-plus"></i></a>
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
                              <th>LAST NAME</th>
                              <th>FIRST NAME</th>
                              <th>Email</th>
                              <th>DOB</th>
                              <th>Mobile Number</th>
                              <th>Address</th>
                              <th class="text-right">Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php 
            for ($i=0;$i<count($students);$i++){
            ?>
                           <tr>
                              <td>
                                 <?php echo "{$students[$i]["Student_LastName"]}"; ?>
                              </td>
                              <td>
                                 <?php echo "{$students[$i]["Student_FirstName"]}"; ?>
                              </td>
                              <td>
                                 <?php echo "{$students[$i]["Student_Mail"]}"; ?>
                              </td>
                              <td>
                                 <?php echo "{$students[$i]["Student_Birthday"]}"; ?>
                              </td>
                              <td>
                                 <?php echo "{$students[$i]["Student_Phone_number"]}"; ?>
                              </td>
                              <td>
                                 <?php echo "{$students[$i]["Student_address"]}"; ?>
                              </td>
                              <td class="text-right">
                                 <div class="actions">
                                    <a href="index.php?action=updatestudent&id=<?php echo $students[$i][" Student_Id"];
                                       ?>" class="btn btn-sm bg-success-light mr-2">
                                       <i class="fas fa-pen"></i>
                                    </a>
                                    <a href="index.php?action=deletestudent&id=<?php echo $students[$i][" Student_Id"];
                                       ?>" class="btn btn-sm bg-danger-light">
                                       <i class="fas fa-trash"></i>
                                    </a>
                                 </div>
                              </td>

                           </tr>
                           <?php
            }
          ?>
                        </tbody>
                     </table>

                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
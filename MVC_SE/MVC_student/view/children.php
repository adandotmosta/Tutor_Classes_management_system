 
      
       <div class="page-wrapper">
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


<table class="table table-hover table-center mb-0 datatable" table-center>
   <thead>
      <tr>
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
         for($i=0;$i<count($result);$i++) {
            $id =$result[$i]["Student_Id"];
      ?>
      <tr>
         <td>
            <h5 class="table-avatar">
               <a href="index.php?action=dashboard&id=<?php echo $id; ?>">
                  <?php echo "{$result[$i]["Student_LastName"]} {$result[$i]["Student_FirstName"]}";
                   ?>
               </a>
               <?php
               
               ?>
         
            </h5>
           
         </td>
         <td><?php echo "{$result[$i]["Student_Id"]}"; ?></td>
         <td><?php echo "{$result[$i]["Student_LastName"]}"; ?></td>
         <td><?php echo "{$result[$i]["Student_FirstName"]}"; ?></td>
         <td><?php echo "{$result[$i]["Student_Mail"]}"; ?></td>
         <td><?php echo "{$result[$i]["Student_Birthday"]}"; ?></td>
         <td><?php echo "{$result[$i]["Student_Phone_number"]}"; ?></td>
         <td><?php echo "{$result[$i]["Student_address"]}"; ?></td>
        
      </tr>
      <?php } ?>
   </tbody>
</table>
<button onclick="location.href='index.php?action=dashboard?id=<?php echo $id; ?>'">Logout</button>


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
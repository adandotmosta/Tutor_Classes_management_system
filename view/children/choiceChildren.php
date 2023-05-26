

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
<button onclick="location.href='../index.php'">Logout</button>
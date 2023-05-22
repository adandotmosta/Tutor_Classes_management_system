
<div class="row">
<div class="col-xl-3 col-sm-6 col-12 d-flex">
<div class="card bg-nine w-100">
<div class="card-body">
<div class="db-widgets d-flex justify-content-between align-items-center">
<div class="db-icon">
<i class="fas fa-book-open"></i>
</div>
<div class="db-info">
<h3><?php echo "$courses" ?></h3>
<h6>Courses Attended</h6>
</div>
</div>
</div>
</div>
</div>
<div class="col-xl-3 col-sm-6 col-12 d-flex">
<div class="card bg-six w-100">
<div class="card-body">
<div class="db-widgets d-flex justify-content-between align-items-center">
<div class="db-icon">
<i class="fas fa-file-alt"></i>
</div>
<div class="db-info">
<h3><?php echo "$resources" ?></h3>
<h6>Available Ressources</h6>
</div>
</div>
</div>
</div>
</div>
<div class="col-xl-3 col-sm-6 col-12 d-flex">
<div class="card bg-eleven w-100">
<div class="card-body">
<div class="db-widgets d-flex justify-content-between align-items-center">
<div class="db-icon">
<i class="fas fa-clipboard-check"></i>
</div>
<div class="db-info">
<h3><?php echo "$absences"; ?></h3>
<h6>Absences</h6>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="row">
<div class="container mt-4">
<h2>Courses</h2>
    <table class="table">
      <thead>
        <tr>
          <th>Course Name</th>
          <th>Class ID</th>
          <th>Absences</th>
        </tr>
      </thead>
      <tbody>
        <?php while($row = $result_course->fetch_assoc()): ?>
        <tr>
          <td><?php echo $row["class_name"]; ?></td>
          <td><?php echo $row["Class_Id"]; ?></td>
          <td><?php echo $row["Student_Absence"]; ?></td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>

    <h2>Fees</h2>
    <table class="table">
      <thead>
        <tr>
          <th>Amount</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php while($row = $result_fees->fetch_assoc()): ?>
        <tr>
          <td><?php echo $row["Fees_Amount"]; ?></td>
          <?php if($row["Fees_Status"] == 1){?>
            <td>Paid</td>
          <?php }else{ ?>
            <td>Unpaid</td>
          <?php } ?>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
    <h2>Assignments</h2>
    <table class="table">
      <thead>
        <tr>
          <th>Name</th>
          <th>Due Date</th>
        </tr>
      </thead>
      <tbody>
        <?php while($row = $result_assignments->fetch_assoc()): ?>
        <tr>
          <td><?php echo $row["Resource_Text"]; ?></td>
          <td><?php echo $row["Resource_DueTime"]; ?></td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
    </div>

<div class="page-wrapper">
  <div class="content container-fluid">

    <div class="page-header">
      <div class="row">
        <div class="col-sm-12">
          <h3 class="page-title">Welcome to Your Dashboard,
            <?php echo $name; ?>!
          </h3>
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Student Dashboard</li>
          </ul>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-xl-3 col-sm-6 col-12 d-flex">
        <div class="card bg-nine w-100">
          <div class="card-body">
            <div class="db-widgets d-flex justify-content-between align-items-center">
              <div class="db-icon">
                <i class="fas fa-book-open"></i>
              </div>
              <div class="db-info">
                <h3>
                  <?php echo $courses; ?>
                </h3>
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
                <h3>
                  <?php echo $resources; ?>
                </h3>
                <h6>Available Resources</h6>
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
                <h3>
                  <?php echo $absences; ?>
                </h3>
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
            <?php 
            $classer = $db->query($sql_classer,$Id)->fetchAll();
            for($i=0;$i<count($classer);$i++){ ?>
              <tr>
                <td>
                  <?php echo $classer[$i]["class_name"]; ?>
                </td>
                <td>
                  <?php echo $classer[$i]["Class_Id"]; ?>
                </td>
                <td>
                  <?php echo $classer[$i]["Student_Absence"]; ?>
                </td>
              </tr>
           <?php  } ?>
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
            <?php $row = $db->query($sqlfees,$Id)->fetchAll();
            for($i=0;$i<count($row);$i++){

             ?>
              <tr>
                <td>
                  <?php echo $row[$i]["Fees_Amount"]; ?>
                </td>
                <td>
                  <?php if ($row[$i]["Fees_Status"] == 1): ?>
                    Paid
                  <?php else: ?>
                    Unpaid
                  <?php endif; ?>
                </td>
              </tr>
           <?php  }?>
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
            <?php $row = $db->query($sqlressources,$Id)->fetchAll();
            for($i=0;$i<count($row);$i++){

             ?>
              <tr>
                <td>
                  <?php echo $row[$i]["Resource_Text"]; ?>
                </td>
                <td>
                  <?php echo $row[$i]["Resource_DueTime"]; ?>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

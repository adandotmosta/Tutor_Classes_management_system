<?php 
        if(isset($_POST["stat"]) && isset($_POST["id_s"]) && isset($_POST['id_c'])){
  
          $status = $_POST['stat'];
          $id_s = $_POST['id_s'];
          $id_c  = $_POST['id_c'];
          if($status=="true"){
              $db->query("UPDATE absence SET absent=TRUE WHERE Student_Id=(?) AND Session_Id=(?)", $id_s, $id_c);
          } else {
              $db->query("UPDATE absence SET absent=FALSE WHERE Student_Id=(?) AND Session_Id=(?)", $id_s, $id_c);
              
          }
      
          include("view/header.php");
          include("view/sidebar.php");
          include("view/absence/list.php");
          include("view/footer.php");
          exit;
          exit;
      }
?>
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Absence</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Absence</li>
                    </ul>
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
                                        <th>StudentName</th>
                                        <th>ClassName</th>
                                        <th>SessionTime</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
            for ($i=0;$i<count($absences);$i++){
              $student = $db->query("SELECT CONCAT(Student_LastName,' ',Student_FirstName) AS Fullname FROM Student WHERE Student_Id=(?);", $absences[$i]['Student_Id'])->fetchArray();
              $student_name = $student["Fullname"];

              $session = $db->query("SELECT Session_Start FROM session_ WHERE Session_Id= (?);", $absences[$i]['Session_Id'])->fetchArray();
              $sess_time = $session['Session_Start'];
              $class = $db->query("SELECT class_name FROM class WHERE Class_Id = (?)", $absences[$i]['Class_Id'])->fetchArray();
              $class_name = $class['class_name'];
              $absent = $absences[$i]["absent"];

              #
              $class_id= $fetched['Class_Id'];
$student_id = $absences[$i]['Student_Id'];

            ?>
                                        <tr>
                                            <td><?php echo $student_name ?></td>
                                            <td><?php echo $class_name ?></td>
                                            <td><?php echo $sess_time ?></td>
                                            <td>
                                                <form method="post">
                                                    <input type="radio" name='marker' value="true#<?php echo "" .$student_id . "#" . $absences[$i]['Session_Id']; ?>" id="rad1" onclick="clickedradio(this)" <?php if ($absent) echo "checked"; ?> />Absent
                                                    <input type="radio" name='marker' value="false#<?php echo "" . $student_id . "#" . $absences[$i]['Session_Id']; ?>" id="rad2" onclick="clickedradio(this)" <?php if (!($absent)) echo "checked"; ?> />Not Absent
                                                </form>
                                            </td>
                                        </tr>
                                    <?php
                                    }

                                    ?>
                                </tbody>
                                <script>
                                function clickedradio(radio){


const str = radio.value;
const [boolVar, numVar, strVar] = str.split("#");
$.ajax({
        type: 'post',
        data: {stat: boolVar,id_s: numVar,id_c: strVar},
        success: function(response){
            console.log("Absenteism :",boolVar);
            console.log("id_s : ",numVar);
            console.log("id_c: ",strVar);
          
           
        }
     });
}
</script>

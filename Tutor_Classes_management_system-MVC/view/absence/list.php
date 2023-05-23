<script>

document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');
  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    dayCellDidMount: function(cell) {
      cell.el.style.width = '100px'; // set the cell width
      cell.el.style.height = '100px'; // set the cell height
    },

    events: [
           <?php  for($i = 0; $i < count($abs); $i++){ 
            $c_id = $abs[$i]['Class_Id'];
            $class_name  = $db->query($db,"SELECT class_name from class where Class_Id=$c_id;")->fetchArray();
            $class_name = $class_name['class_name'];
            ?> {
              title: '<?php echo "".$class_name." Status : "; if($row['absent']==1) echo "absent"; else echo "present"; ?>',

              start: '<?php 
 echo "{$row['formatted_date']}";
 ?>'
            },<?php } ?>],


            dateClick: function(info) {
      // get the clicked date and cell information
      var dateStr = info.dateStr;
      var dayEl = info.dayEl;
      var cellTitle = dayEl.getAttribute('title');
      
      // create a Bootstrap modal
      var modal = document.createElement('div');
      modal.classList.add('modal', 'fade');
      modal.innerHTML = `
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">`+cellTitle+` wiii</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>This is the cell title:</p>
              <p>${cellTitle}wiii</p>
            </div>
          </div>
        </div>
      `;
      
      // add the modal to the page and show it
      document.body.appendChild(modal);
      $(modal).modal('show');
    },



  });
  calendar.render();
});

</script>
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Absence</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Absence</li>
                    </ul>
                </div>
                <div class="col-auto text-right float-right ml-auto">
                    <a href="index.php?action=addabsence" class="btn btn-primary"><i class="fas fa-plus"></i></a>
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
                for ($i=0;$i<count($absences2);$i++){
                    for ($i=0;$i<count($absences3);$i++){
                        for ($i=0;$i<count($absences4);$i++){
            ?>
                                        <tr>
                                            <td><?php echo $absences2[$i]['Fullname'] ?></td>
                                            <td><?php echo $absences4[$i]['class_name'] ?></td>
                                            <td><?php echo $absences3[$i]['Session_Start'] ?></td>
                                            <td>
                                                <form method="post">
                                                    <input type="radio" name='marker' value="true#<?php echo "" . $absences[$i]['Student_Id'] . "#" . $absences[$i]['Session_Id']; ?>" id="rad1" onclick="clickedradio(this)" <?php if (($$absences[$i]['absent'])) echo "checked"; ?> />Absent
                                                    <input type="radio" name='marker' value="false#<?php echo "" . $student_id . "#" . $absences[$i]['Session_Id']; ?>" id="rad2" onclick="clickedradio(this)" <?php if ((!($absences[$i]['absent']))) echo "checked"; ?> />Not Absent
                                                </form>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                }
                            }
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

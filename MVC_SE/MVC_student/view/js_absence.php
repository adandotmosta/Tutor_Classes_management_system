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
           <?php  for($i=0;$i<count($result);$i++){ 
            $c_id = $result[$i]['Class_Id'];
            $class_name = $db->query("SELECT class_name FROM class WHERE Class_Id = $c_id;");
            $class_name = $class_name->fetchArray();
            $class_name = $class_name['class_name']; 
            ?> {
              title: '<?php echo "".$class_name." Status : "; if($result[$i]['absent']==1) echo "absent"; else echo "present"; ?>',

              start: '<?php 
 echo "{$result[$i]['formatted_date']}";
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
<script src="assets/js/jquery-3.6.0.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="assets/js/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>

    <script src="assets/js/jquery-ui.min.js"></script>

    <script src="assets/js/script.js"></script>
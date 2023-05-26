
<?php

?>

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
           <?php  while($row=mysqli_fetch_assoc($result)){ 
            $c_id = $row['Class_Id'];
            $class_name  = mysqli_query($db,"SELECT class_name from class where Class_Id=$c_id;");
            $class_name = mysqli_fetch_row($class_name);
            $class_name = $class_name[0];
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
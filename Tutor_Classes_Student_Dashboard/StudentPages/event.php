<?php
include "connexion.php";
session_start();
$s_id = $_SESSION['Student_Id'];
$fetch = mysqli_query($db,"SELECT DATE_FORMAT(Fees_Date, '%Y-%m-%d') AS formatted_date,Class_Id,Fees_Amount,Fees_Id FROM fees WHERE Student_Id=$s_id;");

?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from preschool.dreamguystech.com/html-template/event.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Oct 2021 11:11:52 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Preskool - Holiday</title>

    <link rel="shortcut icon" href="assets/img/favicon.png">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&amp;display=swap">

    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">


    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.6/index.global.min.js'></script>
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
           <?php  while($row=mysqli_fetch_assoc($fetch)){ 
            $c_id = $row['Class_Id'];
            $class_name  = mysqli_query($db,"SELECT class_name from class where Class_Id=$c_id;");
            $class_name = mysqli_fetch_row($class_name);
            $class_name = $class_name[0];
            ?> {
              id : '<?php echo $row['Fees_Id'];  ?>',
              title: '<?php echo "".$class_name." fees : ".$row['Fees_Amount']." DA "; ?>',

              start: '<?php 
 echo "{$row['formatted_date']}"." 13:00:00";
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
</head>

<body>

    <div class="main-wrapper">

        


        <?php
        include "navbar.php";
        include "sidebar.php";

        ?>

        <div class="page-wrapper">
            <div class="content container-fluid">



                            <div class="container">
                                <div id="calendar">
                                  
                                </div>
                            </div>

                

            </div>

        </div>

    </div>
   


    <script src="assets/js/jquery-3.6.0.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="assets/js/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>

    <script src="assets/js/jquery-ui.min.js"></script>

    <script src="assets/js/script.js"></script>
</body>

<!-- Mirrored from preschool.dreamguystech.com/html-template/event.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Oct 2021 11:11:57 GMT -->

</html>



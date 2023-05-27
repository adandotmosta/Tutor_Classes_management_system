<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
   <title><?php echo LANG_APP_NAME ?></title>
   <link rel="shortcut icon" href="assets/img/favicon.png">
   <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&amp;display=swap">
   <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
   <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
   <link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">
   <link rel="stylesheet" href="assets/css/style.css">
   <script src="assets/js/jquery-3.6.0.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
   <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
   <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.6/index.global.min.js'></script>
   <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
   <script src="assets/js/moment.min.js"></script>
   <script src="assets/js/bootstrap-datetimepicker.min.js"></script>
   <script src="assets/js/jquery-ui.min.js"></script>
   <script src="assets/js/script.js"></script>
   <link rel="stylesheet" href="assets/plugins/simple-calendar/simple-calendar.css">
</head>


<body>
   <div class="main-wrapper">
      <div class="header">
         <div class="header-left">
            <a href="index.php" class="logo">
               <img src="assets/img/logo.png" alt="Logo">
            </a>
            <a href="index.php" class="logo logo-small">
               <img src="assets/img/logo-small.png" alt="Logo" width="30" height="30">
            </a>
         </div>
         <a href="javascript:void(0);" id="toggle_btn">
            <i class="fas fa-align-left"></i>
         </a>
         <a class="mobile_btn" id="mobile_btn">
            <i class="fas fa-bars"></i>
         </a>
         <ul class="nav user-menu">
            <li class="nav-item dropdown has-arrow">

               <div class="dropdown-menu">
                  <div class="user-header">
                     <div class="avatar avatar-sm">
                        <img src="assets/img/profiles/avatar-01.jpg" alt="User Image" class="avatar-img rounded-circle">
                     </div>
                     <div class="user-text">
                        <h6>Administrator</h6>
                        <p class="text-muted mb-0">Administrator</p>
                     </div>
                  </div>
                  <a class="dropdown-item" href="login.html">Logout</a>
               </div>
            </li>
         </ul>
      </div>
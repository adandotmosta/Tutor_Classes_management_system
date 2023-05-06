<?php
include "connexion.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
   <title>Preskool - Students</title>
   <link rel="shortcut icon" href="assets/img/favicon.png">
   <link rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&amp;display=swap">
   <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
   <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
   <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

  <?php include "navbar.php";
  ?>

       <?php include "sidebar.php";
       ?>

<?php
$sql = 'SELECT * FROM resources';
$result = mysqli_query($db, $sql);
$resources = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>


  <?php if (empty($resources)): ?>
    <p class="lead mt-3">There is no ressources</p>
  <?php endif; ?>

  <?php foreach ($resources as $item): ?>
    <div class="card my-3 w-75">
     <div class="card-body text-center">
       <?php echo $item['Resource_Text']; ?>
       <div class="text-secondary mt-2">to class <?php echo $item[
         'Class_Id'
       ]; ?> due <?php echo date_format(
   date_create($item['Resource_DueTime']),
   'l jS F Y'
 ); ?></div>
      
    <div class="modal-body">
    <a href =" <?php echo $item['Resource_Link']?>">Resources link</a>
    </div>


           
          
        
      
    </div>
  </div>
  <?php endforeach; ?>
  

</div>

</div>
<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery-3.6.0.min.js"></script>
      <script src="assets/js/popper.min.js"></script>
      <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
      <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
      <script src="assets/js/script.js"></script>
   </body>


    
</body>


</html>
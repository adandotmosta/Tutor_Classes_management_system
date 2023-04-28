<?php
include "connexion.php";
$id = $_GET['s_id'];
$c_id = $_GET['c_id'];
mysqli_query($db,"DELETE FROM session_ WHERE Session_Id=$id");
$namo = $_GET['namo'];
$id = $_GET['idddddd'];
header("location:Session.php?id=$c_id&namo=$namo&iddddd=$id");



?>
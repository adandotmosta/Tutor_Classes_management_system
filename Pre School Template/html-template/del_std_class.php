<?php

include "connexion.php";
$std = $_GET['std'];
$fc = $_GET['fc'];
mysqli_query($db,"DELETE FROM study WHERE Class_Id=$fc AND Student_Id=$std");
header("location:classstudentsshow.php?");


?>
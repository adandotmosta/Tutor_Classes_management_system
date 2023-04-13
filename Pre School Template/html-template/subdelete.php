<?php

require 'connexion.php';
$id=$_GET['id'];



$requete = "delete from module where Module_Id='$id'";
$query=mysqli_query($db,$requete);

if(isset($query)){
    header("location:subjects.php");
}



?>
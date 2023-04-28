<?php
session_start();
$c_id  =$_SESSION['School_Id'];
require 'connexion.php';

if(isset($_GET['id'])){
    $subname=$_POST['subname'];
    $id=$_POST['id'];
    
    $upreq = "update  module set Module_Name='$subname' where Module_Id= '$id'";
    $up=mysqli_query($db,$upreq);

    if(isset($up)){
        header("location:subjects.php");
    }
    
}else{


$subname=$_POST['subname'];





$requete = "INSERT INTO module  VALUES (NULL,'$subname',$c_id)";
$query=mysqli_query($db,$requete);

if(isset($query)){
    header("location:subjects.php");
}


}
?>

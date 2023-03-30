<?php

require 'connexion.php';

if(isset($_GET['id'])){
    $subname=$_POST['subname'];
    $subclas=$_POST['subclas'];
    $id=$_POST['id'];
    
    $upreq = "update  module set Module_Name='$subname', School_Id='$subclas' where Module_Id= '$id'";
    $up=mysqli_query($db,$upreq);

    if(isset($up)){
        header("location:subjects.php");
    }
    
}else{


$subname=$_POST['subname'];
$subclas=$_POST['subclas'];





$requete = "INSERT INTO module ( Module_Name, School_Id) VALUES ('$subname','$subclas')";
$query=mysqli_query($db,$requete);

if(isset($query)){
    header("location:subjects.php");
}


}
?>

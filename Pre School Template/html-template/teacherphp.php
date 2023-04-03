<?php

require 'connexion.php';

if(isset($_GET['id'])){
    $firstname=$_POST['Teacher_FirstName'];
    $lastname=$_POST['Teacher_LastName'];
    $id=$_POST['id'];
    $mail=$_POST['Teacher_Mail'];
    
    $upreq = "update Teacher set Teacher_FirstName='$firstname', Teacher_LastName='$lastname', Teacher_Mail='$mail' where Teacher_Id= '$id'";
    $up=mysqli_query($db,$upreq);
    
    if(isset($up)){
        header("location:teacher.php");
    }
    
}else{


$firstname=$_POST['Teacher_FirstName'];
$lastname=$_POST['Teacher_LastName'];
$mail=$_POST['Teacher_Mail'];



$requete = "INSERT INTO Teacher VALUES (null,'$firstname','$lastname','$mail')";
$query=mysqli_query($db,$requete);

if(isset($query)){
    header("location:teacher.php");
}


}
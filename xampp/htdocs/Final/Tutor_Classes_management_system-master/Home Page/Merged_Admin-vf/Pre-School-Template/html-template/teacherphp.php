<?php

require 'connexion.php';
echo "<script>alert('hgfg')</script>";
if($_GET['id']=="update"){
    echo "<script>alert('hgfg')</script>";
    $firstname=$_POST['Teacher_FirstName'];
    $lastname=$_POST['Teacher_LastName'];
    $id=$_POST['id'];
    $mail=$_POST['Teacher_Mail'];
    
    $req = "update Teacher set Teacher_FirstName='$firstname', Teacher_LastName='$lastname', Teacher_Mail='$mail' where Teacher_Id= $id ;";
    $up=mysqli_query($db,$req);
    
    if(isset($up)){
        header("location:teachers.php");
    }
    
}
else{

$firstname=$_POST['Teacher_FirstName'];
$lastname=$_POST['Teacher_LastName'];
$mail=$_POST['Teacher_Mail'];
session_start();
$school_id = $_SESSION['School_Id'];

$school_id=
$query=mysqli_query($db,"INSERT INTO Teacher ( Teacher_FirstName, Teacher_LastName ,Teacher_Mail,School_Id) VALUES ('$firstname','$lastname','$mail',$school_id) ;");

if(isset($query)){
    header("location:teachers.php");
}


}
<?php 
include "connexion.php";
if(isset($_GET["deleteid"]))
{
    $id=$_GET["deleteid"];
    $sql="DELETE FROM student WHERE Student_Id=$id";
    $result=mysqli_query($db,$sql);
    //echo "deleted succefully";
    header("Location:students.php");
}else{
    die(mysqli_query($db));
}
?>
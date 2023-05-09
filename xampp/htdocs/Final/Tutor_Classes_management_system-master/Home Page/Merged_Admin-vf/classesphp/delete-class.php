<?php
    
    include "../connexion.php" ;
    if(!$db){
        echo "error";
    }
    if(isset($_GET["idd"])){
    $idclass = $_GET["idd"];
    
   
    $sql = "DELETE FROM class WHERE Class_Id = '$idclass'" ;
    $query =mysqli_query($db,$sql);
   
        echo "<script>window.location.href='../Pre-School-Template/html-template/departments.php '</script>";
       
}
   
?>
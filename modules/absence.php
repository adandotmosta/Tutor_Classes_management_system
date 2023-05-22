<?php

switch($vars['action']){

    case "displayAbsence":{
        include("view/header.php");
        include("view/sidebar.php");
        include("view/absence/absenceCalender.php");
        include("view/footer.php");
        exit;
    }break;

}
?>
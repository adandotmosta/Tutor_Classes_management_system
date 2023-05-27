<?php

switch($vars['action']) {

    case "fees":{ 
        $s_id = $_COOKIE['student_id'];
        $query = "SELECT DATE_FORMAT(Fees_Date, '%Y-%m-%d') AS formatted_date, Class_Id, Fees_Amount, Fees_Id FROM fees WHERE Student_Id = ?;";
        
        include("view/header.php");
        include("view/js_fees.php");
        include("view/sidebar.php");
        include("view/fees/list.php");
        include("view/footer.php");
        exit;}break;



    
    }
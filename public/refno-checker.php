<?php
if(isset($_POST["fullname"]))
{
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        die();
    }
    $mysqli = new mysqli('localhost' , 'root', '', 'salary');
    if ($mysqli->connect_error){
        die('Could not connect to database!');
    }
    
    $fullname = filter_var($_POST["fullname"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);
    
    $statement = $mysqli->prepare("SELECT fullname FROM employee WHERE fullname=?  ");
    $statement->bind_param('s', $fullname);
    $statement->execute();
    $statement->bind_result($fullname);
    if($statement->fetch()){
        die('<span style="color:red; font-size:12px;"><i class="fa fa-close"></i> ชื่อนี้มีในระบบแล้ว</span>');
    }else{
        die('');
    }
}
?>
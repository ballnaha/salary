<?php
include '../dbjson.php';
if (isset($_POST['name'])) {
    $column    = $_POST['name'];
    $new_value = $_POST['value'];
    $id        = $_POST['pk'];
    $sql       = "update edit set $column='$new_value' where id=$id";
    mysql_query($sql);
    echo $sql;
}

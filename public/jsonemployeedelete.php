<?php
require_once('connection.php');

$id = $_GET['id'];

//$query = "DELETE FROM issuereq WHERE issuereq.id = ".$id."";


$sql = "DELETE FROM employee WHERE id = ".$id." ";
$query = mysqli_query($conn,$sql);
?>
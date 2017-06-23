<?php
include('../connection.php');

$menu = $_POST['menu'];
for ($i = 0; $i < count($menu); $i++) {
	$sql = "UPDATE employee SET priority = " . $i . " WHERE id = '". $menu[$i] ."' ";
	$query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
}
?>
<?php include('../connection.php'); ?>

<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Title Page</title>
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	</head>

	<body>
<div class="container">	

<div id="msg" style="display: none;" class="alert alert-success">Save Complete</div>
<div class="col-lg-4">
<ul id="sortme" class="list-group">

<?php
// Getting menu items from DB
$sql = "select * from employee order by priority asc";
$result = mysqli_query($conn , $sql) or die(mysql_error($conn));
while($row = mysqli_fetch_assoc($result)) {
echo '<li class="list-group-item-heading list-group-item" style="cursor:move;" id="menu_' . $row['id'] . '">'. $row['firstname'] . " " . $row['lastname'] . "</li>\n";
}
?>
</ul>
</div>
</div>
		<script src="//code.jquery.com/jquery.js"></script>
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/jquery-ui.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		
		
<script>
$(document).ready(
function() {
$("#sortme").sortable({
update : function () {
serial = $('#sortme').sortable('serialize');
$.ajax({
url: "",
type: "post",
data: serial,
success: function (data) {
               $("#msg").show();
               setTimeout(function() { $("#msg").hide(); }, 5000);
        },
error: function(){
alert("theres an error with AJAX");
}
});
}
});
}
);
</script>
	</body>
</html>


<html>
	<head>
		<link href="css/style.css" rel="stylesheet">
		<link href="css/bootstrap.css" rel="stylesheet">
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.js"></script>
		<link href="css/bootstrap-editable.css" rel="stylesheet">
		<script src="js/bootstrap-editable.js"></script>
	</head>
	<body>
		<?php //include('../../header.php'); ?>
		<script>
		//turn to inline mode
		$.fn.editable.defaults.mode = 'inline';
		$(document).ready(function() {
			$('#roll_no , #father_name , #name ').editable();
		$('#hobby').editable({
		type: 'select',
		title: 'Select status',
		placement: 'right',
		value: 2,
		source: [
		{value: 1, text: 'status 1'},
		{value: 2, text: 'status 2'},
		{value: 3, text: 'status 3'}
		]
		});
		});
		</script>
		<div class="container">
			<div class="table-responsive">
				<table class="table">
					<caption><h2></h2></caption>
					<thead>
						<tr>
							<th>Ref No</th>
							<th>Name</th>
							<th>Company's Name</th>
							<th>Product</th>
						</tr>
					</thead>
					<tbody>
						<?php
						include '../dbjson.php';
						$sel    = "select * from edit";
						$result = mysql_query($sel);
						while ($row = mysql_fetch_array($result)) {
						?>
						<tr>
							<td><a href="#" id="roll_no" data-type="text" data-pk="<?php echo $row['id'] ?>" data-url="ajax.php" ><?php echo $row['roll_no']; ?></a></td>
							<td><a href="#" id="name" data-type="text" data-pk="<?php echo $row['id'] ?>" data-url="ajax.php" ><?php echo $row['name']; ?></td>
							<td><a href="#" id="father_name" data-type="text" data-pk="<?php echo $row['id'] ?>" data-url="ajax.php"><?php echo $row['father_name']; ?></td>
							<td>
								<a href="#" id="hobby" data-type="select" data-pk="<?php echo $row['id'] ?>" data-url="ajax.php" ><?php echo $row['hobby'] ?></a>
							</td>
						</tr>
						<?php }?>
					</tbody>
				</table>
			</div>
		</div>
		<footer>
		</footer>
	</body>
</html>
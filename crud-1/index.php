<?php include('server.php');

//  fetch records 

if (isset($_GET['edit'])) {
	$id = $_GET['edit'];
	$edit_id = true;
	$rec = mysqli_query($db, "SELECT * FROM info_tb1 WHERE id=$id ");
	$records = mysqli_fetch_array($rec);
	$name = $records['name'];
	$address = $records['address'];
	$id = $records['id'];

}

?>
<!DOCTYPE html>
<html>

<head>
	<title>CRUD: CReate, Update, Delete PHP MySQL</title>
	<link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>
	<?php if (isset($_SESSION['msg'])): ?>
		<div class="msg">
			<?php
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
			?>
		</div>
	<?php endif ?>
	<table border="0" text-align="center">
		<thead>
			<tr>
				<th>S/N</th>
				<th>Name</th>
				<th>Address</th>
				<th colspan="2">Action</th>
			</tr>
		</thead>
		<tbody>




			<?php

			while ($row = mysqli_fetch_array($results)) { ?>

				<tr>
					<td>
						<?php echo $row['id']; ?>
					</td>
					<td>
						<?php echo $row['name']; ?>
					</td>
					<td>
						<?php echo $row['address']; ?>
					</td>
					<td>
						<a button class="edit_btn" href="index.php?edit=<?php echo $row['id']; ?>">Edit</a>
					</td>
					<td>
						<a button class="del_btn" href="server.php?del=<?php echo $row['id']; ?>">Delete</a>
					</td>
				</tr>

			<?php } ?>

		</tbody>
	</table>

	<form method="post" action="server.php" class="form">

		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="input-group">
			<label>Name</label>
			<input type="text" name="name" value="<?php echo $name; ?>">
		</div>
		<div class="input-group">
			<label>Address</label>
			<input type="text" name="address" value="<?php echo $address; ?>">
		</div>
		<div class="input-group">
			<?php if ($edit_id == false): ?>
				<button class="btn" type="submit" name="save">Save</button>
			<?php else: ?>
				<button class="btn" type="submit" name="update">Update</button>
				<button class="btn" type="submit" name="delete" onclick="return(confirmx())">Delete</button>
			<?php endif ?>
		</div>
	</form>




</body>

</html>
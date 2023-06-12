<?php
// Dispaly Notification Message
session_start();


// initialize variables

$name = "";
$address = "";
$id = 0;
$edit_id = false;

// connect to database
$db = mysqli_connect("localhost", "root", "", "crud_1");

// if save button button is clicked



if (isset($_POST['save'])) {
	$name = $_POST['name'];
	$address = $_POST['address'];



	$tb = "create table if not exists info_tb1(id int(20)not null auto_increment primary key, 
	name varchar(100)not null, address TEXT not null) ENGINE = InnoDB;";



	$result = $db->query($tb);
	if ($result) {
		echo "table created";
	} else {
		echo "failed";
	}


	$query = "insert into info_tb1( name, address) VALUES('$name','$address')";
	mysqli_query($db, $query);
	$_SESSION['msg'] = "Address saved";
	header('location: index.php'); //redirect after insertion
}

// update records
if (isset($_POST['update'])) {

	$name = ($_POST['name']);
	$address = ($_POST['address']);
	$id = ($_POST['id']);

	mysqli_query($db, "UPDATE  info_tb1 SET name='$name', address='$address' WHERE id=$id ");
	$_SESSION['msg'] = "Address Update Successfully";
	header('location:index.php');
}
// Delete Records
if (isset($_GET['del'])) {
	$id = $_GET['del'];

	mysqli_query($db, "DELETE FROM  info_tb1 WHERE id=$id ");
	$_SESSION['msg'] = "Address Deleted Successfully";
	header('location:index.php');
}

// Retrieve record from database
$results = mysqli_query($db, "select * from info_tb1");






?>
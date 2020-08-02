<?php 
include('../function.php');

if (!ismainAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: ../register.php');

}
$user_id=$_GET['del'];




$sql = "DELETE from result WHERE user_id='$user_id'";


mysqli_query($db, $sql);
header('location: view_result.php');



?>
<?php 
session_start();

// connect to database
$db1 = mysqli_connect('localhost', 'root', '', 'multi_login');

// variable declaration

$errors   = array(); 
$department   = "";
$ielts_score   ="";
$gpa_score  ="";
$genre="";
if ($db1->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else{
	
}
if (isset($_POST['apply'])) {
	apply();

}

// REGISTER USER
function apply(){
	// call these variables with the global keyword to make them available in function
	global $db1,$department,$ielts_score,$gpa_score,$genre,$errors;
	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	
	$organization   =  e($_POST['organization']);
	$department   =  e($_POST['department']);
	$ielts_score   = e($_POST['ielts_score']);
	$gpa_score  =  e($_POST['gpa_score']);
	$genre=	e($_POST['genre']);
	$ielts  = e( $_POST['ielts']); 
	$gpa  =  e($_POST['gpa']);

	
	$name=$_SESSION['username'];
	$sql = "SELECT id FROM users WHERE username='$name'";
$result = $db1->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
  
    $user_id=$row["id"];
   
  }
} else {
  echo "0 results";
}	

	// form validation: ensure that the form is correctly filled
	if (empty($department)) { 
		array_push($errors, "department is required"); 
	}
	if (empty($ielts_score)) { 
		array_push($errors, "ielts_score is required"); 
	}
	if (empty($gpa_score)) { 
		array_push($errors, "gpa_score  is required"); 
	}
	

	// register user if there are no errors in the form

		
	
		
		$query = "INSERT INTO result (user_id,department,ielts_score,gpa_score,genre,IELTS,GPA,organization) 
		VALUES('$user_id','$department','$ielts_score','$gpa_score','$genre','$ielts','$gpa','$organization')";
			mysqli_query($db1, $query);
			$_SESSION['success']  = "You have successfully applied";
			$_SESSION['success']  = "New user successfully created!!";
		
		
						
	
	
}
function isLoggedIn()
{
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	}
}
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: index.php");
}


function e($val){
	global $db1;
	return mysqli_real_escape_string($db1, trim($val));
}
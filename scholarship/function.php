<?php 
session_start();

// connect to database
$db = mysqli_connect('localhost', 'root', '', 'multi_login');

// variable declaration
$username = "";
$email    = "";
$errors   = array(); 
$department   = "";
$ielts_score   =  "";
$gpa_score  =   "";
if ($db->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
else{
	
}


// call the register() function if register_btn is clicked
if (isset($_POST['register_btn'])) {

	register();
	echo '<script type="text/javascript">';
        echo ' alert("the result is not published")';  //not showing an alert box.
        echo '</script>';
    }

// REGISTER USER
    function register(){
	// call these variables with the global keyword to make them available in function
    	global $db, $errors, $username, $email;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
    	$username    =  e($_POST['username']);
    	$email       =  e($_POST['email']);
    	$password_1  =  e($_POST['password_1']);
    	$password_2  =  e($_POST['password_2']);
    	$organization= e($_POST['organization']);

	// form validation: ensure that the form is correctly filled
    	if (empty($username)) { 
    		array_push($errors, "Username is required"); 
    	}
    	if (empty($email)) { 
    		array_push($errors, "Email is required"); 
    	}
    	if (empty($password_1)) { 
    		array_push($errors, "Password is required"); 
    	}
    	if ($password_1 != $password_2) {
    		array_push($errors, "The two passwords do not match");
    	}

	// register user if there are no errors in the form
    	if (count($errors) == 0) {

		$password = md5($password_1);//encrypt the password before saving in the database

		if (isset($_POST['user_type'])) {
			$user_type = e($_POST['user_type']);
			$department=e($_POST['department']);
			$query = "INSERT INTO users (username,department, email, user_type, password,organization) 
			VALUES('$username','$department', '$email', '$user_type', '$password','$organization')";
			mysqli_query($db, $query);

			$_SESSION['success']  = "New user successfully created!!";

			header('location: dashboardadmin.php');
		}else{
			$query = "INSERT INTO users (username, email, user_type, password) 
			VALUES('$username', '$email', 'user', '$password')";
			mysqli_query($db, $query);

			// get id of the created user
			$logged_in_user_id = mysqli_insert_id($db);

			$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
			$_SESSION['success']  = "You are now logged in";
			header('location: register.php');				
		}
	}
}

// return user array from their id
function getUserById($id){
	global $db;
	$query = "SELECT * FROM users WHERE id=" . $id;
	$result = mysqli_query($db, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

// escape string
function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
		foreach ($errors as $error){
			echo $error .'<br>';
		}
		echo '</div>';
	}
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
if (isset($_POST['login_btn'])) {
	login();
}

// LOGIN USER
function login(){
	global $db, $username, $errors;

	// grap form values
	$username = e($_POST['username']);
	$password = e($_POST['password']);
	
	// make sure form is filled properly
	if (empty($username)) {
		array_push($errors, "Username is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	// attempt login if no errors on form
	if (count($errors) == 0) {
		$password = md5($password);

		$query = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) { // user found
			// check if user is admin or user
			$logged_in_user = mysqli_fetch_assoc($results);
			if ($logged_in_user['user_type'] == 'admin') {
				$_SESSION['username']=$username;
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: dashboardadmin.php');
			}
			else if ($logged_in_user['user_type'] == 'departmentadmin') {
				$_SESSION['username']=$username;
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location:department_admin.php');		  
			}
			else if ($logged_in_user['user_type'] == 'mainadmin') {
				$_SESSION['username']=$username;
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location:mainadmin/mainadmin.php');		  
			}
			else{
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				$_SESSION['username']=$username;
				echo $_SESSION['username'];

				header('location: student.php');
			}
		}	
		else {
			array_push($errors, "Wrong username/password combination");
		}
	}
}
function isAdmin()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
		return true;
	}else{
		return false;
	}
}
function ismainAdmin()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'mainadmin' ) {
		return true;
	}else{
		return false;
	}
}


if (isset($_POST['publish_science'])) {
	publish_science();


}

// LOGIN USER
function publish_science(){

	global $db, $username,$dep, $errors;
	$dep=$_POST['publish_department'];
	echo "$dep";

	$sql = "SELECT users.id,users.username, users.id,result.department,result.ielts_score,result.gpa_score,result.genre,
ROUND(((result.gpa_score*100)/4)*0.4+ ((result.ielts_score*100)/9)*0.4+((result.genre*100)/2)*0.2,2) AS total_percentage
	FROM result

	INNER JOIN users ON result.user_id=users.id
	WHERE result.department='$dep'";
	$result = $db->query($sql);

	while($row = $result->fetch_assoc()) {
		$id=$row["id"];
		$username=$row["username"];
		$department=$row["department"];
		$ielts_score=$row["ielts_score"];
		$gpa_score = $row["gpa_score"];
		$genre=$row["genre"];
		$total_percentage=$row["total_percentage"];

		$query = "INSERT INTO $dep (user_id,username,department,ielts_score ,gpa_score ,genre,total_percentage) 
		VALUES('$id','$username','$department','$ielts_score','$gpa_score','$genre','$total_percentage')";
		mysqli_query($db, $query);
	}
}



if (isset($_POST['Create_department'])) {

	Create_department();

}

// REGISTER USER
function Create_department(){
	// call these variables with the global keyword to make them available in function
	global $db, $errors;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$department   =  e($_POST['department']);

	
	$sql1="CREATE TABLE IF NOT EXISTS $department(id INT NOT NULL AUTO_INCREMENT,
	user_id INT(10),
	username varchar(100),
	department varchar(100),
	ielts_score decimal(10,0),
	gpa_score decimal(10,0),
	genre INT(10),
	total_percentage decimal(10,0),
	PRIMARY KEY (id)

)";
mysqli_query($db, $sql1);

	// form validation: ensure that the form is correctly filled
if (empty($department)) { 
	array_push($errors, "department is required"); 
}

	// register user if there are no errors in the form
if (count($errors) == 0) {


	$query = "INSERT INTO department (department) 
	VALUES('$department')";
	mysqli_query($db, $query);





}
}

if (isset($_POST['update'])) {
	update();


}

// LOGIN USER
function update(){

	global $db, $username,$dep, $errors;
	$user_id=$_POST["user_id"];
	echo "$user_id";
	$department=$_POST["department"];
	$ielts_score=$_POST["ielts_score"];
	$gpa_score=$_POST["gpa_score"];
	$genre=$_POST["genre"];


	$sql = "UPDATE result set department='$department',ielts_score='$ielts_score',gpa_score='$gpa_score',genre='$genre' WHERE user_id='$user_id'";


	mysqli_query($db, $sql);

}

if (isset($_POST['Create_organization'])) {

	Create_organzation();

}

// REGISTER USER
function Create_organzation(){
	// call these variables with the global keyword to make them available in function
	global $db, $errors;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$organization   =  e($_POST['organization']);

	


	// form validation: ensure that the form is correctly filled
if (empty($organization)) { 
	array_push($errors, "organization is required"); 
}

	// register user if there are no errors in the form
if (count($errors) == 0) {


	$query = "INSERT INTO organization (organization) 
	VALUES('$organization')";
	mysqli_query($db, $query);





}
}


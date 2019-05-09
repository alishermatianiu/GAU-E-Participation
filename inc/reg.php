<?php
$response = array();
include 'config.php';
include 'functions.php';
 
//Get the input request parameters
$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, TRUE); //convert JSON into array

 if(null !== inputJSON)
 {
	 $input['name'] = $_POST['name'];
 }
//Check for Mandatory parameters
echo 	$email = $input['name'];

if(isset($input['email']) && isset($input['password']) && isset($input['name']) && isset($input['surname']) ){
	$email = $input['email'];
	$password = $input['password'];
	$name = $input['name'];
	$surname = $input['surname'];
	//Check if user already exist
	if(!userExists($email)){
 
		//Get a unique Salt
		
		//Generate a unique password Hash
		$passwordHash = md5($password);
		
		//Query to register new user
		$insertQuery  = "INSERT INTO student(email, name, surname, password) VALUES (?,?,?,?)";
		if($stmt = $con->prepare($insertQuery)){
			$stmt->bind_param("ssss",$email,$name,$surname,$passwordHash);
			$stmt->execute();
			$response["status"] = 0;
			$response["message"] = "User created";
			$stmt->close();
		}
	}
	else{
		$response["status"] = 1;
		$response["message"] = "User exists";
	}
}
else{
	$response["status"] = 2;
	$response["message"] = "Missing mandatory parameters";
}
echo json_encode($response);
?>
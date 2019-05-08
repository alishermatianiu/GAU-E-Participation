<?php
/*Function to get users data*/
function get_user_data($con, $user_id){
$result = mysqli_query($con, "SELECT * from student WHERE user_id='$user_id' LIMIT 1");
    if(mysqli_num_rows($result)==1){
        return mysqli_fetch_assoc($result);
    }else{
    	return FALSE;
    }
}

function safe_input($con, $data) {  
  return htmlspecialchars(mysqli_real_escape_string($con, trim($data)));
}

/*Function to set JSON output*/
function output($Return=array()){
    /*Set response header*/
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    /*Final JSON response*/
    exit(json_encode($Return));
}

function get_managers($con){
    $response = array();
    $result = mysqli_query($con,"SELECT Name,Surname,Email,Admin,Category FROM category_manager");
    if(mysqli_num_rows($result)>0)
    {
        while ($x = mysqli_fetch_assoc($result))
            array_push($response,$x);
        return $response;
    }
        
    else
        return "No Managers";
}


?>

<?php

require('inc/config.php');
require('inc/functions.php');

/* Check Login form submitted */
if(!empty($_POST) && $_POST['action']=='student_login'){
    /* Define return | here result is used to return user data and error for error message */
    $Return = array('result'=>array(), 'error'=>'');

    $email = safe_input($con, $_POST['mail']);
    $password = safe_input($con, $_POST['password']);

    /* Server side PHP input validation */
    if(filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        $Return['error'] = "Please enter a valid Email address.";
    }elseif($password===''){
        $Return['error'] = "Please enter Password.";
    }
    if($Return['error']!=''){
        output($Return);
    }

    /* Check Email and Password existence in DB */
    $result = mysqli_query($con, "SELECT * FROM student WHERE email='$email' AND password='".md5($password)."' LIMIT 1");
    if(mysqli_num_rows($result)==1){
        $row = mysqli_fetch_assoc($result);
        /* Success: Set session variables and redirect to Protected page */
        $Return['result'] = "student";
        $m = get_user_data($con,$row['user_id']);
        $_SESSION['UserMail'] = $m['Email'];
        $_SESSION['UserData'] = array('user_id'=>$row['user_id']);

    } else {
        /* Unsuccessful attempt: Set error message */
        $Return['error'] = 'Invalid Login Credential.';
    }
    /*Return*/
    output($Return);
}
if(!empty($_POST) && $_POST['action']=='manager_login'){
    /* Define return | here result is used to return user data and error for error message */
    $Return = array('result'=>array(), 'error'=>'');

    $email = safe_input($con, $_POST['mail']);
    $password = safe_input($con, $_POST['password']);

    /* Server side PHP input validation */
    if(filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        $Return['error'] = "Please enter a valid Email address.";
    }elseif($password===''){
        $Return['error'] = "Please enter Password.";
    }
    if($Return['error']!=''){
        output($Return);
    }

    /* Check Email and Password existence in DB */
    $result = mysqli_query($con, "SELECT * FROM category_manager WHERE email='$email' AND password='".md5($password)."' LIMIT 1");
    if(mysqli_num_rows($result)==1){
        $row = mysqli_fetch_assoc($result);
        $Return['result'] = "manager";
        /* Success: Set session variables and redirect to Protected page */
        $_SESSION['UserData'] = array('user_id'=>$row['user_id']);
    } else {
        /* Unsuccessful attempt: Set error message */
        $Return['error'] = 'Invalid Login Credential.';
    }
    /*Return*/
    output($Return);
}


/* Check Registration form submitted */
if(!empty($_POST) && $_POST['action']=='register_student'){
    /* Define return | here result is used to return user data and error for error message */
    $Return = array('result'=>array(), 'error'=>'');

    $name = safe_input($con, $_POST['reg_name']);
    $surname = safe_input($con, $_POST['reg_surname']);
    $email = safe_input($con, $_POST['reg_mail']);
    $password = safe_input($con, $_POST['reg_password']);

    /* Server side PHP input validation */
    if($name==='' || $surname ===''){
        $Return['error'] = "Please enter Full name.";
    }elseif (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        $Return['error'] = "Please enter a valid Email address.";
    }elseif($password===''){
        $Return['error'] = "Please enter Password.";
    }
    if($Return['error']!=''){
        output($Return);
    }

    /* Check Email existence in DB */
    $result = mysqli_query($con, "SELECT * FROM student WHERE email='$email' LIMIT 1");
    if(mysqli_num_rows($result)==1){
        /*Email already exists: Set error message */
        $Return['error'] = 'You have already registered with us, please login.';
    }else{
        /*Insert registration data to user table (user_GUID is Unique Identifier and Default status is 0 means pending)*/
        mysqli_query($con, "INSERT INTO student (email, password, name,surname) values('$email', '".md5($password)."' , '$name', '$surname')");
        $user_id = mysqli_insert_id($con); /* Get the auto generated id used in the last query */
        $_SESSION['UserData'] = array('user_id'=>$user_id);
        $name = mysqli_query($con,"select * from student where user_id = ".$user_id);
        /* Success: Set session variables and redirect to Protected page */
        $Return['result'] = "register";
        $_SESSION['UserData'] = array('user_id'=>$user_id);
    }
    /*Return*/
    output($Return);
}

if(!empty($_POST) && $_POST['action']=='add_Manager'){
    /* Define return | here result is used to return user data and error for error message */
    $Return = array('result'=>array(), 'error'=>'');

    $fname = safe_input($con, $_POST['fname']);
    $fsurname = safe_input($con, $_POST['fsurname']);
    $fmail = safe_input($con, $_POST['fmail']);
    $fcategory = safe_input($con, $_POST['fcategory']);
    $fpassword = safe_input($con, $_POST['fpassword']);

    /* Server side PHP input validation */
    if($fname==='' || $fsurname ===''){
        $Return['error'] = "Please enter Full name.";
    }elseif (filter_var($fmail, FILTER_VALIDATE_EMAIL) === false) {
        $Return['error'] = "Please enter a valid Email address.";
    }elseif($fpassword===''){
        $Return['error'] = "Please enter Password.";
    }
    if($Return['error']!=''){
        output($Return);
    }

    /* Check Email existence in DB */
    $result = mysqli_query($con, "SELECT * FROM category_manager WHERE Email='$fmail' LIMIT 1");
    if(mysqli_num_rows($result)==1){
        /*Email already exists: Set error message */
        $Return['error'] = 'Manager Exists';
    }else{
        /*Insert registration data to user table (user_GUID is Unique Identifier and Default status is 0 means pending)*/
        mysqli_query($con, "INSERT INTO category_manager (Email, Password, Name,Surname,Category,Admin) values('$fmail', '".md5($fpassword)."' , '$fname', '$fsurname','$fcategory','administrator@gau.edu.tr')");
        /* Success: Set session variables and redirect to Protected page */
        $Return['result'] = "addManager";
    }
    /*Return*/
    output($Return);
}


if(!empty($_POST) && $_POST['action']=='send_petition'){
    /* Define return | here result is used to return user data and error for error message */
    $Return = array('result'=>array(), 'error'=>'');

    $petitionBody = safe_input($con, $_POST['petitionBody']);
    $topic = safe_input($con, $_POST['topic']);
    $me = safe_input($con, $_POST['me']);

    /* Server side PHP input validation */
    if($petitionBody===''){
        $Return['error'] = "Please fill the form";
    }
    if($Return['error']!=''){
        output($Return);
    }
    $qr = "INSERT INTO problem (Student, Date_Time, Body ,Status) values('$me', NOW() , '$petitionBody','fresh')";
        if(mysqli_query($con, $qr))
        $Return['result'] = "sent";

    /*Return*/
    output($Return);
}
?>
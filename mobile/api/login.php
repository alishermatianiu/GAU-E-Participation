<?php

require_once "config.php";

$email = mysqli_real_escape_string($con, ($_POST["email"]));
$password = mysqli_real_escape_string($con, ($_POST["password"]));




if (isset($_POST)) {
    $query = "SELECT * FROM student WHERE email = '$email' AND Password ='$password'";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        $students = mysqli_fetch_array($result);


        $students_id = $students["Email"];

        $query = "SELECT * FROM problem_category";
        $result = mysqli_query($con, $query);
        $category = mysqli_fetch_all ($result, MYSQLI_ASSOC);
        $categoryJ = json_encode($category);

        echo json_encode([
            "error" => false,
            "message" => "Login success",
            "user_id" => $students_id,
            "user_name" => $students["Name"],
            "user_surname" => $students["Surname"],
            "token" => $students_id,
            "attach" => [
                "category"=>$categoryJ,
            ]

        ]);
        exit;
    }else{
        echo json_encode([
            "error" => true,
            "message" => "Email or Password incorrect"
        ]);
    }
} else {
    echo json_encode([
        "error" => true,
        "message" => "Request method is false"
    ]);
    exit;
}
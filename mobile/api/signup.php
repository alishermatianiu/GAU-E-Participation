<?php

require_once "config.php";


if (isset($_POST)) {

    $email = mysqli_real_escape_string($con, ($_POST["email"]));
    $password = mysqli_real_escape_string($con, ($_POST["password"]));
    $name = mysqli_real_escape_string($con, ($_POST["name"]));
    $surname = mysqli_real_escape_string($con, ($_POST["surname"]));

    if (trim($email) == "") {
        echo json_encode([
            "error" => true,
            "message" => "Email is empty"
        ]);
        exit;
    }

    if (trim($name) == "") {
        echo json_encode([
            "error" => true,
            "message" => "Name is empty"
        ]);
        exit;
    }

    if (trim($surname) == "") {
        echo json_encode([
            "error" => true,
            "message" => "Username is empty"
        ]);
        exit;
    }
    if (trim($password) == "") {
        echo json_encode([
            "error" => true,
            "message" => "Password is empty"
        ]);
        exit;
    }


        $query= "SELECT * FROM student WHERE email = '$email'";
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) == 0) {


            mysqli_query($con, "insert into student (email,name,surname,password) VALUES ('$email','$name','$surname','$password')");

            echo json_encode([
                "error" => false,
                "message" => "Register success",
            ]);

            exit;
        } else {
            echo json_encode([
                "error" => true,
                "message" => "This student number is already registered"
            ]);
            exit;
        }



} else {
    echo json_encode([
        "error" => true,
        "message" => "Request method is false"
    ]);
    exit;
}
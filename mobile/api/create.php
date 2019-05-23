<?php
require_once "config.php";


if (isset($_POST)) {

    $student = mysqli_real_escape_string($con, ($_POST["student"]));
    $body = mysqli_real_escape_string($con, ($_POST["body"]));
    $category = mysqli_real_escape_string($con, ($_POST["category"]));

    if (trim($student) == "") {
        echo json_encode([
            "error" => true,
            "message" => "User Problem"
        ]);
        exit;
    }

    if (trim($body) == "") {
        echo json_encode([
            "error" => true,
            "message" => "Message is empty"
        ]);
        exit;
    }

    if (trim($category) == "" || trim($category) == "0") {
        echo json_encode([
            "error" => true,
            "message" => "Category is empty"
        ]);
        exit;
    }



    $query= "SELECT * FROM student WHERE Email = '$student'";
    $user = mysqli_query($con, $query);
    if (mysqli_num_rows($user) > 0) {


        $problem = mysqli_query($con, "insert into problem (Student,Date_Time,Body) VALUES ('$student','2019-05-14 00:00:00','$body')");
        $insert_id = $con->insert_id;
        $category = mysqli_query($con, "insert into category_problem (Category,Problem) VALUES ('$category','$insert_id')");

        echo json_encode([
            "error" => false,
            "message" => "Success",
        ]);

        exit;
    } else {
        echo json_encode([
            "error" => true,
            "message" => "User Problem"
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
<?php

require_once "config.php";

$student = mysqli_real_escape_string($con, ($_POST["student"]));
$problem = [];


if (isset($_POST)) {
    $query = "SELECT * FROM problem";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {

        $problem = mysqli_fetch_all ($result, MYSQLI_ASSOC);

        echo json_encode($problem);

        exit;
    }else{
        echo json_encode($problem);
    }
} else {
    echo json_encode($problem);
    exit;
}
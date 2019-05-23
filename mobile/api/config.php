<?php

session_start();
header('Content-Type: text/html; Charset=UTF-8');
$con = mysqli_connect('localhost', 'root', '', 'participation') or die("Database Connection Error");

mysqli_query($con, "SET NAMES `UTF8`");





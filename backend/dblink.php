<?php
set_time_limit(0);
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('Asia/Bangkok');
session_start();

//Connect DB
$conn = new mysqli('localhost', 'root', '', 'incentive');
if ($conn->connect_errno) {
    die("Failed to connect to MySQL : (" . $conn->connect_errno . ") " . $conn->connect_error);
}

$conn->set_charset("utf8");

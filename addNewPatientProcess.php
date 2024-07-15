<?php
session_start();
require "connection.php";
$email = $_SESSION["u"]["username"];

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$contact = $_POST["contact"];
$age = $_POST["age"];
$nic = $_POST["nic"];
$gender = $_POST["gender"];

if (empty($fname)) {
    echo ("Please Enter First Name");
} elseif (strlen($fname) > 45) {
    echo ("First Name Must Have only 45 Characters");
} elseif (empty($lname)) {
    echo ("Please Enter Last Name");
} elseif (strlen($lname) > 45) {
    echo ("Last Name Must Have only 45 Characters");
} elseif (empty($contact)) {
    echo ("Please Enter Contact Number");
} else if (!preg_match("/07[0,1,2,4,5,6,7,8][0-9]/", $contact)) {
    echo ("Invalid Mobile Number!");
} elseif (empty($age)) {
    echo ("Please Enter Age");
} elseif (strlen($age) > 4) {
    echo ("Age Must Have only 4 Characters");
} elseif (!is_numeric($age)) {
    echo ("Please Enter Only Numbers for age");
} elseif (empty($nic)) {
    echo ("Please Enter NIC");
} elseif (strlen($nic) > 12) {
    echo ("NIC Must Have only 4 Characters");
} elseif (empty($gender)) {
    echo ("Please Select Gender");
} else {
    Database::search("INSERT INTO patient (`f_name`,`l_name`,`contact_no`,`age`,`nic`,`gender_id`)
    VALUES ('" . $fname . "','" . $lname . "','" . $contact . "','" . $age . "','" . $nic . "','" . $gender . "')");

    echo ("success");
}

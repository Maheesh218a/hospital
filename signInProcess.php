<?php
include "connection.php";
session_start();

$username = $_POST["u"];
$password = $_POST["p"];

if (empty($username)) {
    echo ('Please Enter your Username');
} else if (empty($password)) {
    echo ("Please Enter your Password");
} else {
    
    $rs = Database::search ("SELECT * FROM `user` WHERE `username`='".$username."' AND `password`='".$password."'");

    $n = $rs->num_rows;

    if($n == 1){

        echo ("success");
        $d = $rs->fetch_assoc();
        $_SESSION["u"] = $d;

    }else{
        echo ("Invalid Email Address or Password");
    }
}
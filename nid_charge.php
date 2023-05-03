<?php
session_start();
include_once('function.php');
include_once('includes\charge.php');
$obj = new DB_con();
$user_id = $_SESSION['uid'];
$obj->get_withdraw($user_id, $charge);
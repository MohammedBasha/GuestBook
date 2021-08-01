<?php
ob_start();
include '../includes/usersClass.php';

usersClass::logout();
header('LOCATION: login.php');
ob_end_flush();
<?php
/**
 * Created by PhpStorm.
 * User: Rahul Gohel
 * Date: 20/01/2021
 * Time: 23:46
 */
include 'cofig.php';

session_start();

session_unset();
// session_destroy();
header("location: login.php");

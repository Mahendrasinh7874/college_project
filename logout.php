<?php
/**
 * Created by PhpStorm.
 * User: Rahul Gohel
 * Date: 20/01/2021
 * Time: 23:46
 */
include 'cofig.php';

session_start();

unset($_SESSION['student_id']);
unset($_SESSION['f_name']);
unset($_SESSION['l_name']);
unset($_SESSION['course_id']);
unset($_SESSION['semester_name']);

header("location: index.php");

?>


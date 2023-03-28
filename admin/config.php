<?php

/**
 * Created by PhpStorm.
 * User: Rahul Gohel
 * Date: 20/01/2021
 * Time: 23:36
 */

$hostname = "http://localhost/college-project/";


$conn =  mysqli_connect("localhost", "root", "", "college-project")
    or die(mysqli_connect_error());

<?php
    //Include constant.php for SITEURL
    include('config/constant.php');

    //1. Destroy the Session 
    session_destroy();//Unsets $_SESSION['user']

    //2. Redirect to Login Page
    header('location:'.SITEURL.'login.php');
?>
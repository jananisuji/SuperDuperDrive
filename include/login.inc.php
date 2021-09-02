<?php
    if(isset($_POST['submit'])){
        $username=$_POST['username'];
        $password=$_POST['password'];

        include_once('functions.inc.php');
        $con=connect_db();

        if($rec=check_login($con,$username,$password)){
            //Store the email to SESSION.
            session_start();
            $_SESSION['login_username']=$username;

            header('location:../profile.php');
        }else{
            header('location:../login.php?error=invalidlogin');
        }
    }
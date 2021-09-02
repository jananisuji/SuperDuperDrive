<?php

if (isset($_POST['submit'])) {
    $firstName=$_POST['firstName'];
    $lastName=$_POST['lastName'];
    $email=$_POST['email'];
    $gender=$_POST['gender'];
    $password=$_POST['password'];
    $confirmPassword=$_POST['confirmPassword'];

    require_once('functions.inc.php');
    $con=connect_db();

    if(empty_input_signup($firstName,$lastName,$email,$gender,$password,$confirmPassword)!==false){
        header('location:../signup.php?error=emptyinput');
        exit();
    }
    if(invalid_email($email)!==false){
        header('location:../signup.php?error=invalidemail');
        exit(); 
    }
    if(password_match($password,$confirmPassword)!==false){
        header('location:../signup.php?error=passmismatched');
        exit(); 
    }
    if(email_exists($con,$email)!==false){
        header('location:../signup.php?error=emailexists');
        exit();
    }

    register_user($con,$firstName,$lastName,$email,$password,$gender);

    header('location:../signup.php?success=regsuccess');
    
}else{
    header('location:../signup.php');
    exit();
}
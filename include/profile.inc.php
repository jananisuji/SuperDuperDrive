<?php
if(isset($_POST['submit'])){
    $firstName=$_POST['first_name'];
    $lastName=$_POST['last_name'];
    $email=$_POST['email'];


    require_once('./functions.inc.php');

    if(empty($firstName) || empty($lastName)){
        header('location:../profile.php?p=myprofile&error=emptyfields');
        exit();
    }
    $con=connect_db();

    $result=update_profile($con,$firstName,$lastName,$email);
    if($result===false){
        header('location:../profile.php?p=myprofile&error=updatefailed');
        exit();
    }else{
        header('location:../profile.php?p=myprofile&success=updatesuccess');
        exit();
    }
}

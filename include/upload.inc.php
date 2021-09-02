<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:th="https://www.thymeleaf.org">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" media="all" href="static/css/bootstrap.min.css">

    <title>Result</title>
</head>

<body class="p-3 mb-2 bg-light text-black">
    <div class="container justify-content-center w-50 p-3" style="margin-top: 5em;">
        <div class="alert alert-success fill-parent">
            <h1 class="display-5">Success</h1>
            <span>Your changes were successfully saved. Click <a>here</a> to continue.</span>
        </div>
        <div class="alert alert-danger fill-parent">
            <h1 class="display-5">Error</h1>
            <span>Your changes were not saved. Click <a>here</a> to continue.</span>
        </div>
        <div class="alert alert-danger fill-parent">
            <h1 class="display-5">Error</h1>
            <span>file format is not exist</span>
            <span>Click <a>here</a> to continue.</span>
        </div>
    <?php
include_once('functions.inc.php');
if (isset($_POST['submit'])) {
    if (empty($_FILES["fileToUpload"]["name"])) {
        header('location:../profile.php?p=uploadpics&error=emptyfile');
        exit();
    } 
    //session_start();
    //$login_email=$_SESSION[''];

    $target_dir = "../uploads/";

    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $FileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (not_file($FileType) !== false) {
        header('location:../profile.php?p=uploadfile&error=notfile');
        exit();
    }

    if (is_large_file()) {
        header('location:../profile.php?p=uploadfile&error=largefile');
        exit();
    }

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $con = connect_db();
        $result = save_upload_file_info_to_db($con, $FileType);
        if ($result === true) {
            header('location:../profile.php?p=uploadfile&success=uploadsuccess');
            exit();
        } else {
            //when failed to update database we need to remove the remove uploaded file.
            header('location:../profile.php?p=uploadfile&error=uploadsavefailed');
            exit();
        }
    } else {
        header('location:../profile.php?p=uploadfile&error=uploadfailed');
        exit();
    }
    
}
?>
    </div>
</body>

</html>
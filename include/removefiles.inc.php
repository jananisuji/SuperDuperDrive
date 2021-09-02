<?php
require_once('functions.inc.php');

if (isset($_POST['submit'])) {
    $fileId = $_POST['fileid'];
    $filePath = '../'.$_POST['filePath'];

    $con = connect_db();
    //Delete file from uploads folder.
    $delSuccess = unlink($filePath);
    if (true) {
        $result = delete_file($con, $fileId, $filePath);
        if ($result === true) {
            header('location:../profile.php?p=myphotos&success=delsuccess');
            exit();
        } else {
            header('location:../profile.php?p=myphotos&error=delfailed');
            exit();
        }
    } else {
        header('location:../profile.php?p=myphotos&error=delfilefailed');
        exit();
    }
}

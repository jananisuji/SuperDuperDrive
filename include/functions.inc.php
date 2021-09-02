<?php

function connect_db()
{
    $dbserver = 'localhost';
    $dbuser = 'sdrive_admin';
    $dbpassword = 'admin1234';
    $dbname = 'drivedb';

    $con = mysqli_connect($dbserver, $dbuser, $dbpassword, $dbname);
    return $con;
}

//-------------------------------- FILE UPLOAD -----------------------------------

//Validating file type.
function not_file($FileType)
{
    if (
        $FileType != "jpg" && $FileType != "pdf" && $FileType != "jpeg"
        && $FileType != "word" && $FileType != "png"
    ) {
        return true;
    } else {
        return false;
    }
}

//Validating file size
function is_large_file()
{
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 1000000) {
        return true;
    } else {
        return false;
    }
}

//for uploading file.
function upload_file($target_file)
{
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        return true;
    } else {
        return false;
    }
}

//for saving upload info to database.
function save_upload_file_info_to_db($con, $FileType)
{
    $fileName = $_FILES["fileToUpload"]["name"];
    $size_in_byts = $_FILES["fileToUpload"]["size"];
    $size = ($size_in_byts / 1024) . 'MB';

    $sql = "insert into files(file_name,file_size,type) values('" . $fileName . "','" . $size . "','" . $FileType . "')";

    $result = mysqli_query($con, $sql);

    return $result;
}

//Collect file info from database.
function fetch_file_info_db($con)
{
    $sql = 'select * from files';
    $result = mysqli_query($con, $sql);
    //var_dump($result);

    $all_rows = array();
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($all_rows, $row);
    }
    return $all_rows;
}

//Deleting image
function delete_file($con, $fileId, $filePath)
{
    $sql = "delete from files where id=?";
    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('location:../profile.php?error=stmtfailed');
    }
    mysqli_stmt_bind_param($stmt, 'i', $fileId);

    $result = mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);


    return $result;
}

//-------------- SIGNUP, LOGIN, PROFILE UPDATE --------------------------------------------


function check_login($con, $username, $password)
{
    //Checking login with some static info.
    $sql = "select * from users where username=? and password=?";
    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('location:../login.php?error=stmtfailed');
    }
    mysqli_stmt_bind_param($stmt, 'ss', $username, $password);
    mysqli_stmt_execute($stmt);

    $result_data = mysqli_stmt_get_result($stmt);

    $result = false;
    if ($row = mysqli_fetch_assoc($result_data)) {
        $result = $row;
    }
    mysqli_stmt_close($stmt);
    return $result;
}

function empty_input_signup($firstName, $lastName, $email, $gender, $password, $confirmPassword)
{
    if (empty($firstName) || empty($lastName) || empty($email) || empty($gender) || empty($password) || empty($confirmPassword)) {
        return true;
    } else {
        return false;
    }
}

function invalid_email($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

function password_match($password, $confirmPassword)
{
    if ($password !== $confirmPassword) {
        return true;
    } else {
        return false;
    }
}

function email_exists($con, $email)
{
    $sql = "select * from users where email=?";
    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('location:../signup.php?error=stmtfailed');
    }
    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);

    $result_data = mysqli_stmt_get_result($stmt);

    $result = false;
    if ($row = mysqli_fetch_assoc($result_data)) {
        $result = $row;
    }
    mysqli_stmt_close($stmt);
    return $result;
}

function fetch_user_data($con, $email)
{
    $sql = "select * from users where username=?";
    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('location:profile.php?error=stmtfailed');
    }
    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);

    $result_data = mysqli_stmt_get_result($stmt);

    $result = false;
    if ($row = mysqli_fetch_assoc($result_data)) {
        $result = $row;
    }
    mysqli_stmt_close($stmt);
    return $result;
}

function update_profile($con, $firstName, $lastName, $email)
{
    $sql = "update users set first_name=?,last_name=? where email=?";
    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('location:../profile.php?error=stmtfailed');
    }
    mysqli_stmt_bind_param($stmt, 'sss', $firstName, $lastName, $email);

    $result = mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    return $result;
}

function register_user($con, $userid, $firstName, $lastName, $email, $password, $gender)
{
    $sql = "insert into users(first_name,last_name,email,password,gender) values(?,?,?,?,?)";
    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('location:../signup.php?error=stmtfailed');
    }
    mysqli_stmt_bind_param($stmt, 'sssss', $firstName, $lastName, $email, $password, $gender);

    $result = mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    return $result;
}

//------------------------- MESSAGE DISPLAY RELATED FUNCTIONS -------------------------------

function showerror($errortype, $msg)
{
    $error = NULL;
    if (isset($_SERVER['QUERY_STRING'])) {
        parse_str($_SERVER['QUERY_STRING'], $arr);
        if (isset($arr['error'])) {
            $error = $arr['error'];
        }
    }
    if ($error === $errortype) {
        echo '
        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
            ' . $msg . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ';
    }
}

function showsuccess($errortype, $msg)
{
    $success = NULL;
    if (isset($_SERVER['QUERY_STRING'])) {
        parse_str($_SERVER['QUERY_STRING'], $arr);
        if (isset($arr['success'])) {
            $success = $arr['success'];
        }
    }
    if ($success === $errortype) {
        echo '
        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
            ' . $msg . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ';
    }
}

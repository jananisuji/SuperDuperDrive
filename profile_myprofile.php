<?php
    require_once('include/functions.inc.php');
    //session_start();
    $email=$_SESSION['login_email'];
    $con=connect_db();
    $profile=fetch_user_data($con,$email);
?>
<form method="POST" action="include/profile.inc.php" id="MyProfile">
    <h1>My Profile</h1>
    <div class="row mb-3">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-5">
            <input type="text" placeholder="First Name" class="form-control" value="<?php echo $profile['first_name'] ?>" name="first_name">
        </div>
        <div class="col-sm-5">
            <input type="text" placeholder="Last Name" class="form-control" value="<?php echo $profile['last_name'] ?>" name="last_name">
        </div>
        <?php
            showerror('emptyfields','Please fill the values correctly.');
        ?>
    </div>
    <div class="row mb-3">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="email" readonly="true" placeholder="Email ID" value="<?php echo $email ?>" class="form-control" name="email">
        </div>
    </div>
    <div class="col-sm-10">
            <input type="file" readonly="true" placeholder="Choose any image file" value="" class="form-control" name="fileToUpload">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
            <button type="submit" name="submit" class="btn btn-primary mr-5">Upload file</button>
        </div>
    </div>
</form>
<?php
    require_once('include/functions.inc.php');
    showerror('emptyfile','Please select a file to update.');
    showerror('uploadfailed','File upload failed. Please try again later.');
    showerror('notimage','files with extension (.jpg,.jpeg,.pdf,.word) are suported.'); 
    showerror('largeimage','Selected file is too large.');
    showerror('uploadsavefailed','Failed to save uploaded file info.');
    showsuccess('uploadsuccess','Your file is updated successfully.');
?>
    <div class="row mb-3">
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
            <button type="submit" name="submit" class="btn btn-primary mr-5">Update Profile</button>
        </div>
    </div>
</form>
<?php
    showerror('updatefailed','Your profile update failed.');
    showsuccess('updatesuccess','Your profile updated successfully.');
?>
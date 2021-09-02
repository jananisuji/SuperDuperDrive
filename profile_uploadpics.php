<form method="POST" action="include/upload.inc.php" enctype="multipart/form-data" id="MyProfile">
    <h1>Upload Photos</h1>
    <div class="row mb-3">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Upload File</label>
        <div class="col-sm-10">
            <input type="file" readonly="true" placeholder="Choose any image file" value="" class="form-control" name="fileToUpload">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
            <button type="submit" name="submit" class="btn btn-primary mr-5">Upload Image</button>
        </div>
    </div>
</form>
<?php
    require_once('include/functions.inc.php');
    showerror('emptyfile','Please select a image file.');
    showerror('uploadfailed','File upload failed. Please try again later.');
    showerror('notimage','Images with extension (.jpg,.jpeg,.gif) are suported.'); 
    showerror('largeimage','Selected image is too large.');
    showerror('uploadsavefailed','Failed to save uploaded image info.');
    showsuccess('uploadsuccess','Your image is uploaded successfully.');
?>
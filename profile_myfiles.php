<h1 class="mb-3">My Files</h1>
<div class="row">

</div>
<div class="row mb-3">
    <?php
    include_once('include/functions.inc.php');
    $con = connect_db();
    $all_file = fetch_file_info_db($con);

    foreach ($all_files as $file_info) {
        $filePath='uploads/'. $file_info['file_name'];
        echo '
            <div class="card m-2 p-0" style="width: 18rem;">
                <img class="card-img-top" style="width:100%" src="'.$filePath.'" alt="Card image cap">
                <div class="card-img-overlay p-0">
                    <form method="post" action="include/delphotos.inc.php">
                        <input type="hidden" name="fileid" value="'.$file_info['id'].'"/>
                        <input type="hidden" name="filePath" value="'.$filePath.'"/>
                        <input type="submit" name="submit" class="btn btn-danger" style="float:right" value="X"/>
                    </form>
                </div>
            </div>
            ';

        //echo '<img src="uploads/' . $pic_info['file_name'] . '" style="width: 300px;margin-top:30px"/>';
    }
    ?>
</div>

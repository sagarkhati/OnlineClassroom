<?php
include '../database/connection.php';

if (isset($_POST['desc'])) {

    extract($_POST);
    $email = $_SESSION["email"];

    $filename = $_FILES["content"]["name"];
    $folder = $_FILES["content"]["tmp_name"];

    $destination = "../content/" . $filename;
    move_uploaded_file($folder, $destination);

    $query = " INSERT INTO `$code` VALUES (null, '$format', '$destination', '$desc', now()) ";
    $result = mysqli_query($link, $query);

    echo '<script>window.location.href = "subject_content.php?code=' . $code . '"</script>';
}
?>

<div class="modal fade" id="addcontentform">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="padding: 20px">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title"><b>Add Content</b></h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="login_wrap">
                        <div class="col-xs-12">
                            <form method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="txt">Subject Code:</label>
                                    <input type="text" class="form-control" name="code" value="<?php
                                    extract($_GET);
                                    echo $code;
                                    ?>" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="sellist">Type :</label>
                                    <select class="form-control" name="format" id="format" onchange="dynamicdropdown()" required>
                                        <option value="">SELECT TYPE : </option>
                                        <option value="image">Image</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Material :</label>
                                    <input type="file" class="form-control-file" name="content" required="">
                                </div>

                                <div class="form-group">
                                    <label for="comment">Description :</label>
                                    <textarea class="form-control" rows="5" name="desc"></textarea>
                                </div>

                                <button type="submit" class="btn btn-success">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

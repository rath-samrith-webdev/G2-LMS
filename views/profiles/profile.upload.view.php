<?php
$uid = null;
if (isset($_GET['id'])) {
    $uid = $_GET['id'];
} else if (isset($_SESSION['user']['id'])) {
    $uid = $_SESSION['user']['id'];
} ?>
<?php require "layouts/header.php"; ?>
<!-- Main Wrapper -->
<div class="inner-wrapper login-body">
    <div class="login-wrapper">
        <div class="container">
            <div class="loginbox shadow-sm grow">
                <div class="login-left">
                    <img class="img-fluid" src="views/landing/image.login.views.png" alt="logo">
                </div>
                <div class="login-right">
                    <div class="login-right-wrap">
                        <h1>Upload profile Image</h1>
                        <p class="account-subtitle">Upload your profile picture</p>

                        <!-- Form -->
                        <form action="controllers/profiles/upload.pf.controller.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <input class="form-control" type="hidden" name="uid" value="<?= $uid ?>">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="file" name="file">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-theme button-1 text-white ctm-border-radius btn-block" type="submit">Upload</button>
                            </div>
                        </form>
                        <!-- /Form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$msg = array(
    'message' => '',
    'type' => ''
);
if (isset($_GET['user']) && $_GET['user'] === 'notfound') {
    $msg['message'] = 'The user your trying to update is not found';
    $msg['type'] = 'danger';
}
if (isset($_GET['filesize']) && $_GET['filesize'] === 'large') {
    $msg['message'] = 'The file is too large';
    $msg['type'] = 'warning';
}
if (isset($_GET['error']) && $_GET['error'] === 'uploaderror') {
    $msg['message'] = 'There was a problem during upload';
    $msg['type'] = 'danger';
}
if (isset($_GET['file']) && $_GET['file'] === 'unsupported') {
    $msg['message'] = 'The file you used to upload is not supported';
    $msg['type'] = 'warning';
}
?>
<?php require "layouts/footer.php" ?>
<script>
    $.notify(<?= json_encode($msg['message']) ?>, {
            position: "top-center"
        },
        <?= json_encode($msg['type']) ?>)
</script>
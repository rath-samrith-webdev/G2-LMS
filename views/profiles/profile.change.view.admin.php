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
                        <form action="controllers/profiles/profile.change.admin.controller.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <input class="form-control" type="hidden" name="uid" value="<?php if (isset($_GET['id'])) { echo $_GET['id']; } ?>">
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
<?php require "layouts/footer.php"; ?>
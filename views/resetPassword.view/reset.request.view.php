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
                        <h1>Reset Password</h1>
                        <p class="account-subtitle">Request a reset password</p>

                        <!-- Form -->
                        <form action="controllers/password.reset.controller/reset.password.php" method="post">
                            <?php if (isset($_GET['error'])) { ?>
                                <p class="alert alert-danger text-danger" role="alert"><?= $_GET['error']; ?></p>
                            <?php } ?>
                            <div class="form-group">
                                <input class="form-control" type="email" placeholder="User Email" name="email" required>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-theme button-1 text-white ctm-border-radius btn-block" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require "layouts/footer.php"; ?>
<?php
$success = $_SESSION['email'];
if ($success === 1) { ?>
    <script>
        $.notify("The Reset Link has been sent to your", "success");
    </script>
<?php } else { ?>
    <script>
        $.notify("No user has been found using this email", "Danger");
    </script>
<?php } ?>
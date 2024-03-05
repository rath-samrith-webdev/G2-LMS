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
                        <h1>Login</h1>
                        <p class="account-subtitle">Access to your dashboard</p>

                        <!-- Form -->
                        <form action="controllers/log.controll/login.controller.php" method="post">
                            <?php if(isset($_GET['error'])) {?>
                                <p class="alert alert-danger text-danger" role="alert"><?= $_GET['error'];?></p>
                            <?php } ?>
                            <div class="form-group">
                                <input class="form-control" type="email" placeholder="User Email" name="email" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Password" name="password">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-theme button-1 text-white ctm-border-radius btn-block" type="submit">Login</button>
                            </div>
                        </form>
                        <!-- /Form -->
                        <div class="text-center forgotpass d-flex justify-content-between"><a href="/forgetPass" class="btn btn-primary text-white ctm-border-radius">Forgot Password?</a> <a href='/loginAdmin' class="btn btn-primary text-white ctm-border-radius">Admin Login</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require "layouts/footer.php"; ?>
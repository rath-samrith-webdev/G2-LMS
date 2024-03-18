<?php require "layouts/header.php"; ?>

<div class="inner-wrapper login-body">
    <div class="login-wrapper">
        <div class="p-5 bg-image " style="
            background-image: url('https://mdbootstrap.com/img/new/textures/full/171.jpg');
            height: 200px;
            "></div>
        <div class="container">
            <div class="loginbox shadow-sm " style="
                margin-top: -100px;
                background: hsla(0, 0%, 100%, 0.8);
                backdrop-filter: blur(30px);
                ">
                <div class="login-left">
                    <img class="img-fluid" src="views/landing/image.login.views.png" alt="logo">
                </div>
                <div class="login-right">
                    <div class="login-right-wrap">
                        <h1><b>Admin Login</b></h1>
                        <p class="account-subtitle">Access to your dashboard</p>

                        <!-- Form -->
                        <form action="controllers/log.controll/login_admin.controller.php" method="post">
                            <div class="form-group">
                                <?php if(isset($_GET['error'])) {?>
                                    <p class="alert alert-danger text-danger" role="alert"><?= $_GET['error'];?></p>
                                <?php } ?>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text h-100 selected-icon">
                                            <span class="fa fa-user"></span>
                                        </span>
                                    </div>
                                    <input class="form-control" type="text" placeholder="Admin Name" name="name">
                                </div>
                            </div>
                            <div class="form-group">                                    
                                <div class="input-group" id="show_hide_password">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text h-100 selected-icon">
                                            <!-- <i class="fa fa-lock"></i> -->
                                            <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                        </span>
                                    </div>
                                    <input class="form-control" type="password" placeholder="Password"  name="password" >                                   
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-theme button-1 text-white ctm-border-radius btn-block" type="submit">Login</button>
                            </div>
                        </form>
                        <!-- /Form -->

                        <div>
                            <span>Are you a User? </span><a href='/'> User Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require "layouts/footer.php"; ?>
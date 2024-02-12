<?php include "layouts/header.php"; ?>
<div class="inner-wrapper login-body">
    <div class="login-wrapper">
        <div class="container">
            <div class="loginbox shadow-sm grow">
                <div class="login-left">
                    <img class="img-fluid" src="views/landing/image.login.views.png" alt="Logo">
                </div>
                <div class="login-right">
                    <div class="login-right-wrap">
                        <h1>Register</h1>
                        <p class="account-subtitle">Access to our dashboard</p>

                        <!-- Form -->
                        <form action="login.html">
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Full Name">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="postion" id="position">
                                    <option value="">Choose a postion</option>
                                    <option value="Super Admin">Request Approver</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="role" id="role">
                                    <option value="">Choose a role</option>
                                    <option value="Super Admin">Super Admin</option>
                                </select>
                            </div>
                            <div class="form-group mb-0">
                                <button class="btn btn-theme button-1 text-white ctm-border-radius btn-block" type="submit">Add user</button>
                            </div>
                        </form>
                        <!-- /Form -->
                        <div class="text-center dont-have">Already have an account? <a href="/">Login</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "layouts/footer.php"; ?>
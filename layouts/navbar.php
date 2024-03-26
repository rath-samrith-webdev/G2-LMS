<?php
//Profile image management.
if (isset($_SESSION['user'])) {
    $userExist = true; //if the normal user has logged in 
    $adminExist = false;
    $username = $_SESSION['user']['first_name'];
    $user_role = (isset($_SESSION['user']['role_id'])) ? $_SESSION['user']['role_id'] : null;

    if (isset($_SESSION['user']['first_name'])) {
        $img = (isset($_SESSION['user']['profile']) && $_SESSION['user']['profile'] != "") ? $_SESSION['user']['profile'] : "views/landing/image.login.views.png";
        $uid = $_SESSION['user']['uid']; //if the user already had a profile img
    } else {
        $adminExist = true;
        if (isset($_SESSION['user']['admin_username'])) { //if that user is an admin user
            $img = (isset($_SESSION['user']['admin_profile']) && $_SESSION['user']['admin_profile'] != "") ? $_SESSION['user']['admin_profile'] : "assets/profile/img-2.jpg";
            $userExist = false;
            $username = "Admin";
        };
    };
};
?>
<!-- Inner wrapper -->
<div class="inner-wrapper">
    <!-- Header -->
    <header class="header">
        <!-- Top Header Section -->
        <div class="top-header-section">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-6">
                        <div class="logo my-3 my-sm-0">
                            <a href="#">
                                <img src="assets/logo/lms-logo.png" alt="image">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-6 text-right">
                        <div class="user-block d-none d-lg-block">
                            <div class="row align-items-center">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <!-- <div class="user-notification-block align-right d-inline-block">
                                        <div class="top-nav-search">
                                            <form>
                                                <input type="text" class="form-control" placeholder="Search here" />
                                                <button class="btn" type="submit">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div> -->
                                    <!-- User notification-->
                                    <div class="user-notification-block align-right d-inline-block">
                                        <ul class="list-inline m-0">
                                            <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Apply Leave">
                                                <a href="#" class="dropdown-toggle font-23 menu-style text-white align-middle" data-toggle="dropdown">
                                                    <small class="count bg-danger circle"></small>
                                                    <span class="lnr lnr-briefcase position-relative"></span>
                                                    <ul class="dropdown-menu notification"></ul>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- /User notification-->
                                    <!-- user info-->
                                    <div class="user-info align-right dropdown d-inline-block header-dropdown">
                                        <a href="javascript:void(0)" data-toggle="dropdown" class="menu-style dropdown-toggle">
                                            <div class="user-avatar d-inline-block">
                                                <img src="<?php echo $img; ?>" alt="user avatar" class="rounded-circle img-fluid" width="55" />
                                            </div>
                                        </a>

                                        <!-- Notifications -->
                                        <div class="dropdown-menu notification-dropdown-menu shadow-lg border-0 p-3 m-0 dropdown-menu-right">
                                            <?php if ($userExist and !$adminExist) { ?>
                                                <a class="dropdown-item p-2" href="/profileImage">
                                                    <span class="media align-items-center">
                                                        <span class="lnr lnr-user mr-3"></span>
                                                        <span class="media-body text-truncate">
                                                            <span class="text-truncate">Profile</span>
                                                        </span>
                                                    </span>
                                                </a>
                                            <?php } ?>

                                            <?php if (!$userExist and $adminExist) { ?>
                                                <a class="dropdown-item p-2" href="/proFileAdmins">
                                                    <span class="media align-items-center">
                                                        <span class="lnr lnr-user mr-3"></span>
                                                        <span class="media-body text-truncate">
                                                            <span class="text-truncate">Profile</span>
                                                        </span>
                                                    </span>
                                                </a>
                                            <?php } ?>
                                            <a class="dropdown-item p-2" href="/logout">
                                                <span class="media align-items-center">
                                                    <span class="lnr lnr-power-switch mr-3"></span>
                                                    <span class="media-body text-truncate">
                                                        <span class="text-truncate">Logout</span>
                                                    </span>
                                                </span>
                                            </a>
                                        </div>
                                        <!-- Notifications -->
                                    </div>
                                    <!-- /User info-->
                                </div>
                            </div>
                        </div>
                        <div class="d-block d-lg-none">
                            <a href="javascript:void(0)">
                                <span class="lnr lnr-user d-block display-5 text-white" id="open_navSidebar"></span>
                            </a>
                            <!-- Offcanvas menu -->
                            <div class="offcanvas-menu" id="offcanvas_menu">
                                <span class="lnr lnr-cross float-left display-6 position-absolute t-1 l-1 text-white" id="close_navSidebar"></span>
                                <div class="user-info align-center bg-theme text-center">
                                    <a href="javascript:void(0)" class="d-block menu-style text-white">
                                        <div class="user-avatar d-inline-block mr-3">

                                            <img src="<?= $img ?>" alt="user avatar" class="rounded-circle img-fluid" width="55" />
                                        </div>
                                    </a>
                                </div>
                                <div class="user-notification-block align-center">
                                    <div class="top-nav-search">
                                        <form>
                                            <input type="text" class="form-control" placeholder="Search here" />
                                            <button class="btn" type="submit">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <hr />
                                <div class="user-menu-items px-3 m-0">

                                    <?php if (!$userExist and $adminExist) { ?>
                                        <a class="p-2" href="/admin">
                                            <span class="media align-items-center">
                                                <span class="lnr lnr-users mr-3"></span>
                                                <span class="media-body text-truncate text-left">
                                                    <span class="text-truncate text-left">Employees</span>
                                                </span>
                                            </span>
                                        </a>
                                        <a class="p-2" href="/companies">
                                            <span class="media align-items-center">
                                                <span class="lnr lnr-apartment mr-3"></span>
                                                <span class="media-body text-truncate text-left">
                                                    <span class="text-truncate text-left">Company</span>
                                                </span>
                                            </span>
                                        </a>
                                    <?php } else { ?>
                                        <a class="px-0 pb-2 pt-0" href="/employee">
                                            <span class="media align-items-center">
                                                <span class="lnr lnr-home mr-3"></span>
                                                <span class="media-body text-truncate text-left">
                                                    <span class="text-truncate text-left">Dashboard</span>
                                                </span>
                                            </span>
                                        </a>
                                    <?php } ?>
                                    <a class="p-2" href="/calendars">
                                        <span class="media align-items-center">
                                            <span class="lnr lnr-calendar-full mr-3"></span>
                                            <span class="media-body text-truncate text-left">
                                                <span class="text-truncate text-left">Calendar</span>
                                            </span>
                                        </span>
                                    </a>
                                    <a class="p-2" href="/leaves">
                                        <span class="media align-items-center">
                                            <span class="lnr lnr-briefcase mr-3"></span>
                                            <span class="media-body text-truncate text-left">
                                                <span class="text-truncate text-left">Leave</span>
                                            </span>
                                        </span>
                                    </a>
                                    <?php if (!$userExist and $adminExist) { ?>
                                        <a class="p-2" href="/reviews">
                                            <span class="media align-items-center">
                                                <span class="lnr lnr-star mr-3"></span>
                                                <span class="media-body text-truncate text-left">
                                                    <span class="text-truncate text-left">Reviews</span>
                                                </span>
                                            </span>
                                        </a>
                                        <a class="p-2" href="/reports">
                                            <span class="media align-items-center">
                                                <span class="lnr lnr-rocket mr-3"></span>
                                                <span class="media-body text-truncate text-left">
                                                    <span class="text-truncate text-left">Reports</span>
                                                </span>
                                            </span>
                                        </a>
                                        <a class="p-2" href="/manages">
                                            <span class="media align-items-center">
                                                <span class="lnr lnr-sync mr-3"></span>
                                                <span class="media-body text-truncate text-left">
                                                    <span class="text-truncate text-left">Manage</span>
                                                </span>
                                            </span>
                                        </a>
                                    <?php } ?>
                                    <a class="p-2" href="#">
                                        <span class="media align-items-center">
                                            <span class="lnr lnr-cog mr-3"></span>
                                            <span class="media-body text-truncate text-left">
                                                <span class="text-truncate text-left">Settings</span>
                                            </span>
                                        </span>
                                    </a>
                                    <a class="p-2" href="employment.html">
                                        <span class="media align-items-center">
                                            <span class="lnr lnr-user mr-3"></span>
                                            <span class="media-body text-truncate text-left">
                                                <span class="text-truncate text-left">Profile</span>
                                            </span>
                                        </span>
                                    </a>
                                    <a class="p-2" href="login.html">
                                        <span class="media align-items-center">
                                            <span class="lnr lnr-power-switch mr-3"></span>
                                            <span class="media-body text-truncate text-left">
                                                <span class="text-truncate text-left">Logout</span>
                                            </span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <!-- /Offcanvas menu -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Top Header Section -->
    </header>
    <!-- /Header -->
    <!-- Content -->
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-12 theiaStickySidebar">
                    <aside class="sidebar sidebar-user">
                        <div class="row">
                            <div class="col-12">
                                <div class="card ctm-border-radius shadow-sm grow">
                                    <div class="card-body py-4">
                                        <div class="row">
                                            <div class="col-md-12 mr-auto text-left">
                                                <div class="custom-search input-group">
                                                    <div class="custom-breadcrumb">
                                                        <ol class="breadcrumb no-bg-color d-inline-block p-0 m-0 mb-2">
                                                            <li class="breadcrumb-item d-inline-block"><a href="/admin" class="text-dark">Home</a></li>
                                                            <li class="breadcrumb-item d-inline-block active">Dashboard</li>
                                                        </ol>
                                                        <h4 class="text-dark">Admin Dashboard</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="user-card card shadow-sm bg-white text-center ctm-border-radius grow">
                            <div class="user-info card-body">
                                <div class="user-avatar mb-4">
                                    <img src="<?= $img ?>" alt="User Avatar" class="img-fluid rounded-circle" width="100">
                                </div>
                                <div class="user-details">
                                    <h4><b>Welcome <?= $username ?></b></h4>
                                    <p>Sun, 29 Nov 2019</p>
                                </div>
                            </div>
                        </div>
                        <!-- Sidebar -->
                        <div class="sidebar-wrapper d-lg-block d-md-none d-none">
                            <div class="card ctm-border-radius shadow-sm border-none grow">
                                <div class="card-body">
                                    <div class="row no-gutters">
                                        <?php
                                        function checkActive($path)
                                        {
                                            $uri = parse_url($_SERVER["REQUEST_URI"])["path"];
                                            return $uri == $path ? "active text-white" : "";
                                        }
                                        ?>

                                        <?php if (!$userExist and $adminExist) { ?>
                                            <div class="col-6 align-items-center text-center">
                                                <a href="/admin" class="text-dark p-4 first-slider-btn ctm-border-right ctm-border-left ctm-border-top <?= checkActive('/admin') ?>"><span class="lnr lnr-home pr-0 pb-lg-2 font-23"></span><span class="">Dashboard</span></a>
                                            </div>
                                            <div class="col-6 align-items-center shadow-none text-center">
                                                <a href="/employeelist" class="text-dark p-4 second-slider-btn ctm-border-right ctm-border-top <?= (parse_url($_SERVER["REQUEST_URI"])["path"] == "/createEmployee") ? "active " : "" ?> <?= checkActive('/employeelist') ?>"><span class="lnr lnr-users pr-0 pb-lg-2 font-23"></span><span class="">Employees</span></a>
                                            </div>
                                            <div class="col-6 align-items-center shadow-none text-center">
                                                <a href="/companies" class="text-dark p-4 ctm-border-right ctm-border-left <?= checkActive('/companies') ?>"><span class="lnr lnr-apartment pr-0 pb-lg-2 font-23"></span><span class="">Departments</span></a>
                                            </div>
                                        <?php } else { ?>
                                            <div class="col-6 align-items-center text-center">
                                                <a href="/employees" class="text-dark p-4 first-slider-btn ctm-border-right ctm-border-left ctm-border-top <?= checkActive('/employees') ?>"><span class="lnr lnr-home pr-0 pb-lg-2 font-23"></span><span class="">Dashboard</span></a>
                                            </div>
                                        <?php } ?>
                                        <div class="col-6 align-items-center shadow-none text-center">
                                            <a href="/calendars" class="text-dark p-4 ctm-border-right <?= checkActive('/calendars') ?>"><span class="lnr lnr-calendar-full pr-0 pb-lg-2 font-23"></span><span class="">Calendar</span></a>
                                        </div>
                                        <div class="col-6 align-items-center shadow-none text-center">
                                            <a href="/leaves" class="text-dark p-4 ctm-border-right ctm-border-left <?= checkActive('/leaves') ?>"><span class="lnr lnr-briefcase pr-0 pb-lg-2 font-23"></span><span class="">Leave</span></a>
                                        </div>
                                        <?php if (!$userExist and $adminExist) { ?>
                                            <div class="col-6 align-items-center shadow-none text-center">
                                                <a href="/createAdmin" class="text-dark p-4 ctm-border-right ctm-border-left <?= checkActive('/createAdmin') ?>"><span class="lnr lnr-user pr-0 pb-lg-2 font-23"></span><span class="">Admin</span></a>
                                            </div>
                                            <div class="col-6 align-items-center shadow-none text-center">
                                                <a href="/leavetype" class="text-dark p-4 ctm-border-right <?= checkActive('/leavetype') ?>"><span class="lnr lnr-briefcase pr-0 pb-lg-2 font-23"></span><span class="">Leave type</span></a>
                                            </div>
                                            <div class="col-6 align-items-center shadow-none text-center">
                                                <a href="/manages" class="text-dark p-4 ctm-border-right <?= checkActive('/manages') ?>"><span class="lnr lnr-sync pr-0 pb-lg-2 font-23"></span><span class="">Manages</span></a>
                                            </div>
                                            <div class="col-6 align-items-center shadow-none text-center">
                                                <a href="/reviews" class="text-dark p-4 last-slider-btn ctm-border-right <?= checkActive('/reviews') ?>"><span class="lnr lnr-star pr-0 pb-lg-2 font-23"></span><span class="">Reviews</span></a>
                                            </div>
                                        <?php } else { ?>
                                            <?php if ($user_role == 1) { ?>
                                                <div class="col-6 align-items-center shadow-none text-center">
                                                    <a href="/reviews" class="text-dark p-4 last-slider-btn ctm-border-right"><span class="lnr lnr-star pr-0 pb-lg-2 font-23"></span><span class="">Reviews</span></a>
                                                </div>
                                            <?php } ?>
                                            <div class="col-6 align-items-center shadow-none text-center">
                                                <a href="/profiles?uid=<?= $uid ?>" class="text-dark p-4 last-slider-btn ctm-border-right <?= checkActive('/profiles') ?>"><span class="lnr lnr-user pr-0 pb-lg-2 font-23"></span><span class="">Profile</span></a>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- /Sidebar -->

                    </aside>
                </div>
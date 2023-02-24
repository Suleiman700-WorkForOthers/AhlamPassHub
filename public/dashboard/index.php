<?php
require_once '../../settings/config.php';
$pageTitle = "Dashboard | $appName";
?>

<!DOCTYPE html>
<html lang="en">

<?php
require_once '../../include/page-head.php';
?>

<body>
<!-- Loader starts-->
<div class="loader-wrapper">
    <div class="theme-loader">
        <div class="loader-p"></div>
    </div>
</div>
<!-- Loader ends-->
<!-- page-wrapper Start       -->
<div class="page-wrapper compact-wrapper" id="pageWrapper">
    <!-- Page Header Start-->
    <?php require_once '../../include/components/header.php'; ?>
    <!-- Page Header Ends -->
    <!-- Page Body Start-->
    <div class="page-body-wrapper sidebar-icon">
        <!-- Page Sidebar Start-->
        <?php require_once '../../include/components/sidebar.php'; ?>
        <!-- Page Sidebar Ends-->
        <div class="page-body">
            <!-- Container-fluid starts-->
            <div class="container-fluid dashboard-default-sec">
                <div class="row">
                    <div class="col-sm-12 box-col-12 des-xl-100">
                        <div class="row">
                            <div class="col-xl-12 col-md-6 box-col-6 des-xl-50">
                                <div class="card profile-greeting">
                                    <div class="card-header"><div class="header-top"></div></div>
                                    <div class="card-body text-center p-t-0">
                                        <h3 class="text-muted">Welcome Back, <?php echo $session_username; ?></h3>
                                        <p class="text-muted">Welcome, we are glad that you are visiting this dashboard. we will be happy to help keep your data secured.</p>
                                    </div>
                                    <div class="confetti">
                                        <div class="confetti-piece"></div>
                                        <div class="confetti-piece"></div>
                                        <div class="confetti-piece"></div>
                                        <div class="confetti-piece"></div>
                                        <div class="confetti-piece"></div>
                                        <div class="confetti-piece"></div>
                                        <div class="confetti-piece"></div>
                                        <div class="confetti-piece"></div>
                                        <div class="confetti-piece"></div>
                                        <div class="confetti-piece"></div>
                                        <div class="confetti-piece"></div>
                                        <div class="confetti-piece"></div>
                                        <div class="confetti-piece"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-3 col-sm-6 box-col-3 des-xl-25 rate-sec">
                                <div class="card income-card card-primary">
                                    <div class="card-body text-center">
                                        <div class="round-box">
                                            <i class="fa fa-list"></i>
                                        </div>
                                        <h5><?php echo $count_categories; ?></h5>
                                        <p>Categories</p>
                                        <button class="btn btn-primary"><a class="text-white" href="../categories-list/index.php">View Categories</a></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-3 col-sm-6 box-col-3 des-xl-25 rate-sec">
                                <div class="card income-card card-secondary">
                                    <div class="card-body text-center">
                                        <div class="round-box">
                                            <i class="fa fa-list"></i>
                                        </div>
                                        <h5><?php echo $count_passwords; ?></h5>
                                        <p>Passwords</p>
                                        <button class="btn btn-primary"><a class="text-white" href="../passwords-list/index.php">View Passwords</a></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once '../../include/page-footer.php'; ?>
<script src="./js/init.js" type="module"></script>
</body>
</html>

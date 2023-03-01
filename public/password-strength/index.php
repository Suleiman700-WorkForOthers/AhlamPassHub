<?php
require_once '../../settings/config.php';
$pageTitle = "Password Strength | $appName";
?>

<!DOCTYPE html>
<html lang="en">

<?php
require_once '../../include/page-head.php';
?>

<body id="body">
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
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row" id="header">
                        <div class="col-sm-12">
                            <h3>Password Strength</h3>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="../dashboard/index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Password Strength</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid starts-->
            <div class="container-fluid dashboard-default-sec">
                <div class="row">
                    <div class="col-sm-12 box-col-12 des-xl-100">
                        <div class="row">
                            <div class="col-sm-12 box-col-12">
                                <div class="card profile-greeting">
                                    <div class="card-header"><div class="header-top"></div></div>
                                    <div class="card-body text-center p-t-0">
                                        <h3 class="text-muted">Check Your Password Strength</h3>
                                        <p class="text-muted">Simply type your password and click the button to check the password strength</p>
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
                        </div>
                        <div class="row">
                            <div class="col-sm-12 box-col-3 rate-sec">
                                <div class="card income-card card-primary">
                                    <div class="card-body text-center">

                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label" for="password">Password <code class="text-danger">*</code></label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="password" value="" placeholder="Enter your password">
                                                    <div class="input-group-prepend">
                                                        <button class="btn btn-primary btn-sm" id="check-password-strength"><i class="fa fa-search"></i> Check Password Strength</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h5 id="password-strength-label"></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->
        </div>
    </div>
</div>

<div class="modal fade" id="modal_delete_history" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content text-center">
            <div class="modal-header">
                <h5 class="modal-title">Delete History</h5>
            </div>
            <div class="modal-body">
                <p id="title">Do you really want to delete this history ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="confirm-delete"><i class="fa fa-check"></i> Yes, Delete!</button>
                <button type="button" class="btn btn-secondary" id="cancel-delete" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
            </div>
        </div>
    </div>
</div>

<?php require_once '../../include/page-footer.php'; ?>
<script src="./js/init.js" type="module"></script>
</body>
</html>
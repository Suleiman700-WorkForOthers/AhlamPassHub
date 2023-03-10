<header class="main-nav">
    <div class="sidebar-user text-center">
        <img class="img-90 rounded-circle" src="../../assets/images/user/user.png" alt="">
        <div class="badge-bottom"><span class="badge badge-primary">New</span></div>
        <h6 class="mt-3 f-14 f-w-600"><?php echo $session_username; ?></h6>
        <p class="mb-0 font-roboto"><?php echo $session_userEmail; ?></p>
        <ul>
            <li>
                <span class="counter"><?php echo $count_categories; ?></span>
                <p>Categories</p>
            </li>
            <li>
                <span class="counter"><?php echo $count_passwords; ?></span>
                <p>Passwords</p>
            </li>
        </ul>
    </div>
    <nav>
        <div class="main-navbar">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                    </li>

                    <li class="dropdown"><a class="nav-link menu-title link-nav" href="../dashboard/index.php"><i data-feather="list"></i><span>Dashboard</span></a></li>

                    <hr />
                    <li class="dropdown"><a class="nav-link menu-title link-nav" href="../categories-list/index.php"><i data-feather="list"></i><span>Categories List</span></a></li>
                    <li class="dropdown"><a class="nav-link menu-title link-nav" href="../categories-add/index.php"><i data-feather="plus"></i><span>Add Category</span></a></li>

                    <hr />
                    <li class="dropdown"><a class="nav-link menu-title link-nav" href="../passwords-list/index.php"><i data-feather="list"></i><span>Passwords List</span></a></li>
                    <li class="dropdown"><a class="nav-link menu-title link-nav" href="../passwords-add/index.php"><i data-feather="plus"></i><span>Add Password</span></a></li>

                    <hr />
                    <li class="dropdown"><a class="nav-link menu-title link-nav" href="../successful-logins/index.php"><i data-feather="list"></i><span>Successful Logins</span></a></li>
                    <li class="dropdown"><a class="nav-link menu-title link-nav" href="../failed-logins/index.php"><i data-feather="list"></i><span>Failed Logins</span></a></li>

                    <hr />
                    <li class="dropdown"><a class="nav-link menu-title link-nav" href="../password-strength/index.php"><i data-feather="list"></i><span>Password Strength</span></a></li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header>
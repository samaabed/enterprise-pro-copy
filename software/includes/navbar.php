<nav class="navbar" style="background-color: #404040;">
        <div class="container-fluid pb-3">
            <a class="navbar-brand" href="#">
                <img src="assets/images/university-of-bradford-white-logo.png" width="200" height="50">
            </a>
            <button class="navbar-toggler bg-light" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Navigation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="dashboard.php">Admin Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="pripAnswers.php">PRIPs</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="summary.php">PRIPs Summary</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="changeInfo.php">Change Password/Email</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="searchBar.php">Search for Project/Staff</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="includes/logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
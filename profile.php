<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Golden Drangon</title>
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mooli&display=swap" rel="stylesheet">
    <!-- google fonts -->
    <!-- icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- icons -->
    <link rel="stylesheet" href="./css/main.css">
</head>
<body>
<header>
        <div class="top-page">
            <div class="img-logo" ></div>
        </div>
        <nav class="top-nav">
            <!--movile nav btn-->
            <input class="mobile-check" type="checkbox">
            <label class="mobile-btn">
                <span>

                </span>
            </label>
            <!--movile nav btn-->

            <ul class="nav-list">
                <?php 
                session_start();
                if(isset($_SESSION["isLoggedIn"])){
                    echo "<span class='login-icon'><i class='bx bxs-user-circle'></i></span>";
                    echo "<li><a class='nav-list-link' href='./profile.php'>".$_SESSION["fullname"]."</a></li>";
                    echo "<li><a class='nav-list-link' href='./backend/logout.php'>Logout</a></li>";
                }else{
                    echo "<li><a class='nav-list-link' href='./forms.php'>Login</a></li>";
                }
                ?>
                <li><a class="nav-list-link" href="#">Home</a></li>
                <li><a class="nav-list-link" href="#">About</a></li>
                <li><a class="nav-list-link" href="#">Menu</a></li>
                <li><a class="nav-list-link" href="#">Contact us</a></li>
            </ul>
        </nav>
    </header>

    <main class="main-content">
        <div class="profile-container">
                <h1>User Profile</h1>
                <div class="info-box">
                    <div class="col-md-3 pt-0">
                        <div class="list-group">
                            <a class="list-group-item"
                            href="#general">General</a>
                            <a class="list-group-item"
                            href="#change-password">Change password</a>
                            </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content">
                            <div class="form-box" id="general">
                                <form method="post" action="profile.php">
                                    <div class="input-box">
                                        <span class="icon"><i class='bx bxs-user-detail'></i></span>
                                        <input id="fullname" type="text" name="fullname" value="fullname" required>
                                        <label for="fullname">Fullname</label>
                                    </div>

                                    <div class="input-box"> 
                                        <span class="icon"><i class='bx bxs-user'></i></span>
                                        <input id="username" type="text" name="username" value="username" required>
                                        <label for="username">Username</label>
                                    </div>

                                    <div class="input-box"> 
                                        <span class="icon"><i class='bx bx-envelope'></i></span>
                                        <input id="email" type="text" name="email" value="email" required>
                                        <label for="email">Email</label>
                                    </div>

                                    <input class="btn-sign-in" type="submit" value="Save Changes">
                                </form>
                            </div>

                            <!--<div class="form-box" id="change-password">
                                <form method="post" action="profile.php">
                                    <div class="input-box">
                                        <span class="icon"><i class='bx bxs-lock-alt'></i></span>
                                        <input id="current-password" type="password" name="current-password" required>
                                        <label for="current-password">Current Password</label>
                                    </div>

                                    <div class="input-box"> 
                                        <span class="icon"><i class='bx bxs-lock-open-alt'></i></span>
                                        <input id="new-password" type="password" name="new-password" required>
                                        <label for="new-password">New Password</label>
                                    </div>

                                    <div class="input-box"> 
                                        <span class="icon"><i class='bx bx-lock-open-alt'></i></span>
                                        <input id="confirm-new-password" type="password" name="confirm-new-password" required>
                                        <label for="confirm-new-password">Confirm New Password</label>
                                    </div>

                                    <input class="btn-sign-in" type="submit" value="Change Password">
                                </form>
                            </div>-->

                        </div> 
                    </div> 

        </div>
    </main> 
    <footer class="footer">
        <div class="footer-content"></div>
    </footer>
</body>

</html>
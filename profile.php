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
            <h2>User Profile</h2>
            <div class="info-box">
            <form method="post" action="profile.php">
                <h4>General information</h4>

                <div class="">
                    <span class="icon"><i class='bx bxs-user-detail'></i></span>
                    <input id="fullname" type="text" name="fullname" value="fullname" required>
                    <label for="fullname">Fullname</label>
                </div>

                <div class=""> 
                    <span class="icon"><i class='bx bxs-user'></i></span>
                    <input id="username" type="text" name="username" value="username" required>
                    <label for="username">Username</label>
                </div>

                <div class=""> 
                    <span class="icon"><i class='bx bx-envelope'></i></span>
                    <input id="email" type="text" name="email" value="email" required>
                    <label for="email">Email</label>
                </div>

                <button type="submit">Save Changes</button>

                <div class="">
                    <a href="">Change Password</a>
                </div>
            </form>
            </div>

            <div class="info-box">
            <form method="post" action="profile.php">
                <h4>Change password</h4>

                <div class="">
                    <span class="icon"><i class='bx bxs-lock-alt'></i></span>
                    <input id="current-password" type="password" name="current-password" required>
                    <label for="current-password">Current Password</label>
                </div>

                <div class=""> 
                <span class="icon"><i class='bx bxs-lock-open-alt'></i></span>
                    <input id="new-password" type="password" name="new-password" required>
                    <label for="new-password">New Password</label>
                </div>

                <div class=""> 
                <span class="icon"><i class='bx bx-lock-open-alt'></i></span>
                    <input id="confirm-new-password" type="password" name="confirm-new-password" required>
                    <label for="confirm-new-password">Confirm New Password</label>
                </div>

                <button type="submit">Change Password</button>

                <div class="">
                    <a href="">Return to General</a>
                </div>
            </form>
            </div>
        </div>
    </main> 
    <footer class="footer">
        <div class="footer-content"></div>
    </footer>
</body>

</html>
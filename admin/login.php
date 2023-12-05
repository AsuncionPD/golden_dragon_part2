<?php



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;900&display=swap"rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mooli&display=swap" rel="stylesheet">
    <!-- google fonts -->
    <!-- icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- icons -->
    <link rel="stylesheet" href="../css/main.css">
</head>

<body>
    <header>
    <div class="top-page">
    <div class="img-logo"></div>
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
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(isset($_SESSION["isLoggedIn"])){
            echo "<span class='login-icon'><i class='bx bxs-user-circle'></i></span>";
            echo "<li><a class='nav-list-link' href='./profile.php'>".$_SESSION["fullname"]."</a></li>";
            echo "<li><a class='nav-list-link' href='./backend/logout.php'>Logout</a></li>";
            }else{
            echo "<li><a class='nav-list-link' href='./login.php'>Admin</a></li>";
            }
         ?>
    </ul>
</nav>
    </header>
    <main class="main-content">
        <div class="login-container-admin">
            <!--<div class="text-content"></div>-->
            <div class="text-sci">
                <h1>Happy to see you again<br><span>Admin</span></h1>
                <p>Log in to continue helping us building this restaurant.</p>
            </div>
        <div class="logreg-box-admin">
            <div class="form-box-admin">
                <form method="post" action="forms.php">
                        <h2>Login</h2>
                        <div class="input-box">
                            <span class="icon"><i class='bx bxs-user'></i></span>
                            <input id="username" type="text" name="username" required>
                            <label for="username">Username</label>
                        </div>

                        <div class="input-box">
                            <span class="icon"><i class='bx bxs-lock-alt'></i></span>
                            <input id="password" type="password" name="password" required>
                            <label for="password">Password</label>
                        </div>

                        <input class="btn-sign-in" type="submit" value="Login">

                        <!--<p>va un mensaje</p>-->
                        <input type="hidden" name="login" value="1">
                    </form>
                </div>
            </div>
         </div>
        </div>
    </main>
    <footer class="footer">
        <div class="footer-content"></div>
    </footer>

   <script src="js/forms.js"></script>

</body>

</html>
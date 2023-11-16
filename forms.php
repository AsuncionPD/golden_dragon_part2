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
                <li><a class="nav-list-link" href="#">Home</a></li>
                <li><a class="nav-list-link" href="#">About</a></li>
                <li><a class="nav-list-link" href="#">Menu</a></li>
                <li><a class="nav-list-link" href="#">Contact</a></li>
                <li><a class="nav-list-link" href="#">Login</a></li>
            </ul>
        </nav>
    </header>
    <main class="main-content">

        <div class="login-container">
            <div class="text-content"></div>

            <div class="text-sci">
                <h1>Welcome!<br><span>To our restaurant.</span></h1>
                <p>Log in to continue your culinary journey.</p>
            </div>

        <div class="logreg-box">
            <div class="form-box login">
                <form action="#">
                        <h2>Sign In</h2>
                        <div class="input-box">
                            <span class="icon"><i class='bx bx-envelope'></i></span>
                            <input id="email" type="email" required>
                            <label for="email">Email</label>
                        </div>

                        <div class="input-box">
                            <span class="icon"><i class='bx bxs-lock-alt'></i></span>
                            <input id="pwd" type="password" required>
                            <label for="pwd">Password</label>
                        </div>

                        <div class="remember-forgot">
                            <label><input type="checkbox">Remember me</label>
                            <a href="#">Forgot password?</a>
                        </div>

                        <button class="btn-sign-in" type="submit">Sign In</button>

                        <div class="login-register">
                            <p>Don't have an account? <a href="javascript:void(0)" class="register-link">Sing Up</a></p>
                        </div>
                    </form>
                </div>

                <div class="form-box register">
                <form action="#">
                        <h2>Sign Up</h2>

                        <div class="input-box">
                            <span class="icon"><i class='bx bxs-user'></i></span>
                            <input id="email" type="text" required>
                            <label for="email">Name</label>
                        </div>

                        <div class="input-box">
                            <span class="icon"><i class='bx bx-envelope'></i></span>
                            <input id="email" type="email" required>
                            <label for="email">Email</label>
                        </div>

                        <div class="input-box">
                            <span class="icon"><i class='bx bxs-lock-alt'></i></span>
                            <input id="pwd" type="password" required>
                            <label for="pwd">Password</label>
                        </div>

                        <div class="remember-forgot">
                            <label><input type="checkbox">I agree to the terms & conditions</label>
                        </div>

                        <button class="btn-sign-in" type="submit">Sign Up</button>

                        <div class="login-register">
                            <p>Already have an account? <a href="javascript:void(0)" class="login-link">Sing In</a></p>
                        </div>
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
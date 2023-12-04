<?php

require_once 'backend/database.php';
    $message = "";

    if($_POST){

        if(isset($_POST["login"])){

            $user = $database->select("tb_users","*",[
                "usr"=> $_POST["username"]
            ]);

            if(count($user) > 0){
                //validate password
                if(password_verify($_POST["password"], $user[0]["pwd"])){
                    session_start();
                    $_SESSION["isLoggedIn"] = true;
                    $_SESSION["fullname"] = $user[0]["fullname"];
                    $_SESSION["id_user"] = $user[0]["id_users"]; 
                    //var_dump($_SESSION["id_user"]);
                    if(isset($_COOKIE['dishes'])){
                        header("location: cart.php");
                    }else{
                        header("location: index.php");
                    }
                }else{
                    $message = "wrong username or password";
                }
            }else{
                $message = "wrong username or password";
            }

        }

        if(isset($_POST["register"])){
            //validate if user already registered
            $validateUsername = $database->select("tb_users","*",[
                "usr"=>$_POST["username"]
            ]);

            if(count($validateUsername) > 0){
                $message = "This username is already registered";
            }else{

                $pass = password_hash($_POST["password"], PASSWORD_DEFAULT, ['cost' => 12]);

                $database->insert("tb_users",[
                    "fullname"=> $_POST["fullname"],
                    "usr"=> $_POST["username"],
                    "pwd"=> $pass,
                    "email"=> $_POST["email"]
                ]);

            }
        }
    }

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
            <!--<div class="text-content"></div>-->
            <div class="text-sci">
                <h1>Welcome!<br><span>To our restaurant.</span></h1>
                <p>Log in to continue your culinary journey.</p>
            </div>
        <div class="logreg-box">
            <div class="form-box login">
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

                        <div class="remember-forgot">
                            <label><input type="checkbox">Remember me</label>
                            <a href="#">Forgot password?</a>
                        </div>

                        <input class="btn-sign-in" type="submit" value="Login">

                        <div class="login-register">
                            <p>Don't have an account? <a href="javascript:void(0)" class="register-link">Sing In</a></p>
                        </div>
                        <p><?php echo $message; ?></p>
                        <input type="hidden" name="login" value="1">
                    </form>
                </div>

                <div class="form-box register">
                    <form method="post" action="forms.php">
                        <h2>Sign In</h2>

                        <div class="input-box">
                            <span class="icon"><i class='bx bxs-user-detail'></i></span>
                            <input id="fullname" type="text" name="fullname" required>
                            <label for="fullname">Fullname</label>
                        </div>

                        <div class="input-box">
                            <span class="icon"><i class='bx bxs-user'></i></span>
                            <input id="username" type="text" name="username" required>
                            <label for="username">Username</label>
                        </div>

                        <div class="input-box">
                            <span class="icon"><i class='bx bx-envelope'></i></span>
                            <input id="email" type="email" name="email" required>
                            <label for="email">Email</label>
                        </div>

                        <div class="input-box">
                            <span class="icon"><i class='bx bxs-lock-alt'></i></span>
                            <input id="password" type="password" name="password" required>
                            <label for="password">Password</label>
                        </div>

                        <div class="remember-forgot">
                            <label><input type="checkbox">I agree to the terms & conditions</label>
                        </div>

                        <input class="btn-sign-in" type="submit" value="Register">

                        <div class="login-register">
                            <p>Already have an account? <a href="javascript:void(0)" class="login-link">Login</a></p>
                        </div>
                        <p><?php echo $message; ?></p>
                        <input type="hidden" name="register" value="1">
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
<?php

require_once '../backend/database.php';
    $message = "";

    if($_POST){

        if(isset($_POST["register"])){
            //validate if user already registered
            $validateUsername = $database->select("tb_admin_users","*",[
                "admin_usr"=> $_POST["username"]
            ]);

            if(count($validateUsername) > 0){
                $message = "This username is already registered";
            }else{

                $pass = password_hash($_POST["password"], PASSWORD_DEFAULT, ['cost' => 12]);

                $database->insert("tb_admin_users",[
                    "admin_usr"=> $_POST["username"],
                    "admin_pwd"=> $pass,
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
    <title>Login</title>
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
            echo "<li><a class='nav-list-link' href='list-dishes.php'>Back</a></li>";
         ?>
    </ul>
    </nav>
    </header>
    <main class="main-content">
        <div class="signIn-container">
            <!--<div class="text-content"></div>-->
            <div class="text-sci">
                <h1>Create a new session<br><span style="color: red";>Warning:</span></h1>
                <p style="color: red";>Only admins can create new sessions. If you are not an authorized admin, please stop.</p>
            </div>
        <div class="logreg-box-signIn">
            <div class="form-box-signIn">
                <form method="post" action="sign-in.php">
                        <h2>Sing in</h2>
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

                        <input class="btn-sign-in" type="submit" value="Register">
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
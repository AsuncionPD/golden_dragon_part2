<?php

require_once './backend/database.php';

    $message = "";
    $id_user = 0; 
    
    //Sent
    if($_POST && isset($_POST['Change'])) {
        
        $user = $database->select("tb_users","*",[
            "email"=> $_POST["email"]
        ]);

        if(!empty($user)){

            $id_user = $user[0]["id_users"];

            $new_password = $_POST["new-password"];
            $confirm_new_password = $_POST["confirm-new-password"];

            if ($new_password !== $confirm_new_password) {
                $message = "The passwords do not match";
            } else {

            $new_pwd = password_hash($new_password, PASSWORD_DEFAULT, ['cost' => 12]);

            $database->update("tb_users", [
                "pwd" => $new_pwd
            ], [
                "id_users" => $id_user
            ]);

            $message = "Excellent! The password was change";

            }

        }else{

            $message = "The e-mail does not exist";

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
    <link rel="stylesheet" href="./css/main.css">
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
            echo "<li><a class='nav-list-link' href='forms.php'>Return to Login</a></li>";
         ?>
    </ul>
    </nav>
    </header>
    <main class="main-content">
        <div class="forget-container">
            <!--<div class="text-content"></div>-->
            <div class="text-sci">
                <h1>If you have forgotten your password<br><span>You just need</span></h1>
                <p>Write your email and you could change the password.</p>
            </div>
        <div class="logreg-box-forget">
            <div class="form-box-forget">
            <form method="post" action="forget-psw.php">
                 <?php
                if (isset($_POST['Change'])) {

                    echo $message;
                    
                } else {
                        echo "<h2>Email address</h2>"
                        . "<div class='input-box'>"
                        . "<span class='icon'><i class='bx bxs-user'></i></span>"
                        . "<input id='mail' type='text' name='email' required>"
                        . "<label for='email'>Email</label>"
                        . "</div>"

                        ."<div class='input-box'>"
                        . "<span class='icon'><i class='bx bxs-lock-open-alt'></i></span>"
                        . "<input id='new-password' type='password' name='new-password' required>"
                        . "<label for='new-password'>New Password</label>"
                        . "</div>"

                        . "<div class='input-box'>"
                        . "<span class='icon'><i class='bx bx-lock-open-alt'></i></span>"
                        . "<input id='confirm-new-password' type='password' name='confirm-new-password' required>"
                        . "<label for='confirm-new-password'>Confirm New Password</label>"
                        . "</div>"

                        . "<input class='btn-sign-in' type='submit' value='Change'>"
                        . "<p>" . $message . "</p>"
                        . "<input type='hidden' name='Change' value='1'>";
                } 
                ?>
                </form>
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
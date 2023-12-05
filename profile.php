<?php

require_once 'backend/database.php';
$message = "";

session_start();

if(isset($_SESSION["isLoggedIn"])){

    $user = $database->select("tb_users","*",[

        "id_users" => $_SESSION["id_user"]

    ]);
    
    //User information 
    if ($user) {

        $fullname = $user[0]["fullname"];
        $username = $user[0]["usr"];
        $email = $user[0]["email"];
        $password = $user[0]["pwd"];

    }
}

if ($_POST) {

    if (isset($_POST["change_password"])) {

        $current_password = $_POST["current-password"];
        $new_password = $_POST["new-password"];
        $confirm_new_password = $_POST["confirm-new-password"];

        if (!password_verify($current_password, $password)) {
            $message = "The current password is incorrect";
        } elseif ($new_password !== $confirm_new_password) {
            $message = "The passwords do not match";
        } else {
     
            $new_pwd = password_hash($new_password, PASSWORD_DEFAULT, ['cost' => 12]);

            $database->update("tb_users", [
                "pwd" => $new_pwd
            ], [
                "id_users" => $_SESSION["id_user"]
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
        <?php
        include "./parts/top-nav.php";
        ?>
    </header>

    <main class="main-content">
        <div class="profile-container">
                <h1>User Profile</h1>
                <div class="info-box">
                    <div class="list-group">
                        <a class="list-group-item general-link"
                        href="javascript:void(0)">General</a>
                        <a class="list-group-item change-password-link"
                        href="javascript:void(0)">Change password</a>
                        <a class="list-group-item change-password-link"
                        href="historial.php">Orders Historial</a>
                    </div>
                    <div class="tab-content">
                        <div class="form-box general" id="general">
                            <form method="post" action="profile.php">
                                <div class="input-box">
                                    <span class="icon"><i class='bx bxs-user-detail'></i></span>
                                    <input id="fullname" type="text" name="fullname" value="<?php echo $fullname;?>" required>
                                    <label for="fullname">Fullname</label>
                                </div>

                                <div class="input-box"> 
                                    <span class="icon"><i class='bx bxs-user'></i></span>
                                    <input id="username" type="text" name="username"  value="<?php echo $username;?>" required>
                                    <label for="username">Username</label>
                                </div>

                                <div class="input-box"> 
                                    <span class="icon"><i class='bx bx-envelope'></i></span>
                                    <input id="email" type="text" name="email" value="<?php echo $email;?>" required>
                                    <label for="email">Email</label>
                                </div>

                            </form>
                        </div>

                        <div class="form-box change-password" id="change-password">
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
                                <p><?php echo $message; ?></p>
                                <input type="hidden" name="change_password" value="1">
                            </form>
                        </div>
                    </div> 
                </div>
         </div>
    </main> 
    <footer class="footer">
        <div class="footer-content"></div>
    </footer>

    <script src="js/profile.js"></script>
    
</body>

</html>
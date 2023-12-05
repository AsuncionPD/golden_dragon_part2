<?php
require_once '../backend/database.php';
$items = $database->select("tb_dishes", "*");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Dishes</title>
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mooli&display=swap" rel="stylesheet">
    <!-- google fonts -->
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/themes/admin.css">

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
                        echo "<li><a class='nav-list-link' href=''>".$_SESSION["fullname"]."</a></li>";
                        echo "<li><a class='nav-list-link' href='../backend/logout.php'>Logout</a></li>";
                        }else{
                        echo "<li><a class='nav-list-link' href='./login.php'>Login</a></li>";
                        }
                    ?>
                    <li><a class="nav-list-link" href="sign-in.php">Sign in</a></li>
                    <li><a class="nav-list-link" href="../index.php">Home</a></li>
                    <li><a class="nav-list-link" href="#">About</a></li>
                    <li><a class="nav-list-link" href="#">Contact</a></li>
                    <li><a class="nav-list-link" href="../search.php">Search</a></li>
                    <li><a class="nav-list-link" href="../cart.php" id="cartIcon">Cart</a></li>
                </ul>
            </nav>
    </header>
    <p style="text-align: center;">Note: Cart and Profile will not display user information because you are in admin functionality.</p>
    <h1 class="title">Registered Dishes</h1>
    <table>
        <thead>
            <tr>
                <th>Dish Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($items as $item) {
                echo "<tr>";
                echo "<td>" . $item["dish_name"] . "</td>";
                echo "<td>" . $item["dish_description"] . "</td>";
                echo "<td>" . $item["dish_price"] . "</td>";
                echo "<td><a class='links' href='edit-dish.php?id_dish=" . $item["id_dish"] . "'>Edit</a> <a class='links' href='delete-dish.php?id_dish=" . $item["id_dish"] . "'>Delete</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <footer class="footer">
        <div class="footer-content"></div>
    </footer>
    <script>
</body>

</html>
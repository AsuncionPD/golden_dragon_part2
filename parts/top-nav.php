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
            echo "<li><a class='nav-list-link' href='./forms.php'>Login</a></li>";
            }
         ?>
        <li><a class="nav-list-link" href="#">Home</a></li>
        <li><a class="nav-list-link" href="#">About</a></li>
        <li><a class="nav-list-link" href="#">Menu</a></li>
        <li><a class="nav-list-link" href="#">Contact</a></li>
        <li><a class="nav-list-link" href="cart.php" id="cartIcon"><span class="icon"><i class='bx bxs-cart-alt'></i></span></a></li>
    </ul>
</nav>
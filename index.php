<?php
require_once './backend/database.php';
// Reference: https://medoo.in/api/select
$typeDishId = 1;
$feature = $database->get("tb_type_dish", "*", ["id_type_dish" => $typeDishId]);

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
        <section class="hero-container home-page-bg">
            <h1 class="hero-title">The authentic flavors of China</h1>
            <p class="hero-subtitle">Every dish is a journey to the heart of the Middle Kingdom</p>
        </section>
    </header>

    <main>
        <!--options-->
        <section class="container">
            <div class="categories-container">
                <button class="category" onclick="redirectPage('starters.php')">
                    <img class="vector-img" src="imgs/vector-starters.png" alt="vector-starters">
                    <p class="font-options">Starters</p>
                </button>

                <button class="category" onclick="redirectPage('main-courses.php')">
                    <img class="vector-img" src="imgs/vector-main_course.png" alt="vector-main_course">
                    <p class="font-options">Main Courses</p>
                </button>

                <button class="category" onclick="redirectPage('desserts.php')">
                    <img class="vector-img" src="imgs/vector-desserts.png" alt="vector-desserts">
                    <p class="font-options">Desserts</p>
                </button>

                <button class="category" onclick="redirectPage('drinks.php')">
                    <img class="vector-img" src="imgs/vector-drinks.png" alt="vector-drinks">
                    <p class="font-options">Drinks</p>
                </button>
            </div>
        </section>
        <!--options-->

        <!--space-->
        <img class="img-in-the-middle" src="imgs/space-bg.png" alt="secong_img-home_page">
        <!--space-->

        <!--featured dishes-->
        <section class="container">
         <h1 class="featured-dishes-title">Featured dishes</h1>

            <?php
            echo "<div class='dishes-container'>";

            $items = $database->select("tb_dishes", [
                "[>]tb_type_dish" => ["id_type_dish" => "id_type_dish"]
            ], [
                "tb_dishes.id_dish",
                "tb_dishes.dish_name",
                "tb_dishes.dish_description",
                "tb_dishes.dish_image",
                "tb_dishes.dish_price",
            ], [
                "tb_dishes.id_type_dish" => $typeDishId,
                "LIMIT" => 10
            ]);

            foreach ($items as $item) {
                echo "<section class='dish'>";
                echo "<div class='img-container'>";
                echo "<img class='dish-img' src='./imgs/" . $item["dish_image"] . "' alt='" . $item["dish_name"] . "'>";
                echo "</div>";
                echo "<section class='padding'>";
                echo "<h2 class='price dish-title'>" . $item["dish_price"] . "</h2>";
                echo "<h3 class='dish-title'>" . $item["dish_name"] . "</h3>";
                echo "<p class='dish-description'>" . substr($item["dish_description"], 0, 70) . "...</p>";
                echo "<a class='btn' href='dish.php?id=" . $item["id_dish"] . "'>See more</a>";
                echo "</section>";
                echo "</section>";
            }
            echo "</div>";

            ?>

            </div>
        </section>
    </main>

    <!--footer-->
    <?php
    include "./parts/footer.php";
    ?>

    <script>
    function redirectPage(url) {
        window.location.href = url;
    }
    </script>

</body>

</html>
<?php
require_once './backend/database.php';
// Reference: https://medoo.in/api/select
$categoryId = 1;
$category = $database->get("tb_dish_category", "*", ["id_dish_category" => $categoryId]);

//$categories = $database->select("tb_dish_category","*");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Starters</title>
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mooli&display=swap" rel="stylesheet">
    <!-- google fonts -->
    <link rel="stylesheet" href="./css/main.css">

</head>

<body>
    <header>
        <?php
        include "./parts/top-nav.php";
        ?>
        
        <section class="hero-container starters-bg">
            <h1 class="hero-title">Starters</h1>
        </section>
    </header>

    <main>
        <!--menu-->
        <section class="container">
            <?php
            echo "<div class='dishes-container'>";

            $items = $database->select("tb_dishes", [
                "[>]tb_dish_category" => ["id_dish_category" => "id_dish_category"]
            ], [
                "tb_dishes.id_dish",
                "tb_dishes.dish_name",
                "tb_dishes.dish_description",
                "tb_dishes.dish_image",
                "tb_dishes.dish_price",
                "tb_dish_category.dish_category_name",
                "tb_dish_category.dish_category_description"
            ], [
                "tb_dishes.id_dish_category" => $categoryId
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

</body>

</html>
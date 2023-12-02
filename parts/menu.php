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
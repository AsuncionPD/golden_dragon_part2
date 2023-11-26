<?php

require_once '../backend/database.php';

$categories = $database->select("tb_dish_category", "*");

$people_categories = $database->select("tb_category_number_people", "*");

$message = "";

if (isset($_GET)) {
    $item = $database->select("tb_dishes", [
        "[>]tb_category_number_people" => ["id_category_people" => "id_category_people"],
        "[>]tb_dish_category" => ["id_dish_category" => "id_dish_category"]
    ], [
        "tb_dishes.id_dish",
        "tb_dishes.dish_name",
        "tb_dishes.dish_name_chi",
        "tb_dishes.dish_description",
        "tb_dishes.dish_description_chi",
        "tb_dishes.dish_image",
        "tb_dishes.dish_price",
        "tb_category_number_people.id_category_people",
        "tb_category_number_people.category_people_name",
        "tb_category_number_people.category_people_description",
        "tb_dish_category.id_dish_category",
        "tb_dish_category.dish_category_name",
        "tb_dish_category.dish_category_description",
    ], [
        "id_dish" => $_GET["id_dish"]
    ]);
}

if ($_POST) {
    //var_dump($_POST);
    $data = $database->delete("tb_dishes", [
        "id_dish" => $_POST["id"]
    ]);

    header("location: list-dishes.php");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Dish</title>
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
    <div class="admin-container">
        <h2>Delete Dish</h2>
        <?php
        echo $message;
        ?>

        <form method="post" action="delete-dish.php" enctype="multipart/form-data">
            <div class="form-items">
                <label for="dish_name">Dish Name</label>
                <input id="dish_name" class="textfield" name="dish_name" type="text" 
                value="<?php echo $item[0]["dish_name"] ?>" disabled>
            </div>

            <div class="form-items">
                <label for="dish_name_chi">Dish Name Chinese</label>
                <input id="dish_name_chi" class="textfield" name="dish_name_chi" type="text" 
                value="<?php echo $item[0]["dish_name_chi"] ?>" disabled>
            </div>

            <div class="form-items">
                <label for="dish_category">Dish Category</label>
                <select name="dish_category" id="dish_category" disabled>
                    <?php
                    foreach ($categories as $category) {
                        if ($item[0]["id_dish_category"] == $category["id_dish_category"]) {
                            echo "<option value='" . $category["id_dish_category"] . "' selected>" . $category["dish_category_name"] . "</option>";
                        } else {
                            echo "<option value='" . $category["id_dish_category"] . "'>" . $category["dish_category_name"] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>

            <div class="form-items">
                <label for="people_category">People Category</label>
                <select name="people_category" id="people_category" disabled>
                    <?php
                    foreach ($people_categories as $people_category) {
                        if ($item[0]["id_category_people"] == $people_category["id_category_people"]) {
                            echo "<option value='" . $people_category["id_category_people"] . "' selected>" . $people_category["category_people_name"] . "</option>";
                        }else{
                            echo "<option value='" . $people_category["id_category_people"] . "'>" . $people_category["category_people_name"] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>

            <div class="form-items">
                <label for="dish_description">Dish Description</label>
                <textarea id="dish_description" name="dish_description" id="" cols="30" rows="10" disabled>
                <?php echo $item[0]["dish_description"] ?></textarea>
            </div>

            <div class="form-items">
                <label for="dish_description_chi">Dish Description Chinese</label>
                <textarea id="dish_description_chi" name="dish_description_chi" id="" cols="30" rows="10" disabled>
                <?php echo $item[0]["dish_description_chi"] ?></textarea>
            </div>

            <div class="form-items">
                <label for="dish_image">Dish Image</label>
                <img id="preview" src="../imgs/<?php echo $item[0]["dish_image"]; ?>" alt="Preview">
            </div>

            <div class="form-items">
                <label for="dish_price">Dish Price</label>
                <input id="dish_price" class="textfield" name="dish_price" type="text" 
                value="<?php echo $item[0]["dish_price"] ?>" disabled>
            </div>

            <input type="hidden" name="id" value="<?php echo $item[0]["id_dish"]; ?>">

            <div class="form-items">
            <h3>You're sure to delete this destination</h3>
                <input class="submit-btn" type="button" onclick="history.back();" value="Cancel">
            
                <input class="submit-btn" type="submit" value="Delete">

            </div>
            
        
            
        </form>
    </div>

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();

                reader.onload = function(e) {
                    let preview = document.getElementById('preview').setAttribute('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

</body>

</html>
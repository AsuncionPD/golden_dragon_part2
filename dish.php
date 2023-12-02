<?php
require_once './backend/database.php';

$link = "";
$url_params = "";
$lang = "";


if ($_GET) {

    if(isset($_GET["lang"]) && $_GET["lang"] == "tr"){

    $item = $database->select("tb_dishes", [
        "[>]tb_category_number_people" => ["id_category_people" => "id_category_people"],
        "[>]tb_dish_category" => ["id_dish_category" => "id_dish_category"]
    ], [
        "tb_dishes.id_dish",
        "tb_dishes.dish_name_chi",
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
        "id_dish" => $_GET["id"]
    ]);

    $item[0]["dish_name"] = $item[0]["dish_name_chi"];
    $item[0]["dish_description"] = $item[0]["dish_description_chi"];

    $url_params = "id=".$item[0]["id_dish"];
    $lang = "EN";

    }else{

        $item = $database->select("tb_dishes", [
            "[>]tb_category_number_people" => ["id_category_people" => "id_category_people"],
            "[>]tb_dish_category" => ["id_dish_category" => "id_dish_category"]
        ], [
            "tb_dishes.id_dish",
            "tb_dishes.dish_name",
            "tb_dishes.dish_description",
            "tb_dishes.dish_image",
            "tb_dishes.dish_price",
            "tb_category_number_people.id_category_people",
            "tb_category_number_people.category_people_name",
            "tb_category_number_people.category_people_description",
            "tb_dish_category.id_dish_category",
            "tb_dish_category.dish_category_name",
            "tb_dish_category.dish_category_description",
        ], [
            "id_dish" => $_GET["id"]
        ]);
    
        $url_params = "id=".$item[0]["id_dish"]."&lang=chi";
        $lang = "CHI";
    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dish Information</title>
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;900&display=swap"rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mooli&display=swap" rel="stylesheet">
    <!-- google fonts -->
    <link rel="stylesheet" href="./css/main.css">
</head>

<body>
    <header>
        <div class="top-page">
            <div class="img-logo" ></div>
    </header>
    <main class="main-content">   
        <div class="dish-container">

            <?php
            echo "<img class='img-dish' src='./imgs/" . $item[0]["dish_image"] . "' alt='" . $item[0]["dish_name"] . "'>";
            echo "<div class='dish-information'>";

                echo "<span id='lang' class='lang-btn' onclick='getTranslation(".$item[0]["id_dish"].")'>CHI</span>";

                echo "<h2 class='dish-name'><span id='dish-name'>" . $item[0]["dish_name"] . "</h2>";
                echo "<p id='dish-description' class='description'>" . $item[0]["dish_description"] . "</p>";
                echo "<button class='star-btn'><img class='img-star' src='./imgs/empty-star.png' alt='empty-star'></button>";
                echo "<div class='dish-caracteristics'>";
                    echo "<div>";
                    echo "<h3 class='margin-details'>Category</h3>";
                    echo "<p class='margin-text'>".$item[0]["dish_category_name"]."</p>";
                    echo "</div>";

                    echo "<div class='divider'></div>";

                    echo "<div>";
                    echo "<h3 class='margin-details'>Dish for</h3>";
                    echo "<p class='margin-text'>".$item[0]["category_people_description"]."</p>";
                    echo "</div>";                    

                    echo "<div class='divider'></div>";

                    echo "<div>";
                    echo "<h3 class='margin-details'>Price</h3>";
                    echo "<p class='margin-text'>".$item[0]["dish_price"]."</p>";
                    echo "</div>";  
                echo "</div>";  

                echo "<h3>Realeted Dishes</h3>";
                echo "<div class='imgs-related-container'>";
                    echo "<img class='img-related' src='./imgs/pork-chive.png' alt='pork-chive'>";
                    echo "<img class='img-related' src='./imgs/spring-rolls.png' alt='spring-rolls'>";
                    echo "<img class='img-related' src='./imgs/cucumber-salad.png' alt='cucumber-salad'>";
                echo "</div>"; 

                echo "<input type='submit' class='cart-btn' id='openModalBook' value='Select'>";

            echo "</div>";
            ?>  


            <div id="modalBook" class="modal">
            <div class="book-content">
                <span class="close">&times;</span>
                <div class="form-box-book select-container">
                <form method="post" action="cart.php">
                <h2>Select the options</h2>

                <div class="quantity-container">
                    <div>
                        <label class="" for="quantity"><h3>Quantity</h3></label>
                    </div>
                    <div>
                        <button id="decrease" class="quantity-button">-</button>
                        <input id="quantity" type="number" name="quantity" min="1" max="10" value="0"> 
                        <button id="increase" class="quantity-button">+</button>
                    </div>
                </div>

                <div class="select-container">
                 <h3>Category</h3>
                    <div class="select-radio">
                    <div>
                        <input type="radio" id="individual" name="dish-type" value="individual">
                        <label for="individual">Individual</label>
                    </div>
                    <div>
                        <input type="radio" id="couples" name="dish-type" value="couples">
                        <label for="couples">Couples</label>
                    </div>
                    <div>
                        <input type="radio" id="family" name="dish-type" value="family">
                        <label for="family">Family</label>
                    </div>
                    </div>
                </div>

                <div class="select-container">
                    <h3>Order type</h3>
                    <div class="select-radio">
                    <div>
                        <input type="radio" id="diningIn" name="eating-style" value="diningIn">
                        <label for="diningIn">Dining In</label>
                    </div>
                    <div>
                        <input type="radio" id="express" name="eating-style" value="express">
                        <label for="express">Express</label>
                    </div>
                    <div>
                        <input type="radio" id="takeout" name="eating-style" value="takeout">
                        <label for="takeout">Takeout</label>
                    </div>
                    </div>
                </div>

                <input class="cart-btn wine-color" type="submit" value="Add to cart">

                </form>
                </div>
            </div>
            </div>

        </div>
    </main>
    <footer class="footer">
        <div class="footer-content"></div>
    </footer>

    <script src="js/book.js"></script>
    <script src="js/btn-qty.js"></script>
    
    <script>

        let requestLang = "CHI";

        function switchLang(){
            if(requestLang == "EN") requestLang = "CHI";
            else requestLang = "EN";
            document.getElementById("lang").innerText = requestLang;
        }

        function getTranslation(id){
        
            let info = {
                id_dish: id,
                language: requestLang
            };

            //fetch 
            fetch("http://localhost/golden_dragon_part2/language.php",{
                method: "POST",
                mode: "same-origin",
                credentials: "same-origin",
                headers:{
                    'Accept': 'application/json, text/plain, */*',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(info)
            })
            .then(response => response.json())
            .then(data => {
                switchLang();
                document.getElementById("dish-name").innerText = data.name;
                document.getElementById("dish-description").innerText = data.description;
            })
            .catch(err => console.log("error: "+ err));
        }
    </script>
</body>

</html>
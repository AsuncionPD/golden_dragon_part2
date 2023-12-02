<?php
    require_once './backend/database.php';
    // Reference: https://medoo.in/api/select
    $items = $database->select("tb_dishes","*");

    // Reference: https://medoo.in/api/select
    $categories = $database->select("tb_dish_category","*");

    // Reference: https://medoo.in/api/select
    $people_categories = $database->select("tb_category_number_people","*");
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Golden Dragon</title>
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
        <section class="hero-container home-page-bg">
            <h1 class="hero-title">The authentic flavors of China</h1>
            <p class="hero-subtitle">Every dish is a journey to the heart of the Middle Kingdom</p>
        </section>
    </header>
        
        <!-- destinations -->
        <section id="dishes" class="container">
            <div class="dishes-container">
          
                <form>
                    <select name="dish_category" id="dish_category" class="search">
                    <?php 
                        foreach ($categories as $category) {
                            echo "<option value='" . $category["id_dish_category"] . "'>" . $category["dish_category_name"] . "</
                            option>";
                        }
                    ?>
                    </select>

                    <select name="people_category" id="people_category" class="search">
                    <?php
                    foreach ($people_categories as $people_category) {
                        echo "<option value='" . $people_category["id_category_people"] . "'>" . $people_category["category_people_name"] . "</option>";
                    }
                    ?>
                    </select>

                    <input id="search" type="button" class="btn-search" value="Search" onclick="getFilters()">
                </form>            
            </div>

            <p id='found' class='dish-title'></p>
        </section>

    </main>

    <?php
        include "./parts/footer.php";
    ?>

    <script>

        function getFilters(){

            let info = {
                category: document.getElementById("dish_category").value,
                people_category: document.getElementById("people_category").value
            };

            //fetch
            fetch("http://localhost/golden_dragon_part2/response.php", {
                method: "POST",
                mode: "same-origin",
                credentials: "same-origin",
                headers: {
                    'Accept': 'application/json, text/plain, */*',
                    'Content-Type': "application/json"
                },
                body: JSON.stringify(info)
            })
            .then(response => response.json())
            .then(data => {
                //console.log(data);

                let found = document.getElementById("found");
                found.innerText = "We found: " + data.length + " dish(s)";

                if(document.getElementById("items") !== null) document.getElementById("items").remove();

                if(data.length > 0){
                    
                    let container = document.createElement("div");
                    container.setAttribute("id", "items");
                    container.classList.add("dishes-container");
                    document.getElementById("dishes").appendChild(container);
                    
                    data.forEach(function(item) {

                        let dish = document.createElement("section");
                        dish.classList.add("dish");
                        container.appendChild(dish);

                        //div imgContainer
                        let imgContainer = document.createElement("div");
                        imgContainer.classList.add("img-container");
                        dish.appendChild(imgContainer);

                        //create image
                        let image = document.createElement("img");
                        image.classList.add("dish-img");
                        image.setAttribute("src", './imgs/'+item.dish_image);
                        image.setAttribute("alt", item.dish_name);
                        imgContainer.appendChild(image);

                        //section dishInfo
                        let dishInfo = document.createElement("section");
                        dishInfo.classList.add("padding");
                        dish.appendChild(dishInfo);
                        
                        //price
                        let price = document.createElement("h2");
                        price.classList.add("price");
                        price.classList.add("dish-title");
                        price.innerText = item.dish_price;
                        dishInfo.appendChild(price);

                        //title
                        let title = document.createElement("h3");
                        title.classList.add("dish-title");
                        title.innerText = item.dish_name;
                        dishInfo.appendChild(title);
                        
                        //description
                        let description = document.createElement("p");
                        description.classList.add("dish-description");
                        description.innerText = item.dish_description.substr(1,70) + "...";
                        dishInfo.appendChild(description);

                        //link
                        let link = document.createElement("a");
                        link.classList.add("btn");
                        link.setAttribute("href", "dish.php?id="+item.id_dish);
                        link.innerText = "See more";
                        dishInfo.appendChild(link);
                    });
                }
                
            })
            .catch(err => console.log("error: " + err));

        }
    </script>
</body>
</html>
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
                <button class="category">
                    <img class="vector-img" src="imgs/vector-starters.png" alt="vector-starters">
                    <p class="font-options">Starters</p>
                </button>

                <button class="category">
                    <img class="vector-img" src="imgs/vector-main_course.png" alt="vector-main_course">
                    <p class="font-options">Main Courses</p>
                </button>

                <button class="category">
                    <img class="vector-img" src="imgs/vector-desserts.png" alt="vector-desserts">
                    <p class="font-options">Desserts</p>
                </button>

                <button class="category">
                    <img class="vector-img" src="imgs/vector-drinks.png" alt="vector-drinks">
                    <p class="font-options">Drinks</p>
                </button>
            </div>
        </section>
        <!--options-->

        <!--space-->
        <img class="img-in-the-middle" src="imgs/space-bg.png" alt="secong_img-home_page">
        <!--space-->

        <!--menu-->
        <section class="container">
            <h1 class="featured-dishes-title">Featured dishes</h1>

            <div class="dishes-container">
                <section class="dish">
                    <div class="img-container">
                        <img class="dish-img" src="imgs/gold-cup.png" alt="Gold cup">
                    </div>
                    <section class="padding">
                        <h2 class="price dish-title">$15</h2>
                        <h3 class="dish-title">Gold Cup</h3>
                        <p class="dish-description">Shrimp and Broccoli with a brown sauce with garlic.</p>
                        <a class="btn" href="#">See more</a>
                    </section>
                </section>

                <section class="dish">
                    <div class="img-container">
                        <img class="dish-img" src="imgs/kung-pao-chicken.png" alt="Kung Pao Chicken">
                    </div>
                    <section class="padding">
                        <h2 class="price dish-title">$25</h2>
                        <h3 class="dish-title">Kung Pao Chicken</h3>
                        <p class="dish-description">Cubed chicken in a sweet, spicy, and savory sauce.</p>
                        <a class="btn" href="#">See more</a>
                    </section>
                </section>

                <section class="dish">
                    <div class="img-container">
                        <img class="dish-img" src="imgs/orange-chicken.png" alt="Orange Chicken">
                    </div>
                    <section class="padding">
                        <h2 class="price dish-title">$18</h2>
                        <h3 class="dish-title">Orange Chicken</h3>
                        <p class="dish-description">Pan-fried, and coated chicken in orange sauce.</p>
                        <a class="btn" href="#">See more</a>
                    </section>
                </section>

                <section class="dish">
                    <div class="img-container">
                        <img class="dish-img" src="imgs/pork-chive.png" alt="Pork and chive">
                    </div>
                    <section class="padding">
                        <h2 class="price dish-title">$12</h2>
                        <h3 class="dish-title">Chive Dumplings</h3>
                        <p class="dish-description">Juicy dumplings filled with ground pork and chives.</p>
                        <a class="btn" href="#">See more</a>
                    </section>
                </section>
            </div>

            <div class="dishes-container">
                <section class="dish">
                    <div class="img-container">
                        <img class="dish-img" src="imgs/spring-rolls.png" alt="Spring Rolls">
                    </div>
                    <section class="padding">
                        <h2 class="price dish-title">$12</h2>
                        <h3 class="dish-title">Spring Rolls</h3>
                        <p class="dish-description">Thin pastry wraps filled with vegetables and a type of meat</p>
                        <a class="btn" href="#">See more</a>
                    </section>
                </section>

                <section class="dish">
                    <div class="img-container">
                        <img class="dish-img" src="imgs/almond-jelly.png" alt="Almond Jelly">
                    </div>
                    <section class="padding">
                        <h2 class="price dish-title">$10</h2>
                        <h3 class="dish-title">Almond Jelly</h3>
                        <p class="dish-description">Gelatin and fruit salad swimming in a sweet syrup.</p>
                        <a class="btn" href="#">See more</a>
                    </section>
                </section>

                <section class="dish">
                    <div class="img-container">
                        <img class="dish-img" src="imgs/cucumber-salad.png" alt="Cucumber Salad">
                    </div>
                    <section class="padding">
                        <h2 class="price dish-title">$12</h2>
                        <h3 class="dish-title">Pai Huang Gua</h3>
                        <p class="dish-description">Cucumbers in a vinegar-based with garlic and chilies.</p>
                        <a class="btn" href="#">See more</a>
                    </section>
                </section>

                <section class="dish">
                    <div class="img-container">
                        <img class="dish-img" src="imgs/liangpi.png" alt="Liangpi">
                    </div>
                    <section class="padding">
                        <h2 class="price dish-title">$22</h2>
                        <h3 class="dish-title">Liangpi</h3>
                        <p class="dish-description">Cold wheat noodles with a savory sauce.</p>
                        <a class="btn" href="#">See more</a>
                    </section>
                </section>
            </div>

            <div class="dishes-container container-width">
                <section class="dish">
                    <div class="img-container">
                        <img class="dish-img" src="imgs/corn-soup.png" alt="Corn Soup">
                    </div>
                    <section class="padding">
                        <h2 class="price dish-title">$20</h2>
                        <h3 class="dish-title">Corn Chicken Soup</h3>
                        <p class="dish-description">Sweet corn and ground chicken.</p>
                        <a class="btn" href="#">See more</a>
                    </section>
                </section>

                <section class="dish">
                    <div class="img-container">
                        <img class="dish-img" src="imgs/grilled-chicken.png" alt="Grilled Chicken">
                    </div>
                    <section class="padding">
                        <h2 class="price dish-title">$25</h2>
                        <h3 class="dish-title">Grilled Chicken</h3>
                        <p class="dish-description">Chicken with a sweet-savory glaze.</p>
                        <a class="btn" href="#">See more</a>
                    </section>
                </section>
            </div>
        </section>
    </main>

    <!--footer-->
    <?php
    include "./parts/footer.php";
    ?>

</body>

</html>
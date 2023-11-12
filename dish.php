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
            <img class="img-dish" src="imgs/gold-cup.png" alt="Gold cup">
            <div class="dish-information">
                <h2 class="dish-name">Gold-cup</h2>
                <p class="description">Shrimp and Broccoli with a brown sauce with garlic.</p>
                <button class="star-btn"><img class="img-star" src="./imgs/empty-star.png" alt="empty-star"></button>
                <div class="dish-caracteristics">
                    <div>
                        <h3 class="margin-details">Category</h3>
                        <p class="margin-text">Starter</p>
                    </div>
                    <div class="divider"></div>
                    <div>
                        <h3 class="margin-details">Dish for</h3>
                        <p class="margin-text">2</p>
                    </div>
                    <div class="divider"></div>
                    <div>
                        <h3 class="margin-details">Price</h3>
                        <p class="margin-text">$15</p>
                    </div>
                </div>
                <h3>Related dishes</h3>
                <div class="imgs-related-container">
                    <img class="img-related" src="./imgs/pork-chive.png" alt="pork-chive">
                    <img class="img-related" src="./imgs/spring-rolls.png" alt="spring-rolls">
                    <img class="img-related" src="./imgs/cucumber-salad.png" alt="cucumber-salad">
                </div>
            </div>
        </div>
    </main>
    <footer class="footer">
        <div class="footer-content"></div>
    </footer>
</body>

</html>
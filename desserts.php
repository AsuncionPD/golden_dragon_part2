<?php
require_once './backend/database.php';
// Reference: https://medoo.in/api/select
$categoryId = 3;
$category = $database->get("tb_dish_category", "*", ["id_dish_category" => $categoryId]);

//$categories = $database->select("tb_dish_category","*");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desserts</title>
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mooli&display=swap" rel="stylesheet">
    <!-- icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- icons -->
    <!-- google fonts -->
    <link rel="stylesheet" href="./css/main.css">

</head>

<body>
    <header>
        <?php
        include "./parts/top-nav.php";
        ?>
        
        <section class="hero-container desserts-bg">
            <h1 class="hero-title">Desserts</h1>
        </section>
    </header>

    <main>
        <!--menu-->
        <?php
        include "./parts/menu.php";
        ?>
    </main>

    <!--footer-->
    <?php
        include "./parts/footer.php";
    ?>

</body>

</html>
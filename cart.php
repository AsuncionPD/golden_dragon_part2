<?php
require_once './backend/database.php';

if($_POST){

    var_dump($_POST);

    $dishes_details = [];

    //get destination cost total
    $dish_cost = $_POST["dish_price"] * $_POST["quantity"];

    if (isset($_COOKIE['dishes'])) {
        /* delete/remove a cookie
        unset($_COOKIE['destinations']);
        setcookie('destinations', '', time() - 3600);*/
        $data = json_decode($_COOKIE['dishes'], true);

        $booking_details = $data;
        //var_dump($data);
    }

    //Asign variable names to array dishes_details
    $dishes_details["id"] = $_POST["id_dish"];
    $dishes_details["quantity"] = $_POST["quantity"];
    $dishes_details["eating-style"] = $_POST["eating-style"];
    $dishes_details["date"] = $_POST["date"];
    $dishes_details["time"] = $_POST["time"];
    $dishes_details["cost"] = $dish_cost;

    //check if this is a booked dish to update the array
    if($_POST["index"] >= 0){
        $booking_details[$_POST["index"]] = $dishes_details;
    }else{
        $booking_details[] = $dishes_details;
    }
    
    //expire in 2 hrs
    setcookie('dishes', json_encode($booking_details), time()+7200);  

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
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
        <hr style="border-top: 65px solid var(--clr-wine); margin: 0;">
    </header>
    
    <main>

        
    </main>
    <!--footer-->
    <?php
        include "./parts/footer.php";
    ?>

</body>

</html>
<?php

require_once 'backend/database.php';
//var_dump($_POST);

if($_POST){

    $requested_dish_name = "";

    //Individual time
    $order_date = "";    //Exist the date and time for all the orders
    $order_time = "";    //You can just get it through post

    $order_quantity = "";

    $order_price = $_POST["total-cost"]; //Price of the total order

    $order_type_name = "";

    $id_user = ""; //This will link the orders


    if (isset($_COOKIE['dishes'])) {

        $data = json_decode($_COOKIE['dishes'], true);
        $booking_details = $data;


        foreach ($booking_details as $index => $booking) {

            $requested_dish_name = $booking["name"];
            $order_date = $booking["date"];
            $order_time = $booking["time"];
            $order_quantity = $booking["quantity"];
            $order_type_name = $booking["mode"];

            $database->insert("tb_order_registration",[
                "requested_dish_name"=> $requested_dish_name,
                "order_date"=> $order_date,
                "order_time"=> $order_time,
                "ordered_quantity"=> $order_quantity,
                "order_price" => $order_price
            ]);

            $database->insert("tb_order_type",[
                "order_type_name"=> $order_type_name
            ]);

        }

    }

    //delete/remove a cookie 
    unset($_COOKIE["dishes"]);
    setcookie("dishes", " ", time() - 3600);

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
    </header>
    
    <main>
        <section>
            <h1 class="title-cart">Thanks for your buying</h1>
        </main>
    <!--footer-->
    <?php
        include "./parts/footer.php";
    ?>

</body>



</html>
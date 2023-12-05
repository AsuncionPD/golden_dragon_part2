<?php

require_once 'backend/database.php';
//var_dump($_POST);

if($_POST){

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if(isset($_SESSION["isLoggedIn"])){

    $requested_dish_name = "";
    //Individual time
    $order_date = "";    //Exist the date and time for all the orders
    $order_time = "";    //You can just get it through post
    $order_quantity = "";
    $order_type_name = "";
    $id_user = $_SESSION["id_user"]; //This will link the orders
    $total_order_price = $_POST["total-cost"]; //Price of the total order
    $order_price = 0;
    $order_number = 0;

    if (isset($_COOKIE['dishes'])) {

        $data = json_decode($_COOKIE['dishes'], true);
        $booking_details = $data;

        /*Numbers order to historial*/
        $user = $database->select("tb_order_registration","*",[
            "id_users"=> $id_user
        ]);

        if(empty($user)){
            
            $order_number = 1;

        }else{
            
            $last_order = end($user);
            $order_number = $last_order["number_order"];
            $order_number++;
        }
         /*Numbers order to historial*/

        //var_dump($order_number);

        foreach ($booking_details as $index => $booking) {

            $requested_dish_name = $booking["name"];
            $order_date = $booking["date"];
            $order_time = $booking["time"];
            $order_quantity = $booking["quantity"];
            $order_type_name = $booking["mode"];
            $order_price = $booking["cost"];
            $order_image = $booking["image"];

            $database->insert("tb_order_registration",[
                "id_users"=> $id_user,
                "number_order" => $order_number,
                "session_id_user"=> $id_user,
                "order_id_user"=> $id_user,
                "order_image"=> $order_image,
                "requested_dish_name"=> $requested_dish_name,
                "order_date"=> $order_date,
                "order_time"=> $order_time,
                "order_quantity"=> $order_quantity,
                "order_price" => $order_price,
                "total_order_price" => $total_order_price
            ]);

            $database->insert("tb_order_type",[
                "id_users"=> $id_user,
                "order_id_user"=> $id_user,
                "order_type_name"=> $order_type_name
            ]);

        }

    }

    //delete/remove a cookie 
    unset($_COOKIE["dishes"]);
    setcookie("dishes", " ", time() - 3600);

    }else{

        header("Location: forms.php");
        //exit();
    }
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
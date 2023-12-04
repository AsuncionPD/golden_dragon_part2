<?php
require_once './backend/database.php';

session_start();
if(isset($_SESSION)){

    $items = $database->select("tb_order_registration", [
        "[>]tb_order_type" => ["id_users" => "order_id_user"],
        "[>]tb_users" => ["session_id_user" => "id_users"]
    ], [
        "tb_order_registration.id_order_registration",
        "tb_order_registration.id_users",
        "tb_order_registration.session_id_user",
        "tb_order_registration.order_id_user",
        "tb_order_registration.requested_dish_name",
        "tb_order_registration.order_date",
        "tb_order_registration.order_time",
        "tb_order_registration.order_quantity",
        "tb_order_registration.order_price",
        "tb_order_registration.total_order_price",
        "tb_order_type.id_order_type",
        "tb_order_type.order_id_user",
        "tb_order_type.order_type_name",
        "tb_users.id_users"
    ], [
        "tb_users.id_users" => $_SESSION["id_user"],
        "GROUP" => "tb_order_registration.id_order_registration"
    ]);
    
    //var_dump($items);
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
            <div class="table-container">
            <h1 class="title-cart">Historial</h1>

            <table class="styled-table">
                <thead class="head-table">
                    <tr>
                        <th>Image</th>
                        <th>Dish</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Mode</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                    ?>
                </tbody>
            </table>
            </div>
            </div>
            <div class="">
                <?php 
                
                ?>
            </div>
        </section>
    </main>
    <!--footer-->
    <?php
        include "./parts/footer.php";
    ?>

</body>

</html>
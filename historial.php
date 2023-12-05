<?php
require_once './backend/database.php';

session_start();
if(isset($_SESSION)){

    //max number of the number order
    $max_order_number = $database->max("tb_order_registration", "number_order", [
        "id_users" => $_SESSION["id_user"],
    ]);

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
            <?php
            for ($i = 1; $i <= $max_order_number; $i++) {
                $orders = $database->select("tb_order_registration", [
                    "[>]tb_order_type" => ["id_users" => "order_id_user"],
                    "[>]tb_users" => ["session_id_user" => "id_users"]
                ], [
                    "tb_order_registration.id_order_registration",
                    "tb_order_registration.id_users",
                    "tb_order_registration.number_order",
                    "tb_order_registration.session_id_user",
                    "tb_order_registration.order_id_user",
                    "tb_order_registration.order_image",
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
                ],[
                    "AND" => [
                    "tb_users.id_users" => $_SESSION["id_user"],
                    "number_order" => $i,
                    ],
                    "GROUP" => "tb_order_registration.id_order_registration"
                ]);

                //var_dump($orders);

                 //Create table for each order
                 echo "<table class='styled-table'>"
                 ."<thead class='head-table'>"
                 . "<tr>"
                 . "<th>Image</th>"
                 . "<th>Dish</th>"
                 . "<th>Date</th>"
                 . "<th>Time</th>"
                 . "<th>Mode</th>"
                 . "<th>Quantity</th>"
                 . "<th>Price</th>"
                    . "</tr>"
                 . "</thead>"
                 .  "<tbody>";
                 if(isset($_SESSION) && $orders != NULL){
                     foreach ($orders as $index=>$order) {
                         echo "<tr>";
                             echo '<td><img class="rounded-image" src="./imgs/' . $order["order_image"] . '"></td>';
                             echo "<td>" . $order["requested_dish_name"] . "</td>";
                             echo "<td>" . $order["order_date"] . "</td>";
                             echo "<td>" . $order["order_time"] . "</td>";
                             echo "<td>" . $order["order_type_name"] . "</td>";
                             echo "<td>" . $order["order_quantity"] . "</td>";
                             echo "<td>" . $order["order_price"] . "</td>";
                         echo "</tr>";   
                         }}else{
                             echo "There aren't orders";
                         }
                         echo "<tr><td><td><td><td><td><td 
                         class=''><h3>Total $". $order["total_order_price"] ."</h3></td><td></tr>"
                         . "</tbody>"
                     . "</table>"
                 . "</div>";
           
                }
            ?>
        </section>
    </main>
    <!--footer-->
    <?php
        include "./parts/footer.php";
    ?>

</body>

</html>
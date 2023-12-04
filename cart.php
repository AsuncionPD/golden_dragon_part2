<?php
require_once './backend/database.php';

$dishes_details = [];
/*Create cookie*/
if($_POST){

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
        "id_dish" => $_POST["id_dish"]
    ]);

    $image = $item[0]["dish_image"];
    $dish_name = $item[0]["dish_name"];
    //get destination cost total
    $dish_cost = ($_POST["dish_price"] * $_POST["quantity"]);

    $booking_details= [];

    if (isset($_COOKIE['dishes'])) {

        /* delete/remove a cookie unset($_COOKIE['destinations']);
        setcookie('destinations', '', time() - 3600);*/
    
        $data = json_decode($_COOKIE['dishes'], true);
        $booking_details = $data;
    
    }

    //Asign variable names to array dishes_details
    $dishes_details["id"] = $_POST["id_dish"];
    $dishes_details["quantity"] = $_POST["quantity"];
    $dishes_details["mode"] = $_POST["eating-style"];
    $dishes_details["date"] = $_POST["date"];
    $dishes_details["time"] = $_POST["time"];
    $dishes_details["cost"] = $dish_cost;
    $dishes_details["image"] = $image;
    $dishes_details["name"] = $dish_name;
    //$dishes_details["index"] = $_POST["index"];

    //check if this is a booked dish to update the array
    if($_POST["index"] >= 0){
        $booking_details[$_POST["index"]] = $dishes_details;
    }else{
        $booking_details[] = $dishes_details;
    }
    
    //expire in 2 hrs
    setcookie('dishes', json_encode($booking_details), time()+7200);

}

/*Show cookie information*/
$total_cost = 0; 

if (isset($_COOKIE['dishes'])) {

    /* delete/remove a cookie unset($_COOKIE['destinations']);
    setcookie('destinations', '', time() - 3600);*/

    $data = json_decode($_COOKIE['dishes'], true);
    $booking_details = $data;

    foreach ($booking_details as $index => $booking) {

        $total_cost += $booking["cost"];
       
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
            <div class="table-container">
            <h1 class="title-cart">Cart</h1>
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
                    if(isset($_COOKIE['dishes'])){
                    foreach ($booking_details as $index=>$booking) {
                        echo "<tr>";
                            echo '<td><img class="rounded-image" src="./imgs/' . $booking["image"] . '"></td>';
                            echo "<td>" . $booking["name"] . "</td>";
                            echo "<td>" . $booking["date"] . "</td>";
                            echo "<td>" . $booking["time"] . "</td>";
                            echo "<td>" . $booking["mode"] . "</td>";
                            echo "<td>" . $booking["quantity"] . "</td>";
                            echo "<td>" . $booking["cost"] . "</td>";
                            echo "<td><a class='links' href='dish.php?id=" . $booking["id"] . "'>Edit</a> <a class='links' href=''>Delete</a></td>";
                        echo "</tr>";
                        }}else{
                            echo "There aren't orders";
                        }
                        echo "<tr><td><td><td><td><td><td><td 
                        class=''><h3>Total $". $total_cost ."</h3></td><td></tr>";
                    ?>
                </tbody>
            </table>
            </div>
            </div>
            <div class="">
                <?php 
                if(isset($_COOKIE['dishes'])){
                    if($booking_details != null)
                    echo "<form action='submit.php' method='post'>
                    . <input type='hidden' id='total-cost' name='total-cost' value='".$total_cost."'>
                    . <input type='hidden' id='submit-date' name='submit-date' value=''>
                    . <input type='hidden' id='submit-time' name='submit-time' value=''>
                    . <input type='submit' class='cart-btn btn' id='pay-btn' value='Pay'>
                    . </form>";
                    /*unset($_COOKIE['destinations']);
                    setcookie('destinations', '',time()-3600);*/
                    }
                ?>
            </div>
        </section>
    </main>
    <!--footer-->
    <?php
        include "./parts/footer.php";
    ?>

</body>

<!--Time and Date-->
<script src="https://cdn.jsdelivr.net/npm/luxon@3.4.3/build/global/luxon.min.js"></script>
    <script>

        document.getElementById("pay-btn").addEventListener("click", function(event) {

        let DateTime = luxon.DateTime;
        const now = DateTime.now();
        
        let currentDate = now.toFormat("yyyy-MM-dd");
        let currentTime = now.toFormat("HH:mm");

        document.getElementById("submit-date").value = currentDate;
        document.getElementById("submit-time").value = currentTime;

        });

    </script>

</html>
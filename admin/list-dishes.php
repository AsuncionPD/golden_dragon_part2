<?php
require_once '../backend/database.php';
$items = $database->select("tb_dishes", "*");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Dishes</title>
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mooli&display=swap" rel="stylesheet">
    <!-- google fonts -->
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/themes/admin.css">

</head>

<body>
    <header>
        <?php
        include "./../parts/top-nav.php";
        ?>
    </header>

    <h1 class="title">Registered Dishes</h1>
    <table>
        <thead>
            <tr>
                <th>Dish Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($items as $item) {
                echo "<tr>";
                echo "<td>" . $item["dish_name"] . "</td>";
                echo "<td>" . $item["dish_description"] . "</td>";
                echo "<td>" . $item["dish_price"] . "</td>";
                echo "<td><a class='links' href='edit-dish.php?id_dish=" . $item["id_dish"] . "'>Edit</a> <a class='links' href='delete-dish.php?id_dish=" . $item["id_dish"] . "'>Delete</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>


</body>

</html>
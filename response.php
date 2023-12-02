<?php
    require_once './backend/database.php';
    
    if(isset($_SERVER["CONTENT_TYPE"])){
        $contentType = $_SERVER["CONTENT_TYPE"];

        if($contentType === "application/json"){
            $content = trim(file_get_contents("php://input"));

            $decoded = json_decode($content, true);

            $items = $database->select("tb_dishes","*",[
                "AND"=>[
                    "id_dish_category" => $decoded["category"],
                    "id_category_people" => $decoded["people_category"]
                ]
            ]);

            echo json_encode($items);
        }
    }
?>
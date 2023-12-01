<?php
require_once './backend/database.php';

$dish = [];

if(isset($_SERVER["CONTENT_TYPE"])){
    $contentType = $_SERVER["CONTENT_TYPE"];

    if($contentType == "application/json"){
        $content = trim(file_get_contents("php://input")); 
        
        $decoded = json_decode($content, true);

        $response = "server response";

        if($decoded["language"] == 'EN'){
            $item = $database->select("tb_dishes",[
                "tb_dishes.dish_name",
                "tb_dishes.dish_description",
            ],[
                "id_dish"=>$decoded["id_dish"]
            ]);

            $dish["name"] = $item[0]["dish_name"];
            $dish["description"] = $item[0]["dish_description"];

        }else{
            $item = $database->select("tb_dishes",[
                "tb_dishes.dish_name_chi",
                "tb_dishes.dish_description_chi",
            ],[
                "id_dish"=>$decoded["id_dish"]
            ]);

            $dish["name"] = $item[0]["dish_name_chi"];
            $dish["description"] = $item[0]["dish_description_chi"];
        }

        echo json_encode($dish);

        
    }
}
?>
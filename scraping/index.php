<?php
    require_once '../backend/database.php';
    //https://simplehtmldom.sourceforge.io/docs/1.9/
    include('simple_html_dom.php');
    
    /*
    id_dish_category= 1
    appetizers: https://www.allrecipes.com/recipes/1899/world-cuisine/asian/chinese/appetizers/

    id_dish_category= 2
    main courses: https://www.allrecipes.com/recipes/17135/world-cuisine/asian/chinese/main-dishes/

    id_dish_category= 3
    desserts: https://www.allrecipes.com/search?q=chinese+desserts

    id_dish_category= 4
    drinks: https://www.allrecipes.com/recipes/77/drinks/
    */
        
    //link
    $link = "https://www.allrecipes.com/recipes/1899/world-cuisine/asian/chinese/appetizers/";

    $filenames = [];
    $menu_item_names = [];
    $menu_item_descriptions = [];
    $image_urls = [];

    $menu_items = 10;

    $items = file_get_html($link);

    //save meals info and filenames for the images
    foreach ($items->find('.card--no-image') as $item){
        
        $title = $item->find('.card__title-text');
        
        $details = file_get_html($item->href);
        $description = $details->find('.article-subheading');
        $image = $details->find('.primary-image__image'); //jw-video

        if(count($image) > 0){
            $image_urls[] = $image[0]->src;
        }else{
            $replace_img = $item->find('.universal-image__image');
            if(count($replace_img) > 0){
                $image_urls[] = $replace_img[0]->{'data-src'};
            }
        }
       
        if(count($description) > 0){
            if($menu_items == 0) break;

            $menu_item_names[] = trim($title[0]->plaintext);
            $menu_item_descriptions[] = $description[0]->plaintext;
            
            $filename = strtolower(trim($title[0]->plaintext));
            $filename = str_replace(' ', '-', $filename);
            $filename = str_replace("'", '', $filename);
            $filenames[] = $filename;

            $menu_items--;
        }

    }

    foreach($filenames as $index=>$item){
        echo "******************";
        echo "<br>";
        echo $item;
        echo "<br>";
        echo $menu_item_names[$index];
        echo "<br>";
        echo $menu_item_descriptions[$index];
        echo "<br>";
        echo $image_urls[$index];
        echo "<br>";
        echo rand (1*10, 70*10)/10;
        echo "<br>";
    }

    //get and download images
    foreach ($filenames as $index=>$image){
        file_put_contents("../imgs/image-".$image.".jpg", file_get_contents($image_urls[$index]));
    }

    //insert info
    // Reference: https://medoo.in/api/insert
    for($i=0; $i<10; $i++){
    $database->insert("tb_dishes",[
        "id_dish_category"=> 1,
        "id_category_people"=> rand (1, 3),
        "dish_name"=> $menu_item_names[$i],
        "dish_description"=> $menu_item_descriptions[$i],
        "dish_image"=> "image-".$filenames[$i].".jpg",
        "dish_price"=> rand (1*10, 70*10)/10
    ]);
    }

    
    

?>
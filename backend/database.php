<?php 
    namespace Medoo;
    require 'Medoo.php';
    /* 
    - For Laragon: username='root' / password=''
    - For MAMP: username='root' / password='root'
      */
    $database = new Medoo([
        'type'=>'mysql',
        'host' => 'localhost',
        'database' => 'golden_dragon',
        'username' => 'root',
        'password' => ''
    ]);

    //Information to enter admin functionality
    /*INSERT INTO tb_admin_users (admin_usr, admin_pwd) VALUES ('admin', '$2y$12$GKWDmW7DWmri7Njw9G1FP.5SYgYJpOIitrGn.7maWq9OoZj35sqzO');*/
    /*Clave: 123*/
?>  
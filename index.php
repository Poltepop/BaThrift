<?php

// if(isset($_SERVER['PATH_INFO'])){
//     echo $_SERVER['PATH_INFO'];
// }else{
//     echo "path info not found";
// }
require_once __DIR__ . '/./app/Core/View.php';


$title = 'Hello From Index';

if(isset($_SERVER['PATH_INFO']) && $_SERVER['PATH_INFO'] == '/home'){
    Render('Home/index', [
        'title' => $title
    ]);
}else{
    echo "404";
}


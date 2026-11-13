<?php

require_once __DIR__ . "/../Core/View.php";

function index(){
    Render("/Home/index", [
        'title' => 'test'
    ]);
}
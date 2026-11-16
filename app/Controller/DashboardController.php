<?php

function index(): void{
    Render('Admin/dashboard', [
        'title' => 'Dashboard'
    ]);
}
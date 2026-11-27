<?php 

require_once __DIR__ . "/../Model/Store.php";

function bukaToko(): void{
    Render('penjual/buka-toko');
}

function update(): void{
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $data = [
            'store_id' => trim($_POST['store_id']),
            'name' => trim($_POST['nama_toko']),
            'slug' => trim($_POST['slug_toko']),
            'description' => trim($_POST['deskripsi_toko']) ?? '',
        ];

        $errors = array_filter([
            'name' => validate($data['name'], required(), max_length(100)),
            'slug' => validate($data['slug'], required(), max_length(100)),
        ]);

        if(!empty($errors)){
            $_SESSION['errors-toko'] = $errors;
            redirect('/profil');
            exit();
        }

        //Success
        updateToko($data);
        redirect('/profil');
        exit();
    }
}
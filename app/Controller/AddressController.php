<?php

require_once __DIR__ . "/../utils/generateProvince.php";

function index(): void{
    Render('pembeli/daftar-alamat');
}

function addAddresse(): void{
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $data = [
            'label' => trim($_POST['label_alamt']),
            'recipent_name' => trim($_POST['nama_penerima']),
            'recipent_phone' => trim($_POST['no_wa']),
            'city' => trim($_POST['kota_kecamatan']),
            'province' => generateProvince(trim($_POST['kota_kecamatan'])),
            'postal_code' => trim($_POST['kode_pos']),
            'full_address' => trim($_POST['alamat_lengkap']),
            'benchmark' => trim($_POST['patokan']),
            'is_primary' => trim($_POST['is_utama'])
        ];

        $errors = array_filter([
            'label' => validate($data['label'], required(), max_length(50)),
            'recipent_name' => validate($data['recipent_name'], required(), max_length(100)),
            'recipent_phone' => validate($data['recipent_phone'], required(), max_length(20)),
            'city' => validate($data['city'], required(), max_length(100)),
            'province' => validate($data['province'], required(), max_length(100)),
            'postal_code' => validate($data['postal_code'], required(), max_length(10)),
            'full_address' => validate($data['full_address'], required()),
        ]);

        if(!empty($errors)){
            // Add Session Redirect ke index
            exit();
        }

        // Logic add from models 
    }
}
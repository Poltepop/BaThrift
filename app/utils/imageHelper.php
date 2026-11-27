<?php

define('ALLOWED', [
    'image/jpeg' => 'jpg',
    'image/png'  => 'png',
]);

define('UPLOAD_DIR', __DIR__ . "/../../assets/img/profile/");

function uploadImage(array $file = []): string{
    if ($file['error'] !== UPLOAD_ERR_OK) {
        throw new RuntimeException('Terjadi error saat upload file.');
    }

    if (!isset(ALLOWED[$file['type']])) {
        throw new InvalidArgumentException('Tipe file tidak di izinkan.');
    }

    $filename = bin2hex(random_bytes(16)) . '.' . ALLOWED[$file['type']];
    move_uploaded_file($file['tmp_name'], UPLOAD_DIR . $filename);
    return $filename;
}

function deleteImage(string $filename): void{
    if($filename === ''){
        throw new RuntimeException('Terjdai error saat menghapus file.');
    }

    $path = UPLOAD_DIR . basename($filename);

    if(is_file($path)){
        unlink($path);
    }
}


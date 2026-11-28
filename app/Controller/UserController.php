<?php 

require_once __DIR__ . "/../Model/User.php";
require_once __DIR__ . "/../Model/Store.php";
require_once __DIR__ . "/../Model/Address.php";
require_once __DIR__ . "/../Model/BalanceTransaction.php";
require_once __DIR__ . "/../utils/imageHelper.php";
require_once __DIR__ . "/../utils/getInitials.php";
require_once __DIR__ . "/../utils/formatRupiah.php";

function index(): void{
    $user = getUserById($_SESSION['user']['id']);
    $store = getStoreByUserId($user['id']);
    $addresses = getAddressUser($user['id']);
    $balance = $store ? getUserBalance((int) $store['id']) : ['saldo' => 0];

    $_SESSION['user'] = $user;
    $errors = $_SESSION['errors'] ?? [];
    $errors_toko = $_SESSION['errors-toko'] ?? [];
    unset($_SESSION['errors']);
    unset($_SESSION['errors-toko']);

    Render('pembeli/profil-saya', [
        'title'  => 'Profil Saya - Bathrift',
        'user'   => $user,
        'store' => $store,
        'addresses' => $addresses,
        'saldo' => $balance['saldo'] ?? 0,
        'errors' => $errors,
        'errors-toko' => $errors_toko
    ]);
}

function update():void {
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $data = [
            'id'                => (int) $_SESSION['user']['id'],
            'name'              => trim($_POST['nama_lengkap'] ?? ''),
            'email'             => trim($_POST['email'] ?? ''),
            'username'          => trim($_POST['username'] ?? ''),
            'phone'             => trim($_POST['phone'] ?? ''),
            'bio'               => trim($_POST['bio'] ?? ''),
            'photo'             => $_SESSION['user']['photo'] ?? '',
        ];

        // Validator
        $errors = array_filter([
            'name'       => validate($data['name'], required(), max_length(100)),
            'email'      => validate($data['email'], required(), min_length(3), max_length(100), email_format()),
            'username'   => $data['username'] !== '' ? validate($data['username'], min_length(3), max_length(100)) : null,
            'phone'      => validate($data['phone'], required(), max_length(20), phone_format()),
        ]);

        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            redirect('/profil');
            exit();
        }

        if (isset($_FILES['profile']) && $_FILES['profile']['error'] !== UPLOAD_ERR_NO_FILE) {
            try{
                $filename = uploadImage($_FILES['profile']);
                $data['photo'] = $filename;
                if(!empty($_SESSION['user']['photo'])){
                    deleteImage($_SESSION['user']['photo']);
                }
            }catch (InvalidArgumentException $e){
                $errors['file_upload'] = $e->getMessage();
            }catch (RuntimeException $e){
                $errors['file_upload'] = $e->getMessage();
            }

            if (!empty($errors)) {
                $_SESSION['errors'] = $errors;
                redirect('/profil');
                exit();
            }
        }

        updateUser($data);
        $_SESSION['user'] = getUserById($data['id']); 
        redirect('/profil');
        exit();
    }
}

function deleteAvatar(): void {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        redirect('/profil');
        exit();
    }

    $userId = (int) ($_SESSION['user']['id'] ?? 0);
    $user = getUserById($userId);
    $isAjax = !empty($_SERVER['HTTP_X_REQUESTED_WITH'])
        && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';

    if (!empty($user['photo'])) {
        try {
            deleteImage($user['photo']);
        } catch (RuntimeException $e) {
            if ($isAjax) {
                header('Content-Type: application/json; charset=UTF-8');
                http_response_code(500);
                echo json_encode(['success' => false, 'message' => $e->getMessage()]);
                exit();
            }
            $_SESSION['errors'] = ['file_upload' => $e->getMessage()];
            redirect('/profil');
            exit();
        }

        deleteUserPhoto($userId);
        $_SESSION['user'] = getUserById($userId);
    }

    if ($isAjax) {
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode(['success' => true, 'message' => 'Foto profil berhasil dihapus!']);
        exit();
    }

    redirect('/profil');
    exit();
}

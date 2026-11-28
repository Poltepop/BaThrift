<?php 

require_once __DIR__ . "/../Model/Store.php";
require_once __DIR__ . "/../Model/Address.php";
require_once __DIR__ . "/../Model/User.php";

function buildStoreSlug(string $text): string {
    $slug = strtolower(trim($text));
    $slug = preg_replace('/[^a-z0-9_-]+/', '-', $slug) ?? '';
    $slug = preg_replace('/-+/', '-', $slug) ?? '';
    return trim($slug, '-');
}

function splitCityProvince(string $kotaAsal): array {
    $parts = explode(',', $kotaAsal, 2);
    return [
        'city'     => trim($parts[0] ?? ''),
        'province' => trim($parts[1] ?? ''),
    ];
}

function bukaToko(): void{
    $userId = (int) ($_SESSION['user']['id'] ?? 0);
    $user = getUserById($userId);

    if (getStoreByUserId($userId) !== null) {
        redirect('/profil');
        exit();
    }

    $errors = $_SESSION['errors-buka-toko'] ?? [];
    $old = $_SESSION['old-buka-toko'] ?? [];
    unset($_SESSION['errors-buka-toko'], $_SESSION['old-buka-toko']);

    Render('penjual/buka-toko', [
        'user'   => $user,
        'errors' => $errors,
        'old'    => $old,
    ]);
}

function store(): void {
    global $conn;

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        redirect('/buka-toko');
        exit();
    }

    $userId = (int) ($_SESSION['user']['id'] ?? 0);
    $user = getUserById($userId);

    if (getStoreByUserId($userId) !== null) {
        redirect('/profil');
        exit();
    }

    $namaToko = trim($_POST['nama_toko'] ?? '');
    $rawSlug = trim($_POST['slug_toko'] ?? '');
    $slugToko = ($rawSlug !== '' && $rawSlug !== 'nama-toko-kamu')
        ? buildStoreSlug($rawSlug)
        : buildStoreSlug($namaToko);
    $deskripsiToko = trim($_POST['deskripsi_toko'] ?? '');
    $kotaAsal = trim($_POST['kota_asal'] ?? '');
    $setujuKodeEtik = ($_POST['setuju_kode_etik'] ?? '') === '1';

    $location = splitCityProvince($kotaAsal);

    $errors = array_filter([
        'nama_toko'        => validate($namaToko, required(), max_length(30)),
        'slug_toko'        => validate($slugToko, required('Slug toko tidak valid'), max_length(255)),
        'deskripsi_toko'   => validate($deskripsiToko, required()),
        'kota_asal'        => ($kotaAsal === '' || $location['city'] === '' || $location['province'] === '')
            ? 'Pilih kota dan provinsi asal pengiriman yang valid'
            : null,
        'setuju_kode_etik' => !$setujuKodeEtik ? 'Anda wajib menyetujui Kode Etik Penjual BaThrift' : null,
    ]);

    if (empty($errors['nama_toko']) && isStoreNameTaken($namaToko)) {
        $errors['nama_toko'] = 'Nama toko sudah digunakan, silakan pilih nama lain';
    }

    if (empty($errors['slug_toko']) && isStoreSlugTaken($slugToko)) {
        $errors['slug_toko'] = 'Slug toko sudah digunakan, silakan ubah nama toko';
    }

    if (!empty($errors)) {
        $_SESSION['errors-buka-toko'] = $errors;
        $_SESSION['old-buka-toko'] = [
            'nama_toko'      => $namaToko,
            'slug_toko'      => $slugToko !== '' ? $slugToko : 'nama-toko-kamu',
            'deskripsi_toko' => $deskripsiToko,
            'kota_asal'      => $kotaAsal,
        ];
        redirect('/buka-toko');
        exit();
    }

    $existingAddresses = getAddressUser($userId);

    mysqli_begin_transaction($conn);
    try {
        createStore([
            'user_id'     => $userId,
            'name'        => $namaToko,
            'slug'        => $slugToko,
            'description' => $deskripsiToko,
        ]);

        createAddress([
            'user_id'         => $userId,
            'label'           => 'Gudang Toko',
            'recipient_name'  => $user['name'] ?? $namaToko,
            'recipient_phone' => $user['phone'] ?? '',
            'full_address'    => $kotaAsal,
            'city'            => $location['city'],
            'province'        => $location['province'],
            'postal_code'     => '',
            'is_primary'      => empty($existingAddresses) ? 1 : 0,
        ]);

        if (($user['role'] ?? 'buyer') === 'buyer') {
            updateUserRole($userId, 'seller');
        }

        mysqli_commit($conn);
    } catch (Throwable $e) {
        mysqli_rollback($conn);
        $_SESSION['errors-buka-toko'] = [
            'nama_toko' => 'Terjadi kesalahan saat menyimpan data toko. Silakan coba lagi.',
        ];
        $_SESSION['old-buka-toko'] = [
            'nama_toko'      => $namaToko,
            'slug_toko'      => $slugToko,
            'deskripsi_toko' => $deskripsiToko,
            'kota_asal'      => $kotaAsal,
        ];
        redirect('/buka-toko');
        exit();
    }

    $_SESSION['user'] = getUserById($userId);
    redirect('/profil');
    exit();
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
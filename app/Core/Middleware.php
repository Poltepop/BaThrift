<?php
function middlewareAuth(): void {
    if (empty($_SESSION['user'])) {
        redirect('/login');
    }
}

function middlewareAdmin(): void {
    middlewareAuth(); 
    if (($_SESSION['user']['role'] ?? '') !== 'admin') {
        http_response_code(403);
        echo "403 - Akses ditolak";
        exit();
    }
}

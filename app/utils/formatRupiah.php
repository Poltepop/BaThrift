<?php 

function formatRupiah(string|int|float|null $nominal, bool $prefix = true): string{
    if(is_null($nominal) || $nominal == ''){
        $nominal = 0;
    }

    $angka = (float) $nominal;
    $hasil = number_format($angka, 2, ',', '.');

    return $prefix ? 'Rp ' . $hasil : $hasil;
}
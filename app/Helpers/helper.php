<?php


if (!function_exists('formatRupiah')) {
    function formatRupiah($angka)
    {
        if ($angka >= 1000000000) {
            // Jika lebih dari 1 miliar
            return 'Rp ' . number_format($angka / 1000000000, 1, ',', '.') . ' Miliar';
        } elseif ($angka >= 1000000) {
            // Jika lebih dari 1 juta
            return 'Rp ' . number_format($angka / 1000000, 1, ',', '.') . ' Juta';
        } elseif ($angka >= 100000) {
            // Jika lebih dari 100 ribu
            return 'Rp ' . number_format($angka / 1000, 0, ',', '.') . ' Ribu';
        } else {
            // Jika di bawah 100 ribu
            return 'Rp ' . number_format($angka, 0, ',', '.');
        }
    }

    function formatPhoneNumber($number) {
        return preg_replace('/(\d{2})(\d{3})(\d{4})(\d+)/', '$1 $2 $3 $4', $number);
    }
}

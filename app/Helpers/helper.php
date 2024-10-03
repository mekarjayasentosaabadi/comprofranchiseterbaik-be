<?php


if (!function_exists('formatRupiah')) {
    
    function formatRupiah($angka)
    {
        if ($angka >= 1000000000) {
            // Jika lebih dari 1 miliar
            return 'Rp ' . number_format($angka / 1000000000, 2, ',', '.') . ' Miliar';
        } elseif ($angka >= 1000000) {
            // Jika lebih dari 1 juta
            $formatted = number_format($angka / 1000000, 2, ',', '.');

            // Menghapus ".00" jika tidak ada desimal yang signifikan
            if (substr($formatted, -2) == '00') {
                $formatted = substr($formatted, 0, -3);
            } elseif (substr($formatted, -1) == '0') {
                // Jika hanya ada satu desimal signifikan, tampilkan satu angka desimal
                $formatted = substr($formatted, 0, -1);
            }

            return 'Rp ' . $formatted . ' Juta';
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

    function formatNomorKantor($nomor)
    {
        $prefix = substr($nomor, 0, 3);
        $remaining = substr($nomor, 3);
    
        $formatted = $prefix;
        
        while (strlen($remaining) > 0) {
            $formatted .= ' ' . substr($remaining, 0, 4); 
            $remaining = substr($remaining, 4); 
        }
    
        return $formatted;
    }
    
    

}

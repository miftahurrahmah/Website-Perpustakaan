<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $keyword = $_POST['query'];

   
    $data = [
        'index.php?page=dashboard' => 'dashboard',
        'index.php?page=member' => 'members',
        'index.php?page=buku' => 'buku',
        'index.php?page=transaksi' => 'transaksi  peminjaman',
        'index.php?page=riwayat' => 'riwayat peminjaman',
        'index.php?page=prodi' => 'data prodi',
        'index.php?page=kategori' => 'data kategori',
        
    ];

    
    $results = array_filter($data, function($item) use ($keyword) {
        return strpos(strtolower($item), strtolower($keyword)) !== false;
    });

   
    if (!empty($results)) {
        $page = array_keys($results)[0]; 
        header("Location: $page");
        exit();
    } else {
        echo "Tidak ada hasil untuk '" . $keyword . "'";
    }
}
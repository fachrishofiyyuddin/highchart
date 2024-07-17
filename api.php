<?php
include "koneksi/index.php";

if ($_GET['filter']) {
    $filter = $_GET['filter'];
    $query = "SELECT 
    id,
    mobil, 
    jumlah, 
    CONCAT(FORMAT((jumlah / total_jumlah) * 100, 2)) AS presentase
FROM (
    SELECT 
        id,
        mobil, 
        jumlah,
        (SELECT SUM(jumlah) FROM pie) AS total_jumlah
    FROM 
        pie
) AS subquery
ORDER BY 
    jumlah $filter";

    $result = mysqli_query($koneksi, $query);

    // Inisialisasi array untuk menyimpan data
    $data = [];

    // Periksa apakah hasil query tidak kosong
    if ($result->num_rows > 0) {
        // Loop melalui hasil query dan menyimpan data ke dalam array
        while ($row = $result->fetch_assoc()) {
            $data[] = [
                'id' => $row['id'],
                'name' => $row['mobil'],
                'jumlah' => $row['jumlah'],
                'y' => $row['presentase'] // Mengonversi nilai ke tipe float jika diperlukan
                // Anda dapat menambahkan 'sliced' dan 'selected' di sini jika diperlukan
            ];
        }
    }

    // Tentukan arah pengurutan (ascending atau descending) berdasarkan permintaan
    $sort_order = 'DESC'; // Misalnya, defaultnya descending
    if ($filter && $filter == 'ASC') {
        $sort_order = 'ASC'; // Jika ada parameter sort=asc, ubah ke ascending
    }

    // Mengurutkan data berdasarkan 'y' (presentase) berdasarkan arah yang dipilih
    usort($data, function ($a, $b) use ($sort_order) {
        if ($sort_order == 'ASC') {
            // Urutan dari nilai presentase terendah ke tertinggi
            if ($a['y'] == $b['y']) {
                return 0;
            }
            return ($a['y'] < $b['y']) ? -1 : 1;
        } else {
            // Urutan dari nilai presentase tertinggi ke terendah (default: descending)
            if ($a['y'] == $b['y']) {
                return 0;
            }
            return ($a['y'] > $b['y']) ? -1 : 1;
        }
    });

    // Menentukan peringkat
    $ranking = 1;
    if ($sort_order == 'ASC') {
        // Jika ascending, ranking dimulai dari yang terbesar
        $ranking = count($data);
    }

    // Menambahkan ranking ke setiap elemen dalam array
    foreach ($data as $key => $value) {
        $data[$key]['ranking'] = $ranking;
        if ($sort_order == 'ASC') {
            // Jika ascending, kurangi ranking karena dimulai dari yang terbesar
            $ranking--;
        } else {
            // Jika descending, tingkatkan ranking karena dimulai dari yang terbesar
            $ranking++;
        }
    }

    // Jika ingin menambahkan pesan sebelum output JSON
    $title = "Presentase Merek Mobil";

    // Buat array untuk menggabungkan pesan dan data dalam satu struktur JSON
    $response = [
        'title' => $title,
        'data' => $data
    ];

    // Mengirimkan data dalam format JSON
    header('Content-Type: application/json');
    echo json_encode($response, JSON_NUMERIC_CHECK);
}

<?php
// ambil koneksi dari folder koneksi
include "koneksi/index.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>grafik menggunakan highchart</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="container">
        <h1><i>grafik donut highchart</i></h1>
        <br>
        <div class="form-group">
            <i><label>Filter</label> (berdasarkan ascending / descending)</i><br>
            <select name="filter" id="filter">
                <option value="DESC">DESC</option>
                <option value="ASC">ASC</option>
            </select>
        </div>
        <figure class="highcharts-figure">
            <div id="pie"></div>
            <p class="highcharts-description">
                Diagram lingkaran sangat berguna untuk menunjukkan bagaimana presentasi berbagai merek mobil. Meskipun mungkin memerlukan sedikit usaha untuk memahaminya dibandingkan dengan diagram batang, diagram ini tetap dipilih karena kemampuannya dalam menyajikan komposisi dari dataset yang lebih kecil secara visual.
            </p>
        </figure>

        <hr>
        <h3><i>Data Table</i></h3>

        <center>
            <div id="loader"></div>
        </center>

        <table id="dataTable" class="table table-striped">
            <thead>
                <tr>
                    <th>ID Unik</th>
                    <th>Mobil</th>
                    <th>Jumlah</th>
                    <th>Presentase</th>
                    <th>Ranking</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data will be dynamically added here -->
            </tbody>
            <tfoot>
                <!-- Data will be dynamically added here -->
            </tfoot>
        </table>
    </div>

    <!-- jquery cdn -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- js highchart -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <!-- highchrat pie -->
    <script src="assets/js/handle-chart.js"></script>
</body>

</html>
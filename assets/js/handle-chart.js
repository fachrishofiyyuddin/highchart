$(document).ready(function() {
    function highchart(filter) {

        $.ajax({
            url: "api.php",
            type: "GET",
            dataType: "json",
            data: {
                filter: filter
            },
            success: function(response) {
                console.log(response);
                // menampilkan pie chart
                Highcharts.chart('pie', {
                    chart: {
                        type: 'pie'
                    },
                    title: {
                        text: response.title
                    },
                    tooltip: {
                        valueSuffix: '%'
                    },
                    subtitle: {
                        text: 'Source:<a href="https://www.mdpi.com/2072-6643/11/3/684/htm" target="_default">MDPI</a>'
                    },
                    plotOptions: {
                        series: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: [{
                                enabled: true,
                                distance: 20
                            }, {
                                enabled: true,
                                distance: -40,
                                format: '{point.percentage:.1f}%',
                                style: {
                                    fontSize: '1.2em',
                                    textOutline: 'none',
                                    opacity: 0.7
                                },
                                filter: {
                                    operator: '>',
                                    property: 'percentage',
                                    value: 10
                                }
                            }]
                        }
                    },
                    series: [{
                        name: 'Percentage',
                        colorByPoint: true,
                        data: response.data
                    }]
                });

                // menampilkan table
                if (response.data.length > 0) {
                    // Bersihkan tabel
                    $('#dataTable tbody').empty();
                    $('#dataTable tfoot').empty();

                    // Tambahkan loader di dalam tbody
                    $('#dataTable tbody').html(
                        '<tr><td colspan="4" class="loader-container"><div class="loader"></div></td></tr>'
                    );

                    // Deklarasikan variabel untuk menyimpan total jumlah
                    var totalJumlah = 0;

                    // Tunggu selama 3 detik sebelum melakukan AJAX
                    setTimeout(function() {
                        // Hapus loader
                        $('#dataTable tbody').find('.loader-container').remove();
                        $('#dataTable tfoot').find('.loader-container').remove();

                        // Iterasi data dan tambahkan baris baru ke tabel
                        $.each(response.data, function(index, item) {
                            // Tambahkan nilai jumlah ke totalJumlah
                            totalJumlah += item.jumlah;

                            $('#dataTable tbody').append(
                                '<tr>' +
                                '<td>' + item.id + '</td>' +
                                '<td>' + item.name + '</td>' +
                                '<td>' + item.jumlah + '</td>' +
                                '<td>' + item.y + '%' + '</td>' +
                                '<td>' + item.ranking + '</td>' +
                                '</tr>'
                            );
                        });

                        // Tambahkan total jumlah ke dalam tfoot
                        $('#dataTable tfoot').html(
                            '<tr>' +
                            '<td style="text-align: center;" colspan="2"><strong>Total</strong></td>' +
                            '<td><strong>' + totalJumlah + '</strong></td>' +
                            '<td></td>' +
                            '<td></td>' +
                            '</tr>'
                        );
                    }, 1200);
                }



            }
        });

    }
    $("#filter").change(function() {
        const filter = $(this).val();
        // console.log(filter);
        highchart(filter);
    });

    var filter = "DESC";

    highchart(filter);
});
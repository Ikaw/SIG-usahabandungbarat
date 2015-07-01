$(function () {
    /**/
    $.ajax({
        url: "ambil_data_usaha.php",
        method: "POST",
        dataType: "json",
        success:function(a){
            $('#container').highcharts({
                chart: {type: 'column'},
                title: {text: 'Statistik Data Usaha Kabupaten Bandung Barat'},
                subtitle: {text: 'Berdasarkan Sektor Usaha'},
                xAxis: {
                    categories: a.label,
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Jumlah Usaha'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y:.1f} Usaha</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: [{
                    name: 'Sektor Usaha',
                    data: a.data
                }]
            });
        }
    });
});
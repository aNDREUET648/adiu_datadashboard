document.addEventListener('DOMContentLoaded', function () {

  /*  
      Mediante el intercambio de información con el servidor, 
      cargaré datos del servidor usando una petición AJAX HTTP POST

      Haciendo uso del método jQuery.post (url [, data ] [, Callback function ]) 
      Mandaré mi solicitud al servidor.
      Si todo va bien, devolverá el resultado que he solicitado
      y ejecutará la función de CallBack a continuación

      El código de la función de CallBack es bastante simple.
      La petición jQuery.post() me devuelve del server un 'result' en formato JSON,
      lo convierto en un objeto JavaScript y lo voy colocando en diferentes arrays.
      Estos arrays, los necesitará HighCharts para poder representar los datos gráficamente.      
  */

  /*
      Primera petición al servidor. 
      Top 10 de los Géneros de música
      Gráfica tipo: bar
      Representación de totales y porcentajes
  */
    $.post("./server/server.php", {solicitud : 1}, function(result){
        let generos = new Array();
        let vendido = new Array();
        let porcien = new Array();
        var result_parseado = JSON.parse(result);

        for (let i in result_parseado){
          generos.push(result_parseado[i][0]);
          vendido.push(parseInt(result_parseado[i][1]));
          porcien.push(parseFloat(result_parseado[i][2]));
        }

        const chart = Highcharts.chart('container1', {
            chart: { type: 'bar' },
            title: { text: 'Top 10 de los Géneros de música' },
            tooltip: {  pointFormat: '{series.name}: {point.y:.1f} ',
                        split: true },
            plotOptions: {  bar: { dataLabels: {
                            enabled: true } } },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -40,
                y: 80,
                floating: true,
                borderWidth: 1,
                backgroundColor:
                    Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
                shadow: true },
            credits: { enabled: false },
            xAxis: { categories: generos },
            yAxis: { title: { text: 'Unidades Vendidas' } },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0 } },
            series: [{  name: 'Vendido',
                        data: vendido }, 
                    {   name: 'Porcentaje',
                        data: porcien }]
        });
    });


  /*
      Segunda petición al servidor. 
      Ventas por porcentaje en función del tipo de soporte
      Gráfica tipo: pie
      Representación de porcentajes 
  */
    $.post("./server/server.php", {solicitud : 2}, function(result){
        let media_type = new Array();
        let percent = new Array();
        var result_parseado = JSON.parse(result);

        for (let i in result_parseado){
          media_type.push(result_parseado[i][0]);
          percent.push(parseFloat(result_parseado[i][2]));
        }
        const chart = Highcharts.chart('container2', {
            chart: {
                type: 'pie'
            },
            title: {
                text: 'Ventas por porcentaje en función del tipo de soporte'
            },
            tooltip: {
                pointFormat: '{series.name}: {point.percentage:.1f} %'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                    },
                    showInLegend: true
                }
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Soporte',
                data: [{
                    name: media_type[0],
                    y: percent[0]
                }, {
                    name: media_type[1],
                    y: percent[1]
                }, {
                    name: media_type[2],
                    y: percent[2]
                }, {
                    name: media_type[3],
                    y: percent[3]
                }, {
                    name: media_type[4],
                    y: percent[4]
                }]
            }]
        });
    });


  /*
      Tercera petición al servidor. 
      Unidades vendidas en función del tipo de soporte
      Gráfica tipo: column
      Representación de unidades totales 
  */
    $.post("./server/server.php", {solicitud : 3}, function(result){
        let media_type = new Array();
        let total_qty = new Array();
    //                console.log(result);
        var result_parseado = JSON.parse(result);

        for (let i in result_parseado){
          media_type.push(result_parseado[i][0]);
          total_qty.push(parseInt(result_parseado[i][1]));
        }
        const chart = Highcharts.chart('container3', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Unidades vendidas'
            },
            subtitle: {
                text: 'En función del tipo de soporte'
            },
            xAxis: {
                categories: media_type,
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Millones de unidades'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} M Tracks</b></td></tr>',
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
            credits: {
                enabled: false
            },
            series: [{
                name: 'Unidades Vendidas',
                data: total_qty

            }]
        });
    });


  /*
      Cuarta petición al servidor. 
      Total de ventas realizadas en cada país
      Gráfica tipo: column
      Representación de Millones de euros(€) en ventas
  */
    $.post("./server/server.php", {solicitud : 4}, function(result){
        let BillingCountry = new Array();
        let TotalSales = new Array();
        var result_parseado = JSON.parse(result);

        for (let i in result_parseado){
          BillingCountry.push(result_parseado[i][0]);
          TotalSales.push(parseFloat(result_parseado[i][1]));
        }
        const chart = Highcharts.chart('container4', {
            chart: {
                type: 'column'
            },
            title: {
                text: '<b>Total Ventas (en millones de €)</b>'
            },
            subtitle: {
                text: 'En cada país'
            },
            xAxis: {
                categories: BillingCountry,
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Millones de €'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} M€</b></td></tr>',
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
            credits: {
                enabled: false
            },
            series: [{
                name: 'Millones de €',
                data: TotalSales

            }]
        });
    });

});
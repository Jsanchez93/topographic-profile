@extends('layout.master')

@section("cuerpo")
    <div class="container">
        
        <div id="result" style="width:100%; height:700px;"></div>
        
    </div>
@endsection


@section("jsExtra")
<script src="https://code.highcharts.com/highcharts.js"></script>
<!--[if lt IE 9]>
<script src="https://code.highcharts.com/modules/oldie.js"></script>
<![endif]-->
<script src="http://code.highcharts.com/modules/exporting.js"></script>
<script>

let round = (n) => parseFloat(n.toFixed(2));

Highcharts.chart('result', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Gráfica perfil topográfico'
    },
    xAxis: {
        categories: ['pozo1', 'pozo2', 'pozo3', 'pozo4', 'pozo5', 'pozo6']
    },
    yAxis: [{
        min: 0,
        max: 350,
        reversed: true,
        title: {
            text: 'Profundidad'
        },
        stackLabels: {
            enabled: true,
            style: {
                color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
            }
        }
    },{ 
        min: 0,
        max: 350,
        reversed: true,
        labels: {
            format: '{value} mts',
            style: {
                color: "#134eb0"
            }
        },
        title: {
            text: 'N.E. aprox',
            style: {
                color: "#134eb0"
            }
        },
        opposite: true

    }, { 
        min: 0,
        max: 1090,
        title: {
            text: 'Elevación',
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
        labels: {
            format: '{value} mts',
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        }        
    }],
    legend: {
        enabled: false
    },
    tooltip: {
        /*headerFormat: '<b>{point.x}</b><br/>',
        pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'*/
    },
    plotOptions: {
        column: {
            stacking: 'normal',
            dataLabels: {
                enabled: false
            }
        }
    },
    series: [{
        name: 'N.E aprox',
        data: [161, 165, 180, 132, 138, 155],
        color: "#134eb0"
    }, {
        name: 'Aire',
        data: [(300-161), (300-165), (300-180), round(201.2-132), (243-138), (274-155)],
        color: "#EEEEEE"        
    },
    {
        name: 'N.E aprox',
        type: 'spline',
        yAxis: 1,
        data: [(300-161), (300-165), (300-180), round(201.2-132), (243-138), (274-155)],
        tooltip: {
            visible: ' mts'
        }
    }]
});




</script>
@endsection
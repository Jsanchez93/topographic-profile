@extends('layout.master')

@section("cuerpo")
    <div class="container">
        
        <div id="result" style="width:100%; height:500px;"></div>
        
    </div>
@endsection


@section("jsExtra")
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!--[if lt IE 9]>
    <script src="https://code.highcharts.com/modules/oldie.js"></script>
    <![endif]-->
    <script src="http://code.highcharts.com/modules/exporting.js"></script>
    <script>

        Highcharts.chart('result', {
            chart: {
                zoomType: 'xy'
            },
            title: {
                text: 'Average Monthly Weather Data for Tokyo'
            },
            subtitle: {
                text: 'Source: WorldClimate.com'
            },
            xAxis: [{
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                crosshair: true
            }],
            yAxis: [{ // Primary yAxis
                min: 0,
                max: 1500,
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

            }, { // Secondary yAxis
                min: 0,
                max: 1500,
                gridLineWidth: 0,
                title: {
                    text: 'Profundidad',
                    style: {
                        color: Highcharts.getOptions().colors[0]
                    }
                },
                labels: {
                    format: '{value} mts',
                    style: {
                        color: Highcharts.getOptions().colors[0]
                    }
                }

            }, { // Tertiary yAxis
                min: 0,
                max: 1500,
                gridLineWidth: 0,
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
                },
                opposite: true
            }],
            tooltip: {
                shared: true
            },
            legend: {
                layout: 'vertical',
                align: 'left',
                x: 80,
                verticalAlign: 'top',
                y: 55,
                floating: true,
                backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
            },
            series: [{
                name: 'Profundidad',
                type: 'column',
                yAxis: 1,
                data: [1028, 1056, 1150, 905, 905, 992],
                tooltip: {
                    valueSuffix: ' mts'
                }

            }, {
                name: 'Elevacion',
                type: 'spline',
                yAxis: 2,                
                data: [1028, 1056, 1150, 905, 905, 992],
                marker: {
                    enabled: false
                },
                dashStyle: 'shortdot',
                tooltip: {
                    valueSuffix: ' mts'
                }

            }, {
                name: 'N.E aprox',
                type: 'spline',
                data: [161, 165, 180, 132, 138, 155],
                tooltip: {
                    valueSuffix: ' mts'
                }
            }]
        });
        console.log(Highcharts.getOptions().colors);
    </script>
@endsection
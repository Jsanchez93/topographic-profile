@extends('layout.master')

@section("cuerpo")
    <div class="container">
                
        <p class="flow-text center-align">Gráfica perfil topográfico</p>
        <p class="flow-text center-align">Punto de referencia 0 -> Elevación de 1,150mts</p>
        <div id="result" style="width:100%; height:700px;"></div>
        
    </div>
    <style type="text/css" media="screen">.highcharts-credits{display: none !important;}</style>
@endsection


@section("jsExtra")
<script src="http://code.highcharts.com/5.0/highcharts.js"></script>
<!--[if lt IE 9]>
<script src="https://code.highcharts.com/modules/oldie.js"></script>
<![endif]-->
<script src="http://code.highcharts.com/modules/exporting.js"></script>
<script>



let round = (n) => parseFloat(n.toFixed(2));
let elevations = [];

elevations['P. la bomba'] = 905;
elevations['Casco'] = 1150;
elevations['Punto 4'] = 1056;
elevations['Punto 2'] = 1028;
elevations['P. ESEN'] = 992;
elevations['P-1 la Joya'] = 905;

    
Highcharts.chart('result', {
    chart: {
        type: 'column'
    },
    title: {
        text: ''
    },
    xAxis: {
        opposite: true,
        categories: ['P. la bomba', 'Casco', 'Punto 4', 'Punto 2', 'P. ESEN', 'P-1 la Joya']
    },
    yAxis: [{
        min: 0,
        max: 540,
        reversed: true,
        title: {
            text: 'Profundidad'
        }
    },{ 
        min: 0,
        max: 540,
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

    },{ 
        min: 0,
        max: 540,
        reversed: true,
        visible: false

    }],
    legend: {
        enabled: false
    },
    tooltip: {
        shared: true,
        //headerFormat: '<b>{point.x}</b><br/>',
        formatter: function(arg){
            let name = this.x;
            let NE = this.points[0].point.y;
            let depth = this.points[0].point.y + this.points[1].point.y;
            let elevation = elevations[name];
            return "<b>"+name+"</b><br />Profundidad: "+depth+"m<br />N.E. aprox: "+NE+"mts<br />Elevación: "+elevation+"mts";
            
        }
        /*pointFormat: '{series.name}: {point.y}<br/>'*/
    },
    plotOptions: {
        column: {
            stacking: 'normal',
            dataLabels: {
                enabled: false
            },
            states: {
                hover: {
                    enabled: false
                }
            }
        }
    },
    series: [{
        name: 'N.E aprox',
        data: [132, 180, 165, 161, 155, 138],
        color: "#134eb0"
    },{
        name: 'Aire',
        data: [round(201.2-132), (300-180), (300-165), (300-161), (274-155), (243-138)],
        color: "#EEEEEE"
    },{
        name: 'Desfase',
        data: [245, 0, 94, 122, 158, 245],
        color: "rgba(255, 255, 255, 0)"        
    },{
        name: 'N.E aprox',
        type: 'spline',
        yAxis: 1,
        data: [round(201.2-132)+245, 120, (300-165+94), (300-161+122), (274-155+158), (243-138+245)]        
    },{
        name: 'Elevación',
        type: 'spline',
        yAxis: 2,
        data: [245, 0, 94, 122, 158, 245],
        color: '#815a38'
    }]
});




</script>
@endsection
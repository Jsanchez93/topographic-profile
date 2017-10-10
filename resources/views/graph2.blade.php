@extends('layout.master')

@section("cuerpo")
    <div class="container">
        <div class="row">
            <div class="col s12">
                <p class="flow-text center-align">Gráfica perfil topográfico</p>    
            </div>
        </div>        
        <div class="row">
            <div class="col s11" style="padding: 0 !important">
                <div id="result" style="width:100%; height:600px;"></div>
            </div>
            <div id="CanvasContainer" class="col s1" style="padding: 0 !important"></div>
        </div>        
    </div>
    <style type="text/css" media="screen">.highcharts-credits{display: none !important;}</style>
@endsection


@section("jsExtra")
<script src="https://code.highcharts.com/highcharts.js"></script>
<!--[if lt IE 9]>
<script src="https://code.highcharts.com/modules/oldie.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<![endif]-->
<script>



let round = (n) => parseFloat(n.toFixed(2));
let elevations = [];
elevations['P. la bomba'] = 905;
elevations['Casco'] = 1150;
elevations['Punto 4'] = 1056;
elevations['Punto 2'] = 1028;
elevations['P. ESEN'] = 992;
elevations['P-1 la Joya'] = 905;
let elevationsCanvas = [905,1150,1056,1028,992,905];

let auxDepth = [];
auxDepth['P. la bomba'] = 245;
auxDepth['Casco'] = 0;
auxDepth['Punto 4'] = 94;
auxDepth['Punto 2'] = 122;
auxDepth['P. ESEN'] = 158;
auxDepth['P-1 la Joya'] = 245;

let make_elevation = (chart) => {    
    let colunms = chart.axes[1]; 
    let offsetCanvas = colunms.top;               //offset of graph

    //Create canvas
    let CanvasContainer = document.getElementById('CanvasContainer');
    CanvasContainer.innerHTML = '<canvas id="ElevationCanvas" width="60" height="'+ colunms.height +'"></canvas>';    

    let ElevationCanvas = document.getElementById('ElevationCanvas');    
    let offset = colunms.series[2].data;    //depth offset by elevation 
                                            
    //Drawing
    let ctx = ElevationCanvas.getContext('2d');
    ctx.fillStyle = "#815a38";
    ctx.fillRect(0, offsetCanvas, 3, colunms.height);

    ctx.fillStyle = "#815a38";
    offset.forEach(function(elem) {
        let h = elem.shapeArgs.height + offsetCanvas;
        ctx.fillRect(0, h, 6, 1);
        ctx.font = "12px Arial";
        ctx.fillText( elevationsCanvas[elem.index] + " m", 6, h+5 );
    });
    
    ctx.save();
    ctx.translate(5, colunms.height - 70);
    ctx.rotate(Math.PI / 2);
    ctx.font = "15px Arial";
    ctx.fillText("Elevación", 0, 0);
    ctx.restore();
}

    
Highcharts.chart('result', {
    chart: {
        type: 'column'
    },
    title: {
        text: ''
    },
    xAxis: {
        opposite: true,
        categories: ['P. la bomba', 'Casco', 'Punto 4', 'Punto 2', 'P. ESEN', 'P-1 la Joya'],
        tickLength: 30
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
            format: '{value} m',
            style: {
                color: "#7cb5ed"
            }
        },
        title: {
            text: 'N.E. aprox',
            style: {
                color: "#7cb5ed"
            }
        },
        opposite: true,
        crosshair: true

    },{ 
        min: 0,
        max: 540,
        reversed: true,
        visible: false,
        crosshair: true

    }],
    legend: {
        enabled: false
    },
    tooltip: {
        shared: true,
        formatter: function(arg){
            let name = this.x;
            let NE = this.points[0].point.y;
            let depth = this.points[0].point.y + this.points[1].point.y;
            let elevation = elevations[name];
            return "<b>"+name+"</b><br />Elevación: "+elevation+" m.<br />N.E. aprox: "+NE+" m.<br /><br />Profundidad: "+depth+" m.";
            
        }
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
        color: "#134eb0",
        dataLabels: {
            enabled: true,
            formatter: function(){
                let name =this.point.category;
                let total = this.total;
                let depth = (total - auxDepth[name]) + " m";
                return depth;
            }            
        }
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
        color: "#7cb5ed",
        data: [round(201.2-132)+245, 120, (300-165+94), (300-161+122), (274-155+158), (243-138+245)],
        dataLabels: {
            enabled: true,
            format: '{y} m'
        }
    },{
        name: 'Elevación',
        type: 'spline',
        yAxis: 2,
        data: [245, 0, 94, 122, 158, 245],
        color: '#815a38',
        dataLabels: {
            enabled: true,
            color: "#815a38",
            formatter: function(){
                let name = this.point.category;
                let elevation = elevations[name] + " m";
                return elevation;
            }            
        }
    }]
}, function(chart){ make_elevation(chart) });




</script>
@endsection
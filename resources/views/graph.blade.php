@extends('layout.master')

@section("cuerpo")
    <div class="container">
        <div class="row">
            <div class="col s12 m6 l11 xl11">
                <p class="flow-text center-align">Gráfica perfil topográfico</p>    
            </div>
            <div class="col s12 m6 l1 xl1">
                <p class="flow-text center-align">
                    <a href="{{ url('/') }}">                    
                        <button class="btn waves-effect waves-light" name="add-data">Nueva Gráfica</button>
                    </a>
                </p>
            </div>
        </div>        
        <div class="row">
            <div class="col s10 m11 l11 xl11 n-p">
                <div id="result"></div>
            </div>
            <div id="CanvasContainer" class="col s2 m1 l1 xl1 n-p"></div>
        </div>
        <div class="row">
            <form method="post" action="{{ url('graph') }}">                
                <div class="col s12 m12 offset-l2 l8 offset-xl2 xl8 input-field">
                    <input required="required" name="mainName" type="text" class="validate" value="{{ $title }}">
                    <label for="location">Título</label>
                </div>
                <div class="col s12 m12 offset-l2 l8 offset-xl2 xl8">
                    {{ csrf_field() }}                    
                    <table class="bordered highlight responsive-table">
                        <thead>
                            <tr>
                                <th>Ubicación</th>
                                <th>Elevación (msnm)</th>
                                <th>N.E. aprox. (m)</th>
                                <th>Profundidad (m)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($location as $element)
                                <tr>
                                    <td><input required="required" name="location[]" type="text" class="validate browser-default" value="{{ $element }}"></td>
                                    <td><input required="required" name="elevation[]" type="number" step=".01" class="validate browser-default" value="{{ $elevation[$loop->index] }}"></td>
                                    <td><input required="required" name="NE[]" type="number" step=".01" class="validate browser-default" value="{{ $NE[$loop->index] }}"></td>
                                    <td><input required="required" name="depth[]" type="number" step=".01" class="validate browser-default" value="{{ $depth[$loop->index] }}"></td>
                                </tr>                        
                            @endforeach                    
                        </tbody>
                    </table>
                </div>
                <div class="col s12 m12 offset-l2 l8 offset-xl2 xl8 right-align">
                    <button class="btn waves-effect waves-light" id="update-graph" type="submit" name="action">Actualizar
                        <i class="fa fa-paper-plane" aria-hidden="true"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection


@section("jsExtra")
<script src="https://code.highcharts.com/highcharts.js"></script>
<!--[if lt IE 9]>
<script src="https://code.highcharts.com/modules/oldie.js"></script>
<![endif]-->
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script>

let round = (n) => parseFloat(n.toFixed(2));
let elevations = [];
@foreach ($elevation as $element)
    elevations['{{ $location[$loop->index] }}'] = {{ $element }};
@endforeach

let elevationsCanvas = [
    @foreach ($elevation as $element)
        @if ($loop->last)
            {{ $element }}
        @else
            {{ $element }},
        @endif            
    @endforeach
];

let auxDepth = [];
@foreach ($elevation as $element)
    auxDepth['{{ $location[$loop->index] }}'] = {{ $max_elevation - $element }};
@endforeach

let auxNE = [];
@foreach ($NE as $element)
    auxNE['{{ $location[$loop->index] }}'] = {{ $element }};
@endforeach

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
    ctx.translate(5, colunms.height - 125);
    ctx.rotate(Math.PI / 2);
    ctx.font = "15px Arial";
    ctx.fillText("Elevación (msnm)", 0, 0);
    ctx.restore();
}

    
Highcharts.chart('result', {
    exporting: {
        sourceWidth: 1000,
        filename: "{{ str_replace(' ', '-', $title) }}",
        chartOptions: {
            subtitle: {
                text: "Elevación (msnm)",
                style: {            
                    color: "#815a38",
                    fontWeight: 'bold',
                    fontSize: '14px'
                }
            }
        }
    },

    navigation: {
        buttonOptions: {
            verticalAlign: 'top',
            align: 'left',
            y: 0
        }
    },
    chart: {
        type: 'column'
    },
    title: {
        text: ''
    },
    subtitle: {
        text: "{{ $title }}",
        style: {
            fontSize: '14px'
        }
    },
    xAxis: {
        opposite: true,
        categories: [
            @foreach ($location as $element)
                @if ($loop->last)
                    '{{ $element }}'
                @else
                    '{{ $element }}',
                @endif    
            @endforeach
        ],
        tickLength: 30
    },
    yAxis: [{
        min: 0,
        max: {{ $max_depth }},
        reversed: true,
        title: {
            text: 'Profundidad'
        }
    },{ 
        min: 0,
        max: {{ $max_depth }},
        reversed: true,
        labels: {
            format: '{value} m',
            style: {
                color: "#5b9fe1"
            }
        },
        title: {
            text: 'N.E. aprox',
            style: {
                color: "#5b9fe1"
            }
        },
        opposite: true,
        crosshair: true

    },{ 
        min: 0,
        max: {{ $max_depth }},
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
            let depth = round(this.points[0].point.y + this.points[1].point.y);
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
            },
            pointWidth: 20
        }
    },
    series: [{
        name: 'N.E aprox',
        data:
        [   @foreach ($NE as $element)
                @if ($loop->last)
                    {{ $element }}
                @else
                    {{ $element }},
                @endif            
            @endforeach
        ],
        color: "#134eb0",
        dataLabels: {
            enabled: true,                        
            formatter: function(){
                let name = this.point.category;
                let total = this.total;
                let depth = (total - auxDepth[name]) + " m";
                return depth;
            },
            style: {
                color: "#333333"
            },
            verticalAlign: 'bottom',
            y: 20         
        }
    },{
        name: 'Aire',
        data: [
            @foreach ($air as $element)
                @if ($loop->last)
                    {{ $element}} 
                @else
                    {{ $element}},
                @endif            
            @endforeach  
        ],
        color: "#EEEEEE"
    },{
        name: 'Desfase',
        data: [
            @foreach ($offset as $element)
                @if ($loop->last)
                    {{ $element}} 
                @else
                    {{ $element}},
                @endif            
            @endforeach  
        ],
        color: "rgba(255, 255, 255, 0)"        
    },{
        name: 'N.E aprox',
        type: 'spline',
        yAxis: 1,
        color: "#5b9fe1",
        data: [
            @foreach ($offset as $element)
                @if ($loop->last)
                    {{ $air[$loop->index] + $element}}
                @else
                    {{ $air[$loop->index] + $element}},
                @endif            
            @endforeach  
        ],
        dataLabels: {
            enabled: true,
            style: {
                color: "#5b9fe1",
                textOutline: "0px"
            },
            formatter: function(){
                let name = this.point.category;
                return auxNE[name] + " m";
            }   
        }
    },{
        name: 'Elevación',
        type: 'spline',
        yAxis: 2,
        data: [
            @foreach ($offset as $element)
                @if ($loop->last)
                    {{ $element}}
                @else
                    {{ $element}},
                @endif            
            @endforeach  
        ],
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
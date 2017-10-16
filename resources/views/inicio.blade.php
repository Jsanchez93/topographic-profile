@extends('layout.master')

@section("cuerpo")
    <div class="container">
        
        <div class="row">
            <div class="col s12">
                <p class="flow-text center-align">Gráfica perfil topográfico</p>
            </div>
        </div>

        <div class="row">
            <div class="col s12">
                <div class="info z-depth-2">
                        
                    <form id="form-data" method="post" action="{{ url('graph') }}">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="input-field col s12">
                                <input required="required" name="mainName" type="text" class="validate">
                                <label for="location">Título</label>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="input-field col s12 right-align">
                                <button class="btn waves-effect waves-light" name="add-data" id="add-data">Agregar
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </button>
                                <button class="btn waves-effect waves-light" type="submit" name="action">Graficar
                                    <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>

                        <div id="dataRow" class="row dataRow">
                            <div class="input-field col s12">
                                <input required="required" name="location[]" type="text" class="validate">
                                <label for="location">Ubicación</label>
                            </div>
                            <div class="input-field col s12 m4 l4 xl4">
                                <input required="required" name="elevation[]" type="number" step=".01" class="validate" >
                                <label for="elevation">Elevación</label>
                            </div>
                            <div class="input-field col s12 m4 l4 xl4">
                                <input required="required" name="NE[]" type="number" step=".01" class="validate" >
                                <label for="NE">N.E. (Mts) Aprox.</label>
                            </div>
                            <div class="input-field col s12 m4 l4 xl4">
                                <input required="required" name="depth[]" type="number" step=".01" class="validate" >
                                <label for="depth">Profundidad</label>
                            </div>                            
                        </div>

                        
                    </form>
                                        

                </div>
            </div>                    
        </div>
        
    </div>
@endsection
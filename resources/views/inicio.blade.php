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
                        
                    <form method="post" action="{{ url('graph') }}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="" name="location[]" type="text" class="validate" value="Punto 2">
                                <label for="location">Ubicación</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m4 l4 xl4">
                                <input id="" name="elevation[]" type="text" class="validate"  value="1028">
                                <label for="elevation">Elevación</label>
                            </div>
                            <div class="input-field col s12 m4 l4 xl4">
                                <input id="" name="NE[]" type="text" class="validate"  value="161">
                                <label for="NE">N.E. (Mts) Aprox.</label>
                            </div>
                            <div class="input-field col s12 m4 l4 xl4">
                                <input id="" name="depth[]" type="text" class="validate"  value="300">
                                <label for="depth">Profundidad</label>
                            </div>
                        </div>



                        <div class="row">
                            <div class="input-field col s12">
                                <input id="" name="location[]" type="text" class="validate" value="Punto 4">
                                <label for="location">Ubicación</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m4 l4 xl4">
                                <input id="" name="elevation[]" type="text" class="validate"  value="1056">
                                <label for="elevation">Elevación</label>
                            </div>
                            <div class="input-field col s12 m4 l4 xl4">
                                <input id="" name="NE[]" type="text" class="validate"  value="165">
                                <label for="NE">N.E. (Mts) Aprox.</label>
                            </div>
                            <div class="input-field col s12 m4 l4 xl4">
                                <input id="" name="depth[]" type="text" class="validate"  value="300">
                                <label for="depth">Profundidad</label>
                            </div>
                        </div>



                        <div class="row">
                            <div class="input-field col s12">
                                <input id="" name="location[]" type="text" class="validate" value="Casco">
                                <label for="location">Ubicación</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m4 l4 xl4">
                                <input id="" name="elevation[]" type="text" class="validate"  value="1150">
                                <label for="elevation">Elevación</label>
                            </div>
                            <div class="input-field col s12 m4 l4 xl4">
                                <input id="" name="NE[]" type="text" class="validate"  value="180">
                                <label for="NE">N.E. (Mts) Aprox.</label>
                            </div>
                            <div class="input-field col s12 m4 l4 xl4">
                                <input id="" name="depth[]" type="text" class="validate"  value="300">
                                <label for="depth">Profundidad</label>
                            </div>
                        </div>



                        <div class="row">
                            <div class="input-field col s12">
                                <input id="" name="location[]" type="text" class="validate" value="P.L Bomba">
                                <label for="location">Ubicación</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m4 l4 xl4">
                                <input id="" name="elevation[]" type="text" class="validate"  value="905">
                                <label for="elevation">Elevación</label>
                            </div>
                            <div class="input-field col s12 m4 l4 xl4">
                                <input id="" name="NE[]" type="text" class="validate"  value="132">
                                <label for="NE">N.E. (Mts) Aprox.</label>
                            </div>
                            <div class="input-field col s12 m4 l4 xl4">
                                <input id="" name="depth[]" type="text" class="validate"  value="201.2">
                                <label for="depth">Profundidad</label>
                            </div>
                        </div>



                        <div class="row">
                            <div class="input-field col s12">
                                <input id="" name="location[]" type="text" class="validate" value="P 1 la Joya">
                                <label for="location">Ubicación</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m4 l4 xl4">
                                <input id="" name="elevation[]" type="text" class="validate"  value="905">
                                <label for="elevation">Elevación</label>
                            </div>
                            <div class="input-field col s12 m4 l4 xl4">
                                <input id="" name="NE[]" type="text" class="validate"  value="138">
                                <label for="NE">N.E. (Mts) Aprox.</label>
                            </div>
                            <div class="input-field col s12 m4 l4 xl4">
                                <input id="" name="depth[]" type="text" class="validate"  value="243">
                                <label for="depth">Profundidad</label>
                            </div>
                        </div>



                        <div class="row">
                            <div class="input-field col s12">
                                <input id="" name="location[]" type="text" class="validate" value="Esen">
                                <label for="location">Ubicación</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m4 l4 xl4">
                                <input id="" name="elevation[]" type="text" class="validate"  value="992">
                                <label for="elevation">Elevación</label>
                            </div>
                            <div class="input-field col s12 m4 l4 xl4">
                                <input id="" name="NE[]" type="text" class="validate"  value="155">
                                <label for="NE">N.E. (Mts) Aprox.</label>
                            </div>
                            <div class="input-field col s12 m4 l4 xl4">
                                <input id="" name="depth[]" type="text" class="validate"  value="274">
                                <label for="depth">Profundidad</label>
                            </div>
                        </div>



                        <div class="row">
                            <div class="input-field col s12 right-align">
                                <button class="btn waves-effect waves-light" type="submit" name="action">Graficar
                                    <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>                                
                    </form>
                </div>
            </div>                    
        </div>
        
    </div>
@endsection
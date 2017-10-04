<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Topographic Profile - Home</title>
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
        @yield("cssExtra")
        <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    </head>
    <body>       

        <header>            
            <nav>
                <div class="nav-wrapper teal darken-3">
                    <a href="{{ url('/') }}" class="brand-logo"><i class="fa fa-line-chart" aria-hidden="true"></i>Gráficas</a>
                    {{-- <a href="#" data-activates="mobile" class="button-collapse"><i class="material-icons">menu</i></a> --}}
                </div>
            </nav>
        </header>

        <section id="body">
            @yield("cuerpo")            
        </section>
        
        <footer class="page-footer teal darken-3">
            <div class="container">
                <div class="row">
                    <div class="col l6 s12">
                        <h5 class="white-text">Footer Content</h5>
                        <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
                    </div>
                    <div class="col l4 offset-l2 s12">
                        <h5 class="white-text">Links</h5>
                        <ul>
                            <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                            <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                            <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                            <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                    © 2014 Copyright Text
                    <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
                </div>
            </div>
        </footer>        

        <!-- Compiled and minified JavaScript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
        <script src="https://use.fontawesome.com/9f30913a69.js"></script>
         @yield("jsExtra")
        <script src="{{ asset('js/index.js') }}"></script>
    </body>
</html>

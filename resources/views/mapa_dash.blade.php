<!DOCTYPE html>
<html lang="es" class="h-100">
<head>
	<title>MAPA-COVID-19</title>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
	<link href="https://getbootstrap.com/docs/4.4/dist/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script> -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="La COVID-19 es una enfermedad infecciosa causada por un nuevo virus que no había sido detectado en humanos hasta la fecha.">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/mapa.css?v=1.1') }}">
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200;400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

</head>
<body class="d-flex flex-column h-100">

    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-black">
            <a class="navbar-brand" href="#">CORONA VIRUS - COVID 19</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Mapa <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Estadistica</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    
    <main role="main" class="flex-shrink-0">
        <div id="content">
            <iframe width="100%" height="100%" class="cxontenido_frame" src="http://covidperu.live/" frameborder="0"></iframe>
        </div>
        <div class="col-md-3 offset-md-8">
            <div class="carding d-none d-lg-block">
                <div class="card">
                    <div class="card-header">
                        <h3>FECHA: <strong>{{ date('d/m/Y') }}</strong></h3>
                    </div>
                    <div class="card-body">
                        <div class="panel panel-primary">
                            <div class="panel-body">
                                <h2 class="text-primary text-center"><strong>CONFIRMADO</strong></h2>
                                <h3 class="text-center">
                                    <span class="numeros text-primary"><i class="fas fa-check-double"></i> {{ number_format($total['peru']['confirmado']) }}</span>
                                </h3>
                                <!-- <span class="adicional">+10</span> -->
                            </div>
                        </div>
                        <div class="panel panel-success">
                            <div class="panel-body">
                                <h2 class="text-success text-center"><strong>RECUPERADO</strong></h2>
                                <h3 class="text-center">
                                    <span class="numeros text-success"><i class="fas fa-exchange-alt"></i> {{ number_format($total['peru']['recuperado']) }}</span>
                                </h3>
                            </div>
                        </div>
                        <div class="panel panel-danger">
                            <div class="panel-body">
                                <h2 class="text-danger text-center"><strong>MUERTES</strong></h2>
                                <h3 class="text-center">
                                    <span class="numeros text-danger"><i class="fas fa-skull-crossbones"></i> {{ number_format($total['peru']['muerte']) }}</span>
                                </h3>
                            </div>
                        </div>
                        <div class="panel panel-warning">
                            <div class="panel-body">
                                <h2 class="text-warning text-center"><strong>HOSPITALIZADOS</strong></h2>
                                <h3 class="text-center">
                                    <span class="numeros text-warning"><i class="fas fa-address-card"></i> {{ number_format($hospital->hospitalizados) }}</span>
                                </h3>
                            </div>
                        </div>

                        
                    </div>
                </div>
            </div>
            <div class="hidden-lg-up">
                <div class="container">
                    <div style="margin-top: 7rem !important;">
                        <table class="table" style="border: 1px solid silver;">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">FECHA</th>
                                    <th scope="col" class="text-center">{{ date('d/m/Y') }}</th>
                                </tr>
                            </thead>
                            <tbody class="contenido_device" style="background: white;">
                                <tr>
                                    <th scope="row" class="text-success">CONFIRMADO</th>
                                    <td class="text-center text-success">{{ number_format($total['peru']['confirmado']) }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-info">RECUPERADO</th>
                                    <td class="text-center text-info"> {{ number_format($total['peru']['recuperado']) }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-danger">MUERTOS</th>
                                    <td class="text-center text-danger"> {{ number_format($total['peru']['muerte']) }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="footer mt-auto py-3">
        <div class="container">
            <span class="text-muted"></span>
        </div>
    </footer>

    <script>
        $(document).on('click','.thead-light',function(e){
            e.preventDefault();
            // alert('a');
        });
    </script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-52744420-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-52744420-1');
    </script>

</body>
</html>
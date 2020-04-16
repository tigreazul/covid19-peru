<!DOCTYPE html>
<html>
<head>
	<title>COVID-19</title>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
	
	<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
	<!------ Include the above in your HEAD tag  secure_asset ---------->
	<!-- <link href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css" rel="stylesheet" media="screen"> -->
	
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/data.js"></script>
	<script src="https://code.highcharts.com/modules/series-label.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	<script src="https://code.highcharts.com/modules/export-data.js"></script>
	<script src="https://code.highcharts.com/modules/accessibility.js"></script>
	
	<!-- Additional files for the Highslide popup effect -->
	<script src="https://www.highcharts.com/media/com_demo/js/highslide-full.min.js"></script>
	<script src="https://www.highcharts.com/media/com_demo/js/highslide.config.js" charset="utf-8"></script>
	<link rel="stylesheet" type="text/css" href="https://www.highcharts.com/media/com_demo/css/highslide.css" />
	<script type="text/javascript" src="{{ asset('js/main.js?v=13') }}"></script>
	
	<meta name="description" content="La COVID-19 es una enfermedad infecciosa causada por un nuevo virus que no había sido detectado en humanos hasta la fecha.">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

    <nav class="navbar navbar-default navbar-fixed-top topbar">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="#" class="navbar-brand">
					<span class="visible-xs">COVID-19</span>
					<span class="hidden-xs">COVID-19</span>
				</a>
				<p class="navbar-text">
					<a href="#" class="sidebar-toggle">
                        <i class="fa fa-bars"></i>
                    </a>
				</p>
			</div>

			<div class="navbar-collapse collapse" id="navbar-collapse-main">
				<ul class="nav navbar-nav navbar-right">
                    <li>
                        <button class="navbar-btn">
                            <i class="fa fa-bell"></i>
                        </button>
                    </li>
					<li class="dropdown">
						<button class="navbar-btn" data-toggle="dropdown">
							<img src="http://lorempixel.com/30/30/people" class="img-circle">
						</button>
						<ul class="dropdown-menu">
							<li><a href="#">Account</a></li>
							<li><a href="#">Dashboard</a></li>
							<li class="nav-divider"></li>
							<li><a href="#">Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	
	<article class="wrapper">
	    <aside class="sidebar">
	        <ul class="sidebar-nav">
			    <li class="active"><a href="#dashboard" data-toggle="tab"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
			    <li><a href="#configuration" data-toggle="tab"><i class="fa fa-cogs"></i> <span>Configuration</span></a></li>
			    <li><a href="#users" data-toggle="tab"><i class="fa fa-users"></i> <span>Users</span></a></li>
			    <li><a href="#mail" data-toggle="tab"><i class="fa fa-envelope"></i> <span>Mail</span></a></li>
		    </ul>
	    </aside>
	    
	    <section class="main">
	        <section class="tab-content">
	           <section class="tab-pane active fade in content" id="dashboard">
	                <div class="row">
	           			<div class="col-xs-6 col-sm-6">
							   </div>
							   <div class="alert alert-danger" role="alert" style="height: 62px;padding: 8px 0px 0px 0px;">
								   <div class="col-xs-6 col-sm-1">
									   <h4 style="margin-top: 15px;"><strong>PAIS:</strong></h4>
								   </div>
								   <div class="col-xs-6 col-sm-11">
									   <div>
										   <select id="pais" class="form-control" name="aa" disabled>
											   <!-- <option value="0">[SELECCIONE]</option> -->
											   @foreach($pais as $val => $text)
												   <option value="{{ $text->sigla }}">{{ strtoupper($text->pais) }}</option>
											   @endforeach
										   </select>
									   </div>
								   </div>
							   </div>
                        <!-- <div class="col-xs-6 col-sm-6">
                            <div class="alert alert-info" role="alert"> 
                                <h4>
                                    <strong> REPORTE: {{ date('Y-m-d') }} </strong> 
                                </h4>
                            </div>
                        </div> -->
                    </div>
					<div class="row">
	                    <div class="col-xs-6 col-sm-4">
	                        <div class="panel panel-primary">
	                            <div class="panel-body">
	                            	<strong class="text-primary">CONFIRMADO</strong>
	                                <br/>
	                                <span class="numeros text-primary">{{ number_format($total['peru']['confirmado']) }}</span>
                                    <!-- <span class="adicional">+10</span> -->
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-xs-6 col-sm-4">
	                        <div class="panel panel-success">
	                            <div class="panel-body">
	                            	<strong class="text-success">RECUPERADO</strong>
	                                <br/>
	                                <span class="numeros text-success">{{ number_format($total['peru']['recuperado']) }}</span>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-xs-6 col-sm-4">
	                        <div class="panel panel-danger">
	                            <div class="panel-body">
	                            	<strong class="text-danger">MUERTES</strong>
	                                <br/>
	                                <span class="numeros text-danger">{{ number_format($total['peru']['muerte']) }}</span>
	                            </div>
	                        </div>
						</div>
						
	                   	<div class="col-xs-12 col-sm-4">
	                       	<div class="panel panel-default">
	                           	<div class="panel-heading">
	                               CONFIRMADOS
	                           	</div>
	                           	<div class="panel-body">
								   <!-- <img class="imagen_mundial img-responsive" src="" alt=""> -->
								   <figure class="highcharts-figure">
										<div id="confirmados" style="height: 300px; width: 100%;"></div>
									</figure>
	                           	</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-4">
	                       	<div class="panel panel-default">
	                           	<div class="panel-heading">
	                               RECUPERADOS
	                           	</div>
	                           	<div class="panel-body">
								   <!-- <img class="imagen_mundial img-responsive" src="" alt=""> -->
								   <figure class="highcharts-figure">
										<div id="recuperados" style="height: 300px; width: 100%;"></div>
									</figure>
	                           	</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-4">
	                       	<div class="panel panel-default">
	                           	<div class="panel-heading">
	                               MUERTES
	                           	</div>
	                           	<div class="panel-body">
								   <!-- <img class="imagen_mundial img-responsive" src="" alt=""> -->
								   <figure class="highcharts-figure">
										<div id="muertes" style="height: 300px; width: 100%;"></div>
									</figure>
	                           	</div>
							</div>
						</div>
						   
	                   	<div class="col-xs-12 col-sm-5">
	                       <div class="panel panel-default">
	                           <div class="panel-heading">
                                    <strong> Casos por departamento </strong>
	                           </div>
	                           <div class="panel-body">
                                   <table class="rtable table-hover">
										<thead>
											<tr>
												<th>Departamento</th>
												<th>Confirmado</th>
												<th>Recuperado</th>
												<th>Muerte</th>
											</tr>
										</thead>
										<tbody>
											@php 
												$total = 0;
												$recup = 0;
												$muert = 0;
											@endphp
											@foreach($departamento as $dep)
												<tr>
													<td>{{$dep->departamento}}</td>
													<td>{{$dep->totalCasos}}</td>
													<td>{{$dep->totalRecuperados}}</td>
													<td>{{$dep->totalMuertes}}</td>
												</tr>
												@php 
													$total = $total + $dep->totalCasos;
													$recup = $recup + $dep->totalRecuperados;
													$muert = $muert + $dep->totalMuertes;
												@endphp
											@endforeach
										</tbody>
										<thead>
											<tr>
												<th>TOTAL</th>
												<th>{{$total}}</th>
												<th>{{$recup}}</th>
												<th>{{$muert}}</th>
											</tr>
										</thead>
								   </table>
	                           </div>
						   </div>
						   
						</div>	                   
						<div class="col-xs-12 col-sm-7">
							<div class="panel panel-default">
								<div class="panel-heading">
									<strong> Casos por departamento </strong>
								</div>
								<div class="panel-body">
									@include('maps_mapa')
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									COVID-19
								</div>
								<div class="panel-body">
									By <a href="" target="_blank">Junior Tello</a></a>
								</div>
							</div>
						</div>
						
	               </div>
	           </section>
	           
	           <section class="tab-pane fade" id="configuration">
	               <nav class="subbar">
			            <ul class="nav nav-tabs">
				            <li class="active"><a href="#access" data-toggle="tab"><i class="fa fa-code"></i> <span>System</span></a></li>
				            <li><a href="#roles" data-toggle="tab"><i class="fa fa-user"></i> <span>Roles</span></a></li>
			            </ul>
		            </nav>
		            
		            <section class="tab-content content">
		                <section class="tab-pane active fade in" id="access">
                            <div class="row">
                                <div class="col-xs-12">
	                                <div class="panel panel-default">
	                                    <div class="panel-heading">
	                                        Something
	                                    </div>
	                                    <div class="panel-body">
	                                        <br/><br/><br/><br/>
	                                    </div>
	                                </div>
	                            </div>
	                            
	                            <div class="col-xs-12 col-sm-4">
	                                <div class="panel panel-default">
	                                    <div class="panel-heading">
	                                        Something
	                                    </div>
	                                    <div class="panel-body">
	                                        <br/><br/><br/><br/>
	                                    </div>
	                                </div>
	                            </div>
	                            
	                            <div class="col-xs-12 col-sm-4">
	                                <div class="panel panel-default">
	                                    <div class="panel-heading">
	                                        Something
	                                    </div>
	                                    <div class="panel-body">
	                                        <br/><br/><br/><br/>
	                                    </div>
	                                </div>
	                            </div>
	                            
	                            <div class="col-xs-12 col-sm-4">
	                                <div class="panel panel-default">
	                                    <div class="panel-heading">
	                                        Something
	                                    </div>
	                                    <div class="panel-body">
	                                        <br/><br/><br/><br/>
	                                    </div>
	                                </div>
	                            </div>
                            </div>
		                </section>
		                
		                <section class="tab-pane fade" id="roles">
		                    <div class="row">
                                <div class="col-xs-12 col-sm-8 col-md-9">
	                                <div class="panel panel-default">
	                                    <div class="panel-heading">
	                                        Something
	                                    </div>
	                                    <div class="panel-body">
	                                        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="hidden-xs col-sm-4 col-md-3">
	                                <div class="panel panel-default">
	                                    <div class="panel-heading">
	                                        Something
	                                    </div>
	                                    <div class="panel-body">
	                                        <br/><br/><br/>
	                                    </div>
	                                </div>
	                                
	                                <div class="panel panel-default">
	                                    <div class="panel-heading">
	                                        Something
	                                    </div>
	                                    <div class="panel-body">
	                                        <br/><br/><br/>
	                                    </div>
	                                </div>
	                            </div>
	                       </div>
		                </section>
		            </section>
	           </section>
	           <section class="tab-pane fade" id="users"></section>
			   <section class="tab-pane fade" id="mail"></section>
			   
	        </section>
	    </section>
	</article>

	@include('script')
	
	
	<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>


</body>
</html>
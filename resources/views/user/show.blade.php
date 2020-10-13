@extends('layouts.app') 

@section('content') 

<div style="height: 100px; background-color: #32383e;"></div>
<br><br>
<div class="container">
	<div class="card promoting-card">
	  		<div class="card-body d-flex flex-row">
	    		<img src="{{asset($user->img)}}" class="rounded-circle mr-3" height="100px" width="100px">
	    	<div>
		      <h2 class="card-title font-weight-bold mb-2">{{$user->name}}</h2>
		      <p class="card-text"><i class="far fa-clock"></i>{{$user->email}}</p>

		  	<div class="card-body" style="color: black">
	     	  <h5 class="card-title font-weight-bold mb-2">Documento:&nbsp;&nbsp;&nbsp;<small>{{$user->document}}</small></h5>
	     	  <h5 class="card-title font-weight-bold mb-2">Direccion:&nbsp;&nbsp;&nbsp;<small>{{$user->address}}</small></h5>
	     	  <h5 class="card-title font-weight-bold mb-2">Fecha de inicio:&nbsp;&nbsp;&nbsp;<small>
	     	  	<?php
	     	  	$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
				$fecha = \Carbon\Carbon::parse($user->start_date);
				$mes = $meses[($fecha->format('n')) - 1];
				$user->start_date = $fecha->format('d') . ' de ' . $mes . ' de ' . $fecha->format('Y'); 	
	     	  	?>
	     	  	{{$user->start_date}}</small></h5>
	     	  <h5 class="card-title font-weight-bold mb-2">Fecha de vencimiento:&nbsp;&nbsp;&nbsp;<small>
	     	  	<?php
	     	  	$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
				$fecha = \Carbon\Carbon::parse($user->finish_date);
				$mes = $meses[($fecha->format('n')) - 1];
				$user->finish_date = $fecha->format('d') . ' de ' . $mes . ' de ' . $fecha->format('Y'); 	
	     	  	?>
	     	  	{{ $user->finish_date }}
	     	  </small></h5>
	     	  <h5 class="card-title font-weight-bold mb-2">Pagó:&nbsp;&nbsp;&nbsp;<small>${{number_format($user->price)}}</small></h5>
 			  <h5 class="card-title font-weight-bold mb-2">Estado:&nbsp;&nbsp;&nbsp;<small>{{$user->status == 1 ? 'Activo' : 'Vencido'}}</small></h5>
 			  <br>
		      <a href="{{route('users.index')}}" class="btn btn-flat red-text p-1 my-1 mr-0 mml-1" style="color:#D10024">volver</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		      <a href="{{route('users.history',$user->id)}}" class="btn btn-flat red-text p-1 my-1 mr-0 mml-1" style="color:#D10024">historial de pagos</a>
	  		</div>
    	</div>
  	</div>
</div>

@endsection
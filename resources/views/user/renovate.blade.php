@extends('layouts.app') 

@section('content') 

<div style="height: 100px; background-color: #32383e;"></div>

<div class="section">
	<div class="container">
		<div class="col-md-12">
			<form method="POST" action="{{ route('users.renovated',$user->id) }}">
				@method('PATCH')
				@csrf
					<br><br>
					<div class="text-center">
						<h2><strong>Renovar membresia</strong></h2>
						<div class="col-md-12 text-center">
							@if(isset($user->img))
								<img src="{{asset($user->img)}}" width="200">
							@else
								<h5>Este usuario no posee fotografia</h5>
							@endif
								<h5>{{$user->name}}</h5>
								<?php
		                        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
		                        $fecha = \Carbon\Carbon::parse($user->finish_date);
		                        $mes = $meses[($fecha->format('n')) - 1];
		                        $date = $fecha->format('d') . ' de ' . $mes . ' de ' . $fecha->format('Y');   
		                      	?>
		                      	{{'Fecha vencimiento: ' }}
                      			{{ $date }}
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-6">
							<h5>Fecha inscripcion*</h5>
							<input class="form-control" type="date" name="start_date" value="{{$user->start_date}}">
							@if($errors->has('start_date'))
							    <h6 class="error-message" style="color:#D10024">{{ $errors->first('start_date') }}</h6>
							@endif
	                	</div>
	                	<div class="col-md-6">
							<h5>Precio*</h5>
							<input class="form-control" type="text" name="price" value="{{$user->price}}">
							@if($errors->has('price'))
							    <h6 class="error-message" style="color:#D10024">{{ $errors->first('price') }}</h6>
							@endif	
	                    </div>	
					</div>
					<div class="row">
	                    <div class="col-md-2 ">
	                    	<br>
	            			<button class="form-control" style="background-color:#f23a2e; color:white; border: none;">Renovar</button>
	            		</div>
	        		</div>
        	</form>
		</div>
	</div>
</div>

@endsection

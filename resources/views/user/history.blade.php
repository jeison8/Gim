@extends('layouts.app') 

@section('content') 

<div style="height: 100px; background-color: #32383e;"></div>
<br><br>
<div class="container">
	<div class="card promoting-card">
  		<div class="card-body">
  			<div class="row">
  				<div class="col-md-9">
  					<div class="row">
		    			<img src="{{asset($user->img)}}" class="rounded-circle mr-3" height="100px" width="100px">
		    			<h2 class="card-title font-weight-bold mb-2">&nbsp;&nbsp;&nbsp;{{$user->name}}</h2>
	    			</div>
    			</div>	
				@if(count($histories))
		    		<div class="col-md-3">
		    			<div class="row">
		    			<a href="{{route('users.index')}}" class="btn btn-flat red-text p-1 my-1 mr-0 mml-1" style="color:#D10024">volver</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		    			<a href="{{route('users.destroyHistory',$user->id)}}"><button class="form-control" style="background-color:#f23a2e; color:white; border: none; cursor: pointer;">Borrar historial</button></a>
		    		</div>
	    		</div>
	    		@endif
	    	</div>

    		<div>
			  	<div class="card-body" style="color: black">
		     	  <div class="table-responsive">
		     	    @if(count($histories))
		              <table class="table table-hover table-bordered">
		                <thead class="thead-dark">
		                  <tr>
		                    <th scope="col">Fecha inicio</th>
		                    <th scope="col">Fecha vencimiento</th>
		                    <th scope="col">Pago</th>
		                  </tr>
		                </thead>
		                <tbody style="color:black;">
	                	@foreach($histories as $history) 		
		                  <tr>
		                    <td>
		                      <?php
		                        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
		                        $fecha = \Carbon\Carbon::parse($history->start_date);
		                        $mes = $meses[($fecha->format('n')) - 1];
		                        $startDate = $fecha->format('d') . ' de ' . $mes . ' de ' . $fecha->format('Y');   
		                      ?>
		                      {{ $startDate }}
		                    </td>
		                    <td>
		                      <?php
		                        $fecha = \Carbon\Carbon::parse($history->finish_date);
		                        $mes = $meses[($fecha->format('n')) - 1];
		                        $finishDate = $fecha->format('d') . ' de ' . $mes . ' de ' . $fecha->format('Y');   
		                      ?>
		                      {{ $finishDate }}
		                    </td>
		                    <td>{{number_format($history->price) }}</td>
		                  </tr>
	                	@endforeach
	                	</tbody>
	              	   </table>
	              	@else
		  				<h5>El usuario no tiene historial de pagos</h5> <a href="{{route('users.index')}}" class="btn btn-flat red-text p-1 my-1 mr-0 mml-1" style="color:#D10024">volver</a>
	                @endif
	              </div>
	  		</div>
	  	</div>
	  	{{ $histories->links() }}
  	</div>
</div>

@endsection
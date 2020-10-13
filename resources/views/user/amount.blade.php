@extends('layouts.app') 

@section('content') 

<div style="height: 100px; background-color: #32383e;"></div>
<br><br>
<div class="container">
	<div class="card promoting-card">
		<div class="card-body d-flex flex-row">
	    		<img src="{{asset(auth()->user()->img)}}" class="rounded-circle mr-3" height="100px" width="100px">
	    	<div>
		      <h2 class="card-title font-weight-bold mb-2">{{auth()->user()->name}}</h2>
		      <p class="card-text"><i class="far fa-clock"></i>{{auth()->user()->email}}</p>
		  	<div class="card-body" style="color: black">
	     	  <h5 class="card-title font-weight-bold mb-2">Monto del mes:&nbsp;&nbsp;&nbsp;<small>${{number_format($amountMonth)}}</small></h5>
	     	  <h5 class="card-title font-weight-bold mb-2">Ingresos generales:&nbsp;&nbsp;&nbsp;<small>${{number_format($amountGeneral)}}</small></h5>
	  		</div>
    	</div>
  	</div>
</div>

@endsection
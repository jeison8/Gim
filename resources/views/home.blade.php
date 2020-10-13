@extends('layouts.app')

@section('content')

<div style="height: 100px; background-color: #32383e;"></div>
<br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="{{$user->status == 1 ? 'background-color:#212529' : 'background-color:#f23a2e'}}">
                    <center>
                        <h1 style="color: white;"> {{$user->status == 1 ? 'Bienvenido'.' '.$user->name : '!! Tu membresia esta inactiva !!'}}</h1>
                        <img src="{{asset($user->img)}}" class="rounded-circle mr-3" height="170px" width="170px">
                    </center>
                </div>

                <div class="card-body">
                    <?php
                    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                    $fecha = \Carbon\Carbon::parse($user->finish_date);
                    $mes = $meses[($fecha->format('n')) - 1];
                    $user->finish_date = $fecha->format('d') . ' de ' . $mes . ' de ' . $fecha->format('Y');     
                    ?>
                    <br>
                    <center>
                        <h1 class="card-title font-weight-bold mb-2" style="color:#ABABAB;">{{$user->status == 1 ? 'Tu membresia vence el dia' : 'Tu membresia vencio el dia'}}</h1>
                        <h1 class="card-title font-weight-bold mb-2">{{$user->finish_date}}</h1>
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    
    window.onload = function() {
      
        setTimeout(function(){ 

            window.location="/";

        }, 4000);

    };

</script>

@endsection

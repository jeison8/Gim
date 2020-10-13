@extends('layouts.app') 

@section('content') 

<div style="height: 100px; background-color: #32383e;"></div>

<div class="section">
	<div class="container">
	   <div class="row">
      <div class="col-md-12">
        <br><br>
          
          <div class="card-body text-center">
            <h4><strong>Lista de Usuarios</strong></h4>  
            <br>
            <div class="row">
                  <div class="col-md-4">
                    <form  method="POST" action="{{ route('users.find') }}" onsubmit="validateSearch(event);">
                    @csrf
                    <input type="text" class="form-control" name="findName" id="findName" placeholder="Buscar nombre..."/>
                    </div>
                    <div class="col-md-2">
                        <select class="form-control" name="findMonth" id="findMonth">
                          <option value="">Buscar mes...</option>
                          <option value="all">Todos</option>
                          <option value="1">Enero</option>
                          <option value="2">Febrero</option>
                          <option value="3">Marzo</option>
                          <option value="4">Abril</option>
                          <option value="5">Mayo</option>
                          <option value="6">Junio</option>
                          <option value="7">Julio</option>
                          <option value="8">Agosto</option>
                          <option value="9">Septiembre</option>
                          <option value="10">Octubre</option>
                          <option value="11">Noviembre</option>
                          <option value="12">Diciembre</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="form-control" name="findStatus" id="findStatus">
                          <option value="">Buscar estado...</option>
                          <option value="all">Todos</option>
                          <option value="1">Activo</option>
                          <option value="0">Vencido</option>
                        </select>
                    </div>
                    <div class="col-md-1">
                    <a href="{{route('users.create')}}"><button class="form-control" style="background-color:#32383e; color:white; border: none; cursor: pointer;"><i class="icon-search" style="color: white;"></i></button></a>
                    </form>
                  </div>
              <div class="col-md-1">
                <a href="{{route('users.amount')}}"><button class="form-control" style="background-color:#45C440; color:white; border: none; cursor: pointer;"><i class="icon-dollar" style="color: white;"></i></button></a>
              </div>
              <div class="col-md-1">
                <a href="{{route('users.create')}}"><button class="form-control" style="background-color:#D10024; color:white; border: none; cursor: pointer;"><i class="icon-user-plus" style="color: white;"></i></button></a>
              </div>
            </div>
            <br>
            <div class="table-responsive">
              <table class="table table-hover table-bordered">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Imagen</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Vencimiento</th>
                    <th scope="col">pagó</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Acciones</th>
                  </tr>
                </thead>
                <tbody style="color:black;">
                	@foreach($users as $user) 		
                  <tr>
                    <td><img src="{{asset($user->img)}}" width="100px"></td>
          				  <td>{{$user->name}}</td>
                    <td>
                      <?php
                        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                        $fecha = \Carbon\Carbon::parse($user->finish_date);
                        $mes = $meses[($fecha->format('n')) - 1];
                        $date = $fecha->format('d') . ' de ' . $mes . ' de ' . $fecha->format('Y');   
                      ?>
                      {{ $user->is_admin == 1 ? 'No aplica' : $date }}
                    </td>
                    <td>{{$user->is_admin == 1 ? 'No aplica' : '$'.number_format($user->price) }}</td>
                      @if($user->is_admin == 1)
                          <td>{{'No aplica'}}</td>
                      @else
                          <td>{{$user->status == 0 ? 'vencido' : 'activo'}}</td>
                      @endif
          				  <td>
                      <a href="{{route('users.renovate',$user->id)}}" style="{{$user->is_admin == 1 ? 'pointer-events: none;' : ''}}"><i class="icon-retweet" style="color: #333;"></i></a>
          				    <a href="{{route('users.show',$user->id)}}"><i class="icon-eye" style="color: #333;"></i></a>
                      <a href="{{route('users.edit',$user->id)}}"><i class="icon-pencil" style="color: #333;"></i></a>
          				  	<a href="{{route('users.destroy',$user->id)}}" style="{{$user->is_admin == 1 ? 'pointer-events: none;' : ''}}"><i class="icon-trash" style="color: #D10024;"></i></a>
          				  </td>
                  </tr>
                	@endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    {{ $users->links() }}
  </div>
</div>

<script type="text/javascript">
  
function validateSearch(event){

  let inputName = document.getElementById("findName").value;
  let selectMonth = document.getElementById("findMonth").value;
  let selectStatus = document.getElementById("findStatus").value;

  if(inputName == "" && selectMonth == "" && selectStatus == ""){ 

      event.preventDefault();

  }

}

</script>

@endsection

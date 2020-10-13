@extends('layouts.app') 

@section('content') 

<div style="height: 100px; background-color: #32383e;"></div>

<div class="section">
	<div class="container">
		<div class="col-md-12">
			<form method="POST" action="{{ route('users.update',$user->id) }}" enctype="multipart/form-data">
				@method('PATCH')
				@csrf
				<br><br>
				<div class="text-center">
					<h2><strong>Editar usuario</strong></h2>
						<div class="col-md-12 text-center">
							@if(isset($user->img))
								<img src="{{asset($user->img)}}" width="200">
							@else
								<h5>Este usuario no posee fotografia</h5>
							@endif
								<h5>{{$user->name}}</h5>
						</div>
				</div>
				<br>
				<div class="row">
                    <div class="col-md-6">
						<h5>Imagen</h5>
						<input type="file" class="form-control" name="img" value="">
						@if($errors->has('img'))
						    <h6 class="error-message" style="color:#D10024">{{ $errors->first('img') }}</h6>
						@endif
					</div>
                    <div class="col-md-6">
						<h5>Nombre*</h5>
						<input type="text"class="form-control" name="name" value="{{$user->name}}">
						@if($errors->has('name'))
						    <h6 class="error-message" style="color:#D10024">{{ $errors->first('name') }}</h6>
						@endif
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<h5>Correo*</h5>
						<input class="form-control" type="email" name="email" value="{{$user->email}}">
						@if($errors->has('email'))
						    <h6 class="error-message" style="color:#D10024">{{ $errors->first('email') }}</h6>
						@endif
                	</div>
                	<div class="col-md-6">
						<h5>N° documento*</h5>
						<input type="number" class="form-control" name="document" value="{{$user->document}}">
						@if($errors->has('document'))
						    <h6 class="error-message" style="color:#D10024">{{ $errors->first('document') }}</h6>
						@endif	
                    </div>	
				</div>
				<div class="row">
					<div class="col-md-6">
						<h5>Direccion</h5>
						<input class="form-control" type="text" name="address" value="{{$user->address}}">
						@if($errors->has('address'))
						    <h6 class="error-message" style="color:#D10024">{{ $errors->first('address') }}</h6>
						@endif
                	</div>
                	<div class="col-md-6">
						<h5>Telefono</h5>
						<input type="number" class="form-control" name="phone" value="{{$user->phone}}">
						@if($errors->has('phone'))
						    <h6 class="error-message" style="color:#D10024">{{ $errors->first('phone') }}</h6>
						@endif	
                    </div>	
				</div>

				<div class="row">
                    <div class="col-md-2">
                    	<br><br>
            			<button class="form-control" style="background-color:#f23a2e; color:white; border: none;">Editar</button>
            		</div>
        		</div>
        	</form>
		</div>
	</div>
</div>

@endsection

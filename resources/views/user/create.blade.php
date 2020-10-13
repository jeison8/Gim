@extends('layouts.app') 

@section('content') 

<div style="height: 100px; background-color: #32383e;"></div>

<div class="section">
	<div class="container">
			<div class="col-md-12">
					<form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
						@csrf
						<br><br>
						<div class="text-center">
							<h2><strong>Registro de usuario</strong></h2>
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
								<input type="text"class="form-control" name="name" value="{{old('name')}}">
								@if($errors->has('name'))
								    <h6 class="error-message" style="color:#D10024">{{ $errors->first('name') }}</h6>
								@endif
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<h5>Correo*</h5>
								<input class="form-control" type="email" name="email" value="{{old('email')}}">
								@if($errors->has('email'))
								    <h6 class="error-message" style="color:#D10024">{{ $errors->first('email') }}</h6>
								@endif
                        	</div>
                        	<div class="col-md-6">
								<h5>N° documento *</h5>
								<input type="number" class="form-control" name="document" value="{{old('document')}}">
								@if($errors->has('document'))
								    <h6 class="error-message" style="color:#D10024">{{ $errors->first('document') }}</h6>
								@endif	
	                        </div>	
						</div>
						<div class="row">
							<div class="col-md-6">
								<h5>Direccion</h5>
								<input class="form-control" type="text" name="address" value="{{old('address')}}">
								@if($errors->has('address'))
								    <h6 class="error-message" style="color:#D10024">{{ $errors->first('address') }}</h6>
								@endif
                        	</div>
                        	<div class="col-md-6">
								<h5>Telefono</h5>
								<input type="number" class="form-control" name="phone" value="{{old('phone')}}">
								@if($errors->has('phone'))
								    <h6 class="error-message" style="color:#D10024">{{ $errors->first('phone') }}</h6>
								@endif	
	                        </div>	
						</div>

						<div class="row">
							<div class="col-md-6">
								<h5>Fecha inscripcion*</h5>
								<input class="form-control" type="date" name="start_date" value="{{old('start_date')}}">
								@if($errors->has('start_date'))
								    <h6 class="error-message" style="color:#D10024">{{ $errors->first('start_date') }}</h6>
								@endif
                        	</div>
                        	<div class="col-md-6">
								<h5>Precio*</h5>
								<input class="form-control" type="text" name="price" value="{{old('price')}}">
								@if($errors->has('price'))
								    <h6 class="error-message" style="color:#D10024">{{ $errors->first('price') }}</h6>
								@endif	
	                        </div>	
						</div>
						<div class="row">
	                        <div class="col-md-2">
	                        	<br><br>
		            			<button class="form-control" style="background-color:#f23a2e; color:white;">Registrar</button>
		            		</div>
	            		</div>
	            	</form>
		</div>
	</div>
</div>

@endsection

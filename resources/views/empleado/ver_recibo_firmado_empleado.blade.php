@extends('layouts.app')
@include('layouts.menu_empleado')
@section('content')

<div class="container-fluid">

	<div class="page-header">
	    <h2>Ver recibo firmado</h2>
	</div>

	@isset($msj)
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>{{ $msj }}</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    	<span aria-hidden="true">&times;</span>
		  	</button>
		</div>
	@endisset

	<iframe src='{{$id}}' width="100%" height="75%" frameborder="0" allowfullscreen>
	</iframe><br><br>

	<a class="btn btn-primary btn-lg" href="{{ url('/empleado/recibos_firmados' ) }}" role="button">Volver</a>

</div>
@endsection

@extends('layouts.app')
@include('layouts.menu_rrhh')
@section('content')
<div class="container-fluid">

    <div class="page-header">
        <h2>Validar recibos</h2>
    </div>

	@isset($msj)
		<div class="alert alert-success" role="alert" align="center">{{ $msj }}</div>
	@endisset
	@isset($error)
		<div class="alert alert-danger" role="alert" align="center">{{ $error }}</div>
	@endisset

	<form action="/rrhh/validar_recibos" method="POST">
		{{csrf_field()}}
		<div class="form-row">
				<label for="mes" class="col-sm-2 col-form-label">Mes: </label>
				<select class="col-sm-2 form-control" name="mes" id="mes">
					<option value="01">1- Enero</option>
					<option value="02">2- Febrero</option>
					<option value="03">3- Marzo</option>
					<option value="04">4- Abril</option>
					<option value="05">5- Mayo</option>
					<option value="06">6- Junio</option>
					<option value="07">7- Julio</option>
					<option value="08">8- Agosto</option>
					<option value="09">9- Setiembre</option>
					<option value="10">10- Octubre</option>
					<option value="11">11- Noviembre</option>
					<option value="12">12- Diciembre</option>
				</select>
				<label for="año" class="col-sm-2 col-form-label">Año: </label>
				<input class="col-sm-2 form-control" type="text" value="{{ date("Y") }}" name="año" id="año" size="4" maxlength="4" required>
				<label class="col-sm-2 col-form-label">Periodo: </label>
				<button class="btn btn-primary col-sm-2" type="submit">Validar</button>
		</div>
	</form>

{{-- 	<form action="/rrhh/validar_recibos" method="POST">
	{{csrf_field()}}

	<div align="center" id="prueba">
		<table style="width:20%" >
			<tr>
				<th>Mes: </th>
				<td><select name="mes" id="mes">
				   <option value="01">1- Enero</option>
				   <option value="02">2- Febrero</option>
				   <option value="03">3- Marzo</option>
				   <option value="04">4- Abril</option>
				   <option value="05">5- Mayo</option>
				   <option value="06">6- Junio</option>
				   <option value="07">7- Julio</option>
				   <option value="08">8- Agosto</option>
				   <option value="09">9- Setiembre</option>
				   <option value="10">10- Octubre</option>
				   <option value="11">11- Noviembre</option>
				   <option value="12">12- Diciembre</option>
				</select></td>
			</tr>

			<tr>
				<th>Año:</th>
				<td><input type="text" value="{{ date("Y") }}" name="año" id="año" size="4" maxlength="4" required=""></td>
			</tr>
		</table>
		<br>
			<button class="btn btn-primary" type="submit">Validar Periodo</button>

	</div>
	</form> --}}

		@isset($msj)
		<table class="table" border="1">
			<thead class="thead-dark" style="text-align: center;">
				<th colspan="2">
					Periodo ->  Mes: {{ $mes }} - Año: {{ $año }}
				</th>
			</thead>
			<tr>
				<td>
					<strong>Total de archivos procesados: </strong>
				</td>
				<td>
					{{$resultados[5] }}
				</td>
			</tr>
			<tr>
				<td>
					<strong>Cantidad de recibos correctos procesados: </strong>
				</td>
				<td>
					{{$resultados[0] }}
				</td>
			</tr>
			<tr>
				<td>
					<strong>Cantidad de recibos con error de periodo: </strong>
				</td>
				<td>
					{{$resultados[1] }}
				</td>
			</tr>
			<tr>
				<td>
					<strong>Cantidad de recibos con error de extension: </strong>
				</td>
				<td>
					{{$resultados[2] }}
				</td>
			</tr>
			<tr>
				<td>
					<strong>Cantidad de recibos con números de cedula no encontrados en el sistema: </strong>
				</td>
				<td>
					{{$resultados[3] }}
				</td>
			<tr>
				<td>
					<strong>Total de empleados del sistema sin recibos en este periodo: </strong>
				</td>
				<td>
					{{$resultados[4] }}
				</td>
			</tr>
		</table>
		@endisset
</div>
@endsection
@extends('layouts.app')
@section('content')
{{-- Dentro de section va el contenido de la vista--}}
@include('layouts.menu_empresa')
<p align="center"><strong>Bienvenido: </strong> {{ Auth::user()->name }}, esta conectado con el Rol de <strong>Empresa</strong></p>

<h3 align="center">PÁGINA PRINCIPAL</h1>

@endsection
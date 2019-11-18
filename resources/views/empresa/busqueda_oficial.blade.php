@extends('layouts.app')
@include('layouts.menu_empresa')
@section('content')

<link rel="stylesheet" type="text/css" href="{{asset('otros/datatable/jquery.dataTables.min.css')}}" >
<script src="{{ asset('otros/datatable/jquery.dataTables.min.js') }}" defer></script>

<div class="container-fluid">
    <div class="page-header">
        <h2>ABM Oficial de Seguridad</h2>
    </div>

    @isset($msj)
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ $msj }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endisset


    @isset($error)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ $error }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endisset

    <table class="table table-sm compact" border="1" id="table">
       <thead class="thead-dark">
          <tr>
             <th>Cédula</th>
             <th>Nombres</th>
             <th>Apellidos</th>
             <th>Correo</th>
             <th>Estado</th>
             <th>Actualizar datos</th>
         </tr>
        </thead>
    </table>

    <a href="alta_oficial" button class="btn btn-primary">Alta Oficial de Seguridad</button></a>

    <!--Javascript de Datatables-->
    <script type="text/javascript">
        $(document).ready(function ()
        {
             var datatable = $('#table').DataTable
            ({
                processing: true,
                serverSide: true,
                ajax: '{{ url('empresa/datatable') }}',
                "lengthMenu": [[7, 25, 50, -1], [7, 25, 50, "All"]],
                "language":
                {
                    "sProcessing":     "Procesando...",
                    "sLengthMenu":     "Mostrar _MENU_ registros",
                    "sZeroRecords":    "No se encontraron resultados",
                    "sEmptyTable":     "Ningún dato disponible en esta tabla",
                    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix":    "",
                    "sSearch":         "Buscar:",
                    "sUrl":            "",
                    "sInfoThousands":  ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate":
                    {
                        "sFirst":    "Primero",
                        "sLast":     "Último",
                        "sNext":     "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria":
                    {
                        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                },
                createdRow: function ( row, data, index )
                {
                    if ( data.estado == 0 )
                    {
                      $('td', row).eq(4).addClass('text-danger').text('Inactivo');
                      $('td', row).eq(5).html("<button type='button' class='modif btn btn-info btn-block'>Actualizar</button>");

                    } else {
                      $('td', row).eq(4).addClass('text-success').text('Activo');
                      $('td', row).eq(5).html("<button type='button' class='modif btn btn-info btn-block'>Actualizar</button>");
                    }
                },
                columns:
                [
                    { data: 'cedula', name: 'cedula' },
                    { data: 'nombres', name: 'nombres' },
                    { data: 'apellidos', name: 'apellidos'},
                    { data: 'correo', name: 'correo'},
                    { data: 'estado', name: 'estado'},
                    {"defaultContent": "<button type='button' class='modif btn btn-success btn-block'>Actualizar</button>"},
                ]
            });
            /*Javascript para captura de la cedula y redirección a la ruta para modificación*/
            $('#table').on('click', 'button.modif', function()
            {
                var data = datatable.row( $(this).closest('tr') ).data();
                     var cedula=( data['cedula']);
                     window.location.href = '{{url("empresa/modificacion_oficial")}}'+'/'+cedula;
            });
            /*Cierre de llave de javascript del datatables*/
        });
    </script>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1 class="text-center">{{ __('Evento') }}</h1>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="card shadow mb-4 m-5">
    <div class="card-header py-3">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h6 class="m-0">Lista de Eventos</h6>
            </div>
            <div class="col-sm-12 col-md-6" align="right">

                <a href="{{route('event.create')}}" class="btn btn-primary">
                    Registrar
                </a>
            </div>
        </div>

    </div>
    <div class="card-body">
        <div class="table-responsive">

            <table id="data" class="table table-flush">
                <thead class="thead-light">
                <tr>
                    <th width="10px">No.</th>
                    <th>Titulo</th>
                    <th>Descripcion</th>
                    <th>Dirigido a</th>
                    <th width="150px">Fecha del Evento</th>
                    <th width="100px">Modalidad</th>
                    <th width="100px">Costo</th>
                </tr>
                </thead>
            </table>

        </div>
    </div>
</div>
@endsection

@section('scripts-page')
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"> </script>
    <script src="{{asset('assets/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#data').DataTable({
                "serverSide": true,
                "header": {
                    "token": "{{ csrf_token() }}",
                },
                "ajax": "{{ url('sistema/event/data') }}",
                "columns": [
                    {data: 'id'},
                    {data: 'title'},
                    {data: 'body'},
                    {data: 'to'},
                    {data: 'event_date'},
                    {data: 'mode'},
                    {data: 'cost'}
                ],
                "language": {
                    "info": "_TOTAL_ Registro(s)",
                    "search": "Buscar",
                    "paginate": {
                        "next": ">",
                        "previous": "<",
                    },
                    "lengthMenu": 'Mostrar <select >' +
                        '<option value="10">10</option>' +
                        '<option value="30">30</option>' +
                        '<option value="50">50</option>' +
                        '<option value="100">100</option>' +
                        '<option value="-1">Todos</option>' +
                        '</select> registros',
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "emptyTable": "No hay datos",
                    "zeroRecords": "No hay coincidencias",
                    "infoEmpty": "",
                    "infoFiltered": ""
                }
            });
        });
    </script>
@endsection
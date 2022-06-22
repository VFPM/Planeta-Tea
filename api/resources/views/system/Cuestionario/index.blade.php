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

                    <h1 class="text-center">{{ __('Cuestionario') }}</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card shadow mb-4 m-5">
    <div class="card-header py-3">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h4 class="m-0">Lista de Cuestionarios</h4>
            </div>
            <div class="col-sm-12 col-md-6" align="right">

                <a href="{{route('test.create')}}" class="btn btn-primary">
                    Registrar
                </a>
            </div>
        </div>

    </div>
    <div class="card-body">
        <div class="table-responsive">

            <table id="data" class="dataindex table table-flush">
                <thead class="thead-light">
                <tr>
                    <th width="10px">No.</th>
                    <th>Nombre del cuestionario</th>
                    <th width="10px">Activo</th>
                    <th width="260px">Acciones</th>
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
            $('.dataindex').DataTable({
                "serverSide": true,
                "header": {
                    "token": "{{ csrf_token() }}",
                },
                "ajax": "{{ url('sistema/test/data') }}",
                "columns": [
                    {data: 'id'},
                    {data: 'name'},
                    {data: 'active', render: function(data){
                        if(data == 1)
                            return '<label class="switch">' +
                                ' <input type="checkbox" class="checkbox" checked>' +
                                `<span class="slider round" >` +
                                '  </span>' +
                                ' </label>';
                        else
                            return'<label class="switch">' +
                                ' <input type="checkbox" class="checkbox">' +
                                `<span class="slider round">` +
                                '  </span>' +
                                ' </label>';
                    }},
                    {data: 'btn'}
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

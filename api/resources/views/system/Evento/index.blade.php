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

                    <h1 class="text-center">{{ __('Noticia') }}</h1>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="card shadow mb-4 m-5">
    <div class="card-header py-3">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h4 class="m-0">Lista de Eventos</h4>
            </div>
            <div class="col-sm-12 col-md-6" align="right">

                <a href="{{route('news.create')}}" class="btn btn-primary">
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
                    <th width="100px">Acciones</th>
                </tr>
                </thead>
                <tbody>
                    <tr class="odd">
                        <td class="sorting_1">1</td>
                        <td>Juguemos a disfrazarnos</td>
                        <td>Evento recreativo y terapeutico donde niños y jovenes que viven con Autismo participarán en un concurso de disfraces</td>
                        <td>Personas que viven en el Espectro Autismo y comunidad interesada</td>
                        <td>2022-05-20 02:19:00</td>
                        <td>Presencial</td>
                        <td>55.00</td>
                        <td>
                            
                            <a href="#" class="btn btn-success btn-sm">Editar</a>
                            <form action="#" class="d-inline" method="POST">
                            @method('DELETE')
                             @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="pwBvadhG0vFfFYmhwH7W7cKMPdXA4XaF2PhAr5Al">
                                <button class="btn btn-sm btn-danger" type="submit">Eliminar</button>
                            </form>
                            <script>
                                $('.formdelete').submit(function(e){
                                    e.preventDefault();
                                    Swal.fire({
                                        title: '¿Seguro que deseas eliminar el registro?',
                                        text: "No se podrá recuperar la información eliminada",
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#1cc88a',
                                        cancelButtonColor: '#e74a3b',
                                        confirmButtonText: 'Aceptar',
                                        cancelButtonText: 'Cancelar'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            this.submit();
                                        }
                                    })
                                });
                            </script>
                            
                        </td>
                    </tr>
                    <tr class="odd">
                        <td class="sorting_1">2</td>
                        <td>Dia muldial del Autismo</td>
                        <td>Evento recreativo y terapeutico enfocado en las personas que padecen...</td>
                        <td>Personas que viven en el Espectro Autismo y comunidad interesada</td>
                        <td>2022-06-15 02:19:00</td>
                        <td>En linea</td>
                        <td>20.00</td>
                        <td>
                            <a href="http://127.0.0.1:8001/sistema/event/1/edit" class="btn btn-success btn-sm">Editar</a>
                            <form action="http://127.0.0.1:8001/sistema/event/1/destroy" class="d-inline" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="pwBvadhG0vFfFYmhwH7W7cKMPdXA4XaF2PhAr5Al">
                                <button class="btn btn-sm btn-danger" type="submit">Eliminar</button>
                            </form>
                            <script>
                                $('.formdelete').submit(function(e){
                                    e.preventDefault();
                                    Swal.fire({
                                        title: '¿Seguro que deseas eliminar el registro?',
                                        text: "No se podrá recuperar la información eliminada",
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#1cc88a',
                                        cancelButtonColor: '#e74a3b',
                                        confirmButtonText: 'Aceptar',
                                        cancelButtonText: 'Cancelar'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            this.submit();
                                        }
                                    })
                                });
                            </script>
                        </td>
                    </tr>
                    <tr class="odd">
                        <td class="sorting_1">3</td>
                        <td>Dia muldial del sindrome de Asperger</td>
                        <td>Evento recreativo y terapeutico enfocado en las personas que padecen...</td>
                        <td>Personas que viven con el sindrome de Asperger y comunidad interesada</td>
                        <td>2022-07-09 02:19:00</td>
                        <td>En linea</td>
                        <td>Gratis</td>
                        <td>
                            <a href="http://127.0.0.1:8001/sistema/event/1/edit" class="btn btn-success btn-sm">Editar</a>
                            <form action="http://127.0.0.1:8001/sistema/event/1/destroy" class="d-inline" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="pwBvadhG0vFfFYmhwH7W7cKMPdXA4XaF2PhAr5Al">
                                <button class="btn btn-sm btn-danger" type="submit">Eliminar</button>
                            </form>
                            <script>
                                $('.formdelete').submit(function(e){
                                    e.preventDefault();
                                    Swal.fire({
                                        title: '¿Seguro que deseas eliminar el registro?',
                                        text: "No se podrá recuperar la información eliminada",
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#1cc88a',
                                        cancelButtonColor: '#e74a3b',
                                        confirmButtonText: 'Aceptar',
                                        cancelButtonText: 'Cancelar'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            this.submit();
                                        }
                                    })
                                });
                            </script>
                        </td>
                    </tr>
                </tbody>
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
                    {data: 'cost'},
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
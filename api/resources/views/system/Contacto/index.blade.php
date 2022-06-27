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

                    <h1 class="text-center">{{ __('Contacto') }}</h1>
                </div>
            </div>
        </div>
    </div>
</div>


<form action="{{route('contact.store')}}" method="post" id="contact_create_form" enctype="multipart/form-data">
    @csrf
    <div class="card shadow mb-4 m-5">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <h4 class="m-0">Contacto</h4>
                </div>
                <div class="col-sm-12 col-md-6" align="right">
                    <button type="submit" class="btn btn-primary" id="contact_create_btn">Aplicar cambios</button>
                </div>
            </div>
        </div>
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">¡Ha ocurrido un ERROR!</h4>|
                    <div class="alert-body">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading"> {{session('success')}} </h4>
                </div>
            @endif
            
        <div class="row">
            <div class="mb-3 col-sm-12 col-mb-4 col-xl-4">
                <label for="email" class="form-label">Correo electrónico</label>
                <input type="text" class="form-control" id="email_id" name="email" value="@if($data){!! $data->email !!}@endif" placeholder="Correo electrónico" required>
            </div>

            <div class="mb-3 col-sm-12 col-mb-4 col-xl-4">
                <label for="phone" class="form-label">Teléfono</label>
                <input type="text" class="form-control" id="phone_id" name="phone" value="@if($data){!! $data->phone !!}@endif" placeholder="Teléfono" required>
            </div>

            <div class="mb-3 col-sm-12 col-mb-4 col-xl-4">
                <label for="facebook" class="form-label">Facebook</label>
                <input type="text" class="form-control" id="facebook_id" name="facebook" value="@if($data){!! $data->facebook !!}@endif" placeholder="Facebook" required>
            </div>

            <div class="mb-3 col-sm-12 col-mb-4 col-xl-4">
                <label for="twitter" class="form-label">Twitter</label>
                <input type="text" class="form-control" id="twitter_id" name="twitter" value="@if($data){!! $data->twitter !!}@endif" placeholder="Twitter" required>
            </div>

            <div class="mb-3 col-sm-12 col-mb-4 col-xl-4">
                <label for="instagram" class="form-label">Instagram</label>
                <input type="text" class="form-control" id="instagram_id" name="instagram" value="@if($data){!! $data->instagram !!}@endif" placeholder="Instagram" required>
            </div>

            <div class="mb-3 col-sm-12 col-mb-4 col-xl-4">
                <label for="address" class="form-label">Domicilio</label>
                <input type="text" class="form-control" id="address_id" name="address" value="@if($data){!! $data->address !!}@endif" placeholder="Domicilio" required>
            </div>

            <div class="mb-3 col-sm-12 col-mb-4 col-xl-4">
                <label for="googlemaps" class="form-label">Google Maps</label>
                <input type="text" class="form-control" id="google_address_id" name="googlemaps" value="@if($data){!! $data->googlemaps !!}@endif" placeholder="Google Maps" required>
            </div>
        </div>
    </div>
</form>

<div class="card ">
    <div class="card-header py-3">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h4 class="m-0">Lista de respuestas del formulario de contacto</h4>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">

            <table id="data" class="dataindex table table-flush">
                <thead class="thead-light">
                <tr>
                    <th width="10px">No.</th>
                    <th>Correo electrónico</th>
                    <th>Teléfono</th>
                    <th>Nombre</th>
                    <th>Asunto</th>
                    <th width="150px">Acciones</th>
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function () {
            $('#data').DataTable({
                "serverSide": true,
                "header": {
                    "token": "{{ csrf_token() }}",
                },
                "ajax": "{{ url('sistema/form-contact/data') }}",
                "columns": [
                    {data: 'id'},
                    {data: 'email'},
                    {data: 'phone'},
                    {data: 'name'},
                    {data: 'subject'},
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

            $('#contact_create_form').submit(function(e){
                e.preventDefault();
                Swal.fire({
                    title: '¿Seguro que deseas actualizar el registro?',
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
        });
    </script>
@endsection
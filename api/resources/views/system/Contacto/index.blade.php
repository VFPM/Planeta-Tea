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


    <form action="{{route('contact.store')}}" method="post"  enctype="multipart/form-data">
    @csrf
<div class="card shadow mb-4 m-5">
    <div class="card-header py-3">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h4 class="m-0">Contacto</h4>
            </div>
            <div class="col-sm-12 col-md-6" align="right">
                <button type="submit" class="btn btn-primary">Aplicar cambios</button>
            </div>
        </div>

    </div>
    <div class="card-body">
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
                    <label for="address" class="form-label">Domicilio</label>
                    <input type="text" class="form-control" id="address_id" name="address" value="@if($data){!! $data->address !!}@endif" placeholder="Domicilio" required>
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
    </div>
</div>
</form>
@endsection

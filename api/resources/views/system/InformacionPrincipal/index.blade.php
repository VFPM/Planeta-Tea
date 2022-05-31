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

                    <h1 class="text-center">{{ __('Información Principal') }}</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card shadow mb-4 m-5">
    <div class="card-header py-3">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <h4>Informacion Principal</h4>
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

        <form action="{{route('main-info.store')}}" method="post"  enctype="multipart/form-data">
        @csrf
        <div align="right">
            <button type="submit" class="btn btn-primary">Aplicar cambios</button>
        </div>
        <div class="row">  
                <div class="mb-3 col-sm-12 col-mb-12 col-xl-12 ">
                    <h3 for="body" class="form-label">Contenido</h3>
                    <textarea name="body" id="body_id" value="" placeholder="Agregar una descripcion" class="form-control" rows="10">@if($data){!! $data->body !!}@endif</textarea>
                </div>
            </div>
            <br>
            <div class="row">  
                <div class="mb-3 col-sm-12 col-mb-12 col-xl-12 ">
                    <h3 for="values" class="form-label">Valores</h3>
                    <textarea name="values" id="values_id" value="" placeholder="Agregar una descripcion" class="form-control" rows="10">@if($data){!! $data->values !!}@endif</textarea>
                </div>
            </div>
            <br>
            <div class="row">  
                <div class="mb-3 col-sm-12 col-mb-12 col-xl-12 ">
                    <h3 for="services" class="form-label">Servicios</h3>
                    <textarea name="services" id="services_id" value="" placeholder="Agregar una descripcion" class="form-control" rows="10">@if($data){!! $data->services !!}@endif</textarea>
                </div>
            </div>
        </form>    
    </div>
</div>

@endsection
@section('scripts-page')
    <script src="https://cdn.tiny.cloud/1/1koh7nhlb1qkn9xsamo2b9zafsztdbzf5k2jpltnsvfekepa/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src={{asset('/assets/js/specialtinyjs.js')}}></script>
@endsection
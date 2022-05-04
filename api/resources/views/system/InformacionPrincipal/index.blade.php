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
                <div class="col-sm-12 col-md-6" align="right">
                    <a href="#" class="btn btn-primary">
                        Subir informacion 
                    </a>
                </div>
            </div>

    </div>
    <div class="card-body">
        <form action="#" method="post"  enctype="multipart/form-data">
        @csrf
            <div class="row">  
                <div class="mb-3 col-sm-12 col-mb-12 col-xl-12 ">
                    <h3 for="contenido" class="form-label">Contenido</h3>
                    <textarea name="contenido" id="contenido" placeholder="Agregar una descripcion" class="content_page"></textarea>
                </div>
            </div>
            <br>
            <div class="row">  
                <div class="mb-3 col-sm-12 col-mb-12 col-xl-12 ">
                    <h3 for="valores" class="form-label">Valores</h3>
                    <textarea name="valores" id="valores" placeholder="Agregar una descripcion" class="content_page"></textarea>
                </div>
            </div>
            <br>
            <div class="row">  
                <div class="mb-3 col-sm-12 col-mb-12 col-xl-12 ">
                    <h3 for="servicios" class="form-label">Servicios</h3>
                    <textarea name="servicios" id="servicios" placeholder="Agregar una descripcion" class="content_page"></textarea>
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
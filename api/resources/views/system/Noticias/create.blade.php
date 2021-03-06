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

                    <h1 class="text-center">{{ __('Registrar Noticia') }}</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mt-5">
    <form action="{{route('news.store')}}" method="post"  enctype="multipart/form-data">
    @csrf
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Registrar Noticia</h6>
        </div>

        <div class="card-body">

            @if ($errors->any())

                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">¡Ha ocurrido un ERROR!</h4>
                    <div class="alert-body">
                        <ul>
                        </ul>
                    </div>
                </div>
            @endif

            <div class="row">
                <div class="mb-3 col-sm-12 col-mb-5 col-xl-5">
                    <label for="type_news_id" class="form-label">Agregar tipo de noticia</label>
                    <input type="text" class="form-control" id="type_news_text" name="type_news_text" placeholder="Tipo de noticia" required>
                </div>

                <div class="mb-3 col-sm-12 col-mb-1 col-xl-1">
                    <br>
                    <button href="#" class="btn btn-success btn-sm" >Agregar tipo de noticia</button>
                </div>

                <div class="mb-3 col-sm-12 col-mb-6 col-xl-6">
                    <label for="type" class="form-label">Selecciona tipo de noticia</label>
                    <select class="form-control" id="type_news_id" name="type_news_id">
                        <option selected disabled value="">Tipo...</option>
                    </select>
                </div>

                <div class="mb-3 col-sm-12 col-mb-6 col-xl-6">
                    <label for="title" class="form-label">Título</label>
                    <input type="text" class="form-control" id="title_id" name="title" placeholder="Título" required>
                </div>

                <div class="mb-3 col-sm-12 col-mb-6 col-xl-6">
                    <label for="to" class="form-label">Para</label>
                    <input type="text" class="form-control" id="to_id" name="to" placeholder="Para" required>
                </div>

                <div class="mb-3 col-sm-12 col-mb-6 col-xl-6">
                    <label for="news_date" class="form-label">Fecha de la noticia</label>
                    <input type="date" class="form-control" id="news_date_id" name="news_date" placeholder="Fecha de la noticia" required>
                </div>

                <div class="mb-3 col-sm-12 col-mb-6 col-xl-6">
                    <label for="news_time" class="form-label">Hora de la noticia</label>
                    <input type="time" class="form-control" id="news_time_id" name="news_time" placeholder="Hora de la noticia" required>
                </div>

                <div class="mb-3 col-sm-12 col-mb-6 col-xl-6 ">
                    <label for="mode" class="form-label">Modalidad</label>
                    <select name="mode" class="form-control" id="mode_id" required>
                        <option value="">Selecciona...</option>
                        <option value="Presencial">Presencial</option>
                        <option value="En linea">En linea</option>
                    </select>
                </div>

                <div class="mb-3 col-sm-12 col-mb-6 col-xl-6 ">
                    <label for="cost" class="form-label">Costo</label>
                    <input type="number" class="form-control" id="cost_id" name="cost" placeholder="Costo" required>
                </div>

                <div class="mb-3 col-sm-12 col-mb-6 col-xl-6">
                    <label for="image" class="form-label">Imagen de la noticia</label>
                    <input type="file" class="form-control" id="image_id" accept=".jpeg,.jpg,.png" name="image" placeholder="Imagen de la noticia">
                    <small>Tamaño Maximo 1MB, Resolución Maxima: 1920px * 1080px</small>
                </div>

                <div class="mb-3 col-sm-12 col-mb-12 col-xl-12 ">
                    <label for="body" class="form-label">Contenido de la noticia</label>
                    <textarea name="body" class="content_page" id="body_id" placeholder="Contenido de la noticia"></textarea>
                </div>
            </div>


        </div>

            <div class="card-footer" align="right">
                <button type="submit" class="btn btn-primary">Registrar</button>
            </div>
    </div>
    </form>
</div>
@endsection

@section('scripts-page')
    <script src="https://cdn.tiny.cloud/1/1koh7nhlb1qkn9xsamo2b9zafsztdbzf5k2jpltnsvfekepa/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src={{asset('/assets/js/specialtinyjs.js')}}></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"> </script>
    <script>
        $(document).ready(function () {
            $.ajax({
                url: 'http://18.222.15.154/Hiring_Web/trabajos/inicio/0',
                method: 'GET',
                contentType: false,
                processData: false,
                header: { token: "{{ csrf_token() }}", }
            })
            .done(function(response){

                var info = JSON.parse(response);

                for(var k in info) {
                    console.log(k, info[k]);
                    
                    var card = `<option value='${info[k]["ListaArchivosModel"][0]["ArchivoData"]}'>Juan</option>`;

                    $('#type_news_id').append("<option value='5'>Juan</option>");
                }
            })
            .fail(function(err){
                console.log(err);
            });
        });
    </script>
@endsection
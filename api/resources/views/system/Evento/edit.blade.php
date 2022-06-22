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

                    <h1 class="text-center">{{ __('Editar Noticia') }}</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mt-5">
    <form action="{{route('news.update', $data->id)}}" method="post"  enctype="multipart/form-data">
    @method('PATCH')
    @csrf
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Editar Noticia</h6>
        </div>

        <div class="card-body">

            @if ($errors->any())

                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">¡Ha ocurrido un ERROR!</h4>
                    <div class="alert-body">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <div class="row">


                <div class="mb-3 col-sm-12 col-mb-12 col-xl-12">
                    <label for="type" class="form-label">Selecciona tipo de noticia</label>
                    <select class="form-control" id="type_news_id" name="type_news_id">
                        @foreach ($newsType as $tipo)
                            @if ($tipo->id == $data->type_news_id)
                                <option value="{{$tipo->id}}" selected>{{$tipo->name}}</option>
                            @else
                                <option value="{{$tipo->id}}">{{$tipo->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                
                <div class="mb-3 col-sm-12 col-mb-12 col-xl-12">
                    <label for="type" class="form-label">Selecciona la modalidad</label>
                    <select class="form-control" id="mode_id" name="mode_id">
                        @foreach ($mode as $tipo)
                            @if ($tipo->id == $data->mode_id)
                                <option value="{{$tipo->id}}" selected>{{$tipo->name}}</option>
                            @else
                                <option value="{{$tipo->id}}">{{$tipo->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                
                <div class="mb-3 col-sm-12 col-mb-12 col-xl-12">
                    <label for="type" class="form-label">Selecciona la plataforma</label>
                    <select class="form-control" id="platform_id" name="platform_id">
                        @foreach ($plataform as $tipo)
                            @if ($tipo->id == $data->platform_id)
                                <option value="{{$tipo->id}}" selected>{{$tipo->name}}</option>
                            @else
                                <option value="{{$tipo->id}}">{{$tipo->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="mb-3 col-sm-12 col-mb-12 col-xl-12">
                    <label for="link" class="form-label">Link</label>
                    <input type="text" class="form-control" id="link_id" name="link" value="{{old('link', $data->link)}}" placeholder="Link" required>
                </div>

                <div class="mb-3 col-sm-12 col-mb-6 col-xl-6">
                    <label for="title" class="form-label">Título</label>
                    <input type="text" class="form-control" id="title_id" name="title" value="{{old('title', $data->title)}}" placeholder="Título" required>
                </div>

                <div class="mb-3 col-sm-12 col-mb-6 col-xl-6">
                    <label for="to" class="form-label">Dirigido a</label>
                    <input type="text" class="form-control" id="to_id" name="to" value="{{old('to', $data->to)}}" placeholder="Dirigido a" required>
                </div>

                <div class="mb-3 col-sm-12 col-mb-6 col-xl-6">
                    <label for="event_date" class="form-label">Fecha de la noticia</label>
                    <input type="date" class="form-control" id="event_date_id" name="news_date" value="{{date('Y-m-d', strtotime(old('news_date', $data->news_date)))}}" placeholder="Fecha de la noticia" required>
                </div>

                <div class="mb-3 col-sm-12 col-mb-6 col-xl-6">
                    <label for="event_time" class="form-label">Hora de la noticia</label>
                    <input type="time" class="form-control" id="event_time_id" name="news_time" value="{{date('H:i:s', strtotime(old('news_date', $data->news_date)))}}" placeholder="Hora de la noticia" required>
                </div>

                <div class="mb-3 col-sm-12 col-mb-6 col-xl-6 ">
                    <label for="cost" class="form-label">Costo</label>
                    <input type="number" class="form-control" id="cost_id" name="cost" value="{{old('cost', $data->cost)}}" placeholder="Costo" required>
                </div>

                <div class="mb-3 col-sm-12 col-mb-6 col-xl-6">
                    <label for="image" class="form-label">Imagen de la noticia</label>
                    <input type="file" class="form-control" id="image_id" accept=".jpeg,.jpg,.png" name="image" placeholder="Imagen de la noticia">
                    <small>Tamaño Maximo 1MB, Resolución Maxima: 1920px * 1080px</small>
                </div>

                <div class="mb-3 col-sm-12 col-mb-12 col-xl-12 ">
                    <label for="description" class="form-label">Descripción</label>
                    <textarea name="description" class="form-control" id="body_id" placeholder="Descripción" rows="10">{!! old('description', $data->description) !!}</textarea>
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
@endsection
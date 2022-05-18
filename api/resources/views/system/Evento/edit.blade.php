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

                    <h1 class="text-center">{{ __('Editar Evento') }}</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mt-5">
    <form action="{{route('event.update', $data->id)}}" method="post"  enctype="multipart/form-data">
    @method('PATCH')
    @csrf
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Editar Evento</h6>
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
                <div class="mb-3 col-sm-12 col-mb-6 col-xl-6">
                    <label for="title" class="form-label">Título</label>
                    <input type="text" class="form-control" id="title_id" name="title" value="{{old('title', $data->title)}}" placeholder="Título" required>
                </div>

                <div class="mb-3 col-sm-12 col-mb-6 col-xl-6">
                    <label for="to" class="form-label">Para</label>
                    <input type="text" class="form-control" id="to_id" name="to" value="{{old('to', $data->to)}}" placeholder="Para" required>
                </div>

                <div class="mb-3 col-sm-12 col-mb-6 col-xl-6">
                    <label for="event_date" class="form-label">Fecha del evento</label>
                    <input type="date" class="form-control" id="event_date_id" name="event_date" value="{{date("Y-m-d", strtotime(old('event_date', $data->event_date)))}}" placeholder="Fecha del evento" required>
                </div>

                <div class="mb-3 col-sm-12 col-mb-6 col-xl-6">
                    <label for="event_time" class="form-label">Hora del evento</label>
                    <input type="time" class="form-control" id="event_time_id" name="event_time" value="{{date("H:i:s", strtotime(old('event_date', $data->event_date)))}}" placeholder="Hora del evento" required>
                </div>

                <div class="mb-3 col-sm-12 col-mb-6 col-xl-6 ">
                    <label for="mode" class="form-label">Modalidad</label>
                    <select name="mode" class="form-control" id="mode_id" required>
                        <option value="">Selecciona...</option>
                        <option value="Presencial" @if( $data->mode === 'Presencial') selected @endif >Presencial</option>
                        <option value="En linea"   @if( $data->mode === 'En linea') selected @endif >En linea</option>
                    </select>
                </div>

                <div class="mb-3 col-sm-12 col-mb-6 col-xl-6 ">
                    <label for="cost" class="form-label">Costo</label>
                    <input type="number" class="form-control" id="cost_id" name="cost" value="{{old('cost', $data->cost)}}" placeholder="Costo" required>
                </div>

                <div class="mb-3 col-sm-12 col-mb-6 col-xl-6">
                    <label for="image" class="form-label">Imagen del evento</label>
                    <input type="file" class="form-control" id="image_id" accept=".jpeg,.jpg,.png" name="image" placeholder="Imagen del evento">
                    <small>Tamaño Maximo 1MB, Resolución Maxima: 1920px * 1080px</small>
                </div>

                <div class="mb-3 col-sm-12 col-mb-12 col-xl-12 ">
                    <label for="description" class="form-label">Contenido del evento</label>
                    <textarea name="description" class="content_page" id="body_id" placeholder="Contenido del evento">{!! old('body', $data->body) !!}</textarea>
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
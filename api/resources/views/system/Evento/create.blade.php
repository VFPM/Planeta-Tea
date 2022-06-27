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
            
            <div class="row" style="align-items: center;">

                <div class="mb-3 col-sm-12 col-mb-11 col-xl-11">
                    <label for="type" class="form-label">Selecciona tipo de noticia</label>
                    <select class="form-control" id="type_news_id" name="type_news_id">
                            @foreach ($newsType as $tipo)
                                <option value="{{$tipo->id}}">{{$tipo->name}}</option>
                            @endforeach
                    </select>
                </div>

                <div class="mb-3 col-sm-12 col-mb-1 col-xl-1" >
                    <br>
                    <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#create-noticia" >Agregar tipo de noticia</a>
                </div>

                <div class="mb-3 col-sm-12 col-mb-11 col-xl-11">
                    <label for="type" class="form-label">Selecciona la modalidad</label>
                    <select class="form-control" id="mode_id" name="mode_id">
                        
                        @foreach ($mode as $tipo)
                                <option value="{{$tipo->id}}">{{$tipo->name}}</option>
                            @endforeach
                    </select>
                </div>



                <div class="mb-3 col-sm-12 col-mb-1 col-xl-1">
                    <br>
                    <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#create-modalidad" >Agregar modalidad</a>
                </div>

                <div class="mb-3 col-sm-12 col-mb-11 col-xl-11">
                    <label for="type" class="form-label">Selecciona la plataforma</label>
                    <select class="form-control" id="platform_id" name="platform_id">
                        
                        @foreach ($plataform as $tipo)
                                <option value="{{$tipo->id}}">{{$tipo->name}}</option>
                            @endforeach
                    </select>
                </div>



                <div class="mb-3 col-sm-12 col-mb-1 col-xl-1">
                    <br>
                    <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#create-plataforma" >Agregar plataforma</a>
                </div>

                <div class="mb-3 col-sm-12 col-mb-12 col-xl-12">
                    <label for="link" class="form-label">Link</label>
                    <input type="text" class="form-control" id="link_id" name="link" placeholder="Link" required>
                </div>

                <div class="mb-3 col-sm-12 col-mb-6 col-xl-6">
                    <label for="title" class="form-label">Título</label>
                    <input type="text" class="form-control" id="title_id" name="title" placeholder="Título" required>
                </div>

                <div class="mb-3 col-sm-12 col-mb-6 col-xl-6">
                    <label for="to" class="form-label">Dirigido a</label>
                    <input type="text" class="form-control" id="to_id" name="to" placeholder="Dirigido a" required>
                </div>

                <div class="mb-3 col-sm-12 col-mb-6 col-xl-6">
                    <label for="event_date" class="form-label">Fecha de la noticia</label>
                    <input type="date" class="form-control" id="event_date_id" name="news_date" placeholder="Fecha de la noticia" required>
                </div>

                <div class="mb-3 col-sm-12 col-mb-6 col-xl-6">
                    <label for="event_time" class="form-label">Hora de la noticia</label>
                    <input type="time" class="form-control" id="event_time_id" name="news_time" placeholder="Hora de la noticia" required>
                </div>

                <div class="mb-3 col-sm-12 col-mb-6 col-xl-6 ">
                    <label for="cost" class="form-label">Costo</label>
                    <input type="text" class="form-control" id="cost_id" name="cost" placeholder="Costo" required>
                </div>

                <div class="mb-3 col-sm-12 col-mb-6 col-xl-6">
                    <label for="image" class="form-label">Imagen de la noticia</label>
                    <input type="file" class="form-control" id="image_id" accept=".jpeg,.jpg,.png" name="image" placeholder="Imagen de la noticia">
                    <small>Tamaño Maximo 1MB, Resolución Maxima: 1920px * 1080px</small>
                </div>

                <div class="mb-3 col-sm-12 col-mb-12 col-xl-12 ">
                    <label for="description" class="form-label">Descripción</label>
                    <textarea name="description" class="form-control" id="description_id" placeholder="Descripción" rows="10"></textarea>
                </div>
            </div>


        </div>

            <div class="card-footer" align="right">
                <button type="submit" class="btn btn-primary">Registrar</button>
            </div>
    </div>
    </form>

    <!-- Modal Crear Tipo de Noticia -->
    <div class="modal fade" id="create-noticia" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <form method="post" id="form_news_type_id">
            <input type="hidden" name="_method" id="method_type_news_id" value="">
            @csrf
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Creacion de tipo de noticia</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <div class="row" style="align-items: center;">
                            <div class="mb-3 col-sm-10 col-mb-10 col-xl-10">
                                <label for="type" class="form-label">Selecciona tipo de noticia a editar</label>
                                <select class="form-control" id="type_news_edit_id" name="type_news_edit_id" onchange="enableEditTypeNewsInput()">
                                    <option value="" selected disabled hidden>Selecciona un tipo de noticia...</option>
                                    <option value="">Crear tipo de noticia</option>
                                    @foreach ($newsType as $tipo)
                                    <option value="{{$tipo->id}}">{{$tipo->name}}</option>
                                @endforeach
                                    <!--<option value="1">Testimonio</option>
                                    <option value="2">Aviso de Podcast</option>
                                    <option value="3">Noticias</option>-->
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 col-sm-12 col-mb-12 col-xl-12">
                            <label for="type" class="form-label">Escribe el tipo de noticia a crear</label>
                            <input type="text" class="form-control" name="name" placeholder="Descripción" id="type_news_text_id" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" id="type_news_update_btn" disabled>Editar</button>
                        <button type="submit" class="btn btn-primary" id="type_news_create_btn">Crear</button>
                    </div>
                </div>
            </div>
        </form>
    </div>


    <!-- Modal Crear Modalidad -->
    <div class="modal fade" id="create-modalidad" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <form method="post" id="form_mode_id">
            <input type="hidden" name="_method" id="method_mode_id" value="">
            @csrf
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Creacion de modalidad</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <div class="row" style="align-items: center;">
                            <div class="mb-3 col-sm-10 col-mb-10 col-xl-10">
                                <label for="type" class="form-label">Selecciona la modalidad</label>
                                <select class="form-control" id="type_mode_edit_id" name="mode_id" onchange="enableEditTypeModeInput()">
                                <option value="" selected disabled hidden>Selecciona una modalidad...</option>
                                <option value="">Crear modalidad</option>
                                    @foreach ($mode as $tipo)
                                    <option value="{{$tipo->id}}">{{$tipo->name}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 col-sm-12 col-mb-12 col-xl-12">
                            <label for="type" class="form-label">Escribe el tipo de modalidad a crear</label>
                            <input type="text" class="form-control" name="name" placeholder="Descripción" id="type_mode_text_id" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" id="type_mode_update_btn" disabled>Editar</button>
                        <button type="submit" class="btn btn-primary" id="type_mode_create_btn"  >Crear</button>
                    </div>
                </div>
            </div>
        </form>
    </div>


    <!-- Modal Crear Plataforma -->
    <div class="modal fade" id="create-plataforma" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <form method="post" id="form_platform_id">
            <input type="hidden" name="_method" id="method_platform_id" value="">
            @csrf
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Creacion de plataforma</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <div class="row" style="align-items: center;">
                            <div class="mb-3 col-sm-10 col-mb-10 col-xl-10">
                                <label for="type" class="form-label">Selecciona la plataforma</label>
                                <select class="form-control" id="type_platform_edit_id" name="platform_id" onchange="enableEditTypePlatformInput()">
                                <option value="" selected disabled hidden>Selecciona una plataforma...</option>
                                <option value="">Crear plataforma</option>
                                    @foreach ($plataform as $tipo)
                                <option value="{{$tipo->id}}">{{$tipo->name}}</option>
                            @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 col-sm-12 col-mb-12 col-xl-12">
                            <label for="type" class="form-label">Escribe el tipo de modalidad a crear</label>
                            <input type="text" class="form-control" name="name" placeholder="Descripción" id="type_platform_text_id" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" id="type_platform_update_btn" disabled>Editar</button>
                        <button type="submit" class="btn btn-primary" id="type_platform_create_btn" >Crear</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>
@endsection

@section('scripts-page')
    <script src="https://cdn.tiny.cloud/1/1koh7nhlb1qkn9xsamo2b9zafsztdbzf5k2jpltnsvfekepa/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src={{asset('/assets/js/specialtinyjs.js')}}></script>
    <script type="text/javascript">

        $(document).ready(function(){

            $("#type_news_create_btn").on("click", function(e){
                e.preventDefault();
                $('#form_news_type_id').attr('action', "{{ url('sistema/news-type/store') }}").submit();
            });

            $("#type_news_update_btn").on("click", function(e){
                e.preventDefault();
                $('#method_type_news_id').val('PATCH');
                let id = $('#type_news_edit_id').val();
                $('#form_news_type_id').attr('action', `{{ url('sistema/news-type/${id}/update') }}`).submit();
            });

            $("#type_mode_create_btn").on("click", function(e){
                e.preventDefault();
                $('#form_mode_id').attr('action', "{{ url('sistema/mode/store') }}").submit();
            });

            $("#type_mode_update_btn").on("click", function(e){
                e.preventDefault();
                $('#method_mode_id').val('PATCH');
                let id = $('#type_mode_edit_id').val();
                $('#form_mode_id').attr('action', `{{ url('sistema/mode/${id}/update') }}`).submit();
            });

            $("#type_platform_create_btn").on("click", function(e){
                e.preventDefault();
                $('#form_platform_id').attr('action', "{{ url('sistema/plataform/store') }}").submit();
            });

            $("#type_platform_update_btn").on("click", function(e){
                e.preventDefault();
                $('#method_platform_id').val('PATCH');
                let id = $('#type_platform_edit_id').val();
                $('#form_platform_id').attr('action', `{{ url('sistema/plataform/${id}/update') }}`).submit();
            });
        });

        function enableEditTypeNewsInput() {
            var selectEditNews = document.getElementById('type_news_edit_id');
            var titleNews = document.getElementById('type_news_text_id');
            var btnUpdate = document.getElementById('type_news_update_btn');
            var btnCreate = document.getElementById('type_news_create_btn');
            
            if(selectEditNews.value != ""){
                btnUpdate.disabled = false;
                btnCreate.disabled = true;
                titleNews.value = selectEditNews.options[selectEditNews.selectedIndex].text;
            }else{
                btnUpdate.disabled = true;
                btnCreate.disabled = false;
            }
        }

        function enableEditTypeModeInput() {
            var selectEditMode = document.getElementById('type_mode_edit_id');
            var titleMode = document.getElementById('type_mode_text_id');
            var btnUpdate = document.getElementById('type_mode_update_btn');
            var btnCreate = document.getElementById('type_mode_create_btn');
            
            if(selectEditMode.value != ''){
                btnUpdate.disabled = false;
                btnCreate.disabled = true;
                titleMode.value = selectEditMode.options[selectEditMode.selectedIndex].text;
            }else{
                btnUpdate.disabled = true;
                btnCreate.disabled = false;
            }
        }

        function enableEditTypePlatformInput() {
            var selectEditPlatform = document.getElementById('type_platform_edit_id');
            var titlePlatform = document.getElementById('type_platform_text_id');
            var btnUpdate = document.getElementById('type_platform_update_btn');
            var btnCreate = document.getElementById('type_platform_create_btn');
            
            if(selectEditPlatform.value != ''){
                btnUpdate.disabled = false;
                btnCreate.disabled = true;
                titlePlatform.value = selectEditPlatform.options[selectEditPlatform.selectedIndex].text;
            }else{
                btnUpdate.disabled = true;
                btnCreate.disabled = false;
            }
        }

        function submitTypeNews(event) {
            event.preventDefault();
            console.log(event.submitter.id);
            console.log("{{ url('sistema/news-type/store') }}");

            console.log($('#type_news_create_btn'));

            $(this).attr('action', "{{ url('sistema/news-type/store') }}").submit();
        }
    </script>
@endsection
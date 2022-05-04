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

                    <h1 class="text-center">{{ __('Registrar Cuestionario') }}</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mt-5">
    <form action="{{route('test.store')}}" method="post"  enctype="multipart/form-data">
    @csrf
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Registrar respuesta</h6>
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
                    <label for="test_name" class="form-label">Pregunta</label>
                    <input type="text" class="form-control" id="pregunta_id" name="test_name" placeholder="Pregunta" required>
                </div>
            </div>

            <div class="row">
                <div class="mb-3 col-sm-12 col-mb-6 col-xl-6">
                    <label for="test_name" class="form-label">Tipo de pregunta</label>
                    <select  class="form-control" id="tipo_pregunta" name="test_name" placeholder="Tipo de pregunta" required>
                        <option value="Abierta">Abierta</option>
                        <option value="Multiple">Opcion Multiple</option>
                    </select>
                </div>
            </div>
           
            <div class="row" style='display:none' id='respuestas-multiples'>

                <label for="test_name" class="form-label">Respuestas <button type="button" class="btn btn-sm btn-success" id="add_Respuesta" style="padding:2px 6px 2px 6px;">+</button></label>
                
                <br>
                <div id="respuestas-contenedor">
                    <div class="mb-3 col-sm-12 col-mb-6 col-xl-6 respuesta"  style="position:relative;">
                        <button type="button" class="btn btn-sm btn-danger delete-respuesta" style="position:absolute;  height: 100%;">X</button>
                        <input type="text" class="form-control" id="pregunta_id" name="test_name" placeholder="Pregunta" required style="padding-left:30px;">
                    </div>
                    <div class="mb-3 col-sm-12 col-mb-6 col-xl-6 respuesta"  style="position:relative;">
                        <button type="button" class="btn btn-sm btn-danger delete-respuesta" style="position:absolute;  height: 100%;">X</button>
                        <input type="text" class="form-control" id="pregunta_id" name="test_name" placeholder="Pregunta" required style="padding-left:30px;">
                    </div>
                </div>
            </div>
        </div>

            <div class="card-footer" align="right">
                <button type="submit" class="btn btn-primary">Registrar</button>
            </div>
    </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"> </script>
<script src="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script>
  $(document).ready(function () {

    const inputRespuesta =  `<div class="mb-3 col-sm-12 col-mb-6 col-xl-6 respuesta"  style="position:relative;">
                                <button type="button" class="btn btn-sm btn-danger delete-respuesta" style="position:absolute;  height: 100%;">X</button>
                                <input type="text" class="form-control" id="pregunta_id" name="test_name" placeholder="Pregunta" required style="padding-left:30px;">
                            </div>`;


    let numeroRespuestas = 2;

    $("#tipo_pregunta").on('change', function(){
        const option = $("#tipo_pregunta option:selected").attr('value');
        if(option === 'Multiple'){
            $('#respuestas-multiples').slideDown('slow');
        }else if (option === 'Abierta'){
            $('#respuestas-multiples').slideUp('slow');
        }
    });

    $("#add_Respuesta").on('click', function(){
        $("#respuestas-contenedor").append(inputRespuesta);
        numeroRespuestas++;
    });

    $("#respuestas-multiples").on('click',".delete-respuesta",  function(){
        if(numeroRespuestas > 2){
            $(this).parent().remove();
            numeroRespuestas--;
        }else{
            alert('Una opcion multiple debe tener almenos 2 respuestas diferentes');
        }
    });

  });
</script>
@endsection
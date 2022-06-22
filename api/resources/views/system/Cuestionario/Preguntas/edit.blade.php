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

                    <h1 class="text-center">{{ __('Editar Pregunta') }}</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mt-5">
    <form action="{{route('question.update', $data->id)}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Editar Pregunta</h6>
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
                        <label for="test_id" class="form-label">Cuestionario</label>
                        <select  class="form-control" id="test_id" name="test_id" placeholder="Cuestionario" required>
                            <option value="{{$test->id}}">{{$test->name}}</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-sm-12 col-mb-6 col-xl-6">
                        <label for="description" class="form-label">Pregunta</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="Pregunta" required value="{{old('description', $data->description)}}">
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-sm-12 col-mb-6 col-xl-6">
                        <label for="question_type_id" class="form-label">Tipo de pregunta</label>
                        <select  class="form-control" id="question_type_id" name="question_type_id" placeholder="Tipo de pregunta" required>
                            @foreach($questionTypes as $questionType)
                                
                                <?php $selected = (old('question_type_id', $data->question_type_id) == $questionType->id) ? "selected" : "" ?>

                                <option <?php echo $selected ?> value="{{$questionType->id}}">{{$questionType->name}}</option>

                            @endforeach
                            <!-- <option value="Abierta">Abierta</option>
                            <option value="Multiple">Opcion Multiple</option> -->
                        </select>
                    </div>
                </div>
                @if($data->question_type_id == 1)
                    <div class="row" style="display:none" id='respuestas-multiples'>               
                @else
                    <div class="row" id='respuestas-multiples'>               
                    
                @endif
                    <label for="test_name" class="form-label">Respuestas <button type="button" class="btn btn-sm btn-success" id="add_Respuesta" style="padding:2px 6px 2px 6px;">+</button></label>
                    <br>
                    <div id="respuestas-contenedor">

                    @if ($data->question_type_id == 2)

                        @foreach($responses as $respuesta)
                            <div class="mb-3 col-sm-12 col-mb-6 col-xl-6 respuesta"  style="position:relative;">
                                <button type="button" class="btn btn-sm btn-danger delete-respuesta" style="position:absolute; height: 100%;">X</button>
                                <input type="text" class="form-control" id="pregunta_id" name="respuestas[]" placeholder="Respuesta" required style="padding-left:30px;" value="{{$respuesta->description}}">
                            </div>
                        @endforeach
                
                    @endif
                    </div>
                </div>
            </div>

            <div class="card-footer" align="right">
                <button type="submit" class="btn btn-primary">Editar</button>
            </div>

        </div>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"> </script>
<script>
  $(document).ready(function () {

    let total = 0;
        
    inputRespuesta =   `<div class="mb-3 col-sm-12 col-mb-6 col-xl-6 respuesta"  style="position:relative;">
                            <button type="button" class="btn btn-sm btn-danger delete-respuesta" style="position:absolute;  height: 100%;">X</button>
                            <input type="text" class="form-control" id="pregunta_id" name="respuestas[]" placeholder="Pregunta" required style="padding-left:30px;">
                        </div>`


    $("#question_type_id").on('change', function(){

        const option = $("#question_type_id option:selected").attr('value');
        if(option === '2'){

            for (let i = 0; i < 2; i++) {
                $("#respuestas-contenedor").append(inputRespuesta);  
                total++;         
            }
            $('#respuestas-multiples').slideDown('slow');

        }else if (option === '1'){

            $('#respuestas-contenedor').empty();
            $('#respuestas-multiples').slideUp('slow');

        }

    });

    $("#add_Respuesta").on('click', function(){
        $("#respuestas-contenedor").append(inputRespuesta); 
        total++;
        numeroRespuestas++;
    });

    $("#respuestas-multiples").on('click',".delete-respuesta",  function(){
       
        $(this).parent().remove();
        numeroRespuestas--;
        
    });

  });
</script>
@endsection
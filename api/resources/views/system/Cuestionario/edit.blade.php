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

                    <h1 class="text-center">{{ __('Editar Cuestionario') }}</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mt-5">
    <form action="{{route('test.update', $data->id)}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Editar Cuestionario</h6>
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
                        <label for="name" class="form-label">Nombre del cuestionario</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{old('name', $data->name)}}" placeholder="Nombre del cuestionario" required>
                </div>

                <br>

                <div class="row">  
                    <div class="mb-3 col-sm-12 col-mb-12 col-xl-12 ">
                        <label for="description" class="form-label">Descripción</label>
                        <textarea name="description" id="description_id" value="" placeholder="Descripción del cuestionario" class="form-control" rows="10">{{old('description', $data->description)}}</textarea>
                    </div>
                </div>

            </div>

            <div class="card-footer" align="right">
                <button type="submit" class="btn btn-primary">Editar</button>
            </div>

        </div>
    </form>
</div>
@endsection
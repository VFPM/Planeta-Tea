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

                    <h1 class="text-center">{{ __('Donativo') }}</h1>
                </div>
            </div>
        </div>
    </div>
</div>


<form action="{{route('donate.store')}}" method="post"  enctype="multipart/form-data">
    @csrf
    <div class="card shadow mb-4 m-5">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <h4 class="m-0">Donativo</h4>
                </div>
                <div class="col-sm-12 col-md-6" align="right">
                    <button type="submit" class="btn btn-primary">Aplicar cambios</button>
                </div>
            </div>
        </div>
        <div class="card-body">
        <div class="row">
            <div class="mb-3 col-sm-12 col-mb-4 col-xl-4">
                <label for="bank" class="form-label">Banco</label>
                <input type="text" class="form-control" id="bank_id" name="bank" value="@if($data){!! $data->bank !!}@endif" placeholder="Banco" required>
            </div>

            <div class="mb-3 col-sm-12 col-mb-4 col-xl-4">
                <label for="account" class="form-label">Cuenta</label>
                <input type="text" class="form-control" id="account_id" name="account" value="@if($data){!! $data->account !!}@endif" placeholder="Cuenta" required>
            </div>

            <div class="mb-3 col-sm-12 col-mb-4 col-xl-4">
                <label for="clabe" class="form-label">Clabe</label>
                <input type="text" class="form-control" id="clabe_id" name="clabe" value="@if($data){!! $data->clabe !!}@endif" placeholder="Clabe" required>
            </div>

            <div class="mb-3 col-sm-12 col-mb-4 col-xl-4">
                <label for="card" class="form-label">Tarjeta</label>
                <input type="text" class="form-control" id="card_id" name="card" value="@if($data){!! $data->card !!}@endif" placeholder="Tarjeta" required>
            </div>

            <div class="mb-3 col-sm-12 col-mb-4 col-xl-4">
                <label for="paypal" class="form-label">PayPal</label>
                <input type="text" class="form-control" id="paypal_id" name="paypal" value="@if($data){!! $data->paypal !!}@endif" placeholder="PayPal" required>
            </div>
        </div>
    </div>
</form>
@endsection
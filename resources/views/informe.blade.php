@extends('layouts.app')

@section('title')
    <title>Vanxa</title>
@endsection


@section('content')

<div class="row pedido col-12">
    <section class="col-md-12">
        <div class="row d-flex justify-content-center">
            <div class="col-6 bg-white border">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Ingresos Brutos</th>
                        <th scope="col">Costo Total</th>
                        <th scope="col">Ganancia</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>${{$ingresos['ingresosBrutos']}}</td>
                        <td>${{$ingresos['costoTotal']}}</td>
                        <td>${{$ingresos['ganancia']}}</td>
                    </tr>
                    </tbody>
                </table>
                <form action="" method="post">
                    @csrf
                    <button class="btn" type="submit"><i class="fas fa-sync-alt"></i> Calcular Ganancia</button>
                </form>
            </div>
        </div>
    </section>
</div>    

@endsection

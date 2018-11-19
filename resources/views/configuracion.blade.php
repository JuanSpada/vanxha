@extends('layouts.app')

@section('title')
    <title>Vanxa</title>
@endsection

@section('content')



<div class="container-fluid">
        <div class="row d-flex justify-content-around empresa-section">
    
            <div class="col-lg-3 bg-white border d-flex flex-column align-items-center empresa-content">
                
                <h5>Estados:</h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($estados as $estado)
                            <tr>
                            <th><p class="badge {{$estado->badge}}">{{$estado->estado}}</p></th>
                                <th>
                                    <form action="{{ url('configuracion/'. $estado->id .'/delete')}}" method="post" name="" enctype="multipart/form-data">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>


                <!-- Button trigger modal Estado-->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Agregar Estado
                </button>

            </div>
    
            <div class="card col-lg-8 bg-white border profile-container">
               
            </div>
        </div>
</div>

<!-- Modal de Estado -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Estado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="{{ route('configuracion.cargarEstado') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="estado">Estado:</label>
                <input class="form-control" type="text" name="estado">
            </div>
            <div class="form-check">
                <input value="badge-primary" class="form-check-input" type="radio" name="badge">
                <label for="label"><p class="badge badge-primary">Azul</p></label>
            </div>
            <div class="form-check">
                <input value="badge-secondary" class="form-check-input" type="radio" name="badge">
                <label for="label"><p class="badge badge-secondary">Verde</p></label>
            </div>
            <div class="form-check">
                <input value="badge-danger" class="form-check-input" type="radio" name="badge">
                <label for="label"><p class="badge badge-danger">Rojo</p></label>
            </div>
            <div class="form-check">
                <input value="badge-warning" class="form-check-input" type="radio" name="badge">
                <label for="label"><p class="badge badge-warning">Amarillo</p></label>
            </div>
            <div class="form-check">
                <input value="badge-success" class="form-check-input" type="radio" name="badge">
                <label for="label"><p class="badge badge-success">Verde</p></label>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Agregar</button>
        </form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
    </div>
</div>
</div>
@endsection

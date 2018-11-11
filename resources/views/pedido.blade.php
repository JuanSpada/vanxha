@extends('layouts.app')

@section('title')
    <title>Vanxa</title>
@endsection

@section('content')
<div class="row pedido">
    <section class="col-md-12">
        <article class="pedido-content border bg-white">
            <div class="d-flex justify-content-around">
                <div>
                    <p>Nombre:</p>
                    <h5>{{$pedido->nombrePersona}}</h5>
                </div>
                <div>
                    <p>Teléfono</p>
                    <h5>{{$pedido->telefono}}</h5>
                </div>
                <div>
                    <p>Fecha:</p>
                    <h5 class="badge">{{$pedido->created_at}}</h5>
                </div>
                <div>
                    <p>Precio</p>
                    <h5>${{$pedido->precio}}</h5>
                </div>
            </div>
            <hr>
            <div class="row justify-content-center">

                <div class="col-lg-8 d-flex flex-column justify-content-around">
                    <p>Descripción: <br>{{$pedido->descripcion}}</p>
                    <p>Ganancia: ${{$pedido->ganancia}}</p>
                    <form action="" method="post">
                        @csrf
                        @method('put')
                        <button type="submit"><i class="fas fa-sync-alt"></i></button>
                    </form>
                </div>
                <div class="col-lg-4 border-left">
                    <p>Costo: ${{$pedido->costo}}</p>
                    <p>Estado del Pedido:</p>
                    <p class="badge">{{$pedido->estado}}</p>
                    <p>Fecha de Entrega:</p>
                    <p class="badge badge-secondary">{{$pedido->fechaEntrega}}</p><br>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                        Editar
                    </button>                           
                </div>
            </div>
        </article>
    </section>

</div>


<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Editando pedido de {{$pedido->nombrePersona}}...</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <form action="" method="post" class="d-flex justify-content-center">
                            @csrf
                            <div class="form-group col-7 d-flex justify-content-center flex-column">
                                <label for="nombrePersona">Nombre de la Persona:</label>
                                <input type="text" name="nombrePersona" value="{{$pedido->nombrePersona}}">
                                <label for="telefono">Teléfono:</label>
                                <input type="number" name="telefono" value="{{$pedido->telefono}}">
                                <label for="estado">Estado:</label>
                                <select name="estado">
                                        <option value="nuevo" selected>Nuevo</option>
                                        <option value="en taller">En Taller</option>
                                        <option value="entregado">Entregado</option>
                                    </select>
                                <label for="descripcion">Descripcion:</label>
                                <textarea name="descripcion" rows="3">{{$pedido->descripcion}}</textarea>
                                <label for="precio">Precio</label>
                                <input type="number" name="precio" value="{{$pedido->precio}}">
                                <label for="costo">Costo</label>
                                <input type="number" name="costo" placeholder="Costo del taller" value="{{$pedido->costo}}">
                                <label for="fechaEntrega">Fecha de Entrega:</label>
                                <input type="date" name="fechaEntrega" value="{{$pedido->fechaEntrega}}">
                                <button type="input" class="btn btn-primary">Editar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> 
@endsection

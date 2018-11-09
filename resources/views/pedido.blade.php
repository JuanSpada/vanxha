@extends('layouts.app')

@section('title')
    <title>Vanxa</title>
@endsection

@section('content')
<div class="row pedido">
    <section class="col-md-6">
        <article class="pedido-content border bg-white">
            Nombre Persona:<h5>{{$pedido->nombrePersona}}</h5>
            Teléfono:<h5>{{$pedido->telefono}}</h5>
            <p>Descripción: <br>{{$pedido->descripcion}}</p>
        <p>Precio: ${{$pedido->precio}}</p>
            <p>Costo: ${{$pedido->costo}}</p>
            <p>Ganancia: ${{$pedido->ganancia}}</p>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                Editar
            </button>
        </article>
    </section>
    <section class="col-md-6">
        <article class="pedido-content border bg-white">
            <p>Fecha de Emisión:</p>
        <p class="badge">{{$pedido->created_at}}</p>
            <p>Estado del Pedido:</p>
        <p class="badge">{{$pedido->estado}}</p>
            <form action="" method="post">
                @csrf
                @method('put')
                <label for="costo">Costo:</label>
                <input type="number" name="costo" placeholder="Costo del taller" value="{{$pedido->costo}}">
                <button class="btn btn-primary" type="submit">Actualizar</button>
            </form>
            <p>Fecha de Entrega:</p>
            <p class="badge badge-secondary">{{$pedido->fechaEntrega}}</p>

        </article>
    </section>
</div>


<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Cargar Pedido</h5>
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
                                <label for="descripcion">Descripcion:</label>
                            <textarea name="descripcion" rows="3">{{$pedido->descripcion}}</textarea>
                                <label for="precio">Precio</label>
                                <input type="number" name="precio" value="{{$pedido->precio}}">
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

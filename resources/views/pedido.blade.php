@extends('layouts.app')

@section('title')
    <title>Vanxa</title>
@endsection

@section('content')
<div class="row pedido col-12">
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

                <div class="col-lg-4 d-flex flex-column justify-content-around">
                    <p>Descripción: <br>{{$pedido->descripcion}}</p>
                    <p>Ganancia: ${{$pedido->ganancia}}</p>
                    <form action="" method="post">
                        @csrf
                        @method('put')
                        <button class="btn btn-success" type="submit"><i class="fas fa-sync-alt"></i> Calcular Ganancia</button>
                    </form>
                </div>
                <div class="col-lg-4">
                    <img class="foto-pedido" src="/storage/fotoPedidos/{{$pedido->foto}}" alt="">
                    <form action="{{ route('pedidos.foto', $pedido->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <input class="form-control" type="file" name="foto">
                        </div>
                        <button class="btn" type="submit">Subir Foto</button>
                    </form>
                </div>
                <div class="col-lg-4 border-left">
                    <p>Costo: ${{$pedido->costo}}</p>
                    <p>Estado del Pedido:</p>
                    {{-- <span class="badge {{ $pedido->estadoColor() }}">{{$pedido->estado()}}</span> --}}
                    @foreach (App\Estado::all() as $estado)
                        @if ($pedido->estado == $estado->id)
                            <span class="badge {{$estado->badge}}">
                                {{$estado->estado}}
                            </span>
                        @endif
                    @endforeach
                    <p>Fecha de Entrega:</p>
                    <p class="badge badge-dark">{{$pedido->fechaEntrega}}</p><br>
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
                        <form action="" method="post" class="">
                            @csrf
                            <div class="form-group">
                                <label for="nombrePersona">Nombre de la Persona:</label>
                                <input class="form-control" type="text" name="nombrePersona" value="{{$pedido->nombrePersona}}">
                            </div>
                            <div class="form-group">
                                <label for="telefono">Teléfono:</label>
                                <input class="form-control" type="number" name="telefono" value="{{$pedido->telefono}}">
                            </div>
                            <div class="form-group">
                                <label for="estado">Estado:</label>
                                <select class="form-control" name="estado">
                                    @foreach (App\Estado::all() as $estado)
                                        <option value="{{$estado->id}}">{{$estado->estado}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripcion:</label>
                                <textarea class="form-control" name="descripcion" rows="3">{{$pedido->descripcion}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="precio">Precio</label>
                                <input class="form-control" type="number" name="precio" value="{{$pedido->precio}}">
                            </div>
                            <div class="form-group">
                                <label for="costo">Costo</label>
                                <input class="form-control" type="number" name="costo" placeholder="Costo del taller" value="{{$pedido->costo}}">
                            </div>
                            <div class="form-group">
                                <label for="fechaEntrega">Fecha de Entrega:</label>
                                <input class="form-control" type="date" name="fechaEntrega" value="{{$pedido->fechaEntrega}}">
                            </div>
                            <button type="input" class="btn btn-primary">Editar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> 
@endsection

@extends('layouts.app')

@section('title')
    <title>Vanxa | Pedidos</title>
@endsection


@section('content')


    <div class="container">
        <div class="col tabla-productos">
            
            <!-- Modal -->
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
                                <form action="/pedidos" method="post" class="">
                                    @csrf
                                        
                                        <div class="form-group">
                                            <label for="nombrePersona">Nombre de la Persona:</label>
                                            <input class="form-control" type="text" name="nombrePersona" placeholder="Nombre">
                                        </div>
                                        <div class="form-group">
                                            <label for="telefono">Teléfono:</label>
                                            <input class="form-control" type="number" name="telefono" placeholder="Teléfono">
                                        </div>
                                        <div class="form-group">
                                            <label for="descripcion">Descripcion:</label>
                                            <textarea name="descripcion"  class="form-control" rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="precio">Precio</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">$</span>
                                                </div>
                                                <input type="number" class="form-control" aria-label="Amount (to the nearest dollar)" name="precio">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="fechaEntrega">Fecha de Entrega:</label>
                                            <input class="form-control" type="date" name="fechaEntrega">
                                        </div>
                                        <button id="alerta" type="input" class="btn btn-primary">Crear</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
            <!-- END Modal -->
            @if (Session::has('succes'))
                <div id="alerta-pedido" class="alert alert-success collpase" role="alert">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <strong>Piola!</strong> Tu pedido fue agregado.
                </div>
            @endif

            
            <table class="table border bg-white">
                <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Entrega</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Costo</th>
                    <th scope="col">Ganancia</th>
                    <th>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                            <i class="fas fa-plus"></i>
                        </button>
                    </th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($pedidos as $pedido)
                        <tr>
                            <td><a href="/pedidos/{{$pedido->id}}">{{$pedido->nombrePersona}}</td></a>
                            <td>{{$pedido->created_at}}</td>
                            <td>{{$pedido->descripcion}}</td>
                            <td>{{$pedido->fechaEntrega}}</td>
                            <td><span class="badge {{ $pedido->estadoColor() }}">{{$pedido->estado()}}</span></td>
                            <td>${{$pedido->precio}}</td>
                            <td>${{$pedido->costo}}</td>
                            <td>${{$pedido->ganancia}}</td>
                            <td>
                            <form action="{{ url('pedidos/'. $pedido->id .'/delete')}}" method="post" name="" enctype="multipart/form-data">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $pedidos->links() }}
        
            <div class="col border bg-white">
                <p>Todavía no tenes pedidos</p>
            </div>
        </div>

    </div>
@endsection
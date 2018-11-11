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
                                <form action="/pedidos" method="post" class="d-flex justify-content-center">
                                    @csrf
                                    <div class="form-group col-7 d-flex justify-content-center flex-column">
                                        <label for="nombrePersona">Nombre de la Persona:</label>
                                        <input type="text" name="nombrePersona" placeholder="Nombre">
                                        <label for="telefono">Teléfono:</label>
                                        <input type="number" name="telefono" placeholder="Teléfono">
                                        <label for="descripcion">Descripcion:</label>
                                        <textarea name="descripcion" rows="3"></textarea>
                                        <label for="precio">Precio</label>
                                        <input type="number" name="precio" placeholder="$$$$">
                                        <label for="fechaEntrega">Fecha de Entrega:</label>
                                        <input type="date" name="fechaEntrega">
                                        <button type="input" class="btn btn-primary">Crear</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
            <!-- END Modal -->


            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Tu pedido fue agregado.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            </div>
            
            <table class="table border bg-white">
                <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Fecha Entrega Estimada</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Costo</th>
                    <th scope="col">Ganancia</th>
                    <th>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                            +
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
                            <td>{{$pedido->estado}}</td>
                            <td>{{$pedido->precio}}</td>
                            <td>{{$pedido->costo}}</td>
                            <td>{{$pedido->ganancia}}</td>
                            <td>
                            <form action="{{ url('pedidos/'. $pedido->id .'/delete')}}" method="post" name="" enctype="multipart/form-data">
                                
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Delete</button>
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

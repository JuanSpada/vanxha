@extends('layouts.app')

@section('title')
    <title>Vanxa | Pedidos</title>
@endsection


@section('content')

    <div class="container-fluid">
        <div class="col-12 tabla-productos border bg-white">
            <div class="col bg-white d-flex justify-content-end">
                <div class="row search">

                    <form action="{{ route('pedidos.index') }}" class="form-inline" method="get">
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="buscar" name="s" value="{{ isset($s) ? $s : '' }}">
                        </div>
                        <div class="form-group">
                            <select name="estado" class="form-control">
                                <option selected disabled>Elegir Estado</option>
                                
                                @foreach ($pedidosYEstados['estados'] as $estado)
    
                                    <option value="{{$estado->id}}">{{$estado->estado}}</option>
    
                                @endforeach
    
                            </select>
                            
                        </div>
                        <button type="stubmit" class="btn btn-success">Buscar</button>
    
                    </form>
                </div>
            </div>
            
            <!-- Modal -->
            <div class="modal fade" id="cargarPedidoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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

            
            <table class="table">
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
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cargarPedidoModal">
                            <i class="fas fa-plus"></i>
                        </button>
                    </th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($pedidosYEstados['pedidos'] as $pedido)
                        <tr>
                            <td><a href="/pedidos/{{$pedido->id}}">{{$pedido->nombrePersona}}</td></a>
                            <td>{{$pedido->created_at}}</td>
                            <td>{{$pedido->descripcion}}</td>
                            <td>{{$pedido->fechaEntrega}}</td>
                            <td>
                                @foreach (App\Estado::all() as $estado)
                                    @if ($pedido->estado == $estado->id)
                                        <span class="badge {{$estado->badge}}">
                                            {{$estado->estado}}
                                        </span>
                                    @endif
                                @endforeach
                            </td>
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
            {{ $pedidosYEstados['pedidos']->appends(['s' => $s])->links() }}
            @if (count($pedidosYEstados['pedidos']) == 0)  
                <p class="text-center">Todavía no tenes pedidos. <a class="badge badge-primary" href="" data-toggle="modal" data-target="#cargarPedidoModal">Agregar Pedido</a></p>
                <hr>
            @endif
        </div>

    </div>
@endsection
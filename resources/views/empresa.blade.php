@extends('layouts.app')

@section('title')
    <title>Vanxa</title>
@endsection

@section('content')

<div class="container-fluid">
        <div class="row d-flex justify-content-around empresa-section">
    
            <div class="col-lg-3 bg-white border d-flex flex-column align-items-center empresa-content">
                <img class="profile-img" src="storage/images/profile/profile-default.jpg" alt="">
                <h5 class="text-center">{{$empresaYUsers['empresa']->empresa}}</h5>
                <form action="" method="post">
                    @csrf
                    @method('put')
                    <input class="form-control" type="file" name="imgEmpresa">
                    <p>Subir foto de la empresa</p>
                    <button class="btn btn-primary" type="submit">Subir</button>
                </form>
            </div>
    
            <div class="card col-lg-8 bg-white border profile-container">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs profile-tab" id="myTabs" role="tablist">
                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#general" role="tab" aria-selected="true" aria-expanded="true">General</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#usuarios" role="tab" aria-selected="true" aria-expanded="false">Usuarios</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#estados" role="tab" aria-selected="true" aria-expanded="false">Estados</a> </li>
                    
                </ul>
                <!-- Tab panes -->
                <section class="tab-content">
                    <!-- usuarios -->
                    <article class="tab-pane active" id="general" role="tabpanel" aria-expanded="true">
                        <section class="card-body">
                            <article class="mb-2">
                                <h4 class="card-title">{{$empresaYUsers['empresa']->empresa}}</h4>
                                <h6 class="card-subtitle">General</h6>
                                <hr>
                            </article>
                            <article>
                                <form class="form-horizontal form-material" action="{{ route('empresa.') }}" method="post">
                                    @csrf
                                    @method('put')
                                    <div class="form-group row">
                                        <div class="col">
                                            <label class="col-md-12">Nombre de la Empresa:</label>
                                            <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line" value="{{$empresaYUsers['empresa']->empresa}}" name="nombreEmpresa">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label class="col-md-12">Cuit:</label>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control form-control-line" placeholder="20381509134" value="{{$empresaYUsers['empresa']->quit}}" name="quit">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success" type="submit">Actualizar empresa</button>
                                        </div>
                                    </div>
                                </form>
                            </article>
                        </section>
                    </article>
    
                    <article class="tab-pane" id="usuarios" role="tabpanel" aria-expanded="false">
                        <section class="card-body">
                            <article class="mb-4">
                                <h2 class="add-ct-btn">
                                    <button type="button" class="float-right btn btn-primary" data-toggle="modal" data-target="#addUserModal">+</button>
                                </h2>
                                <h4 class="card-title">Usuarios de la Empresa</h4>
                                <h6 class="card-subtitle">{{$empresaYUsers['empresa']->empresa}}</h6>
                            </article>
                            <article>
                                <hr>
                                <div class="message-box contact-box">
                                    <div class="message-widget contact-widget">
                                         
                                        <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Usuarios</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($empresaYUsers['users'] as $user)
                                                        <tr>
                                                            <td>{{$user->name}}</td>
                                                            <th>
                                                                <form action="{{ url('empresa/'. $user->id .'/delete')}}" method="post" name="" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                                                </form>
                                                            </th>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>

                                    </div>
                                </div>
                            </article>
                        </section>
                    </article>

                    <!-- Modal de Agregar Usuario-->
            
                    <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Agregar Usuario</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <div>
                                    <form action="{{ route('empresa.addUser') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Nombre:</label>
                                            <input class="form-control" type="text" name="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email:</label>
                                            <input class="form-control" type="email" name="email">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Contraseña</label>
                                            <input class="form-control" type="password" name="password">
                                        </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Agregar</button>
                                    </form>
                            </div>
                        </div>
                        </div>
                    </div>

    
                    <article class="tab-pane" id="estados" role="tabpanel" aria-expanded="true">
                            <section class="card-body">

                                <article class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="card-title">{{$empresaYUsers['empresa']->empresa}}</h4>
                                        <h6 class="card-subtitle">Estados</h6>
                                    </div>
                                    <div>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#estadosModal">
                                            +
                                        </button>
                                    </div>
                                </article>
                                <hr>
                                <article>
                                    <!-- Modal de Estados-->
                                    <div>
                                        Acá va el listado de los estados...
                                    </div>
                                    <div class="modal fade" id="estadosModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Cargar Estado</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                            ...
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            <button type="button" class="btn btn-primary">Guardar</button>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </article>

                            </section>
                        </article>
                </section>
            </div>
        </div>
</div>


@endsection

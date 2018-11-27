@extends('layouts.app')

@section('title')
    <title>Vanxa</title>
@endsection

@section('content')

<div class="row pedido col-12">
    <section class="col-md-12">
        <div class="row d-flex justify-content-around empresa-section">
    
            <div class="col-lg-3 bg-white border d-flex flex-column align-items-center empresa-content">
                
            <img class="profile-img" src="storage/avatars/{{$empresaYUsers['empresa']->avatarEmpresa}}" alt="">
                <h5 class="text-center">{{$empresaYUsers['empresa']->empresa}}</h5>
                <form class="form-horizontal form-material" action="{{ route('empresa.') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <input class="form-control" type="file" name="avatarEmpresa">
                    <p>Subir foto de la empresa</p>
            </div>
    
            <div class="card col-lg-8 bg-white border profile-container">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs profile-tab" id="myTabs" role="tablist">
                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#general" role="tab" aria-selected="true" aria-expanded="true">General</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#usuarios" role="tab" aria-selected="true" aria-expanded="false">Usuarios</a> </li>
                </ul>
                <!-- Tab panes -->
                <section class="tab-content">
                    <!-- EMPRESA -->
                    <article class="tab-pane active" id="general" role="tabpanel" aria-expanded="true">
                        <section class="card-body">
                            <article class="mb-2">
                                <h4 class="card-title">{{$empresaYUsers['empresa']->empresa}}</h4>
                                <h6 class="card-subtitle">Configuración de la Empresa</h6>
                                <hr>
                            </article>
                            <article>
                                
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
                    <!-- USUARIOS DE LA EMPRESA -->
                    <article class="tab-pane" id="usuarios" role="tabpanel" aria-expanded="false">
                        <section class="card-body">
                            <article class="mb-4">
                                
                                <button type="button" class="float-right btn btn-primary" data-toggle="modal" data-target="#addUserModal">+</button>
                                <h4 class="card-title">{{$empresaYUsers['empresa']->empresa}}</h4>
                                <h6 class="card-subtitle">Agrega o elimina los usuarios de {{$empresaYUsers['empresa']->empresa}}</h6>
                            </article>
                            <article>
                                <hr>
                                <div class="message-box contact-box">
                                    <div class="message-widget contact-widget">
                                         
                                        <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Nombre</th>
                                                        <th scope="col">Apellido</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($empresaYUsers['users'] as $user)
                                                        <tr>
                                                            <td>{{$user->name}}</td>
                                                            <td>{{$user->email}}</td>
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
                </section>
            </div>
        </div>
    </section>
</div>


@endsection

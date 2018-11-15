@extends('layouts.app')

@section('title')
    <title>Vanxa</title>
@endsection


@section('content')


<div class="container-fluid">
        <div class="row d-flex justify-content-around empresa-section">
    
            <div class="col-lg-3 bg-white border d-flex flex-column align-items-center empresa-content">
                <img class="profile-img" src="storage/images/profile/profile-default.jpg" alt="">
                <h5 class="text-center">{{Auth::user()->empresa}}</h5>
                <form action="" method="post">
                    @csrf
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
                                <h4 class="card-title">{{Auth::user()->empresa}}</h4>
                                <h6 class="card-subtitle">General</h6>
                                <hr>
                            </article>
                            <article>
                                <form class="form-horizontal form-material" action="http://makeitsmart.com.ar/crm/companies/2" method="post">
                                    <div class="form-group row">
                                        <div class="col">
                                            <label class="col-md-12">Nombre</label>
                                            <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line" value="{{Auth::user()->empresa}}" name="company-name">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label class="col-md-12">Cuit</label>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control form-control-line" placeholder="20381509134" value="" name="cuit">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success" type="submit" name="edit-company">Actualizar empresa</button>
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
                                    <button type="button" class="float-right btn btn-circle btn-lg btn-success waves-effect waves-dark" data-toggle="modal" data-target="#create-user-modal">+</button>
                                </h2>
                                <h4 class="card-title">Usuarios de la Empresa</h4>
                                <h6 class="card-subtitle">{{Auth::user()->empresa}}</h6>
                            </article>
                            <article>
                                <hr>
                                <div class="message-box contact-box">
                                    <div class="message-widget contact-widget">
                                         
                                        <h5>{{Auth::user()->name}}</h5>
                                    </div>
                                </div>
                            </article>
                        </section>
                    </article>
    
                    <article class="tab-pane active" id="estados" role="tabpanel" aria-expanded="true">
                            <section class="card-body">

                                <article class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="card-title">{{Auth::user()->empresa}}</h4>
                                        <h6 class="card-subtitle">Estados</h6>
                                    </div>
                                    <div>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                            +
                                        </button>
                                    </div>
                                </article>
                                <hr>
                                <article>
                                    <!-- Modal -->
                                    <div>
                                        Acá va el listado de los estados...
                                    </div>
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

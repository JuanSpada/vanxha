@extends('layouts.app')

@section('title')
    <title>Vanxa</title>
@endsection


@section('content')


<div class="container">
    <div class="row d-flex justify-content-around profile-section">
        <div class="col-lg-4 bg-white border d-flex flex-column align-items-center profile-container">
        <img class="profile-img" src="/storage/avatars/{{Auth::user()->avatar}}" alt="">
            <h5 class="text-center">{{Auth::user()->name}}</h5>
            <form action="/perfil" method="post" enctype="multipart/form-data">
                @csrf
            <input class="form-control" type="file" name="avatar">
            <p>Subir foto de perfil</p>
        </div>

        <div class="col-lg-6 bg-white border profile-container">
                <h4>Editar Perfil:</h4>
                <hr>

                <div class="form-group">
                    <input name="name" class="form-control" type="text" value="{{Auth::user()->name}}">
                </div>
                    

                <div class="form-group">
                    <input name="email" class="form-control" type="email" value="{{Auth::user()->email}}">
                </div>

                <button class="btn btn-primary" type="submit">Actualizar Perfil</button>
            </form>
        </div>
    </div>
</div>

@endsection

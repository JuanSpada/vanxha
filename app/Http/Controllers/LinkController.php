<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artisan;
use Auth;
use App\Pedido;
use App\Empresa;

class LinkController extends Controller
{
    public function entregas()
    {
        return view('entregas');
    }

    public function migrate()
    {
        $migracion = Artisan::call('migrate');
        dd($migracion);
    }

    public function perfil()
    {
        return view('perfil');
    }
    
}

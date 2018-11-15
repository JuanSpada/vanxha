<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artisan;
use Auth;
use App\Pedido;

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

    public function empresa()
    {
        $pedidos = Pedido::all();
        return view('empresa')->with('pedidos', $pedidos);
    }

    public function perfil()
    {
        return view('perfil');
    }
}

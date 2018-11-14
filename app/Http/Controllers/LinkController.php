<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artisan;

class LinkController extends Controller
{
    public function entregas()
    {
        return view('entregas');
    }

    public function migrate(){
        $migracion = Artisan::call('migrate');
        dd($migracion);
    }
}

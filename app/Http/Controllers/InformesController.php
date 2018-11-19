<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pedido;
use App\Empresa;
use Auth;

class InformesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $empresaId = Empresa::find($request->user()->empresaId)->id;
    
        $pedidos = Pedido::where('empresaId', $empresaId)->get();

        $ingresosBrutos = 0;
        foreach ($pedidos as $pedido) {
            $ingresosBrutos = $ingresosBrutos + $pedido->precio;
        }

        $costoTotal = 0;
        foreach ($pedidos as $pedido) {
            $costoTotal = $costoTotal + $pedido->costo;
        }

        $ganancia = 0;
        foreach ($pedidos as $pedido) {
            $ganancia = $ganancia + $pedido->ganancia;
        }
        
        $ingresos = [
            'ingresosBrutos' => $ingresosBrutos,
            'costoTotal' => $costoTotal,
            'ganancia' => $ganancia,
        ];

        return view('informe')->with('ingresos', $ingresos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function ganancia()
    {
        $pedidos = Pedido::all();
        foreach ($pedidos as $pedido) {
            $pedido->ganancia = $pedido->precio - $pedido->costo;
            $pedido->save();
        }

        return redirect('/informe');
    }
}

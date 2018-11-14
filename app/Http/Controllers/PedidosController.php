<?php

namespace App\Http\Controllers;

use App\Pedido;
use Illuminate\Http\Request;
use Auth;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pedidos = Pedido::where('userId', $request->user()->id)->latest()->paginate(5);
        echo 'Versión actual de PHP: ' . phpversion();
        return view('/pedidos', compact('pedidos', $pedidos));
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
        $succes = 'Tu pedido fue agregado';
        $mensajes = [
            'required' => 'El :attribute es requerido.',
            'max' => 'El máximo de :attribute es :max caracteres.',
            'min' => 'El :atribute tiene que ser de :min o más',
        ];
        $validaciones = [
            'nombrePersona' => 'required',
            'telefono' =>'required',
            'descripcion' => 'required',
            'fechaEntrega' => 'required',
            'precio' => 'required',
        ];
        $this->validate($request, $validaciones, $mensajes);    
        $pedido = Pedido::create([
            'userId' => Auth::user()->id,
            'nombrePersona' => $request->input('nombrePersona'),
            'telefono' => $request->input('telefono'),
            'descripcion' => $request->input('descripcion'),
            'fechaEntrega' => $request->input('fechaEntrega'),
            'precio' => $request->input('precio'),
        ]);

        return redirect('/pedidos')->with('succes', $succes);
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pedido = Pedido::find($id);
        return view('pedido')->with('pedido', $pedido);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $pedido = Pedido::find($id);
        $pedido->nombrePersona = $request->input('nombrePersona');
        $pedido->telefono = $request->input('telefono');
        $pedido->estado = $request->input('estado');
        $pedido->descripcion = $request->input('descripcion');
        $pedido->precio = $request->input('precio');
        $pedido->costo = $request->input('costo');
        $pedido->fechaEntrega = $request->input('fechaEntrega');
        $pedido->save();
        return view('pedido')->with('pedido', $pedido);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $pedido = Pedido::find($id);
        $pedido->ganancia = $pedido->precio - $pedido->costo;
        $pedido->save();
        return view('pedido')->with('pedido', $pedido);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pedido = Pedido::find($id);
        $pedido -> delete();
        return redirect('/pedidos');
    }

    public function calendar(Request $request) {
        $pedidos = Pedido::all();
        
        $pedidosDelCalendario = [];

        foreach ($pedidos as $pedido) {
            $pedidosDelCalendario[] = [
                "id" => $pedido->id,
                "title" => $pedido->nombrePersona,
                "start" => $pedido->fechaEntrega,
                "allDay" => true,
            ];
        }

        return response()->json($pedidosDelCalendario);
        
    }
    public function editarcalendar(Request $request) {
        $pedido = Pedido::find($request['id']);
        $pedido->fechaEntrega = $request['fechaEntrega'];
        $pedido->save();
    }
}



<?php

namespace App\Http\Controllers;

use App\Pedido;
use App\Empresa;
use App\Estado;
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
        $empresaId = Empresa::find($request->user()->empresaId)->id;

        $s = $request->input('s');
        $e = $request->input('estado');

        // $pedidos = Pedido::where('empresaId', $empresa->id)->latest()->paginate(6);

        $pedidos = Pedido::where([
            ['empresaId', $empresaId],
        ])->latest()->search($s)->estado($e)->paginate(6);

        $estados = Estado::where('empresaId', $empresaId)->get();

        $pedidosYEstados = [
            'pedidos' => $pedidos,
            'estados' => $estados,
        ];

        return view('/pedidos', compact('pedidosYEstados', 's'));
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
        $empresa = Empresa::find($request->user()->id);    
        $pedido = Pedido::create([
            'empresaId' => $empresa->id,
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

    public function fotoPedido (Request $request, $id)
    {
        $pedido = Pedido::find($id);

        $nombreFoto = $pedido->id.'_fotoPedido'.time().'.'.request()->foto->getClientOriginalExtension();
        $request->foto->storeAs('fotoPedidos',$nombreFoto);
        $pedido->foto = $nombreFoto;
        $pedido->save();
        return back()->with('success','You have successfully upload image.');
    }
}
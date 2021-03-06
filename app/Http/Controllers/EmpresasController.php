<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artisan;
use Auth;
use Hash;
use App\User;
use App\Pedido;
use App\Empresa;

class EmpresasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $empresa = Empresa::find($request->user()->empresaId);
        $users = User::where([
            ['empresaId','=', $empresa->id],
            ['id', '!=', Auth::user()->id],
            ])->get();
        $empresaYUsers = [
            'empresa' => $empresa,
            'users' => $users,
        ];
        return view('empresa')->with('empresaYUsers', $empresaYUsers);
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

    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $empresa = Empresa::find($request->user()->empresaId);
        $empresa->empresa = $request->input('nombreEmpresa');
        $empresa->quit = $request->input('quit');
        $empresa->save();
        return redirect('empresa');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'avatarEmpresa' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $empresa = Empresa::find($request->user()->empresaId);
        $empresa->empresa = $request->input('nombreEmpresa');
        $empresa->quit = $request->input('quit');
        
        if($request->has('avatarEmpresa')) {
            $avatarName = $empresa->id.'_avatar'.time().'.'.request()->avatarEmpresa->getClientOriginalExtension();
            $request->avatarEmpresa->storeAs('avatars',$avatarName);
            $empresa->avatarEmpresa = $avatarName;
            $empresa->save();
            return back()->with('success','You have successfully upload image.');
        }
        
        $empresa->save();
        

        return redirect('/empresa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function addUser(Request $request)
    {
        $empresa = Empresa::find($request->user()->empresaId);
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'empresaId' => $empresa->id,
            'password' => Hash::make($request['password']),
        ]);
        return redirect('empresa');
    }

    public function deleteUser($id)
    {
        User::find($id)->delete();
    
        return redirect('empresa');
    }
}
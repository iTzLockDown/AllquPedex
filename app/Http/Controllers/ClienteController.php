<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Session;
use Validator;
class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $grabar = new User();
        $v = \Validator::make($request->all(), [
            'name' => 'required',
            'apellidos' => 'required',
            'dni' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'permiso' => 'required',
            'email' => 'required|email',
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $grabar->name = $request->name;
        $grabar->apellidos = $request->apellidos;
        $grabar->dni = $request->dni;
        $grabar->telefono = $request->telefono;
        $grabar->direccion = $request->direccion;
        $grabar->permiso = $request->permiso;
        $grabar->estado = 1;
        $grabar->password = Hash::make($request->password);
        $grabar->email=  $request->email;

        $grabar->save();
        Session::flash('message', 'Cliente registrado correctamente.');
        return Redirect::route('cliente.principal');
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
        $editar = User::find($id);
        $v = \Validator::make($request->all(), [
            'name' => 'required',
            'apellidos' => 'required',
            'dni' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'permiso' => 'required',
            'email' => 'required|email',
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $editar->name = $request->name;
        $editar->apellidos = $request->apellidos;
        $editar->dni = $request->dni;
        $editar->telefono = $request->telefono;
        $editar->direccion = $request->direccion;
        $editar->permiso = $request->permiso;
        $editar->estado = 1;
        $editar->save();
        Session::flash('message', 'Cliente Editado correctamente.');
        return Redirect::route('cliente.principal');
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
}

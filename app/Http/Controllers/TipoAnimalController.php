<?php

namespace App\Http\Controllers;

use App\TipoAnimal;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
use Validator;
class TipoAnimalController extends Controller
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
        $grabar = new TipoAnimal();
        $v = \Validator::make($request->all(), [
            'animal' => 'required',
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $grabar->animal = $request->animal;

        $grabar->save();
        Session::flash('message', 'Tipo Guardado correctamente.');
        return Redirect::route('tipo.animal.principal');
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
        $editar = TipoAnimal::find($id);
        $v = \Validator::make($request->all(), [
            'animal' => 'required',
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $editar->animal = $request->animal;

        $editar->save();
        Session::flash('message', 'Tipo Editado correctamente.');
        return Redirect::route('tipo.animal.principal');
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

<?php

namespace App\Http\Controllers;

use App\Especie;
use App\TipoAnimal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
use Validator;
class RazaController extends Controller
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
        $grabar = new Especie();
        $v = \Validator::make($request->all(), [
            'tipoanimal'    => 'required',
            'raza'         => 'required',
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $grabar->tipoanimal = $request->tipoanimal;
        $grabar->raza = $request->raza;

        $grabar->save();
        Session::flash('message', 'especie registrada correctamente.');
        return Redirect::route('raza.principal');
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
        $editar = Especie::find($id);
        $v = \Validator::make($request->all(), [
            'tipoanimal'    => 'required',
            'raza'         => 'required',
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $editar->tipoanimal = $request->tipoanimal;
        $editar->raza = $request->raza;

        $editar->save();
        Session::flash('message', 'Especie editada correctamente.');
        return Redirect::route('raza.principal');
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

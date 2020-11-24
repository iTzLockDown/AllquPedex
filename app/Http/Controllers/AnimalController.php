<?php

namespace App\Http\Controllers;

use App\Animales;
use App\Especie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Session;
use Validator;
class AnimalController extends Controller
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
        $grabar = new Animales();
        $v = \Validator::make($request->all(), [
            'nombre'        => ['required','unique:animales'],
            'tipoanimal'    => 'required',
            'fechanac'      => 'required',
            'peso'          => 'required',
            'alto'          => 'required',
            'genero'        => 'required',
            'color'         => 'required',
            'descripcion'   => 'required',
            'lugarnac'      => 'required',
            'raza'          => 'required',
            'imagen'        => 'required',
            'propietario'   => 'required',

        ]);
        if ($v->fails()) {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $grabar->nombre         = $request->nombre;
        $grabar->tipoanimal     = $request->tipoanimal;
        $grabar->fechanac       = $request->fechanac;
        $grabar->peso           = $request->peso;
        $grabar->alto           = $request->alto;
        $grabar->genero          = $request->genero;
        $grabar->color          = $request->color;
        $grabar->descripcion    = $request->descripcion;
        $grabar->lugarnac       = $request->lugarnac;
        $grabar->raza           = $request->raza;
        $grabar->criadero       = $request->criadero;


       if($request->hasFile('imagen')){
           $file = $request->file('imagen');
           $name_file = time().$file->getClientOriginalName();
           $file->move(public_path().'/images/',$name_file);

           $grabar->imagen = $name_file;
       }

        $grabar->propietario         = $request->propietario;

        $grabar->padre = $request->padre = 0?0:$request->padre;
        $grabar->madre = $request->madre = 0?0:$request->madre;

        $grabar->estado          = 1;

        $grabar->save();
        Session::flash('message', 'Mascota registrada correctamente.');
        return Redirect::route('puppey.principal');
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
        $editar =Animales::find($id);
        $v = \Validator::make($request->all(), [
            'nombre'        => 'required',
            'tipoanimal'    => 'required',
            'fechanac'      => 'required',
            'peso'          => 'required',
            'alto'          => 'required',
            'genero'        => 'required',
            'color'         => 'required',
            'descripcion'   => 'required',
            'lugarnac'      => 'required',

        ]);
        if ($v->fails()) {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        if( $request->tipoanimal == 'Seleccionar'){

        }
        else{
            $editar->tipoanimal     = $request->tipoanimal;
        }
        $editar->nombre         = $request->nombre;

        $editar->fechanac       = $request->fechanac;
        $editar->peso           = $request->peso;
        $editar->alto           = $request->alto;
        $editar->genero          = $request->genero;
        $editar->color          = $request->color;
        $editar->descripcion    = $request->descripcion;
        $editar->lugarnac       = $request->lugarnac;
        $editar->criadero          = $request->criadero;
        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $name_file = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/',$name_file);

            $editar->imagen = $name_file;
        }
        else{
            $editar->imagen = $editar->imagen;
        }
        $editar->propietario    = $request->propietario==0?$editar->propietario:$request->propietario;
        $editar->raza           = $request->raza == 0?$editar->raza:$request->raza;


        if($request->padre == null) {
            $editar->padre = $request->padre == null ? $editar->padre : $request->padre;
        }
        if($request->padre === 0) {
            $editar->padre = $request->padre == 0 ? $editar->padre : $request->padre;
        }
        if($request->padre != 0) {
            $editar->padre = $request->padre;
        }

        if($request->madre == null) {
            $editar->madre = $request->madre == null ? $editar->madre : $request->madre;
        }
        if($request->madre === 0) {
            $editar->madre = $request->madre == 0 ? $editar->madre : $request->madre;
        }

        if($request->madre != 0) {
            $editar->madre = $request->madre;
        }
        $editar->estado          = 1;

        $editar->save();
        Session::flash('message', 'Mascota editada correctamente.');
        return Redirect::route('puppey.principal');
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

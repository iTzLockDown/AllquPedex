<?php

namespace App\Http\Controllers;

use App\Animales;
use App\Certificados;
use App\Especie;
use App\TipoAnimal;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AdministradorController extends Controller
{

    public function ListaMascota(Request $request)
    {
        $TraerTodos = Animales::join('tipo_animals','animales.tipoanimal', '=', 'tipo_animals.id')
                        ->join('especies','animales.raza', '=', 'especies.id')
                        ->leftJoin('animales as tbpadre','animales.padre', '=', 'tbpadre.id')
                        ->leftJoin('animales as tbmadre','animales.madre', '=', 'tbmadre.id')
                        ->join('users','animales.propietario', '=', 'users.id')
                        ->select('animales.id' ,'animales.nombre', 'tipo_animals.animal',
                                    'especies.raza', 'tbpadre.nombre as nompadre',
                                    'tbmadre.nombre as nommadre', 'animales.imagen',
                                    'users.name', 'users.apellidos', 'animales.genero')
                        ->where('animales.nombre','like',"%".$request->get('nombre')."%")
                        ->orderBy('animales.tipoanimal', 'ASC')
                        ->paginate(10);
        return view('Animal.principal', compact('TraerTodos'));
    }

    public function EditarMascota($id)
    {
        $TipoAnimal= TipoAnimal::select('id', 'animal')->get();
        $TraerUno = Animales::find($id);
        $Propietarios = User::select('id', 'apellidos', 'name')->get();
        return view('Animal.update', ['mascota'=>$TraerUno],  compact('TipoAnimal', 'Propietarios'));
    }
    public function EliminarMascota($id)
    {
        $TraerUno = Animales::find($id);
        $TraerUno->delete();

        Session::flash('message', 'Mascota eliminado correctamente.');
        return Redirect::route('puppey.principal');
    }

    public function GenealogiaMascota()
    {
        return view('Animal.genealogia');
    }
    public function DetalleMascota($id)
    {
        $TraerUno = Animales::join('tipo_animals','animales.tipoanimal', '=', 'tipo_animals.id')
            ->join('especies','animales.raza', '=', 'especies.id')
            ->leftJoin('animales as tbpadre','animales.padre', '=', 'tbpadre.id')
            ->leftJoin('animales as tbmadre','animales.madre', '=', 'tbmadre.id')
            ->join('users','animales.propietario', '=', 'users.id')
            ->select('animales.id' ,'animales.nombre', 'tipo_animals.animal',
                'especies.raza', 'tbpadre.nombre as nompadre',
                'tbmadre.nombre as nommadre', 'animales.imagen',
                'users.name', 'users.apellidos', 'animales.genero', 'animales.lugarnac',
                'animales.color', 'animales.peso', 'animales.alto', 'animales.descripcion', 'tbpadre.id as padreid', 'tbmadre.id as madreid',
                'tbpadre.imagen as imgpadre', 'tbmadre.imagen as imgmadre', 'tbpadre.nombre as nompadre', 'tbmadre.nombre as nommadre' )
            ->find($id);

        $TraerAbueloPaterno = Animales::find($TraerUno->padreid);
        $TraerAbueloMaterno = Animales::find($TraerUno->madreid);

        if ($TraerAbueloPaterno!=null){
            $TraerAPp =Animales::select('nombre', 'imagen', 'id')->find($TraerAbueloPaterno->padre);
            $TraerAPm =Animales::select('nombre', 'imagen', 'id')->find($TraerAbueloPaterno->madre);
        }
        else{
            $TraerAPp=null;
            $TraerAPm=null;
        }
        if ($TraerAbueloMaterno!=null)
        {
            $TraerAMp =Animales::select('nombre', 'imagen', 'id')->find($TraerAbueloMaterno->padre);
            $TraerAMm =Animales::select('nombre', 'imagen', 'id')->find($TraerAbueloMaterno->madre);
        }
        else
        {
            $TraerAMp=null;
            $TraerAMm=null;
        }



        $TraerHermanosP = Animales::select('id', 'nombre')
                            ->where('padre','=', $TraerUno->padreid )
                            ->where('id', '!=', $id)
                            ->get();
        $TraerHermanosM = Animales::select('id', 'nombre')
                            ->where('madre','=', $TraerUno->madreid )
                            ->where('id', '!=', $id)
                            ->get();
        $TraerHermanos = $TraerHermanosP->merge($TraerHermanosM);

        $TraerHijosP = Animales::select('id', 'nombre')
                            ->where('padre', '=',$TraerUno->id)
                            ->get();

        $TraerHijosM = Animales::select('id', 'nombre')
                            ->where('madre', '=',$TraerUno->id)
                            ->get();
        $TraerHijos = $TraerHijosP->merge($TraerHijosM);

        return view('Animal.detalle', ['mascota'=>$TraerUno], compact('TraerHermanos', 'TraerHijos', 'TraerAPp', 'TraerAPm', 'TraerAMp', 'TraerAMm'));
    }

    public function CrearMascota()
    {
        $TipoAnimal= TipoAnimal::select('id', 'animal')->get();
        $Propietarios = User::select('id', 'apellidos', 'name')->get();
        return view('Animal.create', compact('TipoAnimal', 'Propietarios'));
    }

    public function ListaTipoAnimal(Request $request)
    {
        $TraerTodos = TipoAnimal::where('animal','like',"%".$request->get('nombre')."%")
            ->paginate(10);
        return view('TipoAnimal.principal', compact('TraerTodos'));
    }

    public function CrearTipoAnimal()
    {
        return view('TipoAnimal.create');
    }


    public function EditarTipoAnimal($id)
    {
        $TraerUno = TipoAnimal::find($id);
        return view('TipoAnimal.update', ['tipo'=>$TraerUno]);
    }
    public function EliminarTipoAnimal($id)
    {
        //eliminar
        $TraerUno = TipoAnimal::find($id);
        $TraerUno->delete();

        Session::flash('message', 'Tipo de animal eliminado correctamente.');
        return Redirect::route('tipo.animal.principal');
    }

    public function ListaRaza(Request $request)
    {
        $TraerTodos = Especie::join('tipo_animals','especies.tipoanimal', '=', 'tipo_animals.id'  )
                    ->select('especies.id', 'tipo_animals.animal', 'especies.raza')
                    ->where('raza','like',"%".$request->get('nombre')."%")
                    ->orderBy('tipoanimal', 'ASC')
                    ->paginate(10);
        return view('Raza.principal', compact('TraerTodos'));
    }

    public function CrearRaza()
    {
        $TipoAnimal= TipoAnimal::pluck('animal', 'id');
        return view('Raza.create', compact('TipoAnimal'));
    }

    public function EditarRaza($id)
    {
        $TraerUno = Especie::find($id);
        $TipoAnimal= TipoAnimal::pluck('animal', 'id');
        return view('Raza.update', ['raza'=>$TraerUno], compact('TipoAnimal'));
    }
    public function EliminarRaza($id)
    {
        //eliminar
        $TraerUno = Especie::find($id);
        $TraerUno->delete();

        Session::flash('message', 'Especie eliminado correctamente.');
        return Redirect::route('raza.principal');
    }

    public function ListaCertificado()
    {
        return view('Certificado.principal');
    }

    public function CrearCertificado()
    {
        return view('Certidicado.create');
    }

    public function EditarCertificado($id)
    {
        $TraerUno = Certificados::find($id);
        return view('Certificado.update', ['certificado'=>$TraerUno]);
    }
    public function EliminarCertificado($id)
    {
        //eliminar
        $TraerUno = Certificados::find($id);
        $TraerUno->save();

        Session::flash('message', 'Raza eliminado correctamente.');
        return Redirect::route('Certificado.lista');
    }


    public function ListaCliente(Request $request)
    {
        $TraerTodos = User::where('dni','like',"%".$request->get('nombre')."%")
            ->where('estado',1)->paginate(10);
        return view('Cliente.principal', compact('TraerTodos'));
    }


    public function CrearCliente()
    {
        return view('Cliente.create');
    }

    public function EditarCliente($id)
    {
        $TraerUno = User::find($id);
        return view('Cliente.update', ['cliente'=>$TraerUno]);
    }
    public function EliminarCliente($id)
    {
        //eliminar
        $TraerUno = User::find($id);
        $TraerUno->delete();

        Session::flash('message', 'Cliente eliminado correctamente.');
        return Redirect::route('cliente.principal');
    }

    //Llamadas Ajax
    public function getRaza(Request $request, $id){
        if($request->ajax()){
            $provincias = Especie::where('tipoanimal', '=', $id)->get();
            return response()->json($provincias);
        }
    }
    public function getMascotaPadre(Request $request, $id){
        if($request->ajax()){
            $provincias = Animales::where('genero', '=', 'M')
                            ->where('tipoanimal', '=', $id)
                            ->get();
            return response()->json($provincias);
        }
    }

    public function getMascotaMadre(Request $request, $id){
        if($request->ajax()){
            $provincias = Animales::where('genero', '=', 'H')
                            ->where('tipoanimal', '=', $id)
                            ->get();
            return response()->json($provincias);
        }
    }

    public function getMascotaId(Request $request, $id){
        if($request->ajax()){
            $provincias = Animales::join('tipo_animals','animales.tipoanimal', '=', 'tipo_animals.id')
                ->join('especies','animales.raza', '=', 'especies.id')
                ->join('users','animales.propietario', '=', 'users.id')
                ->select('animales.id','animales.nombre', 'tipo_animals.animal',
                    'especies.raza', 'animales.imagen',
                    'users.name', 'users.apellidos', 'users.telefono')
                ->find($id);
            return response()->json($provincias);
        }
    }

    public function BuscarMascota(Request $request)
    {
        if($request->tipoBusqueda =='N'){
            $TraerTodos = Animales::join('tipo_animals','animales.tipoanimal', '=', 'tipo_animals.id')
                ->join('especies','animales.raza', '=', 'especies.id')
                ->leftJoin('animales as tbpadre','animales.padre', '=', 'tbpadre.id')
                ->leftJoin('animales as tbmadre','animales.madre', '=', 'tbmadre.id')
                ->join('users','animales.propietario', '=', 'users.id')
                ->select('animales.id' ,'animales.nombre', 'tipo_animals.animal',
                    'especies.raza', 'tbpadre.nombre as nompadre',
                    'tbmadre.nombre as nommadre', 'animales.imagen',
                    'users.name', 'users.apellidos', 'animales.genero')
                ->where('animales.nombre','like',"%".$request->get('nombre')."%")
                ->orderBy('animales.tipoanimal', 'ASC')
                ->get();
        }
       else{
           if($request->tipoBusqueda !=null) {

               $TraerTodos = Animales::join('tipo_animals','animales.tipoanimal', '=', 'tipo_animals.id')
                   ->join('especies','animales.raza', '=', 'especies.id')
                   ->leftJoin('animales as tbpadre','animales.padre', '=', 'tbpadre.id')
                   ->leftJoin('animales as tbmadre','animales.madre', '=', 'tbmadre.id')
                   ->join('users','animales.propietario', '=', 'users.id')
                   ->select('animales.id' ,'animales.nombre', 'tipo_animals.animal',
                       'especies.raza', 'tbpadre.nombre as nompadre',
                       'tbmadre.nombre as nommadre', 'animales.imagen',
                       'users.name', 'users.apellidos', 'animales.genero')
                   ->where('especies.raza','like',"%".$request->get('tipoBusqueda')."%")
                   ->where('animales.nombre','like',"%".$request->get('nombre')."%")
                   ->orderBy('animales.tipoanimal', 'ASC')
                   ->get();
           }
           else{
               $TraerTodos = Animales::join('tipo_animals','animales.tipoanimal', '=', 'tipo_animals.id')
                   ->join('especies','animales.raza', '=', 'especies.id')
                   ->leftJoin('animales as tbpadre','animales.padre', '=', 'tbpadre.id')
                   ->leftJoin('animales as tbmadre','animales.madre', '=', 'tbmadre.id')
                   ->join('users','animales.propietario', '=', 'users.id')
                   ->select('animales.id' ,'animales.nombre', 'tipo_animals.animal',
                       'especies.raza', 'tbpadre.nombre as nompadre',
                       'tbmadre.nombre as nommadre', 'animales.imagen',
                       'users.name', 'users.apellidos', 'animales.genero')
                   ->orderBy('animales.tipoanimal', 'ASC')
                   ->get();
           }
       }
        $TraerRaza =Especie::join('tipo_animals', 'especies.tipoanimal', '=', 'tipo_animals.id')
                            ->select('tipo_animals.id','tipo_animals.animal','especies.raza')
                            ->get();


        return view('buscar', compact('TraerTodos', 'TraerRaza'));
    }
    public function DetallePedex($id)
    {
        $TraerUno = Animales::join('tipo_animals','animales.tipoanimal', '=', 'tipo_animals.id')
            ->join('especies','animales.raza', '=', 'especies.id')
            ->leftJoin('animales as tbpadre','animales.padre', '=', 'tbpadre.id')
            ->leftJoin('animales as tbmadre','animales.madre', '=', 'tbmadre.id')
            ->join('users','animales.propietario', '=', 'users.id')
            ->select('animales.id' ,'animales.nombre', 'tipo_animals.animal',
                'especies.raza', 'tbpadre.nombre as nompadre',
                'tbmadre.nombre as nommadre', 'animales.imagen',
                'users.name', 'users.apellidos', 'animales.genero', 'animales.lugarnac',
                'animales.color', 'animales.peso', 'animales.alto', 'animales.descripcion', 'tbpadre.id as padreid', 'tbmadre.id as madreid',
                'tbpadre.imagen as imgpadre', 'tbmadre.imagen as imgmadre', 'tbpadre.nombre as nompadre', 'tbmadre.nombre as nommadre' )
            ->find($id);

        $TraerAbueloPaterno = Animales::find($TraerUno->padreid);
        $TraerAbueloMaterno = Animales::find($TraerUno->madreid);
        $Traer1=null;
        $Traer2=null;
        $Traer3=null;
        $Traer4=null;
        $Traer5=null;
        $Traer6=null;
        $Traer7=null;
        $Traer8=null;
        if ($TraerAbueloPaterno!=null){
            $TraerAPp =Animales::select('nombre', 'imagen', 'id', 'padre', 'madre')->find($TraerAbueloPaterno->padre);
            if ($TraerAPp!=null){
                $Traer1 =Animales::select('nombre', 'imagen', 'id')->find($TraerAPp->padre);
                $Traer2 =Animales::select('nombre', 'imagen', 'id')->find($TraerAPp->madre);
            }
            else{
                $Traer1=null;
                $Traer2=null;
            }


            $TraerAPm =Animales::select('nombre', 'imagen', 'id',  'padre', 'madre')->find($TraerAbueloPaterno->madre);
            if ($TraerAPm!=null){
                $Traer3 =Animales::select('nombre', 'imagen', 'id')->find($TraerAPm->padre);
                $Traer4 =Animales::select('nombre', 'imagen', 'id')->find($TraerAPm->madre);
            }
            else{
                $Traer3=null;
                $Traer4=null;
            }
        }
        else{
            $TraerAPp=null;
            $TraerAPm=null;
        }
        if ($TraerAbueloMaterno!=null)
        {
            $TraerAMp =Animales::select('nombre', 'imagen', 'id', 'padre', 'madre')->find($TraerAbueloMaterno->padre);
            if ($TraerAMp!=null){
                $Traer5 =Animales::select('nombre', 'imagen', 'id')->find($TraerAMp->padre);
                $Traer6 =Animales::select('nombre', 'imagen', 'id')->find($TraerAMp->madre);
            }
            else{
                $Traer5=null;
                $Traer6=null;
            }
            $TraerAMm =Animales::select('nombre', 'imagen', 'id', 'padre', 'madre')->find($TraerAbueloMaterno->madre);
            if ($TraerAMm!=null){
                $Traer7 =Animales::select('nombre', 'imagen', 'id')->find($TraerAMm->padre);
                $Traer8 =Animales::select('nombre', 'imagen', 'id')->find($TraerAMm->madre);
            }
            else{
                $Traer7=null;
                $Traer8=null;
            }
        }
        else
        {
            $TraerAMp=null;
            $TraerAMm=null;
        }



        $TraerHermanosP = Animales::select('id', 'nombre')
            ->where('padre','=', $TraerUno->padreid )
            ->where('id', '!=', $id)
            ->get();
        $TraerHermanosM = Animales::select('id', 'nombre')
            ->where('madre','=', $TraerUno->madreid )
            ->where('id', '!=', $id)
            ->get();
        $TraerHermanos = $TraerHermanosP->merge($TraerHermanosM);

        $TraerHijosP = Animales::select('id', 'nombre')
            ->where('padre', '=',$TraerUno->id)
            ->get();

        $TraerHijosM = Animales::select('id', 'nombre')
            ->where('madre', '=',$TraerUno->id)
            ->get();
        $TraerHijos = $TraerHijosP->merge($TraerHijosM);

        return view('detallepedex', ['mascota'=>$TraerUno], compact('TraerHermanos', 'TraerHijos', 'TraerAPp', 'TraerAPm', 'TraerAMp', 'TraerAMm',
            'Traer1', 'Traer2', 'Traer3', 'Traer4', 'Traer5', 'Traer6', 'Traer7', 'Traer8'));

    }

    public function Nosotros(){

        return view('nosotros');
    }
    public function InscribirMacota()
    {
        $TipoAnimal= TipoAnimal::select('id', 'animal')->get();
        $Propietarios = User::select('id', 'apellidos', 'name')->get();
        return view ('inscribir',  compact('TipoAnimal', 'Propietarios'));
    }




    public function MisMascotas()
    {
        $TraerTodos = Animales::join('tipo_animals','animales.tipoanimal', '=', 'tipo_animals.id')
            ->join('especies','animales.raza', '=', 'especies.id')
            ->leftJoin('animales as tbpadre','animales.padre', '=', 'tbpadre.id')
            ->leftJoin('animales as tbmadre','animales.madre', '=', 'tbmadre.id')
            ->join('users','animales.propietario', '=', 'users.id')
            ->select('animales.id' ,'animales.nombre', 'tipo_animals.animal',
                'especies.raza', 'tbpadre.nombre as nompadre',
                'tbmadre.nombre as nommadre', 'animales.imagen',
                'users.name', 'users.apellidos', 'animales.genero')
            ->where('animales.propietario', '=', Auth::user()->id)
            ->orderBy('animales.tipoanimal', 'ASC')
            ->get();

        return view('mymascotas', compact('TraerTodos'));
    }
    public function CambiarPassword($id){
        $TraerUno = User::find($id);
        return view('Cliente.changuepasscli',['usuario'=>$TraerUno]);

    }

    public function ResetPassword($id){
        $TraerUno = User::find($id);
        return view('Cliente.resetpass',['usuario'=>$TraerUno]);

    }

    public function CambiarPass($id){
        $TraerUno = User::find($id);
        return view('Cliente.changuepass',['usuario'=>$TraerUno]);
    }

    public function ListaMascotas($id)
    {
        $propietario = User::find($id);
        $TraerTodos = Animales::join('tipo_animals','animales.tipoanimal', '=', 'tipo_animals.id')
            ->join('especies','animales.raza', '=', 'especies.id')
            ->leftJoin('animales as tbpadre','animales.padre', '=', 'tbpadre.id')
            ->leftJoin('animales as tbmadre','animales.madre', '=', 'tbmadre.id')
            ->join('users','animales.propietario', '=', 'users.id')
            ->select('animales.id' ,'animales.nombre', 'tipo_animals.animal',
                'especies.raza', 'tbpadre.nombre as nompadre',
                'tbmadre.nombre as nommadre', 'animales.imagen',
                'users.name', 'users.apellidos')
            ->where('animales.propietario', '=',  $id)
            ->orderBy('animales.tipoanimal', 'ASC')
            ->get();

        return view('Cliente.listmascota', compact('TraerTodos', 'propietario'));
    }

    public function EditarMascotaCliente($id)
    {
        $TipoAnimal= TipoAnimal::select('id', 'animal')->get();
        $TraerUno = Animales::find($id);
        $Propietarios = User::select('id', 'apellidos', 'name')->get();
        return view('editarmascota', ['mascota'=>$TraerUno],  compact('TipoAnimal', 'Propietarios'));
    }



    public function EliminarMascotaCliente($id)
    {
        $TraerUno = Animales::find($id);
        $TraerUno->delete();

        Session::flash('message', 'Mascota eliminado correctamente.');
        return Redirect::route('my.mascota');
    }


    public function DetailsPedex($id)
    {
        $TraerUno = Animales::join('tipo_animals','animales.tipoanimal', '=', 'tipo_animals.id')
            ->join('especies','animales.raza', '=', 'especies.id')
            ->leftJoin('animales as tbpadre','animales.padre', '=', 'tbpadre.id')
            ->leftJoin('animales as tbmadre','animales.madre', '=', 'tbmadre.id')
            ->join('users','animales.propietario', '=', 'users.id')
            ->select('animales.id' ,'animales.nombre', 'tipo_animals.animal',
                'especies.raza', 'tbpadre.nombre as nompadre',
                'tbmadre.nombre as nommadre', 'animales.imagen',
                'users.name', 'users.apellidos', 'animales.genero', 'animales.lugarnac',
                'animales.color', 'animales.peso', 'animales.alto', 'animales.descripcion', 'tbpadre.id as padreid', 'tbmadre.id as madreid',
                'tbpadre.imagen as imgpadre', 'tbmadre.imagen as imgmadre', 'tbpadre.nombre as nompadre', 'tbmadre.nombre as nommadre' )
            ->find($id);

        $TraerAbueloPaterno = Animales::find($TraerUno->padreid);
        $TraerAbueloMaterno = Animales::find($TraerUno->madreid);
        $Traer1=null;
        $Traer2=null;
        $Traer3=null;
        $Traer4=null;
        $Traer5=null;
        $Traer6=null;
        $Traer7=null;
        $Traer8=null;
        if ($TraerAbueloPaterno!=null){
            $TraerAPp =Animales::select('nombre', 'imagen', 'id', 'padre', 'madre')->find($TraerAbueloPaterno->padre);
            if ($TraerAPp!=null){
                $Traer1 =Animales::select('nombre', 'imagen', 'id')->find($TraerAPp->padre);
                $Traer2 =Animales::select('nombre', 'imagen', 'id')->find($TraerAPp->madre);
            }
            else{
                $Traer1=null;
                $Traer2=null;
            }


            $TraerAPm =Animales::select('nombre', 'imagen', 'id',  'padre', 'madre')->find($TraerAbueloPaterno->madre);
            if ($TraerAPm!=null){
                $Traer3 =Animales::select('nombre', 'imagen', 'id')->find($TraerAPm->padre);
                $Traer4 =Animales::select('nombre', 'imagen', 'id')->find($TraerAPm->madre);
            }
            else{
                $Traer3=null;
                $Traer4=null;
            }
        }
        else{
            $TraerAPp=null;
            $TraerAPm=null;
        }
        if ($TraerAbueloMaterno!=null)
        {
            $TraerAMp =Animales::select('nombre', 'imagen', 'id', 'padre', 'madre')->find($TraerAbueloMaterno->padre);
            if ($TraerAMp!=null){
                $Traer5 =Animales::select('nombre', 'imagen', 'id')->find($TraerAMp->padre);
                $Traer6 =Animales::select('nombre', 'imagen', 'id')->find($TraerAMp->madre);
            }
            else{
                $Traer5=null;
                $Traer6=null;
            }
            $TraerAMm =Animales::select('nombre', 'imagen', 'id', 'padre', 'madre')->find($TraerAbueloMaterno->madre);
            if ($TraerAMm!=null){
                $Traer7 =Animales::select('nombre', 'imagen', 'id')->find($TraerAMm->padre);
                $Traer8 =Animales::select('nombre', 'imagen', 'id')->find($TraerAMm->madre);
            }
            else{
                $Traer7=null;
                $Traer8=null;
            }
        }
        else
        {
            $TraerAMp=null;
            $TraerAMm=null;
        }



        $TraerHermanosP = Animales::select('id', 'nombre')
            ->where('padre','=', $TraerUno->padreid )
            ->where('id', '!=', $id)
            ->get();
        $TraerHermanosM = Animales::select('id', 'nombre')
            ->where('madre','=', $TraerUno->madreid )
            ->where('id', '!=', $id)
            ->get();
        $TraerHermanos = $TraerHermanosP->merge($TraerHermanosM);

        $TraerHijosP = Animales::select('id', 'nombre')
            ->where('padre', '=',$TraerUno->id)
            ->get();

        $TraerHijosM = Animales::select('id', 'nombre')
            ->where('madre', '=',$TraerUno->id)
            ->get();
        $TraerHijos = $TraerHijosP->merge($TraerHijosM);

        return view('details', ['mascota'=>$TraerUno], compact('TraerHermanos', 'TraerHijos', 'TraerAPp', 'TraerAPm', 'TraerAMp', 'TraerAMm',
            'Traer1', 'Traer2', 'Traer3', 'Traer4', 'Traer5', 'Traer6', 'Traer7', 'Traer8'));

    }

}

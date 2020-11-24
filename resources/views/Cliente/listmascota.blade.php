@extends('layouts.app')

@section('content')
    @if(Session::has('message'))
        <div class="alert alert-success alert-dismissible" role = "alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <label class="text-center"> {{Session::get('message')}}</label>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <i class="fa fa-user"></i> Listar Mascota de : {{$propietario->apellidos}}, {{$propietario->name}}
        </div>

        <div class="card-body">


            <br>
            <br>
            <table class="table table-responsive-sm">
                <thead>
                <tr>
                    <th width="30%"></th>
                    <th>Nombre Mascota</th>
                    <th>Raza</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($TraerTodos as $mascota )
                    <tr>
                        <td>  <div id="imagenMascota">
                                <img src="/images/{{$mascota->imagen}}"
                                     class="img-thumbnail" alt="Cinque Terre"></div></td>
                        <td>{{$mascota->nombre}}</td>
                        <td>{{$mascota->animal}}: {{$mascota->raza}}</td>

                        <td>
                            <a href="{{route('puppey.detalle', array ($mascota->id))}}" class="btn btn-lg btn-secondary"><i class="fa fa-eye-slash" title="Ver Genealogia" ></i> Detalle</a>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>

@endsection

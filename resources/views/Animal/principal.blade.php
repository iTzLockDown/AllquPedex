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
            <i class="fa fa-list-ul"></i> Registro de Mascotas

        </div>

        <div class="card-body">
            <div class="form-group row">
                <label class="col-md-1 col-form-label"></label>

                <div class="col-md-5">
                    {!!Form::open(['route'=>'puppey.principal','method'=>'GET','role'=>'form','enctype'=>'multipart/form-data','files' => true])!!}

                    <input type="text" id="txtBuscar" name="nombre" class="form-control" placeholder="Buscar ..." autocomplete="off">

                </div>
                <div class="col-md-2 col-form-label text-left">
                    <button class="btn btn-tumblr btn-sm" id="btnBuscar" type="submit"><i class="fa fa-search"></i> Buscar</button>
                    {!!Form::close()!!}
                </div>

                <div class="col-md-4 text-right">
                    <a  href="{{ route('puppey.crear') }}" class="btn btn-sm btn-outline-info text-right" ><i class="fa fa-user-plus"></i> Nueva Mascota</a>

                </div>

            </div>
            <br>
                <table class="table table-responsive-sm">
                    <thead>
                    <tr>
                        <th width="10%">Foto</th>
                        <th>Nombre</th>
                        <th>Raza</th>
                        <th>Dueño</th>
                        <th>Padre</th>
                        <th>Madre</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($TraerTodos as $mascota )
                        <tr>
                            <td>
                                <div id="imagenMascota">
                                    <img src="/images/{{$mascota->imagen}}"
                                         class="img-thumbnail" alt="Cinque Terre">
                                </div>
                            </td>
                            <td>
                                @if($mascota->genero == 'M')
                                    <i class="fa fa-mars" title="Editar" >
                                @else
                                    <i class="fa fa-venus" title="Editar" >
                                @endif
                                {{$mascota->nombre}}

                            </td>
                            <td>{{$mascota->animal}}: {{$mascota->raza}}</td>
                            <td>{{$mascota->apellidos}}, {{$mascota->name}}</td>
                            <td>{{$mascota->nompadre}}</td>
                            <td>{{$mascota->nommadre}}</td>
                            <td>
                                <a href="{{route('puppey.editar' ,  array ($mascota->id))}}" class="btn btn-sm btn-dark"><i class="fa fa-edit" title="Editar" ></i></a>
                                <a href="{{route('puppey.detalle', array ($mascota->id))}}" class="btn btn-sm btn-secondary"><i class="fa fa-eye-slash" title="Ver Genealogia" ></i> Detalle</a>
                                <a href="{{ route('puppey.eliminar' ,$parameters = $mascota->id)}}" onclick="return confirm('Esta seguro de eliminar el pedigree')" class="btn btn-warning btn-sm" title="Eliminar"><i class="fa fa-ban" title="Eliminar"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <center>    {!! $TraerTodos->links() !!}</center>
        </div>
    </div>


@endsection

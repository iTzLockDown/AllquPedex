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
            <i class="fa fa-user"></i> Registro de Especies
        </div>

        <div class="card-body">

            <div class="form-group row">
                <label class="col-md-1 col-form-label"></label>

                <div class="col-md-5">
                    {!!Form::open(['route'=>'raza.principal','method'=>'GET','role'=>'form','enctype'=>'multipart/form-data','files' => true])!!}

                    <input type="text" id="txtBuscar" name="nombre" class="form-control" placeholder="Buscar ..." autocomplete="off">

                </div>
                <div class="col-md-2 col-form-label text-left">
                    <button class="btn btn-tumblr btn-sm" id="btnBuscar" type="submit"><i class="fa fa-search"></i> Buscar</button>
                    {!!Form::close()!!}
                </div>

                <div class="col-md-4 text-right">
                    <a  href="{{ route('raza.crear') }}" class="btn btn-sm btn-outline-info text-right" ><i class="fa fa-user-plus"></i> Nueva Especie</a>

                </div>

            </div>
            <br>
            <br>
            <table class="table table-responsive-sm">
                <thead>
                <tr>
                    <th>N°</th>
                    <th>Tipo de Animal</th>
                    <th>Especie</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($TraerTodos as $especie )
                    <tr>
                        <td>{{$especie->id}}</td>
                        <td>{{$especie->animal}}</td>
                        <td>{{$especie->raza}}</td>
                        <td>
                            <a href="{{route('raza.editar', array($especie->id))}}" title="Resetear Contraseña" class="btn btn-outline-info btn-sm"> <i class="fa fa-paste"></i> Editar</a>
                            <a href="{{ route('raza.eliminar' ,$parameters = $especie->id)}}" onclick="return confirm('Esta seguro de eliminar la especie.')" class="btn btn-danger btn-sm"><i class="fa fa-trash-o" title="Eliminar Tipo"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <center>    {!! $TraerTodos->links() !!}</center>
        </div>
    </div>

@endsection

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
            <i class="fa fa-user"></i> Registro de Tipos de Animales
        </div>

        <div class="card-body">

            <div class="form-group row">
                <label class="col-md-1 col-form-label"></label>

                <div class="col-md-5">
                    {!!Form::open(['route'=>'tipo.animal.principal','method'=>'GET','role'=>'form','enctype'=>'multipart/form-data','files' => true])!!}

                    <input type="text" id="txtBuscar" name="nombre" class="form-control" placeholder="Buscar ..." autocomplete="off">

                </div>
                <div class="col-md-2 col-form-label text-left">
                    <button class="btn btn-tumblr btn-sm" id="btnBuscar" type="submit"><i class="fa fa-search"></i> Buscar</button>
                    {!!Form::close()!!}
                </div>

                <div class="col-md-4 text-right">
                    <a  href="{{ route('tipo.animal.crear') }}" class="btn btn-sm btn-outline-info text-right" ><i class="fa fa-user-plus"></i> Nuevo Tipo Animal</a>

                </div>

            </div>
            <br>
            <br>
            <table class="table table-responsive-sm">
                <thead>
                <tr>
                    <th>N°</th>
                    <th>Nombre</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($TraerTodos as $tipoanimal )
                    <tr>
                        <td>{{$tipoanimal->id}}</td>
                        <td>{{$tipoanimal->animal}}</td>
                        <td>
                            <a href="{{route('tipo.animal.editar', array($tipoanimal->id))}}" title="Resetear Contraseña" class="btn btn-outline-info btn-sm"> <i class="fa fa-paste"></i> Editar</a>
                            <a href="{{ route('tipo.animal.eliminar' ,$parameters = $tipoanimal->id)}}" onclick="return confirm('Esta seguro de eliminar el usuario.')" class="btn btn-danger btn-sm"><i class="fa fa-trash-o" title="Eliminar Tipo"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <center>    {!! $TraerTodos->links() !!}</center>
        </div>
    </div>

@endsection

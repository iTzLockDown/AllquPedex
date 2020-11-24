@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            Registros de <strong>Mascotas</strong></div>
        @if($errors->any())
            <div class="alert alert-warning" role="alert">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <div class="card-body">
            {!!Form::model($mascota,['route'=>['puppey.update', $mascota->id],'method'=>'PUT','role'=>'form','enctype'=>'multipart/form-data', 'class'=>'form-horizontal'])!!}
            <div class="form-group row">
                <label class="col-md-3 col-form-label">Tipo de Animal</label>
                <div class="col-md-3">
                    <select class="form-control" name="tipoanimal" id="tipoanimal">
                        <option>Seleccionar</option>
                        @foreach($TipoAnimal as $TipoAnimal)
                            <option value="{{$TipoAnimal->id}}">{{$TipoAnimal->animal}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label">Propietario</label>
                <div class="col-md-3">
                    <select class="form-control" name="propietario" >
                        <option>Seleccionar Porpietario</option>
                        @foreach($Propietarios as $propietario)
                            <option value="{{$propietario->id}}">{{$propietario->apellidos}}, {{$propietario->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label">Nombre</label>
                <div class="col-md-3">

                    {{ Form::text('nombre',null,$attributes = ['class'=>'form-control', 'placeholder'=>'Nombre...','autocomplete'=>'off',])}}

                </div>
                <label class="col-md-2 col-form-label text-left">Fecha Nacimiento</label>
                <div class="col-md-4">
                    {{ Form::date('fechanac',\Carbon\Carbon::now()->subYears(10),$attributes = ['class'=>'form-control', 'placeholder'=>'Ruc...','autocomplete'=>'off',])}}

                </div>


            </div>

            <div class="form-group row">
                <label class="col-md-3 col-form-label text-left">Peso (Kg)</label>
                <div class="col-md-3">
                    {{ Form::text('peso',null,$attributes = ['class'=>'form-control', 'placeholder'=>'Peso...','autocomplete'=>'off',])}}

                </div>
                <label class="col-md-2 col-form-label">Altura (Metros)</label>
                <div class="col-md-4">
                    {{ Form::text('alto',null,$attributes = ['class'=>'form-control', 'placeholder'=>'Altura...','autocomplete'=>'off',])}}

                </div>

            </div>

            <div class="form-group row">
                <label class="col-md-3 col-form-label">Genero</label>
                <div class="col-md-3">
                    {{Form::select('genero', ['M' => 'Macho', 'H'=>'Hembra'],null ,['class'=>'form-control','required'])}}

                </div>

                <label class="col-md-2 col-form-label text-left">Color</label>
                <div class="col-md-4">
                    {{ Form::text('color',null,$attributes = ['class'=>'form-control', 'placeholder'=>'Color...','autocomplete'=>'off',])}}

                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-3 col-form-label">Lugar de Nacimiento</label>
                <div class="col-md-3">
                    {{ Form::text('lugarnac',null,$attributes = ['class'=>'form-control', 'placeholder'=>'Lugar de nacimiento...','autocomplete'=>'off',])}}
                </div>

                <label class="col-md-2 col-form-label text-left">Raza</label>
                <div class="col-md-4">
                    {!! Form::select('raza',['placeholder'=>'Selecciona'],null,['id'=>'cboraza','class'=>'form-control']) !!}
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-3 col-form-label">Imagen</label>
                <div class="col-md-3">
                    {{ Form::file('imagen',null,$attributes = ['class'=>'form-control','autocomplete'=>'off',])}}

                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label">Descripción</label>
                <div class="col-md-9">
                    {{ Form::textarea('descripcion',null,$attributes = ['class'=>'form-control','autocomplete'=>'off','rows'=>'2'])}}

                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label">Criadero</label>
                <div class="col-md-9">
                    {{ Form::text('criadero',null,$attributes = ['placeholder'=>'Criadero...','class'=>'form-control','autocomplete'=>'off','rows'=>'2'])}}

                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-3 col-form-label">Padre</label>
                <div class="col-md-3">
                    {!! Form::select('padre',['placeholder'=>''],null,['id'=>'padre','class'=>'form-control']) !!}
                </div>

                <label class="col-md-2 col-form-label text-left">Madre</label>
                <div class="col-md-4">
                    {!! Form::select('madre',['placeholder'=>''],null,['id'=>'madre','class'=>'form-control']) !!}
                </div>
            </div>

        </div>
        <div class="card-footer">
            <button class="btn btn-sm btn-info" type="submit"  >
                <i class="fa fa-edit" ></i> Editar</button> &nbsp;
            <a href="{{route('puppey.principal')}}" class="btn btn-sm btn-danger" > <i class="fa fa-arrow-left" ></i> Regresar</a>

        </div>
        {!!Form::close()!!}
    </div>
@endsection

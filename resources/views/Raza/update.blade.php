@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Edicion de <strong>Tipo de Animales</strong></div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-warning" role="alert">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif
                {!!Form::model($raza,['route'=>['raza.update', $raza->id],'method'=>'PUT','role'=>'form','enctype'=>'multipart/form-data', 'class'=>'form-horizontal'])!!}

                <div class="form-group row">
                    <label class="col-md-3 col-form-label">Tipo de Animal</label>
                    <div class="col-md-3">

                        {!! Form::select('tipoanimal',$TipoAnimal,null,['class'=>'form-control']) !!}

                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">Especie</label>
                    <div class="col-md-3">

                        {{ Form::text('raza',null,$attributes = ['class'=>'form-control', 'placeholder'=>'Nombre...','autocomplete'=>'off','required'])}}

                    </div>
                </div>



        </div>
        <div class="card-footer">
            <button class="btn btn-sm btn-primary" type="submit" >
                <i class="fa fa-save" ></i> Grabar</button> &nbsp;
            <a href="{{route('raza.principal')}}" class="btn btn-sm btn-danger" > <i class="fa fa-arrow-left" ></i> Regresar</a>

        </div>
        {!!Form::close()!!}
    </div>

@endsection

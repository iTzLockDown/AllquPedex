@extends('layouts.app')

@section('content')



    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        Cambiar <strong>Contraseña</strong></div>
                    <div class="card-body">
                        {!!Form::model($usuario,['route'=>['changue.update', $usuario->id],'method'=>'PUT','role'=>'form','enctype'=>'multipart/form-data', 'class'=>'form-horizontal', 'readonly'])!!}



                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Nombre</label>
                            <div class="col-md-3">

                                {{ Form::text('name',null,$attributes = ['class'=>'form-control', 'placeholder'=>'Nombre...','autocomplete'=>'off', 'readonly'])}}

                            </div>


                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Email</label>
                            <div class="col-md-3">

                                {{ Form::email('email',null,$attributes = ['class'=>'form-control', 'placeholder'=>'Nombre...','autocomplete'=>'off', 'readonly'])}}

                            </div>


                        </div>


                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Permisos</label>
                            <div class="col-md-3">

                                {{Form::select('rol', ['1' => 'Admininitrador', '2' => 'Usuario', '3'=>'Usuario Comun'],null ,['class'=>'form-control', 'disabled'])}}
                            </div>

                        </div>


                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Cotraseña nueva</label>
                            <div class="col-md-3">

                                {{ Form::text('password1',null,$attributes = ['class'=>'form-control', 'placeholder'=>'Contraseña...','autocomplete'=>'off',])}}

                            </div>


                        </div>

                    </div>
                    <div class="card-footer">
                        <button class="btn btn-sm btn-primary" type="submit"  >
                            <i class="fa fa-key" ></i> Cambiar Contraseña</button> &nbsp;
                        <a href="{{route('home')}}" class="btn btn-sm btn-danger" > <i class="fa fa-arrow-left" ></i> Regresar</a>

                    </div>
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
@endsection

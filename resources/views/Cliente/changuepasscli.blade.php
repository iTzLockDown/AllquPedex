@extends('layouts.principal')

@section('content')

    <div class="slider-area2">
        <div class="slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap hero-cap2 pt-70 text-center">
                            <h2>cambiar Password</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    {!!Form::model($usuario,['route'=>['changuecli.update', $usuario->id],'method'=>'PUT','role'=>'form','enctype'=>'multipart/form-data', 'class'=>'form-horizontal', 'readonly'])!!}



                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Nombre</label>
                        <div class="col-md-3">

                            {{ Form::text('name',null,$attributes = [ 'placeholder'=>'Nombre...','autocomplete'=>'off', 'readonly'])}}

                        </div>


                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Email</label>
                        <div class="col-md-3">

                            {{ Form::email('email',null,$attributes = [ 'placeholder'=>'Nombre...','autocomplete'=>'off', 'readonly'])}}

                        </div>


                    </div>



                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Cotraseña nueva</label>
                        <div class="col-md-3">

                            {{ Form::text('password1',null,$attributes = [ 'placeholder'=>'Contraseña...','autocomplete'=>'off',])}}

                        </div>


                    </div>

                    <button class="btn btn-sm btn-primary" type="submit"  >
                        <i class="fa fa-key" ></i> Cambiar Contraseña</button> &nbsp;

                {!!Form::close()!!}
                </div>

                <div class="col-lg-3 offset-lg-1">
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-home"></i></span>
                        <div class="media-body">
                            <h3>Huancayo.</h3>
                            <p>Rosemead, CA 91770</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                        <div class="media-body">
                            <h3>+1 253 565 2365</h3>
                            <p>Lunes a Viernes 9am a 6pm</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-email"></i></span>
                        <div class="media-body">
                            <h3>support@colorlib.com</h3>
                            <p>Envie cualquier consulta!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

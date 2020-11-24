@extends('layouts.principal')
@section('content')
    <div class="slider-area2">
        <div class="slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap hero-cap2 pt-70 text-center">
                            <h2>Mi Genealogia</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->
    <!-- ================ contact section start ================= -->
    <section class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="contact-title">Buscar por :
                    </h2>
                </div>
                <div class="col-lg-8">
                    {!!Form::open(['route'=>'buscar.animal', 'class'=>'form-contact contact_form' ,'method'=>'GET','role'=>'form','enctype'=>'multipart/form-data','files' => true])!!}
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control valid" name="nombre" id="name" type="text" placeholder="Ingrese su nombre">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <select class="form-control" name="tipoBusqueda" id="tipoanimal">
                                    <option value="N">Nombre</option>
                                    @foreach($TraerRaza as $tipo)
                                        <option value="{{$tipo->raza}}">({{$tipo->animal}}) {{$tipo->raza}}</option>
                                    @endforeach



                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <button type="submit" class="button button-contactForm boxed-btn">Buscar</button>
                            </div>
                        </div>
                    </div>
                    {!!Form::close()!!}
                </div>


                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        <article class="blog_item">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th width="30%">Foto</th>
                                    <th>Nombre</th>
                                    <th>Raza</th>

                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($TraerTodos as $mascota )
                                    <tr>
                                        <td style="vertical-align : middle;text-align:center;">
                                            <div >
                                            <img style="width: 100%; height: 100%"src="/images/{{$mascota->imagen}}" alt="">
                                            </div>
                                        </td>
                                        <td style="vertical-align : middle;text-align:center;">

                                            @if($mascota->genero == 'M')
                                                <i class="fa fa-mars" title="Editar" >
                                                    @else
                                                        <i class="fa fa-venus" title="Editar" >
                                            @endif
                                                {{$mascota->nombre}} </td>
                                        <td style="vertical-align : middle;text-align:center;">{{$mascota->animal}}: {{$mascota->raza}}</td>

                                        <td style="vertical-align : middle;text-align:center;">
                                            <a href="{{route('detalle.pedex.animal', array ($mascota->id))}}" style="border: 1px solid #2e518b; /*anchura, estilo y color borde*/
padding: 10px; /*espacio alrededor texto*/
background-color: #000; /*color botón*/
color: #ffffff; /*color texto*/
text-decoration: none; /*decoración texto*/
text-transform: uppercase; /*capitalización texto*/
font-family: 'Helvetica', sans-serif; /*tipografía texto*/
">Ver</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>


                        </article>
                        <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Previous">
                                        <i class="ti-angle-left"></i>
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link">1</a>
                                </li>
                                <li class="page-item active">
                                    <a href="#" class="page-link">2</a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Next">
                                        <i class="ti-angle-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
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

@extends('layouts.principal')
@section('content')

    <div class="slider-area2">
        <div class="slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap hero-cap2 pt-70 text-center">
                            <h2>Mis Mascotas</h2>
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
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        <article class="blog_item">
                            <table class="table table-responsive-sm">
                                <thead>
                                <tr>
                                    <th width="40%" class="text-center">Foto</th>
                                    <th width="40%" class="text-center">Nombre</th>
                                    <th width="10%" class="text-center"></th>
                                    <th width="10%" class="text-center"></th>
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
                                        <td style="vertical-align : middle;text-align:center;">
                                            <a href="{{route('detalle.pedex.animal', array ($mascota->id))}}" style="border: 1px solid #2e518b; /*anchura, estilo y color borde*/
padding: 10px; /*espacio alrededor texto*/
background-color: #000; /*color botón*/
color: #ffffff; /*color texto*/
text-decoration: none; /*decoración texto*/
text-transform: uppercase; /*capitalización texto*/
font-family: 'Helvetica', sans-serif; /*tipografía texto*/
" >Detalle</a>
                                        </td>
                                        <td style="vertical-align : middle;text-align:center;">
                                            <a href="{{route('editar.cliente.mascota', array ($mascota->id))}}" style="border: 1px solid #2e518b; /*anchura, estilo y color borde*/
padding: 10px; /*espacio alrededor texto*/
background-color: #000; /*color botón*/
color: #ffffff; /*color texto*/
text-decoration: none; /*decoración texto*/
text-transform: uppercase; /*capitalización texto*/
font-family: 'Helvetica', sans-serif; /*tipografía texto*/
"> Editar</a>
                                        </td>
                                        <td style="vertical-align : middle;text-align:center;">
                                            <a href="{{route('mimascota.eliminar', array ($mascota->id))}}" style="border: 1px solid #2e518b; /*anchura, estilo y color borde*/
padding: 10px; /*espacio alrededor texto*/
background-color: #000; /*color botón*/
color: #ffffff; /*color texto*/
text-decoration: none; /*decoración texto*/
text-transform: uppercase; /*capitalización texto*/
font-family: 'Helvetica', sans-serif; /*tipografía texto*/
" onclick="return confirm('Esta seguro de eliminar el pedigree')"> Eliminar</a>
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

@extends('layouts.principal')
@section('content')
    <div class="slider-area">
        <div class="slider-full-active owl-carousel custom-dots">
            <div class="slide-full slider-height d-flex align-items-center" style="background-image: url('Principal/assets/img/hero/h1_hero.png');">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-8 col-md-7 col-sm-8">
                            <div class="slide-full-content">
                                <span>#1 Registro de Animales Pedigree</span>
                                <h1>ALLQU<br> PEDEX</h1>
{{--                                <p>We creating lasting impression through architecture design.</p>--}}
                                <a class="btn" href="{{route('buscar.animal')}}">BUSCAR PEDIGREE</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
{{--            <div class="slide-full d-flex slider-height align-items-center" style="background-image: url(Principal/assets/img/hero/h1_hero2.png);">--}}
{{--                <div class="container">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-xl-6 col-lg-8 col-md-7 col-sm-8">--}}
{{--                            <div class="slide-full-content">--}}
{{--                                <span>#1 aritecture in united stare</span>--}}
{{--                                <h1>Focus on<br> Design Quality</h1>--}}
{{--                                <p>We creating lasting impression through architecture design.</p>--}}
{{--                                <a class="btn" href="#">Contact Us</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="slide-full d-flex slider-height align-items-center" style="background-image: url(Principal/assets/img/hero/h1_hero.png);">--}}
{{--                <div class="container">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-xl-6 col-lg-8 col-md-7 col-sm-8">--}}
{{--                            <div class="slide-full-content">--}}
{{--                                <span>#1 aritecture in united stare</span>--}}
{{--                                <h1>Focus on<br> Design Quality</h1>--}}
{{--                                <p>We creating lasting impression through architecture design.</p>--}}
{{--                                <a class="btn" href="#">Contact Us</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
    <section class="about-area section-padding2">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-10">
                    <div class="about-caption mb-50">
                        <!-- Section Tittle -->
                        <div class="section-tittle section-tittle2 mb-35">
                            <span>Allqu Pedex</span>
                            <h2>Registro de Pedigree Para Perros</h2>
                        </div>
                        <p style="text-align: justify;"> Recopilamos información sobre las razas American Bully, Bulldog Inglés, Bulldog Francés, Bullterrier etc;
                            en todo el mundo y proporcionamos una herramienta de busqueda para encontrar pedigrees de perros de distintas razas,
                            donde podrás consultar el arbol genealógico de muchos ejemplares en diferentes razas con sus respectivas fotos,
                            cada nombre de perro es un enlace web al pedigree, el cual podrás visualizar en cualquier momento y que mostrará el arbol genealogico del ejemplar,
                            lo cual es muy útil, para realizar una monta, proyectar una futura camada o promocionar una camada y ver todos los ascendentes del padre y de la madre.
                            Tambien te mostramos los hijos y hermanos y una excelente herramienta que muestra toda la genealogia del pedigree.
                            Permitiendo conocer al pedigree con un solo click.</p>
                        <a href="#" class="btn">Registrar</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <!-- about-img -->
                    <div class="about-img ">
                        <div class="about-font-img ">
                            <img src="Principal/assets/img/perro/aboutes.png" alt="">
                        </div>
                        <div class="about-back-img ">
                            <img src="Principal/assets/img/gallery/about2.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="experience-area position-relative d-flex align-items-end">
        <div class="caption-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-10">
                    <div class="experience-caption">
                        <h2>Nuestro Objetivo</h2>
                        <p>
                            Allqupedex nos encargaremos de garantizar que la información mostrada sea precisa y actualizada,
                            pero no aceptamos ninguna responsabilidad legal por errores u omisiones,
                            motivo por el cual en Allqupedex nos reserva el derecho a realizar cambios sin previo aviso.
                            Si eres propietario de un ejemplar que esté registrado en nuestro sitio web o tienes los derechos de autor de alguna imagen que
                            aparece en este sitio web y no deseas que aparezca o tienes alguna inquietud póngase en contacto con nosotros.
                        </p>
                        <a href="about.html" class="btn">About us</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

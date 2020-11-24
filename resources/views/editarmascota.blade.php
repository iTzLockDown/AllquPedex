

<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Allqu | Pedex </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- CSS here -->

    {!! Html::style('Principal/assets/css/bootstrap.min.css')!!}
    {!! Html::style('Principal/assets/css/owl.carousel.min.css')!!}
    {!! Html::style('Principal/assets/css/slicknav.css')!!}
    {!! Html::style('Principal/assets/css/flaticon.css')!!}
    {!! Html::style('Principal/assets/css/hamburgers.min.css')!!}
    {!! Html::style('Principal/assets/css/gijgo.css')!!}
    {!! Html::style('Principal/assets/css/animate.min.css')!!}
    {!! Html::style('Principal/assets/css/animated-headline.css')!!}
    {!! Html::style('Principal/assets/css/magnific-popup.css')!!}
    {!! Html::style('Principal/assets/css/fontawesome-all.min.css')!!}
    {!! Html::style('Principal/assets/css/themify-icons.css')!!}
    {!! Html::style('Principal/assets/css/slick.css')!!}
    {!! Html::style('Principal/assets/css/nice-select.css')!!}
    {!! Html::style('Principal/assets/css/style1.css')!!}
</head>
<body>
<!-- ? Preloader Start -->

<!-- Preloader Start -->
<header>
    <!--? Header Start -->
    <div class="header-area header-transparent">
        <div class="main-header header-sticky">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <!-- Logo -->
                    <div class="col-xl-2 col-lg-2 col-md-1">
                        <div class="logo">
                            <a href="index.html"><img src="{!!asset('Principal/assets/img/logo/allju.svg')!!}" type="image/svg+xml" style="height: 58px; width: 148px"></a>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-10">
                        <div class="main-menu black-menu menu-bg-white d-none d-lg-block">

                            <nav class="hamburger-menu nav-menu-show">
                                <ul id="navigation">
                                    <li><a href="{{route('inicio')}}">Inicio</a></li>

                                    {{--                                            <ul class="submenu">--}}
                                    {{--                                                <li><a href="blog.html">Blog</a></li>--}}
                                    {{--                                                <li><a href="blog_details.html">Blog Details</a></li>--}}
                                    {{--                                                <li><a href="elements.html">Element</a></li>--}}
                                    {{--                                            </ul>--}}

                                    @auth
                                        <li><a href="{{route('buscar.animal')}}">Buscar</a></li>
                                        <li><a href="{{route('inscribir')}}">Registrar Pedigree</a>
                                        <li><a href="{{route('my.mascota')}}">Mis Mascotas</a>
                                    @else
                                        <li><a href="{{route('registrar')}}">Registrarse</a></li>
                                    @endauth

                                    @if (Route::has('login'))
                                        @auth
                                            @if(Auth::user()->permiso==1 || Auth::user()->permiso==2)
                                                <li><a href="{{ url('/home') }}">Panel</a></li>
                                            @else
                                                @if(Auth::user()->permiso==3)
                                                    <li><a href="{{ route('cliente.password', array(Auth::user()->id)) }}">Cambiar Passwords</a></li>
                                                @endif
                                                <li>
                                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Salir</a></li>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                            @endif
                                        @else
                                            <li><a href="{{ url('login') }}">Login</a></li>

                                        @endauth
                                    @endif
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>
<!-- header end -->
<main>
    <!--? slider-area start -->

    <div class="slider-area2">
        <div class="slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap hero-cap2 pt-70 text-center">
                            <h2>Editar Pedigree</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @if($errors->any())
        <div class="alert alert-warning" role="alert">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <section class="contact-section">


        <div class="container">
            <div class="alert alert-warning alert-dismissible" role = "alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <label class="text-center"> Editar solo los campos necesarios</label>
            </div>
            <div class="row">

                <div class="col-lg-12">
                        {!!Form::model($mascota,['route'=>['inscripcion.update', $mascota->id],'method'=>'PUT','role'=>'form','enctype'=>'multipart/form-data', 'class'=>'form-contact contact_form', 'file'=>true ])!!}


                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Tipo de Animal</label>
                        <div class="col-md-3">
                            <select class="form-control valid" type="text" name="tipoanimal" id="tipoanimal">
                                <option value="0">Seleccionar...</option>
                                @foreach($TipoAnimal as $TipoAnimal)
                                    <option value="{{$TipoAnimal->id}}">{{$TipoAnimal->animal}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Propietario</label>
                        <div class="col-md-3">
                            <input class="form-control valid"   value="{{Auth::user()->apellidos}}, {{Auth::user()->name }}" type="text" readonly>

                            <input type="hidden" name="propietario" id="propietario" value="{{Auth::user()->id}}">

                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Nombre</label>
                        <div class="col-md-3">

                            {{ Form::text('nombre',null,$attributes = [ 'class'=>'form-control valid','placeholder'=>'Nombre...','type'=>'text' ,'autocomplete'=>'off',])}}

                        </div>
                        <label class="col-md-2 col-form-label text-left">Fecha Nacimiento</label>
                        <div class="col-md-4">
                            {{ Form::date('fechanac',\Carbon\Carbon::now()->subYears(10),$attributes = ['class'=>'form-control valid', 'placeholder'=>'Ruc...','autocomplete'=>'off',])}}

                        </div>


                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-left">Peso (KG)</label>
                        <div class="col-md-3">
                            {{ Form::text('peso',null,$attributes = [ 'class'=>'form-control valid','placeholder'=>'Peso...','autocomplete'=>'off',])}}

                        </div>
                        <label class="col-md-2 col-form-label">Altura (Metros)</label>
                        <div class="col-md-4">
                            {{ Form::text('alto',null,$attributes = ['class'=>'form-control valid','placeholder'=>'Altura...','autocomplete'=>'off',])}}

                        </div>

                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Genero</label>
                        <div class="col-md-3">
                            {{Form::select('genero', ['M' => 'Macho', 'H'=>'Hembra'],null ,['class'=>'form-control valid','required'])}}

                        </div>

                        <label class="col-md-2 col-form-label text-left">Color</label>
                        <div class="col-md-4">
                            {{ Form::text('color',null,$attributes = [ 'class'=>'form-control valid','placeholder'=>'Color...','autocomplete'=>'off',])}}

                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Lugar de Nacimiento</label>
                        <div class="col-md-3">
                            {{ Form::text('lugarnac',null,$attributes = ['class'=>'form-control valid','placeholder'=>'Lugar de nacimiento...','autocomplete'=>'off',])}}
                        </div>

                        <label class="col-md-2 col-form-label text-left">Raza</label>
                        <div class="col-md-4">
                            {!! Form::select('raza',['placeholder'=>'Selecciona'],null,['class'=>'form-control valid','id'=>'cboraza']) !!}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Imagen</label>
                        <div class="col-md-3">
                            {{ Form::file('imagen',null,$attributes = ['class'=>'form-control valid','autocomplete'=>'off',])}}

                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Descripción</label>
                        <div class="col-md-9">
                            {{ Form::textarea('descripcion',null,$attributes = ['class'=>'form-control valid','autocomplete'=>'off','rows'=>'2'])}}

                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Criadero</label>
                        <div class="col-md-9">
                            {{ Form::text('criadero',null,$attributes = ['placeholder'=>'Criadero...','class'=>'form-control valid','autocomplete'=>'off','rows'=>'2'])}}

                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Padre</label>
                        <div class="col-md-3">
                            {!! Form::select('padre',['placeholder'=>''],null,['class'=>'form-control valid','id'=>'padre']) !!}
                        </div>

                        <label class="col-md-2 col-form-label text-left">Madre</label>
                        <div class="col-md-4">
                            {!! Form::select('madre',['placeholder'=>''],null,['class'=>'form-control valid','id'=>'madre']) !!}
                        </div>
                    </div>


                    <button class="btn btn-sm btn-primary" type="submit"  >
                        <i class="fa fa-edit" ></i> Editar</button> &nbsp;

                    {!!Form::close()!!}
                </div>


            </div>
        </div>
    </section>


</main>
<footer>
    <!-- Footer Start-->
    <div class="footer-area footer-padding section-bg" data-background="{!!asset('Principal/assets/img/gallery/footer_bg.png')!!}">
        <div class="container">
            <!-- Footer Top -->
            <div class="footer-top">
                <div class="row justify-content-between">
                    <div class="col-xl-3 col-lg-3 col-md-5 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="single-footer-caption mb-30">
                                <!-- logo -->
                                <div class="footer-logo">
                                    <a href="index.html"><img src="{!!asset('Principal/assets/img/logo/allju.svg')!!}" type="image/svg+xml"  alt=""></a>
                                </div>
                                <div class="footer-tittle">
                                    <div class="footer-pera">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-3 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4></h4>
                                <ul>

                                    {{--                                    <li><a href="#"> Offers & Discounts</a></li>--}}
                                    {{--                                    <li><a href="#"> Get Coupon</a></li>--}}
                                    {{--                                    <li><a href="#">  Contact Us</a></li>--}}
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-7">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4></h4>
                                <ul>
                                    {{--                                    <li><a href="#">Woman Cloth</a></li>--}}
                                    {{--                                    <li><a href="#">Fashion Accessories</a></li>--}}
                                    {{--                                    <li><a href="#"> Man Accessories</a></li>--}}
                                    {{--                                    <li><a href="#"> Rubber made Toys</a></li>--}}
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-5 col-sm-7">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4></h4>
                                <ul>
                                    {{--                                    <li><a href="#">Frequently Asked Questions</a></li>--}}
                                    {{--                                    <li><a href="#">Terms & Conditions</a></li>--}}
                                    {{--                                    <li><a href="#">Privacy Policy</a></li>--}}
                                    {{--                                    <li><a href="#">Report a Payment Issue</a></li>--}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer bottom -->
            <div class="footer-bottom">
                <div class="row">
                    <div class="col-xl-7 col-lg-8 col-md-7">
                        <div class="footer-copy-right">
                            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos los Derechos Reservados | Allqu Pedex</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-4 col-md-5">
                        <div class="footer-copy-right f-right">
                            <!-- social -->
                            <div class="footer-social">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-whatsapp"></i></a>
                                <a href="#"><i class="fas fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
</footer>
<!-- Scroll Up -->
<div id="back-top" >
    <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
</div>
{!! app('html')->script('Principal/assets/js/vendor/jquery-1.12.4.min.js')!!}


<!-- JS here -->
{!! app('html')->script('Principal/assets/js/vendor/modernizr-3.5.0.min.js')!!}
<!-- Jquery, Popper, Bootstrap -->

{!! app('html')->script('Principal/assets/js/popper.min.js')!!}
{!! app('html')->script('Principal/assets/js/bootstrap.min.js')!!}
<!-- Jquery Mobile Menu -->
{!! app('html')->script('Principal/assets/js/jquery.slicknav.min.js')!!}

<!-- Jquery Slick , Owl-Carousel Plugins -->
{!! app('html')->script('Principal/assets/js/owl.carousel.min.js')!!}
{!! app('html')->script('Principal/assets/js/slick.min.js')!!}
<!-- One Page, Animated-HeadLin -->
{!! app('html')->script('Principal/assets/js/wow.min.js')!!}
{!! app('html')->script('Principal/assets/js/animated.headline.js')!!}
{!! app('html')->script('Principal/assets/js/jquery.magnific-popup.js')!!}

<!-- Date Picker -->
{!! app('html')->script('Principal/assets/js/gijgo.min.js')!!}
<!-- Nice-select, sticky -->
{!! app('html')->script('Principal/assets/js/jquery.nice-select.min.js')!!}
{!! app('html')->script('Principal/assets/js/jquery.sticky.js')!!}

<!-- counter , waypoint,Hover Direction -->
{!! app('html')->script('Principal/assets/js/jquery.counterup.min.js')!!}
{!! app('html')->script('Principal/assets/js/waypoints.min.js')!!}
{!! app('html')->script('Principal/assets/js/jquery.countdown.min.js')!!}
{!! app('html')->script('Principal/assets/js/hover-direction-snake.min.js')!!}

<!-- contact js -->
{!! app('html')->script('Principal/assets/js/contact.js')!!}
{!! app('html')->script('Principal/assets/js/jquery.form.js')!!}
{!! app('html')->script('Principal/assets/js/jquery.validate.min.js')!!}
{!! app('html')->script('Principal/assets/js/mail-script.js')!!}
{!! app('html')->script('Principal/assets/js/jquery.ajaxchimp.min.js')!!}

<!-- Jquery Plugins, main Jquery -->
{!! app('html')->script('Principal/assets/js/plugins.js')!!}

{!! app('html')->script('js/dropdrop.js')!!}
</body>
</html>

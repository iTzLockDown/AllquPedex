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

    <div class="booking-area section-bg pt-120 pb-130" >
        <div class="container">
            <div class="row">
               <div class="col-sm-8 col-xs-12">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <td width="30%"> <strong style="font-size: 1.1em">     Informacion General</strong></td>
                                        <td width="30%"></td>
                                        <td width="15%"> <strong style="font-size: 1.1em">     Genealogia</strong></td>
                                        <td width="25%"></td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <div> <strong> Dueño:</strong></div>
                                            <div> <strong> Nombre Registrado:</strong> </div>
                                            <div> <strong>  Genero:</strong></div>
                                            <div> <strong>  Lugar de Nacimiento:</strong></div>
                                        </td>
                                        <td>
                                            <div>{{$mascota->apellidos}}, {{$mascota->name}}</div>
                                            <div>{{$mascota->nombre}}</div>
                                            <div>{{ $genero =$mascota->genero=='M'?'Macho':'Hembra'}}</div>
                                            <div>{{$mascota->lugarnac}}</div>
                                        </td>
                                        <td>
                                            <div> <strong> Padre:</strong></div>
                                            <div> <strong> Madre:</strong> </div>
                                        </td>
                                        <td>
                                            <div>{{$verificap=$mascota->nompadre==null?'No Registro':$mascota->nompadre}}</div>
                                            <div>{{$verificam=$mascota->nommadre==null?'No Registro':$mascota->nommadre}}</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong  style="font-size: 1.1em">Atributos Fisicos</strong></td>
                                        <td></td>
                                        <td><strong  style="font-size: 1.1em">Familia</strong></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div> <strong> Color:</strong></div>
                                            <div> <strong> Peso:</strong> </div>
                                            <div> <strong> Altura:</strong></div>
                                            <div> <strong> Descripcion:</strong></div>
                                        </td>
                                        <td>
                                            <div>{{$mascota->color}}</div>
                                            <div>{{$mascota->peso}}</div>
                                            <div>{{$mascota->alto}}</div>
                                            <div>{{$mascota->descripcion}}</div>
                                        </td>
                                        <td>
                                            <div> <strong> Decendencia:</strong></div>
                                            <br>
                                            <br>
                                            <div> <strong> Hemanos:</strong> </div>

                                        </td>
                                        <td>
                                            <div>
                                                <select name="" id="" class="form-control">
                                                    @foreach($TraerHijos as $hijo)
                                                        <option value="{{$hijo->id}}"> {{$hijo->nombre}} </option>
                                                    @endforeach

                                                </select>
                                            </div>
                                            <br>
                                            <div>
                                                <select name="" id="" class="form-control">
                                                    @foreach($TraerHermanos as $hermano)
                                                        <option value="{{$hermano->id}}"> {{$hermano->nombre}} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                <div class="col-sm-4 col-xs-12" style="vertical-align : middle;text-align:center;" id="imagenMascotaDetalle">
                                <a href="/images/{{$mascota->imagen}}" class="img-pop-up">
                                    <div class="single-gallery-image" style="background: url('/images/{{$mascota->imagen}}');"></div>
                                </a>
                            </div>
            </div>
            <hr>
            <br>

            <hr>
            <br>

            <div class="row justify-content-center">
                <div class="col-12">
                    <strong> <h1><center>Arbol Genealogico</center></h1></strong>
                    <table class="table">
                        <thead>
                        <tr>
                            <th id="thead" width="35%" rowspan="4" class="text-center"> Primera Generación</th>
                            <th id="thead" width="35%" class="text-center"> Segunda Generación</th>
                            <th id="thead" width="30%" class="text-center"> Tercera Generación</th>

                        </tr>
                        </thead>
                        <tbody>
                        <tr  style="vertical-align : middle;text-align:center;">


                            <td rowspan="4" style="vertical-align : middle;text-align:center;" >
                                @if($mascota->padreid!=null)
                                    <a href="/images/{{$mascota->imgpadre}}" class="img-pop-up">
                                        <div class="drakukeo1" style="background: url('/images/{{$mascota->imgpadre}}');"></div>
                                    </a>


                                    <div>
                                        <a style="color: #000" href="{{route('detalle.pedex.animal', array ($mascota->padreid))}}">{{$mascota->nompadre}}</a>
                                    </div>
                                @else
                                    <div>
                                        <strong>No hay se encuentra registrado</strong>
                                    </div>
                                @endif

                            </td>
                            <td rowspan="2" style="vertical-align : middle;text-align:center;" >
                                @if($TraerAPp!=null)
                                    <a href="/images/{{$TraerAPp->imagen}}" class="img-pop-up">
                                        <div class="drakukeo1" style="background: url('/images/{{$TraerAPp->imagen}}');"></div>
                                    </a>
                                    <div>
                                        <a style="color: #000" href="{{route('detalle.pedex.animal', array ($TraerAPp->id))}}">{{$TraerAPp->nombre}}</a>
                                    </div>
                                @else
                                    <div>
                                        <strong>No hay se encuentra registrado</strong>
                                    </div>
                                @endif
                            </td>
                            <td style="vertical-align : middle;text-align:center;" >
                                @if($Traer1!=null)
                                    <a href="/images/{{$Traer1->imagen}}" class="img-pop-up">
                                        <div class="drakukeo" style="background: url('/images/{{$Traer1->imagen}}');"></div>
                                    </a>
                                    <div id="drakukeo_sub">
                                        <a style="color: #000" href="{{route('detalle.pedex.animal', array ($Traer1->id))}}" >{{$Traer1->nombre}}</a>
                                    </div>
                                @else
                                    <div>
                                        <strong>No hay se encuentra registrado</strong>
                                    </div>
                                @endif</td>
                        </tr>
                        <tr  style="vertical-align : middle;text-align:center;">
                            <td style="vertical-align : middle;text-align:center;" >
                                @if($Traer2!=null)
                                    <a href="/images/{{$Traer2->imagen}}" class="img-pop-up">
                                        <div class="drakukeo" style="background: url('/images/{{$Traer2->imagen}}');"></div>
                                    </a>
                                    <div id="drakukeo_sub">
                                        <a style="color: #000" href="{{route('detalle.pedex.animal', array ($Traer2->id))}}" >{{$Traer2->nombre}}</a>
                                    </div>
                                @else
                                    <div>
                                        <strong>No hay se encuentra registrado</strong>
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr  style="vertical-align : middle;text-align:center;">


                            <td  rowspan="2" style="vertical-align : middle;text-align:center;" >
                                @if($TraerAPm!=null)
                                    <a href="/images/{{$TraerAPm->imagen}}" class="img-pop-up">
                                        <div class="drakukeo" style="background: url('/images/{{$TraerAPm->imagen}}');"></div>
                                    </a>
                                    <div>
                                        <a style="color: #000" href="{{route('detalle.pedex.animal', array ($TraerAPm->id))}}">{{$TraerAPm->nombre}}</a>
                                    </div>
                                @else
                                    <div>
                                        <strong>No hay se encuentra registrado</strong>
                                    </div>
                                @endif
                            </td>
                            <td style="vertical-align : middle;text-align:center;" >
                                @if($Traer3!=null)
                                    <a href="/images/{{$Traer3->imagen}}" class="img-pop-up">
                                        <div class="drakukeo" style="background: url('/images/{{$Traer3->imagen}}');"></div>
                                    </a>
                                    <div id="drakukeo_sub">
                                        <a style="color: #000" href="{{route('detalle.pedex.animal', array ($Traer3->id))}}" >{{$Traer3->nombre}}</a>
                                    </div>
                                @else
                                    <div>
                                        <strong>No hay se encuentra registrado</strong>
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr  style="vertical-align : middle;text-align:center;">


                            <td style="vertical-align : middle;text-align:center;" >
                                @if($Traer4!=null)
                                    <a href="/images/{{$Traer4->imagen}}" class="img-pop-up">
                                        <div class="drakukeo" style="background: url('/images/{{$Traer4->imagen}}');"></div>
                                    </a>
                                    <div id="drakukeo_sub">
                                        <a style="color: #000" href="{{route('detalle.pedex.animal', array ($Traer4->id))}}" >{{$Traer4->nombre}}</a>
                                    </div>
                                @else
                                    <div>
                                        <strong>No hay se encuentra registrado</strong>
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr  style="vertical-align : middle;text-align:center;">

                            <td rowspan="4" style="vertical-align : middle;text-align:center;">
                                @if($mascota->madreid!=null)
                                    <a href="/images/{{$mascota->imgmadre}}" class="img-pop-up">
                                        <div class="drakukeo1" style="background: url('/images/{{$mascota->imgmadre}}');"></div>
                                    </a>
                                    <div>
                                        <a style="color: #000" href="{{route('detalle.pedex.animal', array ($mascota->madreid))}}">{{$mascota->nommadre}}</a>
                                    </div>
                                @else
                                    <div>
                                        <strong>No hay se encuentra registrado</strong>
                                    </div>
                                @endif
                            </td>
                            <td  rowspan="2" style="vertical-align : middle;text-align:center;" >
                                @if($TraerAMp!=null)
                                    <a href="/images/{{$TraerAMp->imagen}}" class="img-pop-up">
                                        <div class="drakukeo1" style="background: url('/images/{{$TraerAMp->imagen}}');"></div>
                                    </a>
                                    <div>
                                        <a  style="color: #000" href="{{route('detalle.pedex.animal', array ($TraerAMp->id))}}">{{$TraerAMp->nombre}}</a>
                                    </div>
                                @else
                                    <div>
                                        <strong>No hay se encuentra registrado</strong>
                                    </div>
                                @endif
                            </td>
                            <td style="vertical-align : middle;text-align:center;" >
                                @if($Traer5!=null)
                                    <a href="/images/{{$Traer5->imagen}}" class="img-pop-up">
                                        <div class="drakukeo" style="background: url('/images/{{$Traer5->imagen}}');"></div>
                                    </a>
                                    <div id="drakukeo_sub">
                                        <a style="color: #000" href="{{route('detalle.pedex.animal', array ($Traer5->id))}}" >{{$Traer5->nombre}}</a>
                                    </div>
                                @else
                                    <div>
                                        <strong>No hay se encuentra registrado</strong>
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr  style="vertical-align : middle;text-align:center;">


                            <td style="vertical-align : middle;text-align:center;" >
                                @if($Traer6!=null)
                                    <a href="/images/{{$Traer6->imagen}}" class="img-pop-up">
                                        <div class="drakukeo" style="background: url('/images/{{$Traer6->imagen}}');"></div>
                                    </a>
                                    <div id="drakukeo_sub">
                                        <a style="color: #000" href="{{route('detalle.pedex.animal', array ($Traer6->id))}}" >{{$Traer6->nombre}}</a>
                                    </div>
                                @else
                                    <div>
                                        <strong>No hay se encuentra registrado</strong>
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr  style="vertical-align : middle;text-align:center;">


                            <td rowspan="2" style="vertical-align : middle;text-align:center;" >
                                @if($TraerAMm!=null)
                                    <a href="/images/{{$TraerAMm->imagen}}" class="img-pop-up">
                                        <div class="drakukeo1" style="background: url('/images/{{$TraerAMm->imagen}}');"></div>
                                    </a>
                                    <div>
                                        <a style="color: #000" href="{{route('detalle.pedex.animal', array ($TraerAMm->id))}}" >{{$TraerAMm->nombre}}</a>
                                    </div>
                                @else
                                    <div>
                                        <strong>No hay se encuentra registrado</strong>
                                    </div>
                                @endif
                            </td>
                            <td style="vertical-align : middle;text-align:center;" >
                                @if($Traer7!=null)
                                    <a href="/images/{{$Traer7->imagen}}" class="img-pop-up">
                                        <div class="drakukeo" style="background: url('/images/{{$Traer7->imagen}}');"></div>
                                    </a>
                                    <div id="drakukeo_sub">
                                        <a style="color: #000;" href="{{route('detalle.pedex.animal', array ($Traer7->id))}}" >{{$Traer7->nombre}}</a>
                                    </div>
                                @else
                                    <div>
                                        <strong>No hay se encuentra registrado</strong>
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr  style="vertical-align : middle;text-align:center;">
                            <td style="vertical-align : middle;text-align:center;" >
                                @if($Traer8!=null)
                                    <a href="/images/{{$Traer8->imagen}}" class="img-pop-up">
                                        <div class="drakukeo" style="background: url('/images/{{$Traer8->imagen}}');"></div>
                                    </a>
                                    <div id="drakukeo_sub">
                                        <a style="color: #000" href="{{route('detalle.pedex.animal', array ($Traer8->id))}}" >{{$Traer8->nombre}}</a>
                                    </div>
                                @else
                                    <div>
                                        <strong>No hay se encuentra registrado</strong>
                                    </div>
                                @endif
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection


@extends('layouts.principal')
@section('content')


<div class="booking-area section-bg pt-120 pb-130" >
    <div class="container">

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

@extends('layouts.app')

@section('content')
    <div class="card card-accent-dark">
        <div class="card-header">
            <i class="fa fa-check"></i> Detalle de {{$mascota->nombre}}

        </div>
        <style>

            #card {
                box-shadow: 0 8px 8px 10px rgba(87, 84, 84, 0.4);
                max-width: 250px;
                padding: 10px;
                margin: auto;
                text-align: center;
            }

            img {
                width: 80%;
                border: 1px solid black;
            }

            #designation {
                font-size: 14px;
            }

            #social {
                margin: 20px 0;
            }
        </style>
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
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
                    <div class="col-sm-4" id="imagenMascotaDetalle">
                        <img src="/images/{{$mascota->imagen}}" class="img-thumbnail" alt="">
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="card card-accent-dark">
        <div class="card-header">
            <i class="fa fa-check"></i>Arbol Genealogico de  {{$mascota->nombre}}

        </div>
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th width="33%" class="text-center"> Primera Generación</th>
                                <th width="33%" class="text-center"> Segunda Generación</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr>

                                <td rowspan="2" style="vertical-align : middle;text-align:center;">

                                    @if($mascota->padreid!=null)
                                        <img src="/images/{{$mascota->imgpadre}}" class="img-thumbnail" alt="">
                                        <div>
                                            <a href="{{route('puppey.detalle', array ($mascota->padreid))}}">{{$mascota->nompadre}}</a>
                                        </div>
                                    @else
                                        <div>
                                            <strong>No hay se encuentra registrado</strong>
                                        </div>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($TraerAPp!=null)
                                        <img src="/images/{{$TraerAPp->imagen}}" class="img-thumbnail" alt="">
                                        <div>
                                            <a href="{{route('puppey.detalle', array ($TraerAPp->id))}}">{{$TraerAPp->nombre}}</a>
                                        </div>
                                    @else
                                        <div>
                                            <strong>No hay se encuentra registrado</strong>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">
                                    @if($TraerAPm!=null)
                                        <img src="/images/{{$TraerAPm->imagen}}" class="img-thumbnail" alt="">
                                        <div>
                                            <a href="{{route('puppey.detalle', array ($TraerAPm->id))}}">{{$TraerAPm->nombre}}</a>
                                        </div>
                                    @else
                                        <div>
                                            <strong>No hay se encuentra registrado</strong>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td rowspan="2" style="vertical-align : middle;text-align:center;">

                                    @if($mascota->madreid!=null)
                                        <img src="/images/{{$mascota->imgmadre}}" class="img-thumbnail" alt="">
                                        <div>
                                            <a href="{{route('puppey.detalle', array ($mascota->madreid))}}">{{$mascota->nommadre}}</a>
                                        </div>
                                    @else
                                        <div>
                                            <strong>No hay se encuentra registrado</strong>
                                        </div>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($TraerAMp!=null)
                                        <img src="/images/{{$TraerAMp->imagen}}" class="img-thumbnail" alt="">
                                        <div>
                                            <a href="{{route('puppey.detalle', array ($TraerAMp->id))}}">{{$TraerAMp->nombre}}</a>
                                        </div>
                                    @else
                                        <div>
                                            <strong>No hay se encuentra registrado</strong>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">
                                    @if($TraerAMm!=null)
                                        <img src="/images/{{$TraerAMm->imagen}}" class="img-thumbnail" alt="">
                                        <div>
                                            <a href="{{route('puppey.detalle', array ($TraerAMm->id))}}">{{$TraerAMm->nombre}}</a>
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
    </div>
    @stop

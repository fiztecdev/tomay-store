@extends('layouts.admin')
@section('contenido')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            @if(Auth::check())
                @if(Auth::user()->type=='admin')
                    <h3>Lista de Paquetes Turísticos <a href="pqturistico/create">
                            <button class="btn btn-success">Nuevo</button>
                        </a></h3>
                @endif
            @else
                <h3>Los mejores Paquetes Turísticos</h3>
            @endif
            @include('store.pqturistico.search')
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                    <th>Id</th>
                    <th>Ruta</th>
                    <th>Costo S/</th>
                    <th>Duracion</th>
                    <th>Hotel</th>
                    <th>Restaurante</th>
                    <th>Destino</th>
                    <th>Promocion</th>
                    <th>Descuento</th>
                    @if(Auth::check())
                        @if(Auth::user()->type=='admin')
                            <th>Opciones</th>
                        @endif
                    @endif
                    </thead>
                    @foreach($pqturisticos as $pqturistico)
                        <tr>
                            <td>{{$pqturistico->id_paq}}</td>
                            <td>{{$pqturistico->ruta}}</td>
                            <td>S/ {{$pqturistico->costo}}</td>
                            <td>{{$pqturistico->duracion_dias}}</td>
                            <td>{{$pqturistico->hotel}}</td>
                            <td>{{$pqturistico->restaurante}}</td>
                            <td>{{$pqturistico->distino}}</td>
                            <td>
                                @if($pqturistico->promocion==1)
                                    <span class="badge btn-warning"><i class="fa fa-star"></i>En Promocion</span>
                                @else
                                    <span class="badge btn-linkedin">No Promocion</span>
                                @endif
                            </td>
                            <td>
                                <span class="badge badge">{{$pqturistico->descuento}} %</span>
                            </td>
                            @if(Auth::check())
                                @if(Auth::user()->type=='admin')
                                    <td>
                                        <a href="{{URL::action('PaqueteTuristicoController@edit',$pqturistico->id_paq)}}">
                                            <button class="btn btn-info"> <i class="fa fa-edit"></i>Editar</button>
                                        </a>
                                        <a href="" data-target="#modal-delete-{{$pqturistico->id_paq}}"
                                           data-toggle="modal">
                                            <button class="btn btn-danger">Eliminar</button>
                                        </a>
                                    </td>
                                @endif
                            @endif
                        </tr>
                        @include('store.pqturistico.modal')
                    @endforeach

                </table>

            </div>
            {{$pqturisticos->render()}}
        </div>
    </div>
@endsection
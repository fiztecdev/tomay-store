@extends('layouts.admin')
@section('contenido')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Lista de Paquetes Turísticos <a href="pqturistico/create"><button class="btn btn-success">Nuevo</button></a></h3>
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
                        <th>Costo $</th>
                        <th>Duracion</th>
                        <th>Hotel</th>
                        <th>Restaurante</th>
                        <th>Destino</th>
                        <th>Opciones</th>
                    </thead>
                    @foreach($pqturisticos as $pqturistico)
                        <tr>
                            <td>{{$pqturistico->id_paq}}</td>
                            <td>{{$pqturistico->ruta}}</td>
                            <td>{{$pqturistico->costo}}</td>
                            <td>{{$pqturistico->duracion_dias}}</td>
                            <td>{{$pqturistico->hotel}}</td>
                            <td>{{$pqturistico->restaurante}}</td>
                            <td>{{$pqturistico->distino}}</td>
                            <td>
                                <a href="{{URL::action('PaqueteTuristicoController@edit',$pqturistico->id_paq)}}"><button class="btn btn-info">Editar</button></a>
                                <a href="" data-target="#modal-delete-{{$pqturistico->id_paq}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                            </td>
                        </tr>
                        @include('store.pqturistico.modal')
                     @endforeach

                </table>

            </div>
            {{$pqturisticos->render()}}
        </div>

    </div>
@endsection
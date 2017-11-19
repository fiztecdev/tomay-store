@extends('layouts.admin')
@section('contenido')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Lista de Hoteles <a href="destino/create">
                    <button class="btn btn-success">Nuevo</button>
                </a></h3>
            @include('store.destino.search')
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                    <th>Id</th>
                    <th>Lugar</th>
                    <th>Descripcion</th>
                    <th>Imagen</th>
                    <th>Opciones</th>
                    </thead>
                    @foreach($destinos as $destino)
                        <tr>
                            <td>{{$destino->id_dis}}</td>
                            <td>{{$destino->lugar}}</td>
                            <td>{{$destino->descripcion}}</td>
                            <td>
                                <img src="{{asset('/imagenes/destinos/'.$destino->fotos)}}" alt="{{$destino->lugar}}"
                                     hight="100px" width="100px" class="img img-thumbnail">
                            </td>
                            <td>
                                <a href="{{URL::action('DestinoController@edit',$destino->id_dis)}}">
                                    <button class="btn btn-info">Editar</button>
                                </a>
                                <a href="" data-target="#modal-delete-{{$destino->id_dis}}" data-toggle="modal">
                                    <button class="btn btn-danger">Eliminar</button>
                                </a>
                            </td>
                        </tr>
                        @include('store.destino.modal')
                    @endforeach
                </table>

            </div>
            {{$destinos->render()}}
        </div>

    </div>
@endsection
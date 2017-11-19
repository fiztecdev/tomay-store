@extends('layouts.admin')
@section('contenido')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Lista de Hoteles <a href="hotel/create">
                    <button class="btn btn-success">Nuevo</button>
                </a></h3>
            @include('store.hotel.search')
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Ubicacion</th>
                    <th>Imagen</th>
                    <th>Opciones</th>
                    </thead>
                    @foreach($hoteles as $hotel)
                        <tr>
                            <td>{{$hotel->id_hot}}</td>
                            <td>{{$hotel->nombre}}</td>
                            <td>{{$hotel->ubicacion}}</td>
                            <td>
                                <img src="{{asset('/imagenes/hoteles/'.$hotel->fotos)}}" alt="{{$hotel->nombre}}"
                                     hight="100px" width="100px" class="img img-thumbnail">
                            </td>
                            <td>
                                <a href="{{URL::action('HotelController@edit',$hotel->id_hot)}}">
                                    <button class="btn btn-info">Editar</button>
                                </a>
                                <a href="" data-target="#modal-delete-{{$hotel->id_hot}}" data-toggle="modal">
                                    <button class="btn btn-danger">Eliminar</button>
                                </a>
                            </td>
                        </tr>
                        @include('store.hotel.modal')
                    @endforeach
                </table>

            </div>
            {{$hoteles->render()}}
        </div>

    </div>
@endsection
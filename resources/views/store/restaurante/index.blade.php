@extends('layouts.admin')
@section('contenido')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            @if(Auth::check())
                @if(Auth::user()->type=='admin')
                    <h3>Lista de Restaurantes <a href="restaurante/create">
                            <button class="btn btn-success">Nuevo</button>
                        </a></h3>
                @endif
            @else
                <h3>Los Mejores Restaurantes que tu quieras</h3>
            @endif
            @include('store.restaurante.search')
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
                    @if(Auth::check())
                        @if(Auth::user()->type=='admin')
                            <th>Opciones</th>
                        @endif
                    @endif
                    </thead>
                    @foreach($restaurantes as $restaurante)
                        <tr>
                            <td>{{$restaurante->id_res}}</td>
                            <td>{{$restaurante->nombre}}</td>
                            <td>{{$restaurante->ubicacion}}</td>
                            <td>
                                <img src="{{asset('/imagenes/restaurantes/'.$restaurante->fotos)}}"
                                     alt="{{$restaurante->nombre}}"
                                     hight="100px" width="100px" class="img img-thumbnail">
                            </td>
                            @if(Auth::check())
                                @if(Auth::user()->type=='admin')
                                    <td>
                                        <a href="{{URL::action('RestauranteController@edit',$restaurante->id_res)}}">
                                            <button class="btn btn-info">Editar</button>
                                        </a>
                                        <a href="" data-target="#modal-delete-{{$restaurante->id_res}}"
                                           data-toggle="modal">
                                            <button class="btn btn-danger">Eliminar</button>
                                        </a>
                                    </td>
                                @endif
                            @endif
                        </tr>
                        @include('store.restaurante.modal')
                    @endforeach
                </table>

            </div>
            {{$restaurantes->render()}}
        </div>
    </div>
@endsection
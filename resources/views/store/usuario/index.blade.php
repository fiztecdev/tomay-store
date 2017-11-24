@extends('layouts.admin')
@section('contenido')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            @if(Auth::user()->type=='admin')
                <h3>Lista de Usuarios <a href="usuario/create">
                        <button class="btn btn-success">Nuevo</button>
                    </a>
                </h3>
            @else
                <h3>Lista de Usuarios</h3>
            @endif
            @include('store.usuario.search')
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Imagen</th>
                    <th>Status</th>
                    @if(Auth::check())
                        @if(Auth::user()->type=='admin')
                            <th>Opciones</th>
                        @endif
                    @endif
                    </thead>
                    @foreach($usuarios as $usuario)
                        <tr>
                            <td>{{$usuario->id}}</td>
                            <td>{{$usuario->name}}</td>
                            <td>{{$usuario->email}}</td>
                            <td>{{$usuario->phone}}</td>
                            <td>
                                <img src="{{asset('/imagenes/usuarios/'.$usuario->image)}}" alt="{{$usuario->name}}"
                                     hight="100px" width="100px" class="img img-thumbnail">
                            </td>
                            <td>{{$usuario->status}}</td>
                            @if(Auth::check())
                                @if(Auth::user()->type=='admin')
                                    <td>
                                        <a href="{{URL::action('UsuarioController@edit',$usuario->id)}}">
                                            <button class="btn btn-info">Editar</button>
                                        </a>
                                        <a href="" data-target="#modal-delete-{{@$usuario->id}}" data-toggle="modal">
                                            <button class="btn btn-danger">Eliminar</button>
                                        </a>
                                    </td>
                                @endif
                            @endif
                        </tr>
                        @include('store.usuario.modal')
                    @endforeach

                </table>

            </div>
            {{$usuarios->render()}}
        </div>

    </div>
@endsection
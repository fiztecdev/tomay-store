@extends('layouts.admin')
@section('contenido')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Nuevo Paquete Turístico</h3>
            @if(count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
            {!! Form::open(array('url'=>'store/pqturistico', 'method'=>'POST', 'autocomplete'=>'off','files'=>true)) !!}
            {{Form::token()}}
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="nombre">Ruta</label>
                <input type="text" name="ruta" required value="{{old('ruta')}}" class="form-control" placeholder="Ruta">
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="email">Costo</label>
                <input type="number" name="costo"  required value="{{old('costo')}}" class="form-control" placeholder="Costo">
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="duracion_dias">Duración</label>
                <input type="text" name="duracion" required value="{{old('duracion_dias')}}"  class="form-control" placeholder="Duración">
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="restaurante">Restaurantes</label>
                <select name="restaurante" class="form-control">
                    @foreach($restaurantes as $restaurante)
                        <option value="{{$restaurante->id_res}}">{{$restaurante->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="hotel">Hoteles</label>
                <select name="hotel" class="form-control">
                    @foreach($hoteles as $hotel)
                        <option value="{{$hotel->id_hot}}">{{$restaurante->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="destino">Destinos</label>
                <select name="distino" class="form-control">
                    @foreach($destinos as $destino)
                        <option value="{{$destino->id_dis}}">{{$destino->lugar}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <button type="submit" class="btn btn-primary"> Guardar</button>
                <button type="reset" class="btn btn-danger">Cancelar</button>
            </div>
        </div>
    </div>

             {!! Form::close()!!}
@endsection
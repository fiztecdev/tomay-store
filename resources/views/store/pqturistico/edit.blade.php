@extends('layouts.admin')
@section('contenido')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Editar Paquete Turístico: {{$pqturistico->ruta}}</h3>
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
    {!! Form::model($pqturistico,['method'=>'PATCH', 'route'=>['pqturistico.update',$pqturistico->id_paq],'files'=>true]) !!}
    {{Form::token()}}
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="nombre">Ruta</label>
                <input type="text" name="ruta" required value="{{$pqturistico->ruta}}" class="form-control">
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="email">Costo</label>
                <div class="input-group">
                    <span class="input-group-addon">S/</span>
                    <input type="number" name="costo" step="any" required value="{{$pqturistico->costo}}" class="form-control">
                    <span class="input-group-addon">.00</span>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="duracion_dias">Duración</label>
                <input type="text" name="duracion" required value="{{$pqturistico->duracion_dias}}"
                       class="form-control">
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="restaurante">Restaurantes</label>
                <select name="restaurante" class="form-control">
                    @foreach($restaurantes as $restaurante)
                        @if($restaurante->id_res==$pqturistico->id_res)
                            <option value="{{$restaurante->id_res}}" selected>{{$restaurante->nombre}}</option>
                        @else
                            <option value="{{$restaurante->id_res}}">{{$restaurante->nombre}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="hotel">Hoteles</label>
                <select name="hotel" class="form-control">
                    @foreach($hoteles as $hotel)
                        @if($hotel->id_hot==$pqturistico->id_hot)
                            <option value="{{$hotel->id_hot}}" selected>{{$hotel->nombre}}</option>
                        @else
                            <option value="{{$hotel->id_hot}}">{{$hotel->nombre}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="destino">Destinos</label>
                <select name="destino" class="form-control">
                    @foreach($destinos as $destino)
                        @if($destino->id_dis==$pqturistico->id_dis)
                            <option value="{{$destino->id_dis}}" selected>{{$destino->lugar}}</option>
                        @else
                            <option value="{{$destino->id_dis}}">{{$destino->lugar}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <label clas>Promocionable</label>
                <label class=" form-inline form-group">
                    <input  type="radio" name="promocionable" id="promo" value="1" > SI
                </label>
                <label class="form-inline form-group">
                    <input  type="radio" name="promocionable" id="promo" value="0"> NO
                </label>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="descuento">Descuento</label>
                <div class="input-group">
                    <span class="input-group-addon">%</span>
                    <input type="number" name="descuento" step="any" max="100"  value="{{$pqturistico->descuento}}" class="form-control">
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="startpromocion">Inicio Promocion</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-calendar-times-o"></i></span>
                    <input type="datetime-local" value="{{$pqturistico->startpromo}}" name="startpromo"  class="form-control">
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="endpromocion">Fin Promocion</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-calendar-times-o"></i></span>
                    <input type="datetime-local" value="{{$pqturistico->endpromo}}" name="endpromo"  class="form-control">
                </div>
            </div>
        </div>

    </div>
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
            <button type="reset" class="btn btn-danger">Cancelar</button>
        </div>
    </div>
    {!! Form::close()!!}

@endsection
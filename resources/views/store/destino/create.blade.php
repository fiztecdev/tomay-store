@extends('layouts.admin')
@section('contenido')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Nuevo Destino</h3>
            @if(count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {!! Form::open(array('url'=>'store/destino', 'method'=>'POST', 'autocomplete'=>'off','files'=>true)) !!}
            {{Form::token()}}
            <div class="form-group">
                <label for="nombre">Lugar</label>
                <input type="text" name="lugar" class="form-control" value="{{old('lugar')}}" placeholder="Nombre">
            </div>
            <div class="form-group">
                <label for="ubicacion">Descripcion</label>
                <textarea name="descripcion" class="form-control"
                          placeholder="Descripcion">{{old('descripcion')}}</textarea>
            </div>
            <div class="form-group">
                <label for="image">Imagen</label>
                <input type="file" name="image" class="form-control" value="{{old('image')}}">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary"> Guardar</button>
                <button type="reset" class="btn btn-danger">Cancelar</button>
            </div>
            {!! Form::close()!!}
        </div>
    </div>

@endsection
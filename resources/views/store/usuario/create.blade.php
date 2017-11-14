@extends('layouts.admin')
@section('contenido')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Nuevo Usuario</h3>
            @if(count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {!! Form::open(array('url'=>'store/usuario', 'method'=>'POST', 'autocomplete'=>'off','files'=>true)) !!}
            {{Form::token()}}
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="name" class="form-control" placeholder="Nombre">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" class="form-control" placeholder="Phone">
                </div>
                <div class="form-group">
                    <label for="image">Imagen</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary"> Guardar</button>
                    <button type="reset" class="btn btn-danger">Cancelar</button>
                </div>
             {!! Form::close()!!}
        </div>
    </div>
@endsection
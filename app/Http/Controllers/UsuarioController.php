<?php

namespace apptour\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

use apptour\Http\Requests;
use apptour\Usuario;
use apptour\Http\Requests\UsuarioFormRequest;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{

    /**
     * UsuarioController constructor.
     */
    public function __construct()
    {
    }

    public function index(Request $request)
    {


        if ($request){
            $query=trim($request->get('searchText'));
            $usuarios=DB::table('usuarios')->where('name','LIKE','%'.$query.'%')
            ->where('status','=','1')
            ->orderBy('id','asc')
            ->paginate(7);
            return view('store.usuario.index',["usuarios"=>$usuarios],["searchText"=>$query]);
        }
        
    }

    public function create()
    {
        return view('store.usuario.create');
        
    }
    
    public function store(UsuarioFormRequest $request){
        $usuario=new Usuario;
        $usuario->name=$request->get('name');
        $usuario->email=$request->get('email');
        $usuario->phone=$request->get('phone');
        Log::debug("Antes de recibir la imagen");
        if (Input::hasFile('image')){
            $file=Input::file("image");
            Log::debug('Nombre de la Imagen: ');
            $file->move(public_path().'/imagenes/usuarios/',$file->getClientOriginalName());
            $usuario->image=$file->getClientOriginalName();

        }else{
            $usuario->image='init.png';
        }
        $usuario->save();
        return Redirect::to('store/usuario');

    }

    public function show($id)
    {
        return view("store.usuario.show",["usuario"=>Usuario::findOrFail($id)]);
        
    }
    public function edit($id)
    {
        return view("store.usuario.edit",["usuario"=>Usuario::findOrFail($id)]);
    }

    public function update(UsuarioFormRequest $request,$id)
    {
        $usuario=Usuario::findOrFail($id);
        $usuario->name=$request->get('name');
        $usuario->email=$request->get('email');
        $usuario->phone=$request->get('phone');
        if (Input::hasFile('image')){
            $file=Input::file("image");
            $file->move(public_path().'/imagenes/usuarios/',$file->getClientOriginalName());
            $usuario->image=$file->getClientOriginalName();

        }
        $usuario->update();

        return Redirect::to('store/usuario');
        

    }

    public function destroy($id)
    {
        $usuario=Usuario::findOrFail($id);
        $usuario->status='0';
        $usuario->update();
        return Redirect::to('store/usuario');
    }


}

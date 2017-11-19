<?php

namespace apptour\Http\Controllers;

use Illuminate\Http\Request;
use apptour\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use apptour\Http\Requests\DestinoFormRequest;
use apptour\Destino;
use DB;
class DestinoController extends Controller
{
    /**
     * DestinoController constructor.
     */
    public function __construct()
    {
    }

    public function index(Request $request)
    {

        if ($request){
            $query=trim($request->get('searchText'));
            $destinos=DB::table('distino')->where('lugar','LIKE','%'.$query.'%')
                ->where('estado','=','1')
                ->orderBy('id_dis','desc')
                ->paginate(7);
            return view('store.destino.index',["destinos"=>$destinos],["searchText"=>$query]);
        }

    }

    public function create()
    {
        return view('store.destino.create');

    }

    public function store(DestinoFormRequest $request){
        $destino=new Destino;
        $destino->lugar=$request->get('lugar');
        $destino->descripcion=$request->get('descripcion');
        if (Input::hasFile('image')){
            $file=Input::file("image");
            $file->move(public_path().'/imagenes/destinos',$file->getClientOriginalName());
            $destino->fotos=$file->getClientOriginalName();
        }else{
            $destino->fotos='destino.svg';
        }
        $destino->save();
        return Redirect::to('store/destino');

    }

    public function show($id)
    {
        return view("store.destino.show",["destino"=>Destino::findOrFail($id)]);

    }
    public function edit($id)
    {
        return view("store.destino.edit",["destino"=>Destino::findOrFail($id)]);
    }

    public function update(DestinoFormRequest $request,$id)
    {
        $destino=Destino::findOrFail($id);
        $destino->lugar=$request->get('lugar');
        $destino->descripcion=$request->get('descripcion');
        if (Input::hasFile('image')){
            $file=Input::file("image");
            $file->move(public_path().'/imagenes/destinos',$file->getClientOriginalName());
            $destino->fotos=$file->getClientOriginalName();
        }else{
            $destino->fotos='destino.svg';
        }
        $destino->update();
        return Redirect::to('store/destino');
    }

    public function destroy($id)
    {
        $destino=Destino::findOrFail($id);
        $destino->estado='0';
        $destino->update();
        return Redirect::to('store/destino');
    }
}

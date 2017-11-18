<?php

namespace apptour\Http\Controllers;

use Illuminate\Http\Request;
use apptour\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use apptour\Http\Requests\PaqueteTuristicoFormRequest;
use apptour\PaqueteTuristico;
use DB;

class PaqueteTuristicoController extends Controller
{


    /**
     * PaqueteTuristicoController constructor.
     */
    public function __construct()
    {
    }

    public function index(Request $request)
    {


        if ($request){
            $query=trim($request->get('searchText'));
            $pqturisticos=DB::table('pq_turistico as pq')
                ->join('restaurante as res','pq.id_res','=','res.id_res')
                ->join('distino as dis','pq.id_dis','=','dis.id_dis')
                ->join('hotel as hot','pq.id_hot','=','hot.id_hot')
                ->select('pq.id_paq','pq.ruta','pq.costo','pq.duracion_dias','res.nombre as restaurante', 'dis.lugar as distino','hot.nombre as hotel')
                ->where('pq.ruta','LIKE','%'.$query.'%')
                ->where('estado','=','1')
                ->orderBy('pq.id_paq','desc')
                ->paginate(7);
            return view('store.pqturistico.index',["pqturisticos"=>$pqturisticos],["searchText"=>$query]);
        }

    }

    public function create()
    {
        $restaurantes=DB::table('restaurante')->get();
        $distinos=DB::table('distino')->get();
        $hoteles=DB::table('hotel')->get();
        return view('store.pqturistico.create',['restaurantes'=>$restaurantes,'distinos'=>$distinos, 'hoteles'=>$hoteles]);

    }

    public function store(PaqueteTuristicoFormRequest $request){
        $pqturistico=new PaqueteTuristico();
        $pqturistico->ruta=$request->get('ruta');
        $pqturistico->costo=$request->get('costo');
        $pqturistico->duracion_dias=$request->get('duracion');
        $pqturistico->id_hot=$request->get('hotel');
        $pqturistico->id_res=$request->get('restaurante');
        $pqturistico->id_dis=$request->get('distino');
        $pqturistico->save();
        return Redirect::to('store/pqturistico');

    }

    public function show($id)
    {
        return view("store.pqturistico.show",["pqturistico"=>PaqueteTuristico::findOrFail($id)]);

    }
    public function edit($id)
    {
        $pqturistico=PaqueteTuristico::findOrFail($id);
        $restaurantes=DB::table('restaurante')->get();
        $distinos=DB::table('distino')->get();
        $hoteles=DB::table('hotel')->get();
        return view("store.pqturistico.edit",['pqturistico'=>$pqturistico,'restaurantes'=>$restaurantes,'distinos'=>$distinos,'hoteles'=>$hoteles ]);
    }

    public function update(PaqueteTuristicoFormRequest $request,$id)
    {
        $pqturistico=PaqueteTuristico::findOrFail($id);
        $pqturistico->ruta=$request->get('ruta');
        $pqturistico->costo=$request->get('costo');
        $pqturistico->duracion_dias=$request->get('duracion');
        $pqturistico->id_hot=$request->get('hotel');
        $pqturistico->id_res=$request->get('restaurante');
        $pqturistico->id_dis=$request->get('distino');
        $pqturistico->update();

        return Redirect::to('store/pqturistico');


    }

    public function destroy($id)
    {
        $pqturistico=PaqueteTuristico::findOrFail($id);
        $pqturistico->estado='0';
        $pqturistico->update();
        return Redirect::to('store/pqturistico');
    }

}

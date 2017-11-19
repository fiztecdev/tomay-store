<?php

namespace apptour\Http\Controllers;

use Illuminate\Http\Request;
use apptour\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use apptour\Http\Requests\HotelFormRequest;
use apptour\Hotel;
use DB;

class HotelController extends Controller
{
    /**
     * HotelController constructor.
     */
    public function __construct()
    {
    }

    public function index(Request $request)
    {

        if ($request){
            $query=trim($request->get('searchText'));
            $hoteles=DB::table('hotel')->where('nombre','LIKE','%'.$query.'%')
                ->where('estado','=','1')
                ->orderBy('id_hot','desc')
                ->paginate(7);
            return view('store.hotel.index',["hoteles"=>$hoteles],["searchText"=>$query]);
        }

    }

    public function create()
    {
        return view('store.hotel.create');

    }

    public function store(HotelFormRequest $request){
        $hotel=new Hotel;
        $hotel->nombre=$request->get('nombre');
        $hotel->ubicacion=$request->get('ubicacion');
        $hotel->descripcion=$request->get('descripcion');
        if (Input::hasFile('image')){
            $file=Input::file("image");
            $file->move(public_path().'/imagenes/hoteles',$file->getClientOriginalName());
            $hotel->fotos=$file->getClientOriginalName();
        }else{
            $hotel->fotos='hotel.svg';
        }
        $hotel->save();
        return Redirect::to('store/hotel');

    }

    public function show($id)
    {
        return view("store.hotel.show",["hotel"=>Hotel::findOrFail($id)]);

    }
    public function edit($id)
    {
        return view("store.hotel.edit",["hotel"=>Hotel::findOrFail($id)]);
    }

    public function update(HotelFormRequest $request,$id)
    {
        $hotel=Hotel::findOrFail($id);
        $hotel->nombre=$request->get('nombre');
        $hotel->ubicacion=$request->get('ubicacion');
        $hotel->descripcion=$request->get('descripcion');
        if (Input::hasFile('image')){
            $file=Input::file("image");
            $file->move(public_path().'/imagenes/hoteles',$file->getClientOriginalName());
            $hotel->fotos=$file->getClientOriginalName();

        }else{
            $hotel->fotos='hotel.svg';
        }
        $hotel->update();
        return Redirect::to('store/hotel');
    }

    public function destroy($id)
    {
        $hotel=Hotel::findOrFail($id);
        $hotel->estado='0';
        $hotel->update();
        return Redirect::to('store/hotel');
    }

}

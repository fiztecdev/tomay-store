<?php

namespace apptour\Http\Controllers;

use Illuminate\Http\Request;
use  apptour\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use apptour\Http\Requests\RestauranteFormRequest;
use apptour\Restaurante;
use DB;

class RestauranteController extends Controller
{
    /**
     * RestauranteController constructor.
     */
    public function __construct()
    {
    }

    public function index(Request $request)
    {

        if ($request) {
            $query = trim($request->get('searchText'));
            $restaurantes = DB::table('restaurante')->where('nombre', 'LIKE', '%' . $query . '%')
                ->where('estado', '=', '1')
                ->orderBy('id_res', 'desc')
                ->paginate(7);
            return view('store.restaurante.index', ["restaurantes" => $restaurantes], ["searchText" => $query]);
        }
    }

    public function create()
    {
        return view('store.restaurante.create');

    }

    public function store(RestauranteFormRequest $request)
    {
        $restaurante = new Restaurante;
        $restaurante->nombre = $request->get('nombre');
        $restaurante->ubicacion = $request->get('ubicacion');
        $restaurante->descripcion = $request->get('descripcion');
        if (Input::hasFile('image')) {
            $file = Input::file("image");
            $file->move(public_path() . '/imagenes/restaurantes', $file->getClientOriginalName());
            $restaurante->fotos = $file->getClientOriginalName();
        } else {
            $restaurante->fotos = 'hotel.svg';
        }
        $restaurante->save();
        return Redirect::to('store/restaurante');

    }

    public function show($id)
    {
        return view("store.restaurante.show", ["restaurante" => Restaurante::findOrFail($id)]);

    }

    public function edit($id)
    {
        return view("store.restaurante.edit", ["restaurante" => Restaurante::findOrFail($id)]);
    }

    public function update(RestauranteFormRequest $request, $id)
    {
        $restaurante = Restaurante::findOrFail($id);
        $restaurante->nombre = $request->get('nombre');
        $restaurante->ubicacion = $request->get('ubicacion');
        $restaurante->descripcion = $request->get('descripcion');
        if (Input::hasFile('image')) {
            $file = Input::file("image");
            $file->move(public_path() . '/imagenes/restaurantes', $file->getClientOriginalName());
            $restaurante->fotos = $file->getClientOriginalName();
        } else {
            $restaurante->fotos = 'hotel.svg';
        }
        $restaurante->update();
        return Redirect::to('store/restaurante');
    }

    public function destroy($id)
    {
        $restaurante = Restaurante::findOrFail($id);
        $restaurante->estado = '0';
        $restaurante->update();
        return Redirect::to('store/restaurante');
    }
}

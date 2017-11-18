<?php

namespace apptour;

use Illuminate\Database\Eloquent\Model;

class Restaurante extends Model
{
    //
    protected $table="restaurante";
    protected $primaryKey="id_res";

    public $timestamps=false;

    protected $fillable=[
        'nombre',
        'ubicacion',
        'fotos'
    ];
    protected $guarded=[

    ];
}

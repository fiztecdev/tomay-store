<?php

namespace apptour;

use Illuminate\Database\Eloquent\Model;

class Destino extends Model
{
    //
    protected $table="distino";
    protected $primaryKey="id_dis";

    public $timestamps=false;

    protected $fillable=[
        'lugar',
        'descripcion',
        'fotos'
    ];
    protected $guarded=[

    ];
}

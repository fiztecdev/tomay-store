<?php

namespace apptour;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    //
    protected $table="hotel";
    protected $primaryKey="id_hot";

    public $timestamps=false;

    protected $fillable=[
        'nombre',
        'ubicacion',
        'fotos'
    ];
    protected $guarded=[

    ];
}

<?php

namespace apptour;

use Illuminate\Database\Eloquent\Model;

class PaqueteTuristico extends Model
{
    //
    protected $table="pq_turistico";
    protected $primaryKey="id_pq";

    public $timestamps=false;

    protected $fillable=[
        'ruta',
        'costo',
        'duracion_dias',
        'id_hot',
        'id_res',
        'id_dis',
        'estado'
    ];
    protected $guarded=[

    ];
}

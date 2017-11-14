<?php

namespace apptour;

use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    //
    protected $table="administrador";
    protected $primaryKey="idadmin";

    public $timestamps=false;

    protected $fillable=[
        'username',
        'nombre',
        'password',
        'status',
        'image'
    ];
    protected $guarded=[

    ];
}

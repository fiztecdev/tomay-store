<?php

namespace apptour;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table="usuarios";
    protected $primaryKey="id";

    public $timestamps=false;

    protected $fillable=[
        'name',
        'email',
        'phone',
        'status',
        'image'
    ];
    protected $guarded=[

    ];
}

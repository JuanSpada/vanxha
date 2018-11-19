<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $guarded = [];

    public function scopeSearch($query, $s)
    {
        return $query->where('nombrePersona', 'LIKE', "%$s%");
    }

    public function scopeEstado($query, $e)
    {
        if ($e != '' && isset($e)){

            return $query->where('estado', $e);
        }
    }
}

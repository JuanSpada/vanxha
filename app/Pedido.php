<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $guarded = [];

    function estado() {
        $array = ['Nuevo', 'En Taller', 'Entregado'];
        return $array[$this->estado];
    }
    function estadoColor() {
        $array = ['badge-primary', 'badge-warning', 'badge-success'];
        return $array[$this->estado];
    }
}

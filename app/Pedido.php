<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $guarded = [];

    function estado() {
        $array = ['nuevo', 'en taller', 'entregado'];
        return $array[$this->estado];
    }
    function estadoColor() {
        $array = ['badge-primary', 'warning', 'badge-success'];
        return $array[$this->estado];
    }
}

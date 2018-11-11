<?php

use Faker\Generator as Faker;
use App\Pedido;

$factory->define(App\Pedido::class, function (Faker $faker) {
    return [
        'userid' => 1,
        'nombrePersona' => $faker->firstName,
        'telefono' => $faker->phoneNumber,
        'fechaEntrega' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'descripcion' => $faker->paragraph(5),
        'precio' => $faker->numberBetween(5000, 30000)
    ];
});

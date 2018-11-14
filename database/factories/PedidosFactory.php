<?php

use Faker\Generator as Faker;
use App\Pedido;

$factory->define(App\Pedido::class, function (Faker $faker) {
    return [
        'userid' => 1,
        'nombrePersona' => $faker->name,
        'telefono' => $faker->e164PhoneNumber,
        // 'fechaEntrega' => $faker->date($format = 'Y-m-d'),
        'fechaEntrega' => $faker-> dateTimeBetween($startDate = '-1 month', $endDate = 'now'),
        'descripcion' => $faker->paragraph(1),
        'precio' => $faker->numberBetween(5000, 30000),
        'estado' => $faker->numberBetween(0, 2)
    ];
});

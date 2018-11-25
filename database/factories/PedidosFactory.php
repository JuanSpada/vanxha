<?php

use Faker\Generator as Faker;
use App\Pedido;

$factory->define(App\Pedido::class, function (Faker $faker) {
    return [
        'empresaId' => $faker->numberBetween(1, 3),
        'nombrePersona' => $faker->name,
        'telefono' => $faker->e164PhoneNumber,
        // 'fechaEntrega' => $faker->date($format = 'Y-m-d'),
        'fechaEntrega' => $faker-> dateTimeBetween($startDate = '-1 month', $endDate = 'now'),
        'descripcion' => $faker->paragraph(1),
        'precio' => $faker->numberBetween(5000, 30000),
        'costo' => $faker->numberBetween(5000, 15000),
        'estado' => $faker->numberBetween(1, 3),
    ];
});

<?php

use Illuminate\Database\Seeder;
use App\Pedido;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        $pedido = factory(Pedido::class, 20);
        $pedido->create();
    }
}

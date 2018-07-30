<?php

use Illuminate\Database\Seeder;

class PesertasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Peserta::class, 50)->create();
    }
}

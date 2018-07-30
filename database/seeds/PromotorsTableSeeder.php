<?php

use Illuminate\Database\Seeder;

class PromotorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Promotor::class, 50)->create();
    }
}

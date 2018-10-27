<?php

use Illuminate\Database\Seeder;

class RepairsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\Model\Repair::class, 50)->create();
    }
}

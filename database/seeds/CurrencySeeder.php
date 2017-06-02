<?php

use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('currencies')->delete();

        DB::table('currencies')->insert([
            ['name' => 'USD', 'ratio' => 1.00],
            ['name' => 'EUR', 'ratio' => 0.89],
            ['name' => 'MDL', 'ratio' => 18.34]
        ]);
    }
}

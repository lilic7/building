<?php

use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('colors')->delete();

        DB::table('colors')->insert([
            [
                'color' => 'white',
                'price' => 16
            ],
            [
                'color' => 'black',
                'price' => 18
            ],
            [
                'color' => 'brown',
                'price' => 20
            ]
        ]);
    }
}

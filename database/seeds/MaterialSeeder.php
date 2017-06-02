<?php

use Illuminate\Database\Seeder;


class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('materials')->delete();

        DB::table('materials')->insert([
            [
                'material'  => 'metal',
                'price'     => 120
            ],[
                'material'  => 'wood',
                'price'     => 85
            ],[
                'material'  => 'metaloplast',
                'price'     => 53
            ],
        ]);
    }
}

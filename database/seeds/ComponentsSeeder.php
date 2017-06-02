<?php

use Illuminate\Database\Seeder;

class ComponentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('components')->delete();

        DB::table('components')->insert([
            ['component' => 'door', 'price' => 245],
            ['component' => 'window', 'price' => 185],
        ]);
    }
}

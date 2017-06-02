<?php

use Illuminate\Database\Seeder;

class BuildingCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('building_categories')->delete();

        DB::table('building_categories')->insert([
            ['category' => 'residential'],
            ['category' => 'office'],
            ['category' => 'government'],
            ['category' => 'health'],
            ['category' => 'education'],
            ['category' => 'hotel'],
            ['category' => 'retail'],
            ['category' => 'storage'],
            ['category' => 'sport'],
            ['category' => 'leisure'],
            ['category' => 'parking']
        ]);
    }
}

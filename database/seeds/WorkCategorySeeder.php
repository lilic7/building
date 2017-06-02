<?php

use Illuminate\Database\Seeder;

class WorkCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('work_categories')->delete();

        DB::table('work_categories')->insert([
            ['category' => 'Foundation & Floor', 'short_name' => 'foundation'],
            ['category' => 'Exterior Walls', 'short_name' => 'walls'],
            ['category' => 'Exterior Finish', 'short_name' => 'ext_finish'],
            ['category' => 'Roof & Soffit', 'short_name' => 'roof'],
            ['category' => 'Interior Finish', 'short_name' => 'int_finish'],
            ['category' => 'Floor Finish', 'short_name' => 'floor_finish'],
            ['category' => 'Central heating and cooling type', 'short_name' => 'climate'],
        ]);
    }
}

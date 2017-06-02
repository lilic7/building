<?php

use Illuminate\Database\Seeder;

class WorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('works')->delete();


        $foundation = DB::table('work_categories')->select('id')
                                ->where('category', 'Foundation & Floor')
                                ->first();
        $walls      = DB::table('work_categories')->select('id')
                                ->where('category', 'Exterior Walls')
                                ->first();
        $ext_finish = DB::table('work_categories')->select('id')
                                ->where('category', 'Exterior Finish')
                                ->first();
        $int_finish = DB::table('work_categories')->select('id')
                                ->where('category', 'Interior Finish')
                                ->first();
        $roof       = DB::table('work_categories')->select('id')
                                ->where('category', 'Roof & Soffit')
                                ->first();
        $floor      = DB::table('work_categories')->select('id')
                                ->where('category', 'Floor Finish')
                                ->first();
        $heating    = DB::table('work_categories')->select('id')
                                ->where('category', 'Central heating and cooling type')
                                ->first();

        DB::table('works')->insert([
            [
                'category_id' => $foundation->id,
                'class' => 1,
                'title' => 'Engineered reinforced concrete',
                'price' => 3200
            ],[
                'category_id' => $foundation->id,
                'class' => 2,
                'title' => 'Reinforced concrete foundation',
                'price' => 2780
            ],[
                'category_id' => $foundation->id,
                'class' => 3,
                'title' => 'Reinforced concrete or concrete block foundation',
                'price' => 2300
            ],[
                'category_id' => $foundation->id,
                'class' => 4,
                'title' => 'Thickened edge slab on grade',
                'price' => 1625
            ],[
                'category_id' => $walls->id,
                'class' => 1,
                'title' => 'Very irregular walls with parapets and decorative openings',
                'price' => 4900
            ],[
                'category_id' => $walls->id,
                'class' => 2,
                'title' => 'Irregular walls, some parapets, large openings',
                'price' => 4050
            ],[
                'category_id' => $walls->id,
                'class' => 3,
                'title' => 'Several wall offsets and architectural details',
                'price' => 3800
            ],[
                'category_id' => $walls->id,
                'class' => 4,
                'title' => 'Few changes in wall height or decorative details',
                'price' => 3200
            ],[
                'category_id' => $walls->id,
                'class' => 5,
                'title' => 'Regular perimeter walls, some decorative details',
                'price' => 2930
            ],[
                'category_id' => $walls->id,
                'class' => 6,
                'title' => 'Regular perimeter walls, no decorative details',
                'price' => 2600
            ],[
                'category_id' => $ext_finish->id,
                'class' => 1,
                'title' => 'Stone or good masonry veneer on most surfaces',
                'price' => 5200
            ],[
                'category_id' => $ext_finish->id,
                'class' => 2,
                'title' => 'Masonry or cultured stone veneer on most surfaces',
                'price' => 4840
            ],[
                'category_id' => $ext_finish->id,
                'class' => 3,
                'title' => 'Stone or masonry accents on front exposures',
                'price' => 4360
            ],[
                'category_id' => $ext_finish->id,
                'class' => 4,
                'title' => 'Good stucco or textured siding',
                'price' => 3900
            ],[
                'category_id' => $ext_finish->id,
                'class' => 5,
                'title' => 'Average stucco, EIFS, plank or panel siding',
                'price' => 3470
            ],[
                'category_id' => $ext_finish->id,
                'class' => 6,
                'title' => 'Hardboard or vinyl siding or inexpensive stucco',
                'price' => 2700
            ],[
                'category_id' => $roof->id,
                'class' => 1,
                'title' => 'Complex roof plan. Slate or metal cover',
                'price' => 4700
            ],[
                'category_id' => $roof->id,
                'class' => 2,
                'title' => 'Multi-level slate, tile or flat surface with parapet walls',
                'price' => 4350
            ],[
                'category_id' => $roof->id,
                'class' => 3,
                'title' => 'Multi-pitch tile or shake roof',
                'price' => 4000
            ],[
                'category_id' => $roof->id,
                'class' => 4,
                'title' => 'Dual pitch roof with better wood shingles or shakes or concrete tile',
                'price' => 3750
            ],[
                'category_id' => $roof->id,
                'class' => 5,
                'title' => 'Dual pitch roof with built-up or architectural composition shingle roof cover',
                'price' => 3450
            ],[
                'category_id' => $roof->id,
                'class' => 6,
                'title' => 'Simple roof plan with minimum composition shingle or built-up roof cover',
                'price' => 3100
            ],[
                'category_id' => $int_finish->id,
                'class' => 1,
                'title' => 'Architectural ceiling detail',
                'price' => 5000
            ],[
                'category_id' => $int_finish->id,
                'class' => 2,
                'title' => 'Irregular walls and decorative details',
                'price' => 4000
            ],[
                'category_id' => $int_finish->id,
                'class' => 3,
                'title' => 'Textured gypboard or low-cost plaster',
                'price' => 3300
            ],[
                'category_id' => $int_finish->id,
                'class' => 4,
                'title' => 'Textured average quality gypboard',
                'price' => 2950
            ],[
                'category_id' => $int_finish->id,
                'class' => 5,
                'title' => 'Few decorative details',
                'price' => 2500
            ],[
                'category_id' => $floor->id,
                'class' => 1,
                'title' => 'Terrazzo, marble, granite, best hardwood or luxury carpet throughout',
                'price' => 2700
            ],[
                'category_id' => $floor->id,
                'class' => 2,
                'title' => 'Marble or granite entry. Hardwood, good carpet, top grade sheet vinyl or cultured stone elsewhere',
                'price' => 2200
            ],[
                'category_id' => $floor->id,
                'class' => 3,
                'title' => 'Simulated marble or stone entry. Good carpet, hardwood, parquet or sheet vinyl elsewhere',
                'price' => 1850
            ],[
                'category_id' => $floor->id,
                'class' => 4,
                'title' => 'Masonry or tile at entry. Better sheet vinyl or average carpet elsewhere',
                'price' => 1570
            ],[
                'category_id' => $floor->id,
                'class' => 5,
                'title' => 'Good sheet vinyl or standard carpet in most rooms. Small area of tile or hardwood at entry',
                'price' => 1200
            ],[
                'category_id' => $floor->id,
                'class' => 6,
                'title' => 'Composition tile, minimum grade sheet vinyl or utility grade nylon carpet',
                'price' => 990
            ],[
                'category_id' => $heating->id,
                'class' => 0,
                'title' => 'Forced air central ducted heating only',
                'price' => 990
            ],[
                'category_id' => $heating->id,
                'class' => 0,
                'title' => 'Forced air central ducted heating and cooling',
                'price' => 1300
            ],[
                'category_id' => $heating->id,
                'class' => 0,
                'title' => 'Ducted gravity heat',
                'price' => 2000
            ],[
                'category_id' => $heating->id,
                'class' => 0,
                'title' => 'Circulating hot and cold water system',
                'price' => 2400
            ],
        ]);
    }
}

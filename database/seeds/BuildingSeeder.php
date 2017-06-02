<?php

use Illuminate\Database\Seeder;
use App\BuildingCategory;
class BuildingSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('buildings')->delete();

        $residentialID  = DB::table('building_categories')->select('id')->where('category', 'residential')->first();
        $officeID       = DB::table('building_categories')->select('id')->where('category', 'office')->first();
        $governmentID   = DB::table('building_categories')->select('id')->where('category', 'government')->first();
        $healthID       = DB::table('building_categories')->select('id')->where('category', 'health')->first();
        $educationID    = DB::table('building_categories')->select('id')->where('category', 'education')->first();
        $hotelID        = DB::table('building_categories')->select('id')->where('category', 'hotel')->first();
        $retailID       = DB::table('building_categories')->select('id')->where('category', 'retail')->first();
        $storageID      = DB::table('building_categories')->select('id')->where('category', 'storage')->first();
        $sportID        = DB::table('building_categories')->select('id')->where('category', 'sport')->first();
        $leisureID      = DB::table('building_categories')->select('id')->where('category', 'leisure')->first();
        $parkingID      = DB::table('building_categories')->select('id')->where('category', 'parking')->first();

        DB::table('buildings')->insert([
            [
                'category_id'   => $residentialID->id,
                'type'          => 'Estate house, 3 floors',
                'price'         => 10000
            ],
            [
                'category_id'   => $residentialID->id,
                'type'          => 'Detached (2-3 bedrooms)',
                'price'         => 12000
            ],
            [
                'category_id'   => $residentialID->id,
                'type'          => 'Terraced house',
                'price'         => 14000
            ],
            [
                'category_id'   => $residentialID->id,
                'type'          => 'Residential block (2-3 floors)',
                'price'         => 16000
            ],
            [
                'category_id'   => $residentialID->id,
                'type'          => 'Residential block (4-6 floors)',
                'price'         => 18000
            ],
            [
                'category_id'   => $residentialID->id,
                'type'          => 'Residential block (7-12 floors)',
                'price'         => 20000
            ],
            [
                'category_id'   => $residentialID->id,
                'type'          => 'Residential block (high rise)',
                'price'         => 22000
            ],
            [
                'category_id'   => $residentialID->id,
                'type'          => 'Halls of residence (Student accommodation)',
                'price'         => 24000
            ],
            [
                'category_id'   => $residentialID->id,
                'type'          => 'Retirement accomodation',
                'price'         => 26000
            ],
            [
                'category_id'   => $officeID->id,
                'type'          => 'Office block (1-2 floors)',
                'price'         => 7000
            ],
            [
                'category_id'   => $officeID->id,
                'type'          => 'Office block (3-5 floors)',
                'price'         => 9000
            ],
            [
                'category_id'   => $officeID->id,
                'type'          => 'Office block (6-9 floors)',
                'price'         => 11000
            ],
            [
                'category_id'   => $officeID->id,
                'type'          => 'Office block (10-12 floors)',
                'price'         => 15000
            ],
            [
                'category_id'   => $officeID->id,
                'type'          => 'Office block (high rise)',
                'price'         => 17000
            ],
            [
                'category_id'   => $officeID->id,
                'type'          => 'Minor office refurbishment',
                'price'         => 19000
            ],
            [
                'category_id'   => $officeID->id,
                'type'          => 'Cat.A office fit-out',
                'price'         => 21000
            ],
            [
                'category_id'   => $governmentID->id,
                'type'          => 'Local administration building',
                'price'         => 50000
            ],[
                'category_id'   => $governmentID->id,
                'type'          => 'Law courts',
                'price'         => 30000
            ],[
                'category_id'   => $governmentID->id,
                'type'          => 'Police station',
                'price'         => 40000
            ],[
                'category_id'   => $governmentID->id,
                'type'          => 'Fire station',
                'price'         => 45000
            ],[
                'category_id'   => $healthID->id,
                'type'          => 'Ambulance station',
                'price'         => 60000
            ],[
                'category_id'   => $healthID->id,
                'type'          => 'District hospital',
                'price'         => 80000
            ],[
                'category_id'   => $healthID->id,
                'type'          => 'University hospital',
                'price'         => 85000
            ],[
                'category_id'   => $healthID->id,
                'type'          => 'Health centre',
                'price'         => 90000
            ],[
                'category_id'   => $healthID->id,
                'type'          => 'Nursing homes',
                'price'         => 45000
            ],[
                'category_id'   => $educationID->id,
                'type'          => 'Nursery school',
                'price'         => 50000
            ],[
                'category_id'   => $educationID->id,
                'type'          => 'Primary school',
                'price'         => 60000
            ],[
                'category_id'   => $educationID->id,
                'type'          => 'Academy',
                'price'         => 80000
            ],[
                'category_id'   => $educationID->id,
                'type'          => 'University',
                'price'         => 100000
            ],[
                'category_id'   => $hotelID->id,
                'type'          => 'Budget hotel',
                'price'         => 300000
            ],[
                'category_id'   => $hotelID->id,
                'type'          => 'Hotel, 3 star',
                'price'         => 450000
            ],[
                'category_id'   => $hotelID->id,
                'type'          => 'Hotel, 4 star',
                'price'         => 600000
            ],[
                'category_id'   => $hotelID->id,
                'type'          => 'Hotel, 5 star',
                'price'         => 500000
            ],[
                'category_id'   => $hotelID->id,
                'type'          => 'Hotel Refurbishment',
                'price'         => 600000
            ],[
                'category_id'   => $hotelID->id,
                'type'          => 'Hotel fit-out',
                'price'         => 500000
            ],[
                'category_id'   => $retailID->id,
                'type'          => 'Small supermarket (local)',
                'price'         => 70000
            ],[
                'category_id'   => $retailID->id,
                'type'          => 'Large supermarket',
                'price'         => 85000
            ],[
                'category_id'   => $retailID->id,
                'type'          => 'Shopping centre - enclosed mall',
                'price'         => 100000
            ],[
                'category_id'   => $retailID->id,
                'type'          => 'Shopping centre - open urban plan',
                'price'         => 110000
            ],[
                'category_id'   => $retailID->id,
                'type'          => 'Retail warehouse',
                'price'         => 140000
            ],[
                'category_id'   => $retailID->id,
                'type'          => 'Furniture warehouse',
                'price'         => 1600000
            ],[
                'category_id'   => $retailID->id,
                'type'          => 'Large supermarket refurb',
                'price'         => 170000
            ],[
                'category_id'   => $retailID->id,
                'type'          => 'Extra large supermarket refurb',
                'price'         => 1800000
            ],[
                'category_id'   => $storageID->id,
                'type'          => 'Warehouse (< 5,000 m2)',
                'price'         => 80000
            ],[
                'category_id'   => $storageID->id,
                'type'          => 'Warehouse (> 5,000 m2)',
                'price'         => 150000
            ],[
                'category_id'   => $storageID->id,
                'type'          => 'Distribution centre (< 40.000 sqm)',
                'price'         => 90000
            ],[
                'category_id'   => $storageID->id,
                'type'          => 'Distribution centre (> 40.000 sqm)',
                'price'         => 140000
            ],[
                'category_id'   => $storageID->id,
                'type'          => 'Agricultural facilities',
                'price'         => 100000
            ],[
                'category_id'   => $sportID->id,
                'type'          => 'Sport Pavilion',
                'price'         => 200000
            ],[
                'category_id'   => $sportID->id,
                'type'          => 'Local sport centre',
                'price'         => 140000
            ],[
                'category_id'   => $sportID->id,
                'type'          => 'Local fitness centre',
                'price'         => 150000
            ],[
                'category_id'   => $sportID->id,
                'type'          => 'Swimming pool',
                'price'         => 50000
            ],[
                'category_id'   => $leisureID->id,
                'type'          => 'Community centre',
                'price'         => 65000
            ],[
                'category_id'   => $leisureID->id,
                'type'          => 'Conference centre',
                'price'         => 50000
            ],[
                'category_id'   => $leisureID->id,
                'type'          => 'Multiplex cinema',
                'price'         => 250000
            ],[
                'category_id'   => $leisureID->id,
                'type'          => 'Museum',
                'price'         => 600000
            ],[
                'category_id'   => $parkingID->id,
                'type'          => 'Multi-storey (< 3 floors)',
                'price'         => 100000
            ],[
                'category_id'   => $parkingID->id,
                'type'          => 'Multi-storey (> 3 floors) ',
                'price'         => 180000
            ],[
                'category_id'   => $parkingID->id,
                'type'          => 'Underground parking (< 1,000 m2)',
                'price'         => 250000
            ],[
                'category_id'   => $parkingID->id,
                'type'          => 'Underground parking (> 1,000 m2) ',
                'price'         => 300000
            ],

        ]);
    }
}

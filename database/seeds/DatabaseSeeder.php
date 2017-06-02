<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(CountriesSeeder::class);
        $this->call(CurrencySeeder::class);
        $this->call(BuildingCategorySeeder::class);
        $this->call(BuildingSeeder::class);
        $this->call(WorkCategorySeeder::class);
        $this->call(WorkSeeder::class);
        $this->call(ColorSeeder::class);
        $this->call(MaterialSeeder::class);
        $this->call(WorkSeeder::class);
        $this->call(ComponentsSeeder::class);
        $this->call(UserSeeder::class);

    }
}

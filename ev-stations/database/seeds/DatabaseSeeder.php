<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
 
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CompanySeeder::class);
        $this->call(BrandTypeSeeder::class);
        $this->call(ChargertypeSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(StateSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(VehicleTypeSeeder::class);
        $this->call(AutomatedStatusSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(AmenitiesSeeder::class);
        $this->call(ModelTypeSeeder::class);
    //    $this->call(NetworkTypesSeeder::class);
    }
}

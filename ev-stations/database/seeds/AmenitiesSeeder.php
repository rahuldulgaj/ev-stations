<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class AmenitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('amenities')->insert(array(
            array(
            'name' => "Hotel",
            'slug'=>'hotel',
            'status'=>'1',
            'image'=>'default.png',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ),
            array(
                'name' => "Tennis Court",
                'slug'=>'tennis-court',
                'status'=>'1',
                'image'=>'default.png',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ),
            array(
                'name' => "PVR",
                'slug'=>'pvr',
                'status'=>'1',
                'image'=>'default.png',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ),
        ));
    }
}

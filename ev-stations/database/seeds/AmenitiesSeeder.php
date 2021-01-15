<?php

use Illuminate\Database\Seeder;

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
            'status'=>'1'
            ),
            array(
                'name' => "Tennis Court",
                'slug'=>'tennis-court',
                'status'=>'1'
            ),
            array(
                'name' => "PVR",
                'slug'=>'pvr',
                'status'=>'1'
            ),
        ));
    }
}

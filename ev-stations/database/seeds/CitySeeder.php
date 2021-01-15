<?php

use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('cities')->insert(array(
            array(
            'name' => "South Delhi",
            'citycode'=>'CT-001',
            'slug'=>'south-delhi',
            'state_id' => '1',
            'country_id'=>'1',
            'status'=>'1'
            ),
            array(
                'name' => "New Delhi",
                'slug'=>'new-delhi',
                'citycode'=>'CT-002',
                'state_id' => '1',
                'country_id'=>'1',
                'status'=>'1'            )
            ));
    }
}

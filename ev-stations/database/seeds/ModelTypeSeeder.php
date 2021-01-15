<?php

use Illuminate\Database\Seeder;

class ModelTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('model_types')->insert(array(
            array(
            'name' => "Scoda Tx-1",
            'slug'=>'scoda-tx-1',
            'company_id'=>'1',
            'brand_types_id'=>'1',
            'vehicle_types_id'=>'3',
            'battary_size'=>'60',
            'charging_standard'=>'Rapid',
            'price'=>'89000',
            'range'=>'',
           'compatiable_charging'=>'',
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

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
            'modelcode'=>'sctx01',
            'company_id'=>'1',
            'swappable_battary'=>'yes',
            'brand_types_id'=>'1',
            'vehicle_types_id'=>'3',
            'battary_size'=>'60',
            'charging_standard'=>'Rapid',
            'price'=>'89000',
            'range'=>'45',
           'compatiable_charging'=>'3',
            'dc_charging_time'=>'2',
            'status'=>'1'
            ),
            array(
                'name' => "Scoda Tx-3",
                'slug'=>'scoda-tx-3',
                'modelcode'=>'sctx03',
                'company_id'=>'1',
                'swappable_battary'=>'yes',
                'brand_types_id'=>'1',
                'vehicle_types_id'=>'3',
                'battary_size'=>'60',
                'charging_standard'=>'Rapid',
                'price'=>'89000',
                'range'=>'60',
               'compatiable_charging'=>'4',
                'dc_charging_time'=>'2',
                'status'=>'1'
            ),
            array(
                'name' => "Bajaj Chetak EV",
                'slug'=>'bajaj-chetak-01',
                'modelcode'=>'bc01',
                'company_id'=>'1',
                'swappable_battary'=>'yes',
                'brand_types_id'=>'1',
                'vehicle_types_id'=>'1',
                'battary_size'=>'60',
                'charging_standard'=>'super',
                'price'=>'89000',
                'range'=>'50',
               'compatiable_charging'=>'2',
                'dc_charging_time'=>'2',
                'status'=>'1'
            ),
        ));
    }
}

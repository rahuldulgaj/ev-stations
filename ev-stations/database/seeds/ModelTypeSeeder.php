<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

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
            'swappable_battary'=>'yes',
            'brand_types_id'=>'1',
            'vehicle_types_id'=>'3',
            'battary_size'=>'60',
            'charging_standard'=>'Rapid',
            'price'=>'89000',
            'range'=>'45',
           'compatiable_charging'=>'3',
            'dc_charging_time'=>'2',
            'home_plug_charging_time'=>'1',
            'status'=>'1',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ),
            array(
                'name' => "Scoda Tx-3",
                'slug'=>'scoda-tx-3',
                'modelcode'=>'sctx03',
                'swappable_battary'=>'yes',
                'brand_types_id'=>'1',
                'vehicle_types_id'=>'3',
                'battary_size'=>'60',
                'charging_standard'=>'Rapid',
                'price'=>'89000',
                'range'=>'60',
               'compatiable_charging'=>'4',
               'home_plug_charging_time'=>'1',
                'dc_charging_time'=>'2',
                'status'=>'1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ),
            array(
                'name' => "Bajaj Chetak EV",
                'slug'=>'bajaj-chetak-01',
                'modelcode'=>'bc01',
                'swappable_battary'=>'yes',
                'brand_types_id'=>'1',
                'vehicle_types_id'=>'1',
                'battary_size'=>'60',
                'charging_standard'=>'super',
                'price'=>'89000',
                'range'=>'50',
               'compatiable_charging'=>'2',
                'dc_charging_time'=>'2',
                'home_plug_charging_time'=>'1',
                'status'=>'1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ),
        ));
    }
}

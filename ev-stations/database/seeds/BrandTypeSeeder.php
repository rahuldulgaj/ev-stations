<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BrandTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('brand_types')->insert(array(
            array(
            'name' => "Tata",
            'slug'=>'tata',
            'brandcode'=>'1',
            'status'=>'1',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ),
            array(
                'name' => "Bajaj",
                'slug'=>'bajaj',
                'brandcode'=>'2',
                'status'=>'1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ),
            array(
                'name' => "Athor",
                'slug'=>'athor',
                'brandcode'=>'3',
                'status'=>'1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            )
        ));
    }
}

<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ChargertypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('chargertypes')->insert(array(
            array(
            'name'=>'TYPE 2',
            'slug'=>'type-2',
            'ct_code' => 'type2',
            'ct_company'=>'1',
            'status'=>'1',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ),
            array(
                'name'=>'DC',
                'slug'=>'dc',
                'ct_code' => 'dc',
                'ct_company'=>'1',
                'status'=>'1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            )
               
        ));
    }
}

<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('states')->insert(array(
            array(
            'name' => "Delhi",
            'statecode'=>'DL',
            'slug'=>'delhi',
            'country_id'=>'1',
            'status'=>'1',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ),
            array(
                'name' => "Harayan",
                'slug'=>'harayana',
                'statecode'=>'HR',
                'country_id'=>'1',
                'status'=>'1' ,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                       )
            ));
    }
}

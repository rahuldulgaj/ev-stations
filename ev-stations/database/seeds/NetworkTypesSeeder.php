<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

 
class NetworkTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('network_types')->insert(array(
            array(
            'name' => "Athor",
            'slug'=>'athor',
            'status'=>'1',
            'image'=>'default.png'
            ),
            array(
                'name' => "Tata",
                'slug'=>'tata',
                'status'=>'1',
                'image'=>'default.png'
            ),
            array(
                'name' => "Texla",
                'slug'=>'texla',
                'status'=>'1',
                'image'=>'default.png'
            ),
        ));
    }
}

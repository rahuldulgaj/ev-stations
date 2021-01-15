<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class EvstationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert(array(
            array(
            'name'=>'evstaion1',
            'username'=>'evstaion1',
            'evslug'=>'evstaion1',
            'evcode' => 'evs01',
            'ownername' => 'dulgajvips@gmail.com',
            'mobile'=>'8010827568',
            'alternatecontact'=>'8010827568',
            'latitude'=>'28.7041',
            'longitude'=>'77.1025',
            'lat_lang'=>'28.7041, 77.1025',
            'address'=>'Test Address',
            'usagetype'=>'1',
            'automated_status'=>'1',
            'company_id'=>'1',
            'country_id'=>'1',
            'city_id'=>'1',
            'state_id'=>'1',
            'time_slot_id'=>'1',
            'status'=>'1',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ),
            array(
                'name'=>'evstaion2',
            'username'=>'evstaion2',
            'evslug'=>'evstaion2',
            'evcode' => 'evs02',
            'ownername' => 'dulgajvips@gmail.com',
            'mobile'=>'8010827568',
            'alternatecontact'=>'8010827568',
            'latitude'=>'28.6056174',
            'longitude'=>'77.2549294',
            'lat_lang'=>'28.6056174,77.2549294',
            'address'=>'Test Address',
            'usagetype'=>'1',
            'automated_status'=>'1',
            'company_id'=>'1',
            'country_id'=>'1',
            'city_id'=>'1',
            'state_id'=>'1',
            'time_slot_id'=>'1',
            'status'=>'1',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ),
                array(
                    'name'=>'evstaion3',
            'username'=>'evstaion3',
            'evslug'=>'evstaion3',
            'evcode' => 'evs03',
            'ownername' => 'dulgajvips@gmail.com',
            'mobile'=>'8010827568',
            'alternatecontact'=>'8010827568',
            'latitude'=>'28.6056174',
            'longitude'=>'77.2549294',
            'lat_lang'=>'28.6056174,77.2549294',
            'address'=>'Test Address',
            'usagetype'=>'1',
            'automated_status'=>'1',
            'company_id'=>'1',
            'country_id'=>'1',
            'city_id'=>'1',
            'state_id'=>'1',
            'time_slot_id'=>'1',
            'status'=>'1',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            
                    )
        ));
    }
}

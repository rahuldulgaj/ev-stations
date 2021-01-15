<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('roles')->insert(array(
            array(
            'name' => "Admin",
            'slug'=>'admin',
            'status'=>'1',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ),
            array(
                'name' => "Sub Admin",
                'slug'=>'sub-admin',
                 'status'=>'1',
                 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')   
                 ),
            array(
                    'name' => "Agent",
                    'slug'=>'agent',
                     'status'=>'1',
                     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                     ),
            array(
                   'name' => "User",
                   'slug'=>'user',
                    'status'=>'1' ,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    )
            ));
    }
}

<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;


class UsersTableSeeder extends Seeder
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
            'firstname'=>'rahul',
            'lastname'=>'Admin',
            'username' => 'dulgajvips@gmail.com',
            'email' => strtolower('dulgajvips@gmail.com'),
            'password' => bcrypt('admin1234'),
            'mobile'=>'8010827568',
            'alternatecontact'=>'8010827568',
            'address'=>'Test Address',
            'role_id'=>'1',
            'company_id'=>'1',
            'country_id'=>'1',
            'city_id'=>'1',
            'state_id'=>'1',
            'gender'=>'Male',
            'status'=>'1',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ),
            array(
                'firstname'=>'test',
                'lastname'=>'Admin',
                'username' => 'test@gmail.com',
                'email' => strtolower('test@gmail.com'),
                'password' => bcrypt('test1234'),
                'mobile'=>'8010827560',
                'alternatecontact'=>'8010827560',
                'address'=>'Test Address',
                'role_id'=>'2',
                'company_id'=>'1',
                'country_id'=>'1',
                'city_id'=>'1',
                'state_id'=>'1',
                'gender'=>'Male',
                'status'=>'1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ),
                array(
                    'firstname'=>'User',
                    'lastname'=>'Admin',
                    'username' => 'user@gmail.com',
                    'email' => strtolower('user@gmail.com'),
                    'password' => bcrypt('user1234'),
                    'mobile'=>'8010827562',
                    'alternatecontact'=>'8010827562',
                    'address'=>'Test Address',
                    'role_id'=>'4',
                    'company_id'=>'1',
                    'country_id'=>'1',
                    'city_id'=>'1',
                    'state_id'=>'1',
                    'gender'=>'Male',
                    'status'=>'1',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    )
        ));
    }
}

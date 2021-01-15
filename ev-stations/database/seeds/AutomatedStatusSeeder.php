<?php

use Illuminate\Database\Seeder;

class AutomatedStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('automated_status')->insert(array(
            array(
            'name' => "In Use",
            'slug'=>'in-use',
            'status'=>'1'
            ),
            array(
                'name' => "Available",
                'slug'=>'Available',
                'status'=>'1'
            ),
            array(
                'name' => "Under Maintenance",
                'slug'=>'under-maintenance',
                'status'=>'1'
            ),
        ));
          
    }
}

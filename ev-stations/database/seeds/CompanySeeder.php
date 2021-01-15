<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
 
class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('companies')->insert(array(
            array(
            'name' => "Tata",
            'slug'=>'tata',
            'companycode'=>'1',
            'status'=>'1',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ),
            array(
                'name' => "Bajaj",
                'slug'=>'bajaj',
                'companycode'=>'2',
                'status'=>'1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ),
            array(
                'name' => "Athor",
                'slug'=>'athor',
                'companycode'=>'3',
                'status'=>'1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ),

        ));
    }
}

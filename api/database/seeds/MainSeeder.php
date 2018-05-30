<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class MainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Users')->insert([
          'firstnames' => 'Angel',
          'lastnames' => 'Cáceres',
          'nickname' => 'admin',
          'password' => Crypt::encryptString('admin'),
          'remark' => "Lo sueños pueden cumplirse",
          'remember_token' => str_random(60)
        ]);
    }
}

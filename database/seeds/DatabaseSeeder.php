<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            'name' => 'Vinh',
            'email' => 'abc@gmail.com',
            'password' => bcrypt('123123'),
            'quyen' => 0
        ]);

        DB::table('users')->insert([
            'name' => 'Linh',
            'email' => 'itvdn1995@gmail.com',
            'password' => bcrypt('123123'),
            'quyen' => 1
        ]);

//        DB::table('domains')->insert([[
//            'user_name' => 'linh',
//            'user_id' => 1,
//            'domain_name' => 'test123.com',
//            'register_date' => '2019/02/01',
//            'end_date' => '2020/02/01',
//        ],[
//            'user_name' => 'test',
//            'user_id' => 1,
//            'domain_name' => 'test121233.com',
//            'register_date' => '2019/02/1',
//            'end_date' => '2020/02/01',
//        ]
//        ]);
//
//
//        DB::table('detail_domains')->insert([
//            'domain_id' => '1',
//            'host_record' => '*',
//            'type' => 'X',
//            'value' => '103.7.40.41',
//            'order' => '0',
//            'status' => 1
//        ]);
    }
}

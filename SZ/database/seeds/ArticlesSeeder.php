<?php

use Illuminate\Database\Seeder;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stores = [];
        //lets generate random stores
        for($i=0;$i<20;$i++){
            $stores[] = DB::table('stores')->insertGetId([
                "name"      =>      'Store ' . str_random(8),
                'address'   =>      'Address ' . str_random(8)
            ]);
        }


        for($i=0;$i<200;$i++){
            DB::table('articles')->insertGetId([
                "name"          =>      'Article ' . str_random(8),
                'description'   =>      'Description ' . str_random(8),
                'price'         =>      rand(100,10000),
                'total_in_shelf'=>      rand(0,1000),
                'total_in_vault'=>      rand(0,1000),
                'store_id'      =>      $stores[array_rand($stores)],
            ]);
        }


    }
}

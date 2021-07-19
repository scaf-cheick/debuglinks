<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            'title' => 'PHP',
            'category_id' => '1',
        ]);
        DB::table('tags')->insert([
            'title' => 'Flutter',
            'category_id' => '1',
        ]);
        DB::table('tags')->insert([
            'title' => 'Spring Boot',
            'category_id' => '1',
        ]);

        DB::table('tags')->insert([
            'title' => 'Ubuntu Server',
            'category_id' => '3',
        ]);
        DB::table('tags')->insert([
            'title' => 'Azure',
            'category_id' => '3',
        ]);
        DB::table('tags')->insert([
            'title' => 'Github',
            'category_id' => '3',
        ]);
    }
}

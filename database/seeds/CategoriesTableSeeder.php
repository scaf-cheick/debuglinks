<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'title' => 'Developpement',
            'icone' => 'airplay',
        ]);
        DB::table('categories')->insert([
            'title' => 'Networks and Telecoms',
            'icone' => 'settings_remote',
        ]);
        DB::table('categories')->insert([
            'title' => 'System',
            'icone' => 'subtitles',
        ]);
    }
}

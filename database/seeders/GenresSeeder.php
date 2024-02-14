<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class GenresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('genres')->insert([
            'name' => 'fantasy'
        ]);
        DB::table('genres')->insert([
            'name' => 'science_fiction'
        ]);
        DB::table('genres')->insert([
            'name' => 'horror'
        ]);
        DB::table('genres')->insert([
            'name' => 'romance'
        ]);
        DB::table('genres')->insert([
            'name' => 'dystopian'
        ]);
        DB::table('genres')->insert([
            'name' => 'action_adventure'
        ]);
        DB::table('genres')->insert([
            'name' => 'mystery'
        ]);
        DB::table('genres')->insert([
            'name' => 'thriller_suspense'
        ]);
        DB::table('genres')->insert([
            'name' => 'historical_fiction'
        ]);
        DB::table('genres')->insert([
            'name' => 'women’s_fiction'
        ]);
        DB::table('genres')->insert([
            'name' => 'literary_fiction'
        ]);
        DB::table('genres')->insert([
            'name' => 'contemporary_fiction'
        ]);
        DB::table('genres')->insert([
            'name' => 'magical_realism'
        ]);
        DB::table('genres')->insert([
            'name' => 'graphic_novel'
        ]);
        DB::table('genres')->insert([
            'name' => 'short_story'
        ]);

    }
}

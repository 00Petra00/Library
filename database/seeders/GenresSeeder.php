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
            'name' => 'science fiction'
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
            'name' => 'action adventure'
        ]);
        DB::table('genres')->insert([
            'name' => 'mystery'
        ]);
        DB::table('genres')->insert([
            'name' => 'thriller suspense'
        ]);
        DB::table('genres')->insert([
            'name' => 'historical fiction'
        ]);
        DB::table('genres')->insert([
            'name' => 'women’s fiction'
        ]);
        DB::table('genres')->insert([
            'name' => 'literary fiction'
        ]);
        DB::table('genres')->insert([
            'name' => 'contemporary fiction'
        ]);
        DB::table('genres')->insert([
            'name' => 'magical realism'
        ]);
        DB::table('genres')->insert([
            'name' => 'graphic novel'
        ]);
        DB::table('genres')->insert([
            'name' => 'short story'
        ]);

    }
}

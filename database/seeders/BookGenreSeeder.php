<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class BookGenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('book_genre')->insert([
            'book_id' => '1',
            'genre_id' => '16'
        ]);
        DB::table('book_genre')->insert([
            'book_id' => '2',
            'genre_id' => '16'
        ]);
        DB::table('book_genre')->insert([
            'book_id' => '3',
            'genre_id' => '17'
        ]);
        DB::table('book_genre')->insert([
            'book_id' => '3',
            'genre_id' => '18'
        ]);
        DB::table('book_genre')->insert([
            'book_id' => '4',
            'genre_id' => '1'
        ]);
        DB::table('book_genre')->insert([
            'book_id' => '4',
            'genre_id' => '4'
        ]);
        DB::table('book_genre')->insert([
            'book_id' => '5',
            'genre_id' => '16'
        ]);
        DB::table('book_genre')->insert([
            'book_id' => '5',
            'genre_id' => '19'
        ]);
        DB::table('book_genre')->insert([
            'book_id' => '6',
            'genre_id' => '19'
        ]);
        DB::table('book_genre')->insert([
            'book_id' => '7',
            'genre_id' => '17'
        ]);
        DB::table('book_genre')->insert([
            'book_id' => '8',
            'genre_id' => '17'
        ]);
        DB::table('book_genre')->insert([
            'book_id' => '8',
            'genre_id' => '20'
        ]);
        DB::table('book_genre')->insert([
            'book_id' => '9',
            'genre_id' => '17'
        ]);
        DB::table('book_genre')->insert([
            'book_id' => '9',
            'genre_id' => '20'
        ]);
        DB::table('book_genre')->insert([
            'book_id' => '10',
            'genre_id' => '4'
        ]);
        DB::table('book_genre')->insert([
            'book_id' => '10',
            'genre_id' => '15'
        ]);
        DB::table('book_genre')->insert([
            'book_id' => '11',
            'genre_id' => '4'
        ]);
        DB::table('book_genre')->insert([
            'book_id' => '12',
            'genre_id' => '4'
        ]);
        DB::table('book_genre')->insert([
            'book_id' => '12',
            'genre_id' => '15'
        ]);
        DB::table('book_genre')->insert([
            'book_id' => '12',
            'genre_id' => '21'
        ]);
        DB::table('book_genre')->insert([
            'book_id' => '13',
            'genre_id' => '2'
        ]);
        DB::table('book_genre')->insert([
            'book_id' => '13',
            'genre_id' => '3'
        ]);
        DB::table('book_genre')->insert([
            'book_id' => '13',
            'genre_id' => '13'
        ]);
        DB::table('book_genre')->insert([
            'book_id' => '13',
            'genre_id' => '8'
        ]);
        DB::table('book_genre')->insert([
            'book_id' => '13',
            'genre_id' => '12'
        ]);
    }
}

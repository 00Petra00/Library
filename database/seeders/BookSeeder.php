<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            'title' => 'Worthy: How to Believe You Are Enough and Transform Your Life',
            'author' => 'Jamie Kern Lima',
            'publisher' => 'Hay House',
            'year_of_publication' => '2024',
            'description' => "What has self-doubt already cost you in your life?
            Imagine what you'd do if you FULLY believed in YOU! When you stop doubting your greatness, build unshakable self-worth and embrace who you are, you transform your entire life! WORTHY teaches you how, with simple steps that lead to life-changing results!",
            'book_cover' => 'images/book_covers/1.jpg'
        ]);
        DB::table('books')->insert([
            'title' => 'Dear Black Girls: How to Be True to You',
            'author' => "A'Ja Wilson ",
            'publisher' => 'Flatiron Books: A Moment of Lift Book',
            'year_of_publication' => '2024',
            'description' => addslashes('"Through honest stories and inspiring lessons from her life, A ja Wilson reminds us to never doubt who we are or apologize for being true to ourselves. Dear Black Girls is a must-read for every Black girl out there." ―Gabrielle Union

            This one is for all the girls with an apostrophe in their names.

            This is for all the girls who are labeled "too loud" and "too emotional."

            This is for all the girls who are constantly asked, "Oh, what did you do with your hair? That s new."'),
            'book_cover' => 'images/book_covers/2.jpg'
        ]);
        DB::table('books')->insert([
            'title' => 'Taylor Swift Style',
            'author' => 'Sarah Chapelle',
            'publisher' => "St. Martin's Griffin",
            'year_of_publication' => '2024',
            'description' => "SARAH CHAPELLE is the fashion writer and creator of the blog Taylor Swift Style and Instagram account @taylorswiftstyled. Her thoughtful, thorough, and witty approach to style commentary has been featured in The Wall Street Journal, Harper's Bazaar, Coveteur, People, and more. She lives in Vancouver, Canada, with her husband and their cat.",
            'book_cover' => 'images/book_covers/3.jpg'
        ]);
        DB::table('books')->insert([
            'title' => 'Fourth Wing',
            'author' => 'Rebecca Yarros',
            'publisher' => 'Entangled: Red Tower Books',
            'year_of_publication' => '2023',
            'description' => "A #1 New York Times bestseller - Optioned for TV by Amazon Studios - Amazon Best Books of the Year, #4 - Apple Best Books of the Year 2023 - Barnes & Noble Best Fantasy Book of 2023 - NPR Books We Love 2023 - Audible Best Books of 2023 - Hudson Book of the Year - Google Play Best Books of 2023 - Indigo Best Books of 2023 - Waterstones Book of the Year finalist - Goodreads Choice Award, semi-finalist - Newsweek Staffers' Favorite Books of 2023 - Paste Magazine's Best Books of 2023",
            'book_cover' => 'images/book_covers/4.jpg'
        ]);
        // DB::table('books')->insert([
        //     'title' => '',
        //     'author' => '',
        //     'publisher' => '',
        //     'year_of_publication' => '',
        //     'description' => '',
        //     'book_cover' => 'images/book_covers/1.jpg'
        // ]);
    }
}

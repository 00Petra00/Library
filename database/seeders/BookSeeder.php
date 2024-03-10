<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;

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
            'book_cover' => 'images/book_covers/1.jpg',
            'created_at' => Carbon::now()
        ]);
        DB::table('books')->insert([
            'title' => 'Dear Black Girls: How to Be True to You',
            'author' => "A'Ja Wilson ",
            'publisher' => 'Flatiron Books: A Moment of Lift Book',
            'year_of_publication' => '2024',
            'description' => '"Through honest stories and inspiring lessons from her life, A ja Wilson reminds us to never doubt who we are or apologize for being true to ourselves. Dear Black Girls is a must-read for every Black girl out there." ―Gabrielle Union

            This one is for all the girls with an apostrophe in their names.

            This is for all the girls who are labeled "too loud" and "too emotional."

            This is for all the girls who are constantly asked, "Oh, what did you do with your hair? That s new."',
            'book_cover' => 'images/book_covers/2.jpg',
            'created_at' => Carbon::now()
        ]);
        DB::table('books')->insert([
            'title' => 'Taylor Swift Style',
            'author' => 'Sarah Chapelle',
            'publisher' => "St. Martin's Griffin",
            'year_of_publication' => '2024',
            'description' => "SARAH CHAPELLE is the fashion writer and creator of the blog Taylor Swift Style and Instagram account @taylorswiftstyled. Her thoughtful, thorough, and witty approach to style commentary has been featured in The Wall Street Journal, Harper's Bazaar, Coveteur, People, and more. She lives in Vancouver, Canada, with her husband and their cat.",
            'book_cover' => 'images/book_covers/3.jpg',
            'created_at' => Carbon::now()
        ]);
        DB::table('books')->insert([
            'title' => 'Fourth Wing',
            'author' => 'Rebecca Yarros',
            'publisher' => 'Entangled: Red Tower Books',
            'year_of_publication' => '2023',
            'description' => "A #1 New York Times bestseller - Optioned for TV by Amazon Studios - Amazon Best Books of the Year, #4 - Apple Best Books of the Year 2023 - Barnes & Noble Best Fantasy Book of 2023 - NPR Books We Love 2023 - Audible Best Books of 2023 - Hudson Book of the Year - Google Play Best Books of 2023 - Indigo Best Books of 2023 - Waterstones Book of the Year finalist - Goodreads Choice Award, semi-finalist - Newsweek Staffers' Favorite Books of 2023 - Paste Magazine's Best Books of 2023",
            'book_cover' => 'images/book_covers/4.jpg',
            'created_at' => Carbon::now()
        ]);
        DB::table('books')->insert([
            'title' => 'Supercommunicators: How to Unlock the Secret Language of Connection',
            'author' => 'Charles Duhigg',
            'publisher' => 'Random House',
            'year_of_publication' => '2024',
            'description' => 'From the bestselling author of The Power of Habit, a fascinating exploration of what makes conversations work--and how we can all learn to be supercommunicators at work and in life

            "A winning combination of stories, studies, and guidance that might well transform the worst communicators you know into some of the best."--Adam Grant, author of Think Again and Hidden Potential
            Come inside a jury room as one juror leads a starkly divided room to consensus. Join a young CIA officer as he recruits a reluctant foreign agent. And sit with an accomplished surgeon as he tries, and fails, to convince yet another cancer patient to opt for the less risky course of treatment. In Supercommunicators, Charles Duhigg blends deep research and his trademark storytelling skills to show how we can all learn to identify and leverage the hidden layers that lurk beneath every conversation.
            Communication is a superpower and the best communicators understand that whenever we speak,'." we're actually participating in one of three conversations: practical (What's this really about?), emotional (How do we feel?), and social (Who are we?). If you don't know what kind of conversation you're having, you're unlikely to connect.
            Supercommunicators know the importance of recognizing--and then matching--each kind of conversation, and how to hear the complex emotions, subtle negotiations, and deeply held beliefs that color so much of what we say and how we listen. Our experiences, our values, our emotional lives--and how we see ourselves, and others--shape every discussion, from who will pick up the kids to how we want to be treated at work. In this book, you will learn why some people are able to make themselves heard, and to hear others, so clearly.
            With his storytelling that takes us from the writers' room of The Big Bang Theory to the couches of leading marriage counselors, Duhigg shows readers how to recognize these three conversations--and teaches us the tips and skills we need to navigate them more successfully.
            In the end, he delivers a simple but powerful lesson: With the right tools, we can connect with anyone.",
            'book_cover' => 'images/book_covers/5.jpg',
            'created_at' => Carbon::now()
        ]);
        DB::table('books')->insert([
            'title' => 'Welcome to the Hyunam-Dong Bookshop',
            'author' => 'Hwang Bo-Reum',
            'publisher' => 'Bloomsbury Publishing',
            'year_of_publication' => '2024',
            'description' => 'A Debutiful Most Anticipated Book of 2024

            The Korean smash hit available for the first time in English, a slice-of-life novel for readers of Matt '."Haig's The Midnight Library and Gabrielle Zevin's The Storied Life of AJ Fikry.
            Yeongju is burned out. She did everything she was supposed to: go to school, marry a decent man, get a respectable job. Then it all fell apart. In a leap of faith, Yeongju abandons her old life, quits her high-flying career, and follows her dream. She opens a bookshop. In a quaint neighborhood in Seoul, surrounded by books, Yeongju and her customers take refuge. From the lonely barista to the unhappily married coffee roaster-and the writer who sees something special in Yeongju-they all have disappointments in their past. The Hyunam-dong Bookshop becomes the place where they all learn how to truly live.
            A heartwarming story about finding acceptance in your life and the healing power of books, Welcome to the Hyunam-dong Bookshop is a gentle reminder that it's never too late to scrap the plot and start again.",
            'book_cover' => 'images/book_covers/6.jpg',
            'created_at' => Carbon::now()
        ]);
        DB::table('books')->insert([
            'title' => 'Splinters: Another Kind of Love Story',
            'author' => 'Leslie Jamison',
            'publisher' => 'Little Brown and Company',
            'year_of_publication' => '2024',
            'description' => 'One of the Most Anticipated Books of the Year: TIME, Oprah Daily, Vulture, The Millions, Kirkus Reviews, The Story Exchange, The Messenger, Real Simple, How to Be
            From the New York Times bestselling author of The Recovering and The Empathy Exams comes "a blazing, unputdownable memoir" (Mary Karr, author of Lit), the "piercing, intimate" story (TIME Magazine) of rebuilding a life after the end of a marriage--an exploration of motherhood, art, and new love.
            Leslie Jamison has become one of our most beloved contemporary voices, a scribe of the real, the true, the complex. She has been compared to Joan Didion and Susan Sontag, acclaimed for her powerful thinking, deep feeling, and electric prose. But while Jamison has never shied away from challenging material--scouring her own psyche and digging into our most unanswerable questions across four books--Splinters enters a new realm.
            In her first memoir, Jamison turns her unrivaled powers of perception on some of the most intimate relationships of her life: her consuming love for her young daughter, a ruptured marriage once swollen with hope, and the shaping legacy of her own '."parents' complicated bond. In examining what it means for a woman to be many things at once--a mother, an artist, a teacher, a lover--Jamison places the magical and the mundane side by side in surprising ways. The result is a work of nonfiction like no other, an almost impossibly deep reckoning with the muchness of life and art, and a book that grieves the departure of one love even as it celebrates the arrival of another.
            How do we move forward into joy when we are haunted by loss? How do we claim hope alongside the harm we've caused? A memoir for which the very term tour de force seems to have been coined, Splinters plumbs these and other pressing questions with writing that is revelatory to the last page, full of linguistic daring and emotional acuity. Jamison, a master of nonfiction, evinces once again her ability ".'to "stitch together the intellectual and the emotional with the finesse of a crackerjack surgeon" (NPR).',
            'book_cover' => 'images/book_covers/7.jpg',
            'created_at' => Carbon::now()
        ]);
        DB::table('books')->insert([
            'title' => 'The Recovering: Intoxication and Its Aftermath',
            'author' => 'Leslie Jamison',
            'publisher' => 'Back Bay Books',
            'year_of_publication' => '2019',
            'description' => 'From the New York Times bestselling author of The Empathy Exams comes this transformative work showing that sometimes the recovery is more gripping than the addiction.
            With its deeply personal and seamless blend of memoir, cultural history, literary criticism, and reportage, The Recovering turns our understanding of the traditional addiction narrative on its head, demonstrating that the story of recovery can be every bit as electrifying as the train wreck itself. Leslie Jamison deftly excavates the stories we tell about addiction -- both her own and '."others' -- and examines what we want these stories to do and what happens when they fail us. All the while, she offers a fascinating look at the larger history of the recovery movement, and at the complicated bearing that race and class have on our understanding of who is criminal and who is ill.
            At the heart of the book is Jamison's ongoing conversation with literary and artistic geniuses whose lives and works were shaped by alcoholism and substance dependence, including John Berryman, Jean Rhys, Billie Holiday, Raymond Carver, Denis Johnson, and David Foster Wallace, as well as brilliant lesser-known figures such as George Cain, lost to obscurity but newly illuminated here. Through its unvarnished relation of Jamison's own ordeals, The Recovering also becomes a book about a different kind of dependency: the way our desires can make us all, as she puts it, broken spigots of need. It's about the particular loneliness of the human experience-the craving for love that both devours us and shapes who we are.
            For her striking language and piercing observations, Jamison has been compared to such iconic writers as Joan Didion and Susan Sontag, yet her utterly singular voice also offers something new. With enormous empathy and wisdom, Jamison has given us nothing less than the story of addiction and recovery in America writ large, a definitive and revelatory account that will resonate for years to come.",
            'book_cover' => 'images/book_covers/8.jpg',
            'created_at' => Carbon::now()
        ]);
        DB::table('books')->insert([
            'title' => 'The Empathy Exams: Essays',
            'author' => 'Leslie Jamison',
            'publisher' => 'Graywolf Press',
            'year_of_publication' => '2014',
            'description' => 'From personal loss to phantom diseases, The Empathy Exams is a bold and brilliant collection, winner of the Graywolf Press Nonfiction Prize

            A Publishers Weekly Top Ten Essay Collection of Spring 2014
            Beginning with her experience as a medical actor who was paid to act out symptoms for medical students to diagnose, Leslie'." Jamison's visceral and revealing essays ask essential questions about our basic understanding of others: How should we care about each other? How can we feel another's pain, especially when pain can be assumed, distorted, or performed? Is empathy a tool by which to test or even grade each other? By confronting pain--real and imagined, her own and others'--Jamison uncovers a personal and cultural urgency to feel. She draws from her own experiences of illness and bodily injury to engage in an exploration that extends far beyond her life, spanning wide-ranging territory--from poverty tourism to phantom diseases, street violence to reality television, illness to incarceration--in its search for a kind of sight shaped by humility and grace.",
            'book_cover' => 'images/book_covers/9.jpg',
            'created_at' => Carbon::now()
        ]);
        DB::table('books')->insert([
            'title' => 'Book Lovers',
            'author' => 'Emily Henry',
            'publisher' => 'Berkley Books',
            'year_of_publication' => '2022',
            'description' => '"One of my favorite authors."--Colleen Hoover
            An insightful, delightful, instant #1 New York Times bestseller from the author of Beach Read and People We Meet on Vacation.
            Named a Most Anticipated Book of 2022 by Oprah Daily ∙ Today ∙ Parade ∙ Marie Claire ∙ Bustle ∙ PopSugar ∙ Katie Couric Media ∙ Book Bub ∙ SheReads ∙ Medium ∙ The Washington Post ∙ and more!
            One summer. Two rivals. A plot twist they'." didn't see coming...
            Nora Stephens' life is books--she's read them all--and she is not that type of heroine. Not the plucky one, not the laidback dream girl, and especially not the sweetheart. In fact, the only people Nora is a heroine for are her clients, for whom she lands enormous deals as a cutthroat literary agent, and her beloved little sister Libby.
            Which is why she agrees to go to Sunshine Falls, North Carolina for the month of August when Libby begs her for a sisters' trip away--with visions of a small town transformation for Nora, who she's convinced needs to become the heroine in her own story. But instead of picnics in meadows, or run-ins with a handsome country doctor or bulging-forearmed bartender, Nora keeps bumping into Charlie Lastra, a bookish brooding editor from back in the city. It would be a meet-cute if not for the fact that they've met many times and it's never been cute.
            If Nora knows she's not an ideal heroine, Charlie knows he's nobody's hero, but as they are thrown together again and again--in a series of coincidences no editor worth their salt would allow--what they discover might just unravel the carefully crafted stories they've written about themselves.",
            'book_cover' => 'images/book_covers/10.jpg',
            'created_at' => Carbon::now()
        ]);
        DB::table('books')->insert([
            'title' => 'Funny Story',
            'author' => 'Emily Henry',
            'publisher' => 'Berkley Books',
            'year_of_publication' => '2024',
            'description' => 'A shimmering, joyful new novel about a pair of opposites with the wrong thing in common, from #1 New York Times bestselling author Emily Henry.

            Daphne always loved the way her fiancé Peter told their story. How they met (on a blustery day), fell in love (over an errant hat), and moved back to his lakeside hometown to begin their life together. He really was good at telling it...right up until the moment he realized he was actually in love with his childhood best friend Petra.
            Which is how Daphne begins her new story: Stranded in beautiful Waning Bay, Michigan, without friends or family but with a dream job as a'." children's librarian (that barely pays the bills), and proposing to be roommates with the only person who could possibly understand her predicament: Petra's ex, Miles Nowak.
            Scruffy and chaotic--with a penchant for taking solace in the sounds of heart break love ballads --Miles is exactly the opposite of practical, buttoned up Daphne, whose coworkers know so little about her they have a running bet that she's either FBI or in witness protection. The roommates mainly avoid one another, until one day, while drowning their sorrows, they form a tenuous friendship and a plan. If said plan also involves posting deliberately misleading photos of their summer adventures together, well, who could blame them?
            But it's all just for show, of course, because there's no way Daphne would actually start her new chapter by falling in love with her ex-fiancé's new fiancée's ex...right?",
            'book_cover' => 'images/book_covers/11.jpg',
            'created_at' => Carbon::now()
        ]);
        DB::table('books')->insert([
            'title' => 'Happy Place',
            'author' => 'Emily Henry',
            'publisher' => 'Berkley Books',
            'year_of_publication' => '2023',
            'description' => 'INSTANT #1 NEW YORK TIMES BESTSELLER!
            "The beach-read master hooks us again."--People
            Named a Most Anticipated Book of 2023 by BuzzFeed ∙ Paste Magazine ∙ Elle ∙ Southern Living ∙ SheReads ∙ Culturess ∙ Medium ∙ Her Campus ∙ Readers Digest ∙ Zibby Mag and more!
            A couple who broke up months ago pretend to still be together for their annual weeklong vacation with their best friends in this glittering and wise new novel from #1 New York Times bestselling author Emily Henry.
            Harriet and Wyn have been the perfect couple since they met in college--they go together like salt and pepper, honey and tea, lobster and rolls. Except, now--for reasons '."they're still not discussing--they don't.
            They broke up five months ago. And still haven't told their best friends.
            Which is how they find themselves sharing a bedroom at the Maine cottage that has been their friend group's yearly getaway for the last decade. Their annual respite from the world, where for one vibrant, blissful week they leave behind their daily lives; have copious amounts of cheese, wine, and seafood; and soak up the salty coastal air with the people who understand them most.
            Only this year, Harriet and Wyn are lying through their teeth while trying not to notice how desperately they still want each other. Because the cottage is for sale and this is the last week they'll all have together in this place. They can't stand to break their friends' hearts, and so they'll play their parts. Harriet will be the driven surgical resident who never starts a fight, and Wyn will be the laid-back charmer who never lets the cracks show. It's a flawless plan (if you look at it from a great distance and through a pair of sunscreen-smeared sunglasses). After years of being in love, how hard can it be to fake it for one week...in front of those who know you best?",
            'book_cover' => 'images/book_covers/12.jpg',
            'created_at' => Carbon::now()
        ]);
        DB::table('books')->insert([
            'title' => 'Out There Screaming: An Anthology of New Black Horror',
            'author' => 'Jordan Peele',
            'publisher' => 'Random House',
            'year_of_publication' => '2023',
            'description' => 'NEW YORK TIMES BESTSELLER - The visionary writer and director of Get Out, Us, and Nope, and founder of Monkeypaw Productions, curates this groundbreaking anthology of all-new stories of Black horror, exploring not only the terrors of the supernatural but the chilling reality of injustice that haunts our nation.

            "Every piece is strong and memorable, making this not only likely to be the best anthology of the year, but one for the ages."--The Guardian
            A BEST BOOK OF THE YEAR: Esquire, Chicago Public Library, CrimeReads
            A cop begins seeing huge, blinking eyes where the headlights of cars should be that tell him who to pull over. Two freedom riders take a bus ride that leaves them stranded on a lonely road in Alabama where several unsettling somethings await them. A young girl dives into the depths of the Earth in search of the demon that killed her parents. These are just a few of the worlds of Out There Screaming, Jordan'." Peele's anthology of all-new horror stories by Black writers. Featuring an introduction by Peele and an all-star roster of beloved writers and new voices, Out There Screaming is a master class in horror, and--like his spine-chilling films--its stories prey on everything we think we know about our world . . . and redefine what it means to be afraid.
            Featuring stories by: Erin E. Adams, Violet Allen, Lesley Nneka Arimah, Maurice Broaddus, Chesya Burke, P. Djèlí Clark, Ezra Claytan Daniels, Tananarive Due, Nalo Hopkinson, N. K. Jemisin, Justin C. Key, L. D. Lewis, Nnedi Okorafor, Tochi Onyebuchi, Rebecca Roanhorse, Nicole D. Sconiers, Rion Amilcar Scott, Terence Taylor, and Cadwell Turnbull.",
            'book_cover' => 'images/book_covers/13.jpg',
            'created_at' => Carbon::now()
        ]);

    }
}

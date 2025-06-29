<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => '11111111',
            'role' => 'admin',
        ]);

        $books = [
        [
            'title' => 'Sapiens: A Brief History of Humankind',
            'author' => 'Yuval Noah Harari',
            'link_url' => 'https://www.goodreads.com/book/show/23692271-sapiens'
        ],
        [
            'title' => 'Thinking, Fast and Slow',
            'author' => 'Daniel Kahneman',
            'link_url' => 'https://www.goodreads.com/book/show/11545695-thinking-fast-and-slow'
        ],
        [
            'title' => 'Atomic Habits',
            'author' => 'James Clear',
            'link_url' => 'https://www.goodreads.com/book/show/40579601-atomic-habits'
        ],
        [
            'title' => 'The Lean Startup',
            'author' => 'Eric Ries',
            'link_url' => 'https://www.goodreads.com/book/show/10127149-the-lean-startup'
        ],
        [
            'title' => 'Educated',
            'author' => 'Tara Westover',
            'link_url' => 'https://www.goodreads.com/book/show/35650132-educated'
        ],
        [
            'title' => 'Factfulness',
            'author' => 'Hans Rosling',
            'link_url' => 'https://www.goodreads.com/book/show/34890015-factfulness'
        ],
        [
            'title' => 'Deep Work: Rules for Focused Success in a Distracted World',
            'author' => 'Cal Newport',
            'link_url' => 'https://www.goodreads.com/book/show/25744928-deep-work'
        ],
        [
            'title' => 'The 7 Habits of Highly Effective People',
            'author' => 'Stephen R. Covey',
            'link_url' => 'https://www.goodreads.com/book/show/5946112-the-7-habits-of-highly-effective-people'
        ],
        [
            'title' => 'Guns, Germs, and Steel',
            'author' => 'Jared Diamond',
            'link_url' => 'https://www.goodreads.com/book/show/1842.Guns_Germs_and_Steel'
        ],
        [
            'title' => 'Rich Dad Poor Dad',
            'author' => 'Robert T. Kiyosaki',
            'link_url' => 'https://www.goodreads.com/book/show/69571.Rich_Dad_Poor_Dad'
        ],
        [
            'title' => 'The Psychology of Money',
            'author' => 'Morgan Housel',
            'link_url' => 'https://www.goodreads.com/book/show/50190161-the-psychology-of-money'
        ],
        [
            'title' => "Quiet: The Power of Introverts in a World That Can't Stop Talking",
            'author' => 'Susan Cain',
            'link_url' => 'https://www.goodreads.com/book/show/8520610-quiet'
        ],
        [
            'title' => 'The Lord of the Rings',
            'author' => 'J.R.R. Tolkien',
            'link_url' => 'https://www.goodreads.com/book/show/33.The_Lord_of_the_Rings'
        ],
        [
            'title' => '1984',
            'author' => 'George Orwell',
            'link_url' => 'https://www.goodreads.com/book/show/40961427-1984'
        ],
        [
            'title' => 'To Kill a Mockingbird',
            'author' => 'Harper Lee',
            'link_url' => 'https://www.goodreads.com/book/show/2657.To_Kill_a_Mockingbird'
        ],
        [
            'title' => 'Cosmos',
            'author' => 'Carl Sagan',
            'link_url' => 'https://www.goodreads.com/book/show/50700.Cosmos'
        ],
        [
            'title' => 'The Selfish Gene',
            'author' => 'Richard Dawkins',
            'link_url' => 'https://www.goodreads.com/book/show/61535.The_Selfish_Gene'
        ],
        [
            'title' => 'A Brief History of Time',
            'author' => 'Stephen Hawking',
            'link_url' => 'https://www.goodreads.com/book/show/3869.A_Brief_History_of_Time'
        ],
        [
            'title' => 'Algorithms to Live By: The Computer Science of Human Decisions',
            'author' => 'Brian Christian & Tom Griffiths',
            'link_url' => 'https://www.goodreads.com/book/show/25666050-algorithms-to-live-by'
        ],
        [
            'title' => 'The Code Book',
            'author' => 'Simon Singh',
            'link_url' => 'https://www.goodreads.com/book/show/17994.The_Code_Book'
        ],
        [
            'title' => 'Introduction to Algorithms',
            'author' => 'Thomas H. Cormen, Charles E. Leiserson, Ronald L. Rivest, Clifford Stein',
            'link_url' => 'https://www.goodreads.com/book/show/44365.Introduction_to_Algorithms'
        ],
        [
            'title' => 'Clean Code: A Handbook of Agile Software Craftsmanship',
            'author' => 'Robert C. Martin',
            'link_url' => 'https://www.goodreads.com/book/show/3735293-clean-code'
        ],
        [
            'title' => 'The Design of Everyday Things',
            'author' => 'Don Norman',
            'link_url' => 'https://www.goodreads.com/book/show/10131741-the-design-of-everyday-things'
        ],
        [
            'title' => 'Ikigai: The Japanese Secret to a Long and Happy Life',
            'author' => 'Héctor García & Francesc Miralles',
            'link_url' => 'https://www.goodreads.com/book/show/40536768-ikigai'
        ],
        [
            'title' => 'The Power of Habit',
            'author' => 'Charles Duhigg',
            'link_url' => 'https://www.goodreads.com/book/show/12609433-the-power-of-habit'
        ]
    ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}

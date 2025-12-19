<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            [
                'title' => 'Viduthalai Chiruthaigal: A Political Journey',
                'author' => 'Thol. Thirumavalavan',
                'description' => 'An insightful book about the political journey and ideology of Viduthalai Chiruthaigal Katchi.',
                'sort_order' => 1,
            ],
            [
                'title' => 'Social Justice and Dalit Rights',
                'author' => 'VCK Publications',
                'description' => 'Comprehensive exploration of social justice issues and the fight for Dalit rights in Tamil Nadu.',
                'sort_order' => 1,
            ],
            [
                'title' => 'Tamil Nadu Politics: Modern Perspectives',
                'author' => 'Dr. K. Krishnasamy',
                'description' => 'Modern perspectives on Tamil Nadu politics and governance.',
                'sort_order' => 2,
            ],
            [
                'title' => 'Empowerment Through Education',
                'author' => 'VCK Education Wing',
                'description' => 'Strategies and initiatives for educational empowerment of marginalized communities.',
                'sort_order' => 1,
            ],
            [
                'title' => 'Legal Rights and Advocacy',
                'author' => 'VCK Legal Team',
                'description' => 'Guide to legal rights and advocacy for social justice.',
                'sort_order' => 1,
            ],
            [
                'title' => 'Community Development Initiatives',
                'author' => 'VCK Development Board',
                'description' => 'Various community development initiatives and their impact.',
                'sort_order' => 1,
            ],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}

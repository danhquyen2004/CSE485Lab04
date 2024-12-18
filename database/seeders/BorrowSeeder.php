<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Borrow;
use App\Models\Reader;
use App\Models\Book;
class BorrowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $readers = Reader::all();
        $books = Book::all();

        foreach (range(1, 10) as $index) {
            $reader = $readers->random();
            $book = $books->random();
            Borrow::create([
                'reader_id' => $reader->id, // ID của độc giả ngẫu nhiên
                'book_id' => $book->id, // ID của sách ngẫu nhiên
                'borrow_date' => $faker->date($format = 'Y-m-d', $max = '2024-12-31'), // Ngày mượn ngẫu nhiên
                'return_date' => $faker->date($format = 'Y-m-d', $max = '2025-12-31'), // Ngày trả ngẫu nhiên
                'status' => $faker->boolean(80), // 80% xác suất là đang mượn (0)
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

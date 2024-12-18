<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use Faker\Factory as Faker;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            Book::create([
                'name' => $faker->sentence(3), // Tên sách ngẫu nhiên với 3 từ
                'author' => $faker->name, // Tên tác giả ngẫu nhiên
                'category' => $faker->word, // Thể loại ngẫu nhiên
                'year' => $faker->year, // Năm xuất bản ngẫu nhiên
                'quantity' => $faker->numberBetween(1, 100), // Số lượng từ 1 đến 100
            ]);
        }
    }
}

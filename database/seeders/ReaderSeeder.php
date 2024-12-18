<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Reader;
class ReaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            Reader::create([
                'name' => $faker->name, // Tên độc giả ngẫu nhiên
                'birthday' => $faker->date($format = 'Y-m-d', $max = '2005-12-31'), // Ngày sinh ngẫu nhiên (trước năm 2005)
                'address' => $faker->address, // Địa chỉ ngẫu nhiên
                'phone' => $faker->unique()->phoneNumber, // Số điện thoại duy nhất
            ]);
        }
    }
}

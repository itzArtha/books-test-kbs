<?php

namespace Database\Seeders;

use App\Actions\Actions\Book\StoreBook;
use App\Models\Book;
use App\Models\BookCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $categoryIds = BookCategory::pluck('id')->toArray();

        foreach (range(1, 1000) as $index) {
            StoreBook::run([
                'name' => $faker->sentence(3),
                'category_id' => $faker->randomElement($categoryIds),
                'author' => $faker->name,
                'release_at' => $faker->date()
            ]);
        }
    }
}

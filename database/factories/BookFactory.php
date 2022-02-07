<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Book;
use App\Models\Genre;
use App\Models\Author;

class BookFactory extends Factory
{
    protected $model = Book::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $genres = Genre::get();
        $genre_ids = [];
        foreach($genres as $genre) {
          $genre_ids[] = $genre->id;
        }
        $authors = Author::get();
        $author_ids = [];
        foreach($authors as $author) {
          $author_ids[] = $author->id;
        }
        return [
            'title' => $this->faker->sentence(3),
            'author_id' => $this->faker->numberBetween(min($author_ids), max($author_ids)),
            'genre_id' => $this->faker->numberBetween(min($genre_ids), max($genre_ids)),
            'description' => $this->faker->text(490),
            'publish_date' => $this->faker->dateTimeBetween('-7 days', '+2 months')->format('Y-m-d')
        ];
    }
}

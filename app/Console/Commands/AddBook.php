<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Book;
use App\Models\Genre;
use App\Models\Author;

class AddBook extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:book';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add a book to the database.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $genres = Genre::get();
        if (!count($genres)) {
            $this->info('It looks like there are no genres to choose from, run "php artisan add:genre to create one"');
            return 0;
        }
        $authors = Author::get();
        if (!count($genres)) {
            $this->info('It looks like there are no authors to choose from, run "php artisan add:author to create one"');
            return 0;
        }
        $title = null;
        while (is_null($title)) {
            $title = $this->ask('What is the books title?');
        }
        $publish_date = $this->ask('Please enter the books publish date in the following format: (mm/dd/yyyy) or leave empty to use todays date');
        if (is_null($publish_date)) {
            $publish_date = date('m/d/Y');
        }
        $genre_question = 'Select a genre from the following by entering its respective ID: ';
        foreach ($genres as $genre) {
            $genre_question .= "[{$genre->id}] {$genre->title}, ";
        }
        $genre_id = null;
        while (is_null($genre_id)) {
            $genre_id = $this->ask(substr_replace($genre_question, '', -2));
        }
        $author_question = 'Select an author from the following by entering his/her respective ID: ';
        foreach ($authors as $author) {
            $author_question .= "[{$author->id}] {$author->name}, ";
        }
        $author_id = null;
        while (is_null($author_id)) {
            $author_id = $this->ask(substr_replace($author_question, '', -2));
        }

        $description = $this->ask('Please enter the books description or leave empty to use latin filler text: ');
        if (is_null($description)) {
            $description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';
        }
        try {
            Book::create(['title' => $title, 'author_id' => $author_id, 'genre_id' => $genre_id, 'publish_date' => $publish_date, 'description' => $description]);
        } catch (\Illuminate\Database\QueryException $e) {
            $this->error('Something happened when adding the book, please ensure all values are correct and try again.');
            return 0;
        }
        $this->info('Book successfully added.');
    }
}

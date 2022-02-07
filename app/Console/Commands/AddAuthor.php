<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Author;

class AddAuthor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:author';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add an author to the database.';

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
        $name = $this->ask('What is the author\'s full name?');
        $biography = $this->ask('Please enter the authors biography, or leave empty to use latin generator text.');
        try {
            if (!$biography) {
              $biography = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';
            }
            Author::create(['name' => $name, 'biography' => $biography]);
        } catch (\Illuminate\Database\QueryException $e) {
            $this->error('Something happened when adding the author, please ensure the title is in the correct format.');
            return 0;
        }
        $this->info('Author successfully added.');
        return 0;
    }
}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Genre;

class AddGenre extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:genre';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add a genre to the database.';

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
        $title = $this->ask('What will be the name of the genre?');
        try {
          Genre::create(['title' => $title]);
        } catch (\Illuminate\Database\QueryException $e) {
          $this->error('Something happened when adding the genre, please ensure the title is in the correct format.');
          return 0;
        }
        $this->info('Genre successfully added.');
        return 0;
    }
}

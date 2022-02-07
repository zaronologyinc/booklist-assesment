<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Genre;
use App\Models\Author;

class Book extends Model
{
    
    use HasFactory;
    protected $table = 'books';
    protected $primaryKey = 'id';
    protected $fillable = [
      'title',
      'description',
      'publish_date',
      'author_id',
      'genre_id',
      'created_at',
      'updated_at'
    ];

    protected $dates = ['created_at', 'updated_at', 'publish_date'];

    public function genre()
    {
        return $this->hasOne(Genre::class, 'id', 'genre_id');
    }

    public function author()
    {
        return $this->hasOne(Author::class, 'id', 'author_id');
    }

}

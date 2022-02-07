<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;
    protected $table = 'genres';
    protected $primaryKey = 'id';
    protected $fillable = [
      'title',
      'created_at',
      'updated_at'
    ];

    protected $dates = ['created_at', 'updated_at'];
}

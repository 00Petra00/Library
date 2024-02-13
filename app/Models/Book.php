<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';
    public $primaryKey = 'id';
    public $timestamps = true;

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

 class Book extends Model
 {
    protected $table = 'books';

    protected $fillable = ['title', 'description', 'author'];


    public function author()
    {
        return $this->belongsTo(Author::class);
    }
 }
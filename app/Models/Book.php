<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = 'books';
    public $incrementing = true;
    public $fillable = [
        'title',
        'author',
        'category_id',
        'isbn',
        'price',
        'publisher',
        'publish_date',
        'description',
        'stock_quantity',
        'image_url',
        'slug'
    ];
}

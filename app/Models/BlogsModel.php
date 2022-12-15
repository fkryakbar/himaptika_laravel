<?php

namespace App\Models;

use Database\Factories\BlogsFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogsModel extends Model
{
    use HasFactory;

    protected $table = 'blogs';

    protected $fillable = ['slug', 'title', 'image_path', 'description', 'content', 'author', 'views'];

    protected static function newFactory()
    {
        return BlogsFactory::new();
    }
}

<?php

namespace Database\Factories;

use App\Models\BlogsModel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BlogsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'slug' => Str::random(5) . '-' . Str::random(5),
            'title' => Str::random(10),
            'image_path' => 'storage/coba-123.jpeg',
            'description' => Str::random(15),
            'content' => Str::random(20),
            'author' => 'Admin',
            'views' => 0,
        ];
    }

    protected $model = BlogsModel::class;
}

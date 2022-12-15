<?php

namespace Database\Seeders;

use App\Models\BlogsModel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BlogsModel::newFactory()
            ->count(20)
            ->hasPosts(1)
            ->create();
    }
}

<?php

namespace Database\Seeders;

;

use App\Models\image;
use App\Models\Todos;
use App\Models\Todos_image;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        image::factory()->count(5)->create();
        // Todos::factory()->count(8)->create();
        // Todos_image::factory()->count(10)->create();
        $this->call(TodosSeeder::class);
        $this->call(TodosImageSeeder::class);
    }
}

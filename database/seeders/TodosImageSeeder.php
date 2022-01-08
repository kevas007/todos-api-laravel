<?php

namespace Database\Seeders;
use App\Models\image;
use App\Models\Todos;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TodosImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 10; $i++) {
            DB::table('todos_images')->insert([
                'todos_id' =>Todos::inRandomOrder()->first()->id,
                'images_id' => image::inRandomOrder()->first()->id,
            ]);
        }
    }
}

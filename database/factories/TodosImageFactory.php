<?php

namespace Database\Factories;

use App\Models\image;
use App\Models\Todos;
use Illuminate\Database\Eloquent\Factories\Factory;

class TodosImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $todos=  Todos::inRandomOrder()->first();
        $image=  image::inRandomOrder()->first();

        return [
            'todos_id' => $todos->id,
            'images_id' => $image->id,

        ];
    }
}

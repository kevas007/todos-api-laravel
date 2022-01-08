<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTodosView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('todo_view', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });
        DB::statement($this->CreateView());
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement($this->dropView());
        // Schema::dropIfExists('todo_view');
    }
      /**
     * Reverse the migrations.
     *
     * @return void
     */
    private function createView()
    {
        return "CREATE OR REPLACE VIEW todos_view
        AS
        SELECT
            todos.id,
            todos.title,
            todos.description,
            todos.completed,
            todos.created_at,
            todos.updated_at,
            images.id AS image_id,
            images.cover AS image_cover,
            images.created_at AS image_created_at,
            images.updated_at AS image_updated_at,
            (SELECT COUNT(*) FROM todos_images WHERE todos_images.todos_id = todos.id) AS image_count),
            (SELECT COUNT(*) FROM todos_images WHERE images ON todos_images.images_id = images.id) AS image_count
        FROM
            todos
        -- LEFT JOIN
        -- todos_images ON todos.id = todos_images.todos_id

        -- LEFT JOIN
        -- images ON todos_images.images_id = images.id
    ";

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    private function dropView(): string
    {
        return "DROP VIEW IF EXISTS todo_view";
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Todos_image;
use App\Http\Requests\StoreTodos_imageRequest;
use App\Http\Requests\UpdateTodos_imageRequest;
use App\Models\image;
use App\Models\Todos;
use Illuminate\Support\Facades\DB;

class TodosImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = DB::table('todos_view')->get();
            // dd($todos->count());

        $todosImages = [
            'todos' => $todos,
        ];
        return response()
        ->json( ['data' =>$todosImages ,'success' => true,'message'=>'resto inserted successfully'],200)
        ->header('Content-Type', 'application/json');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTodos_imageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTodos_imageRequest $request)
    {
        $store = new Todos_image;
        $todos = new  Todos;
        $todos->title = $request->title;
        $todos->description = $request->description;
        $todos->completed = $request->completed;
        $todos->save();
        $store->todos_id = $todos->id;
        $images = new image;
        $images->cover = $request->cover;
        $images->save();
        $store->image_id = $images->id;
        $store->save();
        return response()
        ->json( ['data' =>$store ,'success' => true,'message'=>'resto inserted successfully'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todos_image  $todos_image
     * @return \Illuminate\Http\Response
     */
    public function show(Todos_image $todos_image)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTodos_imageRequest  $request
     * @param  \App\Models\Todos_image  $todos_image
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTodos_imageRequest $request, Todos_image $todos_image)
    {
        $update = Todos_image::find($todos_image->id);
        $todos = new  Todos;
        $todos->title = $request->title;
        $todos->description = $request->description;
        $todos->completed = $request->completed;
        $todos->save();
        $update->todos_id = $request->todos_id;
        $images = new image;
        $images=  image::find($todos_image->image_id);
        $images->delete();
        $images->cover = $request->cover;
        $images->save();
        $update->image_id = $request->image_id;
        $update->save();
        response()
        ->json( ['data' =>$update ,'success' => true,'message'=>'resto updated successfully'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todos_image  $todos_image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todos_image $todos_image)
    {
        // $todos_image->delete();
        $todos_image = image::find($todos_image->image_id);
        $todos_image->delete();
        response()
        ->json( ['data' =>$todos_image ,'success' => true,'message'=>'resto deleted successfully'],200);

    }
}

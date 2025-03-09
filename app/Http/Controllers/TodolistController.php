<?php

namespace App\Http\Controllers;

use App\Models\Todolist;
use Illuminate\Http\Request;

class TodolistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todolist = Todolist::all();

        return response()->json([
            'todolist' => $todolist,
            'message' => 'success',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $todolist = new Todolist();
        $todolist->task = $request->task;
        $todolist->status = $request->status;
        $todolist->save();

        return response()->json($todolist, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Todolist $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todolist $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todolist $id)
    {
        $todolist = Todolist::find($id);
        if(!$todolist){
            return response()->json([
                'message' => 'not found'
            ],404);
        }
        $todolist->task = $request->task;
        $todolist->status = $request->status;
        $todolist->save();

        return response()->json([
            'message' =>'successfully updated',
            'task' => $todolist->task,
            'status' => $todolist->status,
            'text' => $todolist->text
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todolist $id)
    {
        $todolist = Todolist::find($id);

        if ($todolist) {
            $todolist->delete();
        }

        return response()->json([
            'message' => 'successfully deleted'
        ]);
    }
}

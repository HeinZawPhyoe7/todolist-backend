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
        $request->validate([
            'task' => 'required|string',
            'status' => 'boolean',
        ]);

        $todolist = new Todolist();
        $todolist->task = $request->task;
        $todolist->status = (bool) $request->status;
        $todolist->save();

        return response()->json($todolist, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $todolist = Todolist::find($id);
        if (!$todolist) {
            return response()->json([
                'message' => 'not found'
            ], 404);
        }

        $todolist->status = (bool) $request->status;
        $todolist->save();

        return response()->json([
            'message' => 'successfully updated',
            'task' => $todolist->task,
            'status' => $todolist->status,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $todolist = Todolist::find($id);

        if ($todolist) {
            $todolist->delete();
        }

        return response()->json([
            'message' => 'successfully deleted'
        ]);
    }


    public function getcomplete()
    {
        $completedTasks = Todolist::where('status', '1')->get();

        return response()->json([
            'completedTasks' => $completedTasks,
            'message' => 'success',
        ]);
    }

    public function incomplete()
    {
        $incompletedTasks = Todolist::where('status', '0')->get();

        return response()->json([
            'incompletedTasks' => $incompletedTasks,
            'message' => 'success',
        ]);
    }
}

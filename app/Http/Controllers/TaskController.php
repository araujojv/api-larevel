<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    
    public function index()
    {
        return Task::all();  
    }

    
    public function store(Request $request)
    {
        $task = Task::create($request->all());  
        return response()->json($task, 201);  
    }

    
    public function show($id)
    {
        return Task::findOrFail($id);  
    }
}

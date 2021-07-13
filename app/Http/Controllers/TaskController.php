<?php

namespace App\Http\Controllers;
use App\Models\Task;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::latest()->paginate(5);
        return view('task.index', [
            'tasks' => $tasks, 
        ]);
    }

    public function create()
    {
        return view('task.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:255'

        ]);
    
        Task::create($request->all());
        return redirect()->route('task.index')->with('success','task created successfully');

    }

    public function destroy($id)
    {
        Task::destroy($id);
        return back()->with('success','task deleted successfully');
    }

    public function edit($id)
    {
        $task=Task::findOrFail($id);
    
        return view('task.edit', [
            'task' => $task,
        ]);
        
    }
    public function update($id, Request $request)
    {
        
        Task::where('id', $id)
            ->update([
                'name'=> $request->name,
            ]);
        return redirect()->route('task.index')->with('success','task updated successfully');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    // Show all todos
    public function index()
    {
        $todos = Todo::all();
        return view('todos.index', compact('todos'));
    }

    // Store a new todo
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
        ]);

        Todo::create([
            'title' => $request->title,
        ]);

        return redirect()->back()->with('success', 'Task added!');
    }

    // Mark todo as completed
    public function complete($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->completed = true;
        $todo->save();

        return redirect()->back()->with('success', 'Task marked as completed!');
    }

    // Delete a todo
    public function destroy($id)
    {
        Todo::destroy($id);
        return redirect()->back()->with('success', 'Task deleted!');
    }
}

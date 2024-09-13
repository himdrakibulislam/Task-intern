<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    // Display the list of todos
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

        Todo::create($request->all());

        return redirect()->route('todos.index')->with('success', 'Todo created successfully.');
    }

    // Edit a todo
    public function edit($id)
    {
        $todo = Todo::findOrFail($id);
        return view('todos.edit', compact('todo'));
    }

    // Update a todo
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
        ]);

        $todo = Todo::findOrFail($id);
        $todo->update($request->all());

        return redirect()->route('todos.index')->with('success', 'Todo updated successfully.');
    }

    // Delete a todo
    public function destroy($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();

        return redirect()->route('todos.index')->with('success', 'Todo deleted successfully.');
    }
}

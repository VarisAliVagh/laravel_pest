<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function create(Request $request)
    {
        $request->validate($this->rules());

        $todo = Todo::create($request->only(['name']));

        $data = [
            'message' => 'To-do has been created',
            'todo' => $this->mapTodoResponse($todo)
        ];

        return response()->json($data, 201);
    }

    public function show(Todo $todo)
    {
        // dd($todo->toArray(), $this->mapTodoResponse($todo));
        $data = [
            'message' => 'Retrieved To-do.',
            'todo' => $this->mapTodoResponse($todo)
        ];

        return response()->json($data);
    }

    public function update(Todo $todo, Request $request)
    {
        $request->validate($this->rules());

        $todo->update($request->only(['name']));
        $todo->refresh();

        $data = [
            'message' => 'To-do has been updated',
            'todo' => $this->mapTodoResponse($todo)
        ];

        return response()->json($data);
    }

    public function delete(Todo $todo)
    {
        $todo->delete();

        $data = [
            'message' => 'To-do has been deleted'
        ];

        return response()->json($data);
    }

    protected function rules()
    {
        return [
            'name' => 'required|string|min:4'
        ];
    }

    protected function mapTodoResponse($todo)
    {
        return [
            'id' => $todo->id,
            'name' => $todo->name,
            'completed' => $todo->completed
        ];
    }
}

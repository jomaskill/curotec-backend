<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use App\Http\Resources\TodoResource;
use App\Models\Todo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TodoController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return TodoResource::collection(Todo::all());
    }

    public function store(StoreTodoRequest $request): TodoResource
    {
        return new TodoResource(
            Todo::create($request->validated())
        );
    }

    public function update(UpdateTodoRequest $request, Todo $todo): TodoResource
    {
        return new TodoResource(
            tap($todo)->update($request->validated())
        );
    }

    public function destroy(Todo $todo): JsonResponse
    {
        $todo->delete();

        return response()->json();
    }
}

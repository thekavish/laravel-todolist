<?php

namespace Thekavish\Todolist\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Thekavish\Todolist\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('task.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tasks  = Task::all();
        $submit = 'Add';

        return view('thekavish.todolist.list', compact('tasks', 'submit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Task::create($request->all());

        return redirect()->route('task.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Task $task
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $tasks  = Task::all();
        $submit = 'Update';

        return view('thekavish.todolist.list', compact('tasks', 'task', 'submit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  Task    $task
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $task->update($request->all());

        return redirect()->route('task.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Task $task
     *
     * @return Response
     * @throws \Exception
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('task.create');
    }
}

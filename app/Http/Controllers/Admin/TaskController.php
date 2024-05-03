<?php

namespace App\Http\Controllers\Admin;

use App\Models\Task;
use App\Models\Lessons;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::orderBy('created_at','ASC')->paginate(15);
        foreach ($tasks as $key=>$task) {
            if ($task->lesson_id) {
                $task[$key]['lesson'] = Lessons::where('id', $task->lesson_id)->get();
            }
        }
        return view('admins.task.index', [
            'tasks' => $tasks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.task.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $task = new Task();
        $task->name = $request->name;
        $task->description = $request->description;
        $task->type_task = $request->type;
        $task->active = $request->active;
        $task->lesson_id = 0;

        $task->save();
        $message = 'Успешно добавлено';
        return view('admins.task.add', [
            'message' => $message,
            'task' => $task
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('admins.task.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {

        $task->name = $request->name;
        $task->description = $request->description;
        $task->type_task = $request->type;
        $task->active = $request->active;
        $task->lesson_id = 0;

        $task->save();

        $message = 'Успешно обновлено';

        return view('admins.task.add', [
            'message' => $message,
            'task' => $task
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        $message = 'Успешно удалено';
        return view('admins.task.add', [
            'message' => $message,
            'task' => $task,
        ]);
    }
}
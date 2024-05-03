<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lessons;
use App\Models\Task;
use Illuminate\Http\Request;

class LessonsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lessons = Lessons::all();
        return view('admins.lessons.index', [
            'lessons' => $lessons,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tasks = Task::orderBy('created_at','ASC')->get();
        return view('admins.lessons.create',[
            'tasks' => $tasks
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $lesson = new Lessons();
        $lesson->name = $request->name;
        $lesson->description = $request->description;

        if (auth()->user()->hasRole('teacher')) {
            $teacher = auth()->user()->get('id');
        } else {
            $teacher = 0;
        }

        $lesson->teacher_id = $teacher;
        
        //$lesson->task_id = $request->task_ids;

        $lesson->images = ($request->images ? $request->images :'');

        $lesson->videos = ($request->videos ? $request->videos : '');

        $lesson->materials = ($request->materials ? $request->materials : '');

        $lesson->save();

        return redirect()->back()->withSuccess('Лекция успешно создана');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lessons $lessons)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lessons $lesson)
    {
        //$tasks = Task::where('id', $lesson->task_ids)->get();
        return view('admins.lessons.edit', [
            'lesson' => $lesson,
            'tasks' => '',//$tasks,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lessons $lesson)
    {
        $lesson->name = $request->name;
        $lesson->description = $request->description;
        $lesson->images = $request->images;
        $lesson->videos = ($request->videos ? $request->videos : '');

        $lesson->materials = '';

        $lesson->save();

        return redirect()->back()->withSuccess('Лекция успешно обновлена');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lessons $lesson)
    {
        $lesson->delete();

        return redirect()->back()->withSuccess('Лекция успешно удалена');
    }
}
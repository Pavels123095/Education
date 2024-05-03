<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $group = Group::all();
        $real_students = 0;
        foreach ($group as $gr) {
            $real_students += User::where('group_id',$gr->id)->count();
        }
        return view('admins.group.index', [
            'groups' => $group,
            'real_students' => $real_students
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.group.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $groups = new Group();
        $groups->name = $request->name;
        $groups->count_students_max = ($request->count_students ? $request->count_students : 5);

        $groups->save();

        return redirect()->back()->withSuccess('Группа добавлена');
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Group $group)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Group $group)
    {
        $group->name = $request->name;
        $group->count_students_max = ($request->count_students ? $request->count_students : 5);

        $group->save();

        return redirect()->back()->withSuccess('Группа обновлена');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
        $group->delete();
        return redirect()->back()->withSuccess('Группа удалена');
    }
}
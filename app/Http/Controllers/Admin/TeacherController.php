<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class TeacherController extends Controller
{

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = User::role('teacher')->orderBy('name','ASC')->paginate(5);

        return view('admins.teachers.index', [
            'teachers' => $teachers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;

        if ($request->password == $request->password_verify) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        if ($request->role == 'teacher') {
            $user->assignRole('teacher');
        } else {
            $user->assignRole('student');
        }

        return redirect()->back()->withSuccess('Пользователь добавлен!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $teacher)
    {
        $teacher->name = $request->name;
        $teacher->phone = $request->phone;
        $teacher->email = $request->email;

        if (!empty($request->password) && !empty($request->password_verify)) {
            if ($request->password == $request->password_verify) {
                $teacher->password = Hash::make($request->password);
            }
        }

        if (!$teacher->hasRole($request->role)) {

            $teacher->roles()->detach();

            if ($request->role == 'teacher') {
                $teacher->assignRole('teacher');
            } else {
                $teacher->assignRole('student');
            }
            
        }
        
        $teacher->save();

        return redirect()->back()->withSuccess('Пользователь обновлен');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $teacher)
    {
        $teacher->delete();

        return redirect()->back()->withSuccess('Пользователь удален!');
    }
}

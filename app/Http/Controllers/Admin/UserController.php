<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
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

        if ($request->group != 'not') {
            $user->group_id = $request->group;
        }

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
    public function update(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        
        if ($request->group != 'not') {
            $user->group_id = $request->group;
        } else {
            $user->group_id = null;
        }

        if (!empty($request->password) && !empty($request->password_verify)) {
            if ($request->password == $request->password_verify) {
                $user->password = Hash::make($request->password);
            }
        }

        if (!$user->hasRole($request->role)) {

            $user->removeRole();

            if ($request->role == 'teacher') {
                $user->assignRole('teacher');
            } else {
                $user->assignRole('student');
            }
            
        }
        
        $user->save();

        return redirect()->back()->withSuccess('Пользователь обновлен');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}

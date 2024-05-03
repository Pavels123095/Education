<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Main_menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use App\Providers\RAppServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use \Spatie\Permission\Models\Role;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        return view('profiles', [
            'user' => $user,
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
        //
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
    public function edit(User $user, Request $request)
    {
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        if (!empty($request->password)) {
            if ($request->password != $request->password_verify) {
                return redirect()->back()->withError('Пароли не совпадают');
            } else {
                $user->password = Hash::make($request->password);
            }
        }

        $user->save();
        return redirect('profile')->withSuccess('Данные обновлены');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        if (!empty($request->password)) {
            if ($request->password != $request->password_verify) {
                return redirect('profile')->withError('Пароли не совпадают');
            } else {
                $user->password = Hash::make($request->password);
            }
        }

        $user->update();
        return redirect('profile')->withSuccess('Данные обновлены');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
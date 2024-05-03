<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Providers\RAppServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use \Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\Pages;
use App\Models\Articles;
use App\Models\Results;
use App\Models\Task;
use App\Models\Group;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {

        $students = User::all();
        $count_student = 0;
        $teacher_count = 0;
        foreach ($students as $user) {
            if ($user->hasRole('student')) $count_student++;
            if ($user->hasRole('teacher')) $teacher_count++;
        }
        $pages = Pages::all()->count();
        $articles = Articles::all()->count();

        return view('admin', [
            'students' => $count_student,
            'pages' => $pages,
            'articles' => $articles,
            'teachers' => $teacher_count
        ]);
    }

    public function students(Request $request) {

        if ($request->group != 'all' && $request->group != 'not_group'
            && !empty($request->group)) {
            $students = User::role('student')->where('group_id', $request->group)->paginate(5);
        } else if ($request->group == 'not_group') {
            $students = User::role('student')->where('group_id', null)->paginate(5);
        } else {
            $students = User::role('student')->orderBy('name','ASC')->paginate(5);
        }

        $groups = Group::all();
        if (!empty($students) && !empty($groups)) {
            foreach ($students as $key=>$student) {
                foreach ($groups as $group) {
                    if ($group->id == $student->group_id) {
                        $students[$key]->group = $group;
                    }
                }
            }
        }

        return view('admins.students', [
            'students' => $students,
            'groups' => $groups,
            'request' => $request,
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function translitSef($value = '') {

        $converter = array(
          'а' => 'a',    'б' => 'b',    'в' => 'v',    'г' => 'g',    'д' => 'd',
          'е' => 'e',    'ё' => 'e',    'ж' => 'zh',   'з' => 'z',    'и' => 'i',
          'й' => 'y',    'к' => 'k',    'л' => 'l',    'м' => 'm',    'н' => 'n',
          'о' => 'o',    'п' => 'p',    'р' => 'r',    'с' => 's',    'т' => 't',
          'у' => 'u',    'ф' => 'f',    'х' => 'h',    'ц' => 'c',    'ч' => 'ch',
          'ш' => 'sh',   'щ' => 'sch',  'ь' => '',     'ы' => 'y',    'ъ' => '',
          'э' => 'e',    'ю' => 'yu',   'я' => 'ya',
        );
      
        $value = mb_strtolower($value);
        $value = strtr($value, $converter);
        $value = mb_ereg_replace('[^-0-9a-z]', '-', $value);
        $value = mb_ereg_replace('[-]+', '-', $value);
        $value = trim($value, '-');	
      
        return $value;
    
      }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;

class TeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::paginate();
        return view('teacher.index', ['teachers' => $teachers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $teachers = Teacher::paginate();

        $teacher = new Teacher();
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->register = $request->register;

        if ($teacher->save()) {
            
            return view('teacher.index', ['teachers' => $teachers, 'message' => 'Successfully Created Teacher']);
        }
        else {
            return view('teacher.index', ['teachers' => $teachers, 'message' => 'Teacher is not created']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = Teacher::find($id);
        return view('teacher.edit', ['teacher' => $teacher]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $teacher = Teacher::find($id);
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->register = $request->register;
        if ($teacher->save()) {
            $teachers = Teacher::paginate();
            return view('teacher.index', ['teachers' => $teachers, 'message' => 'Successfully Updated Teacher']);
        }
        else {
            $teachers = Teacher::paginate();
            return view('teacher.index', ['teachers' => $teachers, 'message' => 'Teacher is not updated']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = Teacher::find($id);
        if ($teacher->delete()) {
            $teachers = Teacher::paginate();
            return view('teacher.index', ['teachers' => $teachers, 'message' => 'Successfully Removed Teacher']);
        }
        else {
            $teachers = Teacher::paginate();
            return view('teacher.index', ['teachers' => $teachers, 'message' => 'Teacher is not removed']);
        }
    }
}

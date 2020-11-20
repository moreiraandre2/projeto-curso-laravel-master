<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discipline;
use App\Teacher;

class AddTeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $findDiscipline = Discipline::find($id);
        $teachers = Teacher::all();
        return view('discipline.add_teacher', 
            ['findDiscipline' => $findDiscipline,
             'teachers' => $teachers]);
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
        $findDiscipline = Discipline::find($id);
        $findDiscipline->teacher_id = $request->teacher_id;
        if ($findDiscipline->save()) {
            $disciplines = Discipline::join('teachers', 'disciplines.teacher_id', '=', 'teachers.id')
                                    ->select('disciplines.*', 'teachers.name as teacher_name')
                                    ->paginate();

            $disciplinesWithoutTeacher = Discipline::where('teacher_id', '=', NULL)->get();
            
            return view('discipline.index', 
                            ['disciplines' => $disciplines, 
                             'disciplinesWithoutTeacher' => $disciplinesWithoutTeacher,  
                             'message' => 'Sussccefully added teacher in discipline.']);
        }
        else {
            $disciplines = Discipline::join('teachers', 'disciplines.teacher_id', '=', 'teachers.id')
                                    ->select('disciplines.*', 'teachers.name as teacher_name')
                                    ->paginate();

            $disciplinesWithoutTeacher = Discipline::where('teacher_id', '=', NULL)->get();
            
            return view('discipline.index', 
                            ['disciplines' => $disciplines, 
                            'disciplinesWithoutTeacher' => $disciplinesWithoutTeacher, 
                             'message' => 'Teacher is not added in discipline.']);
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
        //
    }
}

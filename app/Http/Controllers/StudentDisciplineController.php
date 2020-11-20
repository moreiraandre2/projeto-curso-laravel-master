<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Discipline;
use App\Student;
use App\StudentDiscipline;

class StudentDisciplineController extends Controller
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
        $id = DB::table('discipline_student')->insertGetId(
            [
             'student_id' => $request->student, 
             'discipline_id' => $request->discipline_id, 
             'created_at' => date('Y-m-d H:m:s')
            ]
        );
        
        if ($id) {
            $discipline = Discipline::find($request->discipline_id);
            $students = Student::all();

            return view('discipline.students', ['discipline' => $discipline, 'students' => $students]);
        }
        else {
            $discipline = Discipline::find($request->discipline_id);
            $students = Student::all();

            return view('discipline.students', ['discipline' => $discipline, 'students' => $students]);
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
        $discipline = Discipline::find($id);
        $students = Student::all();

        return view('discipline.students', ['discipline' => $discipline, 'students' => $students]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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

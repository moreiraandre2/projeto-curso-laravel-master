<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FieldWorkStudent;
use App\Student;
use App\FieldWork;

class FieldWorkStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fieldWorkStudents = FieldWorkStudent::join('field_works', 'field_work_students.field_work_id', '=', 'field_works.id')
                                             ->join('students', 'field_work_students.student_id', '=', 'students.id')
                                             ->join('disciplines', 'field_works.discipline_id', '=', 'disciplines.id')
                                             ->select('field_work_students.*', 'field_works.city', 'disciplines.name as discipline', 'students.name as student')
                                             ->paginate();
        $fieldWorks = FieldWork::all();
        $students = Student::all();

        return view('field_work_students.index', ['fieldWorkStudents' => $fieldWorkStudents, 'students' => $students, 'fieldWorks' => $fieldWorks]);
       
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
        $fieldWorkStudent = new FieldWorkStudent();
        $fieldWorkStudent->field_work_id = $request->field_work_id;
        $fieldWorkStudent->student_id = $request->students_id;
        if ($fieldWorkStudent->save()) {

            $fieldWorkStudents = FieldWorkStudent::join('field_works', 'field_work_students.field_work_id', '=', 'field_works.id')
                                             ->join('students', 'field_work_students.student_id', '=', 'students.id')
                                             ->join('disciplines', 'field_works.discipline_id', '=', 'disciplines.id')
                                             ->select('field_work_students.*', 'field_works.city', 'disciplines.name as discipline', 'students.name as student')
                                             ->paginate();
            $fieldWorks = FieldWork::all();
            $students = Student::all();

            return view('field_work_students.index', 
                ['fieldWorkStudents' => $fieldWorkStudents, 
                 'students' => $students, 
                 'fieldWorks' => $fieldWorks,
                 'message' => 'Successfully Created Student in Field Work']);
        
        }
        else {
            $fieldWorkStudents = FieldWorkStudent::join('field_works', 'field_work_students.field_work_id', '=', 'field_works.id')
                                             ->join('students', 'field_work_students.student_id', '=', 'students.id')
                                             ->join('disciplines', 'field_works.discipline_id', '=', 'disciplines.id')
                                             ->select('field_work_students.*', 'field_works.city', 'disciplines.name as discipline', 'students.name as student')
                                             ->paginate();
            $fieldWorks = FieldWork::all();
            $students = Student::all();

            return view('field_work_students.index', 
                ['fieldWorkStudents' => $fieldWorkStudents, 
                 'students' => $students,
                 'fieldWorks' => $fieldWorks,
                 'message' => 'Student in Field Work is not Created']);
        
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
        $fieldWorkStudent = FieldWorkStudent::find($id);
        if ($fieldWorkStudent->delete()) {

            $fieldWorkStudents = FieldWorkStudent::join('field_works', 'field_work_students.field_work_id', '=', 'field_works.id')
                                             ->join('students', 'field_work_students.student_id', '=', 'students.id')
                                             ->join('disciplines', 'field_works.discipline_id', '=', 'disciplines.id')
                                             ->select('field_work_students.*', 'field_works.city', 'disciplines.name as discipline', 'students.name as student')
                                             ->paginate();
            $fieldWorks = FieldWork::all();
            $students = Student::all();

            return view('field_work_students.index', 
                ['fieldWorkStudents' => $fieldWorkStudents, 
                 'students' => $students, 
                 'fieldWorks' => $fieldWorks,
                 'message' => 'Successfully Removed Student in Field Work']);
        
        }
        else {
            $fieldWorkStudents = FieldWorkStudent::join('field_works', 'field_work_students.field_work_id', '=', 'field_works.id')
                                             ->join('students', 'field_work_students.student_id', '=', 'students.id')
                                             ->join('disciplines', 'field_works.discipline_id', '=', 'disciplines.id')
                                             ->select('field_work_students.*', 'field_works.city', 'disciplines.name as discipline', 'students.name as student')
                                             ->paginate();
            $fieldWorks = FieldWork::all();
            $students = Student::all();

            return view('field_work_students.index', 
                ['fieldWorkStudents' => $fieldWorkStudents, 
                 'students' => $students,
                 'fieldWorks' => $fieldWorks,
                 'message' => 'Student in Field Work is not Removed']);
        
        }
    }
}

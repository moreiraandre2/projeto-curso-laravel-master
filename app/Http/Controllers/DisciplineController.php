<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discipline;
use App\Teacher;

class DisciplineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $disciplines = Discipline::join('teachers', 'disciplines.teacher_id', '=', 'teachers.id')
                                    ->select('disciplines.*', 'teachers.name as teacher_name')
                                    ->paginate();
        $disciplinesWithoutTeacher = Discipline::where('teacher_id', '=', NULL)->get();
        return view('discipline.index', ['disciplines' => $disciplines, 'disciplinesWithoutTeacher' => $disciplinesWithoutTeacher]);
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
        $discipline = new Discipline();
        $discipline->name = $request->name;
        $discipline->register = $request->register;
        $discipline->teacher_id = $request->teacher;
        $discipline->period = $request->period;
        $discipline->weekly_day = $request->weekly_day;

        if ($discipline->save()) {
            $disciplines = Discipline::join('teachers', 'disciplines.teacher_id', '=', 'teachers.id')
                                    ->select('disciplines.*', 'teachers.name as teacher_name')
                                    ->paginate();

            $disciplinesWithoutTeacher = Discipline::where('teacher_id', '=', NULL)->get();
            
            return view('discipline.index', 
                            ['disciplines' => $disciplines, 
                             'disciplinesWithoutTeacher' => $disciplinesWithoutTeacher,  
                             'message' => 'Sussccefully created discipline.']);
        }
        else {
            $disciplines = Discipline::join('teachers', 'disciplines.teacher_id', '=', 'teachers.id')
                                    ->select('disciplines.*', 'teachers.name as teacher_name')
                                    ->paginate();

            $disciplinesWithoutTeacher = Discipline::where('teacher_id', '=', NULL)->get();
            
            return view('discipline.index', 
                            ['disciplines' => $disciplines, 
                             'disciplinesWithoutTeacher' => $disciplinesWithoutTeacher, 
                             'message' => 'Discipline is not created.']);
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
        $discipline = Discipline::find($id);
        if ($discipline->delete()) {
            $disciplines = Discipline::join('teachers', 'disciplines.teacher_id', '=', 'teachers.id')
                                    ->select('disciplines.*', 'teachers.name as teacher_name')
                                    ->paginate();

            $disciplinesWithoutTeacher = Discipline::where('teacher_id', '=', NULL)->get();

            return view('discipline.index', 
                            ['disciplines' => $disciplines, 
                                'disciplinesWithoutTeacher' => $disciplinesWithoutTeacher, 
                             'message' => 'Sussccefully removed discipline.']);
        }
        else {
            $disciplines = Discipline::join('teachers', 'disciplines.teacher_id', '=', 'teachers.id')
                                    ->select('disciplines.*', 'teachers.name as teacher_name')
                                    ->paginate();
                                    
            $disciplinesWithoutTeacher = Discipline::where('teacher_id', '=', NULL)->get();

            return view('discipline.index', 
                            ['disciplines' => $disciplines, 
                            'disciplinesWithoutTeacher' => $disciplinesWithoutTeacher,
                             'message' => 'Discipline is not removed.']);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FieldWorkStudent;
use Illuminate\Support\Facades\Mail;
use App\Student;
use App\FieldWork;
use App\Discipline;

class SendMailLogController extends Controller
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
        $fieldWorkStudents = FieldWorkStudent::join('students', 'field_work_students.student_id',  '=', 'students.id')
            ->select('students.name', 'students.ra')
            ->where('field_work_students.field_work_id', '=', $id)
            ->get();
        
        $travelDate = FieldWork::select('travel_date')->where('id', $id)->get();

        $weekly_day = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday');

        $travelDayName = $weekly_day[date('w', strtotime($travelDate[0]->travel_date))];

        $findTeacherByWeeklyDay = Discipline::join('teachers', 'disciplines.teacher_id', '=', 'teachers.id')
            ->select('teachers.name', 'teachers.email')
            ->where('disciplines.weekly_day', '=', $travelDayName)
            ->get();

            $data = array(
                'fieldWorkStudents' => $fieldWorkStudents,
                'travelDate' => $travelDate,
                'travelDayName' => $travelDayName,
                'findTeacherByWeeklyDay' => $findTeacherByWeeklyDay
            );

            //return view('emails.mail', $data);
            Mail::send('emails.mail', $data, function($message){
                $message->to('<<seuemail@unicamp.br>>')
                        ->subject('Teste de Envio');
                $message->from('test_send@laravel.com', 'Test Mail');
            });
        
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

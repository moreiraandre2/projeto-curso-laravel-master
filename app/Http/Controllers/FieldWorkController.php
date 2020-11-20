<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FieldWork;
use App\Discipline;

class FieldWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fieldWorks = FieldWork::join('disciplines', 'field_works.discipline_id', '=', 'disciplines.id')
                                ->select('field_works.*', 'disciplines.name')                        
                                ->paginate();
        $disciplines = Discipline::all();
        return view('fieldwork.index', ['fieldWorks' => $fieldWorks, 'disciplines' => $disciplines]);
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
        $fieldWork = new FieldWork();
        $fieldWork->discipline_id = $request->discipline_id;
        $fieldWork->city = $request->city;
        $fieldWork->travel_date = $request->travel_date;
        if ($fieldWork->save()) {
            $fieldWorks = FieldWork::join('disciplines', 'field_works.discipline_id', '=', 'disciplines.id')
                                ->select('field_works.*', 'disciplines.name')                        
                                ->paginate();
            $disciplines = Discipline::all();
            return view('fieldwork.index', ['fieldWorks' => $fieldWorks, 'disciplines' => $disciplines, 'message' => 'Successfully Created Field Work']);
        }
        else {
            $fieldWorks = FieldWork::join('disciplines', 'field_works.discipline_id', '=', 'disciplines.id')
                                ->select('field_works.*', 'disciplines.name')                        
                                ->paginate();
            $disciplines = Discipline::all();
            return view('fieldwork.index', ['fieldWorks' => $fieldWorks,  'disciplines' => $disciplines, 'message' => 'Field Work is not created']);
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
        $fieldWork = FieldWork::find($id);
        if ($fieldWork->delete()) {
            $fieldWorks = FieldWork::join('disciplines', 'field_works.discipline_id', '=', 'disciplines.id')
                                ->select('field_works.*', 'disciplines.name')                        
                                ->paginate();
            $disciplines = Discipline::all();
            return view('fieldwork.index', ['fieldWorks' => $fieldWorks, 
                                            'disciplines' => $disciplines, 
                                            'message' => 'Successfully Removed Field Work']);
        }
        else {
            $fieldWorks = FieldWork::join('disciplines', 'field_works.discipline_id', '=', 'disciplines.id')
                                ->select('field_works.*', 'disciplines.name')                        
                                ->paginate();
            $disciplines = Discipline::all();
            return view('fieldwork.index', ['fieldWorks' => $fieldWorks, 
                                            'disciplines' => $disciplines, 
                                            'message' => 'Field Work is not Removed']);
        }
    }
}

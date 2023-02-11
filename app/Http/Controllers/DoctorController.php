<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::all();
        $doctors = Doctor::all();
       return view('doctor.index')->with('doctors',$doctors)->with('sections',$sections);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
$sections = Section::all();
$doctor = Doctor::with('section')->get();
          return view('doctor.create')->with('sections',$sections);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $doctor = Doctor::create([

            'name' => $request->name,
            'section_id' => $request->section_id,


            'phone' => $request->phone,
            'specialization' => $request->specialization,



        ]);




        return redirect()->route('doctors.index')->with('تمت', 'تم الإضافة  بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $doctor = Doctor::where('id', $id)->first();

        return view('doctor.index')
        ->with('doctor', $doctor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $doctor = Doctor::where('id', $id)->first();
        $doctor = Doctor::with('section')->get();
        return view('doctor.edit')
        ->with('doctor', $doctor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {
        $doctor->update($request->all());
        session()->flash('Edit', 'تم تعديل بيانات الدكتور بنجاح');
        return redirect('/doctors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $doctor = Doctor::findOrFail($request->pro_id);
        $doctor->delete();
        session()->flash('delete', 'تم حذف المنتج بنجاح');
        return back();;
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Doctor as ModelsDoctor;
use App\Models\Section;
use AppModels\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $sections = Section::all();
        $doctors = ModelsDoctor::with('section')->get();
        return view('team.doctor.index', ['doctors' => $doctors])->with('sections',$sections);
    }

    // public function create()
    // {
    //     $sections = ModelsDoctor::all();
    //     return view('doctor.create', ['sections' => $sections]);
    // }

    public function store(Request $request)
    {
        $doctor = new ModelsDoctor;
        $doctor->name = $request->input('name');
        $doctor->section_id = $request->input('section_id');
        $doctor->specialization = $request->input('specialization');
        $doctor->phone = $request->input('phone');

        $doctor->save();
        return redirect('/doctors');
    }

    public function show($id)
    {
        $doctor = ModelsDoctor::find($id);
        return view('doctor.show', ['doctor' => $doctor]);
    }

    public function edit($id)
    {
        $doctor = ModelsDoctor::find($id);
        $sections = Section::all();
        return view('doctor.edit', ['doctor' => $doctor, 'sections' => $sections]);
    }

    public function update(Request $request, $id)
    {
        $doctor = ModelsDoctor::find($id);
        $doctor->name = $request->input('name');
        $doctor->section_id = $request->input('section_id');
        $doctor->phone = $request->input('phone');
        $doctor->specialization = $request->input('specialization');
        $doctor->save();
        return redirect('/doctors');
    }

    public function destroy($id)
    {
        $doctor = ModelsDoctor::find($id);
        $doctor->delete();
        return redirect('/doctors');
    }
}









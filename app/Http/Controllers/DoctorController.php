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
        $this->validate($request,[
            'name' =>  'required',
            'section_id' =>  'required',
            'specialization' =>  'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Add validation for the photo file

        ]);
         // Handle the photo upload
         if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = time() . '_' . $photo->getClientOriginalName();
            $photo->storeAs('public/uploads/doctors', $photoName); // Store the photo in the "public/photos" directory
        } else {
            $photoName = null;
        }
        $doctor = new ModelsDoctor;
        $doctor->name = $request->input('name');
        $doctor->section_id = $request->input('section_id');
        $doctor->specialization = $request->input('specialization');
        $doctor->phone = $request->input('phone');

        $doctor->photo = $photoName; // Save the photo file name in the database
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

    public function destroy(Request $request)
    {
        $id = $request->id;
        ModelsDoctor::find($id)->delete();
        session()->flash('delete','تم حذف القسم بنجاح');
        return redirect()->back();
    }
}









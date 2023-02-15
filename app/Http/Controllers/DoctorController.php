<?php

namespace App\Http\Controllers;

use App\Models\Doctor as ModelsDoctor;
use App\Models\Section;
use AppModels\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
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

        if ($request->Has('photo')) {
            $image = $request->file('photo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('uploads/doctors/' . $filename);
            $image->move(public_path('uploads/doctors'), $filename);
        } else {
            $filename = null;
        }

        $doctor = new ModelsDoctor;
        $doctor->name = $request->input('name');
        $doctor->section_id = $request->input('section_id');
        $doctor->phone = $request->input('phone');
        $doctor->specialization = $request->input('specialization');

        $doctor->photo = $filename;
        $doctor->save();

        return redirect()->route('doctors.index');
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
    public function update(Request $request,  $id)
    {
        $doctor = ModelsDoctor::find($id);
        $validatedData = $request->validate([
            'name' =>  'required',
            'section_id' =>  'required',
            'specialization' =>  'required',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('uploads/doctors/' . $filename);
            $image->move(public_path('uploads/doctors'), $filename);
            if ($doctor->photo != null) {
                unlink(public_path('uploads/doctors/' . $doctor->photo));
            }
        } else {
            $filename = $doctor->photo;
        }

        $doctor->name = $request->input('name');
        $doctor->section_id = $request->input('section_id');
        $doctor->specialization = $request->input('specialization');

        $doctor->photo = $filename;
        $doctor->save();

        return redirect()->route('doctors.index');
    }



    public function destroy(Request $request)
    {
        $id = $request->id;
        ModelsDoctor::find($id)->delete();
        session()->flash('delete','تم حذف القسم بنجاح');
        return redirect()->back();
    }
}









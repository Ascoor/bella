<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DoctorController extends Controller
{
public function __construct()
{
    $this->middleware('auth');
}
/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
    public function index()
    {
        $doctors = Doctor::all();
        $sections = Section::all();
        return view('team.doctor.index',compact('doctors'))->with('sections', $sections);
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
 */public function store(Request $request, Doctor $doctor)
{
    $data = $request->validate([
        'name' => 'required',
        'username' => ['nullable', Rule::unique('doctors')],
        'password' => 'required',
        'specialization' => 'nullable|required_if:photo,null',
        'phone' => 'nullable|required_if:photo,null',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'section_id' => 'required|exists:sections,id',
    ]);

    $doctor = Doctor::create($data);

    if ($request->hasFile('photo')) {
        $image = $request->file('photo');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $location = public_path('uploads/doctors/' . $filename);
        Image::make($image)->resize(300, 300)->save($location);
        $doctor->update(['photo' => $filename]);
    } else {
        // set default image if no photo is uploaded
        $doctor->update(['photo' => 'logo.png']);
    }

    session()->flash('Add', 'تمت الإضافة بنجاح.');
    return redirect()->back();
}



/**
 * Display the specified resource.
 *
 * @param  \App\doctors  $doctors
 * @return \Illuminate\Http\Response
 */
public function show(Doctor $doctor)
{
    //
}

/**
 * Show the form for editing the specified resource.
 *
 * @param  \App\doctors  $doctors
 * @return \Illuminate\Http\Response
 */
public function edit(Doctor $doctor)
{
    //
}

/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \App\doctors  $doctors
 * @return \Illuminate\Http\Response
 */
public function update(Request $request)
{
    $id = $request->input('id');
    $data = $request->validate([
        'name' => ['required', 'max:255', Rule::unique('doctors')->ignore($id)],
        'username' => ['required', Rule::unique('doctors')->ignore($id)],
        'specialization' => 'nullable',
        'phone' => 'nullable',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'section_id' => 'required|exists:sections,id',
    ], [
        'name.required' =>'يرجي ادخال اسم الطبيب',
        'name.unique' =>'اسم الطبيب مسجل مسبقا',
        'username.required' =>'يرجي ادخال اسم المستخدم',
        'username.unique' =>'اسم المستخدم مسجل مسبقا',
        'section_id.required' =>'يرجي ادخال القسم المرتبط بالطبيب',
        'section_id.exists' =>'القسم غير موجود',
    ]);

    $doctor = Doctor::findOrFail($id);
    $doctor->name = $request->input('name');
    $doctor->username = $request->input('username');
    $doctor->specialization = $request->input('specialization');
    $doctor->phone = $request->input('phone');
    $doctor->section_id = $request->input('section_id');

    if ($request->hasFile('photo')) {
        // delete the old photo from the server
        if ($doctor->photo !== 'logo.png') {
            Storage::delete('uploads/doctors/' . $doctor->photo);
        }

        $image = $request->file('photo');
        $filename = $doctor->name . '-' . time() . '.' . $image->getClientOriginalExtension();
        $location = public_path('uploads/doctors/' . $filename);
        Image::make($image)->resize(300, 300)->save($location);
        $doctor->photo = $filename;
    } elseif ($doctor->photo === 'logo.png') {
        // do nothing, because there's no new photo uploaded and the doctor's photo is still the default one
    } else {
        // delete the old photo from the server
        Storage::delete('uploads/doctors/' . $doctor->photo);
        $doctor->photo = 'logo.png';
    }

    if ($request->has('password')) {
        $doctor->password = Hash::make($request->input('password'));
    }

    $doctor->save();

    session()->flash('Edit', 'تم التعديل بنجاح ');
    return redirect()->back();
}


/**
 * Remove the specified resource from storage.
 *
 * @param  \App\doctors  $doctors
 * @return \Illuminate\Http\Response
 */
public function destroy(Request $request)
{
    $id = intval($request->id);
    $doctor = Doctor::find($id);

    if (Storage::exists($doctor->photo_path)) {
        Storage::delete($doctor->photo_path);
    }

    $doctor->delete();
    session()->flash('delete', 'تم حذف الطبيب بنجاح');
    return redirect()->back();
}



}



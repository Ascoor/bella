<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
 */public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required',
        'section_id' => 'required',
        'specialization' => 'required',
        'phone' => 'required',
        'photo' => 'nullable|image|max:1024', // optional image with max size of 1MB
    ], [
        'name.required' =>'يرجي ادخال اسم الطبيب ',
        'name.unique' =>'اسم الطبيب مسجل من قبل',
        'specialization.required' =>'يرجي ادخال البيان',
        'phone.required' =>'يرجي ادخال رقم الجوال',
        'photo.image' => 'يجب اختيار صورة فقط',
        'photo.max' => 'حجم الصورة يجب ان لا يتجاوز 1 ميجابايت',
    ]);

    // handle photo upload
    if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
        $image = $request->file('photo');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $path = public_path('uploads/doctors/' . $filename);
        $image->move(public_path('uploads/doctors'), $filename);
    } else {
        $filename = 'logo.png';
    }


    Doctor::create([
        'name' => $request->name,
        'section_id' => $request->section_id,
        'specialization' => $request->specialization,
        'phone' => $request->phone,
        'photo' => $filename,
    ]);

    session()->flash('Add', 'تم اضافة الطبيب بنجاح ');
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
     $id = $request->id;

$request->validate([
    'name' => ['required', 'max:255', Rule::unique('doctors')->ignore($id)],
    'section_id' => 'required',
    'specialization' => 'required',
    'phone' => 'required',
], [
    'name.required' =>'يرجي ادخال اسم الطبيب',
    'name.unique' =>'اسم الطبيب مسجل مسبقا',
    'specialization.required' =>'يرجي ادخال التخصص',
    'phone.required' =>'يرجي ادخال رقم الجوال',

]);

$doctor = Doctor::findOrFail($id);
$doctor->update([
    'name' => $request->name,
    'specialization' => $request->specialization,
    'phone' => $request->phone,
]);
session()->flash('Add', 'تم التعديل بنجاح ');
return redirect()->back()->with('success', 'The section has been updated successfully.');
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

Doctor::find($id)->delete();

session()->flash('delete','تم حذف الطبيب بنجاح');

return redirect()->back();
}

}

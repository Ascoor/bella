<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;


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
        $data = $request->validate([
            'name' => 'required',
            'username' => 'required|unique:doctors',
            'password' => 'required',
            'specialization' => 'nullable',
            'phone' => 'nullable',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'section_id' => 'required|exists:sections,id',
        ]);


        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('uploads/doctors/' . $filename);
            Image::make($image)->resize(300, 300)->save($location);
            $data['photo'] = $filename;
        } else {
            // set default image if no photo is uploaded
            $data['photo'] = 'logo.png'; // or any other default image filename
        }
        $data['password'] = Hash::make($data['password']);

        Doctor::create($data);


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

     if ($request->hasFile('photo')) {
         $image = $request->file('photo');
         $filename = time().'.'.$image->getClientOriginalExtension();
         $location = public_path('uploads/doctors/'.$filename);
         Image::make($image)->resize(300, 300)->save($location);
         $doctor->photo = $filename;
         $doctor->save();
     }

     if ($request->has('username') && $request->has('password')) {
         $doctor->update([
             'username' => $request->username,
             'password' => Hash::make($request->password),
         ]);
     }

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


    public function loginForm()
    {
        return view('doctor.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::guard('doctor')->attempt($credentials)) {
            // Authentication passed...
            return redirect()->route('doctor.dashboard');
        }

        return redirect()->back()->withErrors(['credentials' => 'Invalid username or password']);
    }
}



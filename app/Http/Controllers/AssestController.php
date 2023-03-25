<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;



use App\Models\Assest;
use App\Models\Section;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class AssestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


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
        $assests =Assest::all();
        $sections = Section::all();
        return view('team.assest.index',compact('assests'))->with('sections',$sections);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
    {
        $data = $request->validate([
             'assest_name' => 'required',
             'phone' => 'nullable|required_if:photo,null',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'section_id' => 'required|exists:sections,id',
        'gender' => 'required|in:male,female',

         ]);
         $assest = Assest::create($data);

         if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $filename = time() . '.' . $image->getClientOriginalName();
            $path = $image->storeAs('public/assests', $filename);
            $assest->update(['photo' => $filename]);
        } else {
            // set default image if no photo is uploaded
            $assest->update(['photo' => 'logo.png']);
        }
         session()->flash('Add', 'تم الإضافة بنجاح ');
         return redirect()->back();
     }

    /**
     * Display the specified resource.
     *
     * @param  \App\sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function show(Assest $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function edit(Assest $section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\sections  $sections
     * @return \Illuminate\Http\Response
     */



     public function update(Request $request)
     {
         $id = $request->id;
    $request->validate([
        'assest_name' => ['required', 'max:255', Rule::Unique('assests')->ignore($id)],



        'section_id' => 'required',
        'phone' => 'required',


    ], [
        'assest_name.required' =>'يرجي ادخال اسم المساعد',
        'section_id.required' =>'اسم المساعد مسجل مسبقا',
        'phone.required' =>'يرجي ادخال رقم الجوال',


    ]);

    $assest = Assest::findOrFail($id);
    if ($request->hasFile('photo')) {
        $image = $request->file('photo');
        $filename = time() . '.' . $image->getClientOriginalName();
        $path = $image->storeAs('public/assests', $filename);
        $assest->update(['photo' => $filename]);
    } else {
        // set default image if no photo is uploaded
        $assest->update(['photo' => 'logo.png']);
    }
     $assest->assest_name = $request->assest_name;

     $assest->section_id = $request->section_id;
     $assest->phone = $request->phone;
     $assest->gender = $request->gender;
     $assest->save();

    session()->flash('edit','تم التعديل بنجاح');
    return redirect()->back();
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = intval($request->id);

        Assest::find($id)->delete();

        session()->flash('delete','تم الحذف  بنجاح');

        return redirect()->back();
    }

    }

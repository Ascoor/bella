<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Doctrine\DBAL\Driver\Mysqli\Initializer\Secure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class SectionController extends Controller
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
            $sections = Section::all();
            return view('section.index',compact('sections'));
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

        $validatedData = $request->validate([
            'section_name' => 'required|unique:sections|max:255',
            'description' => 'required',
        ],[

            'section_name.required' =>'يرجي ادخال اسم القسم',
            'section_name.unique' =>'اسم القسم مسجل مسبقا',
            'description.required' =>'يرجي ادخال البيان',

        ]);

        Section::create([
                'section_name' => $request->section_name,
                'description' => $request->description,


            ]);
            session()->flash('Add', 'تم اضافة القسم بنجاح ');
            return redirect()->back();

        }



    /**
     * Display the specified resource.
     *
     * @param  \App\sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
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
        'section_name' => ['required', 'max:255', Rule::unique('sections')->ignore($id)],
        'description' => 'required',
    ], [
        'section_name.required' =>'يرجي ادخال اسم القسم',
        'section_name.unique' =>'اسم القسم مسجل مسبقا',
        'description.required' =>'يرجي ادخال البيان',

    ]);

    $section = Section::findOrFail($id);
    $section->update([
        'section_name' => $request->section_name,
        'description' => $request->description,
    ]);
    session()->flash('Add', 'تم التعديل بنجاح ');
    return redirect()->back()->with('success', 'The section has been updated successfully.');
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

    Section::find($id)->delete();

    session()->flash('delete','تم حذف القسم بنجاح');

    return redirect()->back();
}

}

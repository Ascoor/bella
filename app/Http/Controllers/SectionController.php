<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\returnValue;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $sections= Section::all();
     return view('section.index')->with('sections',$sections);
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
        ],[

            'section_name.required' =>'يرجي ادخال اسم القسم',
            'section_name.unique' =>'اسم القسم مسجل مسبقا',


        ]);

            Section::create([
                'section_name' => $request->section_name,
                'description' => $request->description,
                'Created_by' => (Auth::user()->name),

            ]);
            session()->flash('Add', 'تم اضافة القسم بنجاح ');
            return redirect('/sections');

        }


        public function show(section $section)
        {
            //
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  \App\sections  $sections
         * @return \Illuminate\Http\Response
         */
        public function edit(section $section)
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

            $this->validate($request, [

                'section_name' => 'required|max:255|unique:sections,section_name,'.$id,
                'description' => 'required',
            ],[

                'section_name.required' =>'يرجي ادخال اسم القسم',
                'section_name.unique' =>'اسم القسم مسجل مسبقا',
                'description.required' =>'يرجي ادخال البيان',

            ]);

            $sections = Section::find($id);
            $sections->update([
                'section_name' => $request->section_name,
                'description' => $request->description,
            ]);

            session()->flash('edit','تم تعديل القسم بنجاج');
            return redirect('/sections');
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  \App\sections  $sections
         * @return \Illuminate\Http\Response
         */
        public function destroy(Request $request)
        {
            $id = $request->id;
            Section::find($id)->delete();
            session()->flash('delete','تم حذف القسم بنجاح');
            return redirect('/sections');
        }
    }

<?php

namespace App\Http\Controllers;

use App\Models\Assest;

use App\Models\Section;
use Illuminate\Http\Request;

class AssestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index()
     {
         $assests = Assest::all();
         $sections = Section::all();

         return view('team.assest.index')->with('assests',$assests)->with('sections',$sections);
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
         $assest = new Assest;
         $assest->assest_name = $request->assest_name;


         $assest->section_id = $request->section_id;
         $assest->phone = $request->phone;
         $assest->save();

         return redirect()->back()->with('message', 'Assest Created Successfully');
     }

     /**
      * Display the specified resource.
      *
      * @param  \App\Assest  $assest
      * @return \Illuminate\Http\Response
      */
     public function show(Assest $assest)
     {
         //
     }

     /**
      * Show the form for editing the specified resource.
      *
      * @param  \App\Assest  $assest
      * @return \Illuminate\Http\Response
      */
     public function edit(Assest $assest)
     {
         $sections = Section::all();

         return view('assests.edit', compact('assest', 'sections'));
     }

     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  \App\Assest  $assest
      * @return \Illuminate\Http\Response
      */
     public function update(Request $request, Assest $assest)
     {
         $assest->assest_name = $request->assest_name;

         $assest->section_id = $request->section_id;
         $assest->save();

         return redirect()->back()->with('message', 'Assest Updated Successfully');
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  \App\Assest  $assest
      * @return \Illuminate\Http\Response
      */
      public function destroy(Request $request)
      {
          $id = $request->id;
          Assest::find($id)->delete();
          session()->flash('delete','تم حذف القسم بنجاح');
          return redirect()->back();
      }
    }

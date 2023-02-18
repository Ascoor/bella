<?php

namespace App\Http\Controllers;

use App\Models\Service;

use App\Models\Doctor;
use App\Models\Section;
use Illuminate\Http\Request;


class ServiceController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index()
     {
         $services = Service::all();
         $sections = Section::all();

         return view('service.index')->with('services',$services)->with('sections',$sections);
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
         $service = new Service;
         $service->service_name = $request->service_name;
         $service->price = $request->price;
         $service->description = $request->description;
         $service->section_id = $request->section_id;
         $service->save();

         return redirect()->back()->with('message', 'Service Created Successfully');
     }

     /**
      * Display the specified resource.
      *
      * @param  \App\Service  $service
      * @return \Illuminate\Http\Response
      */
     public function show(Service $service)
     {
         //
     }

     /**
      * Show the form for editing the specified resource.
      *
      * @param  \App\Service  $service
      * @return \Illuminate\Http\Response
      */
     public function edit(Service $service)
     {
         $sections = Section::all();

         return view('services.edit', compact('service', 'sections'));
     }

     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  \App\Service  $service
      * @return \Illuminate\Http\Response
      */
     public function update(Request $request,$id)
     {
        $service = Service::find($id);
         $service->service_name = $request->service_name;
         $service->price = $request->price;
         $service->description = $request->description;
         $service->section_id = $request->section_id;
         $service->save();

         return redirect()->back()->with('message', 'Service Updated Successfully');
     }



     /**
      * Remove the specified resource from storage.
      *
      * @param  \App\Service  $service
      * @return \Illuminate\Http\Response
      */
      public function destroy(Request $request)
      {
          $id = $request->id;
          Service::find($id)->delete();
          session()->flash('delete','تم حذف القسم بنجاح');
          return redirect()->back();
      }
    }

<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
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
     { $sections = Section::all();
         $services = Service::with('section')->get();
         return view('service.index', ['services' => $services])->with('sections',$sections);
     }

     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */


     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function store(Request $request)
     {
         $request->validate([
             'service_name' => 'required',
             'section_id' => 'required',
             'price' => 'required',
         ]);

         $service = new Service;
         $service->service_name = $request->service_name;
         $service->price = $request->price;
         $service->section_id = $request->section_id;
         $service->save();

         return redirect()->route('services.index')
             ->with('success', 'Service created successfully');
     }

     /**
      * Display the specified resource.
      *
      * @param  \App\Service  $service
      * @return \Illuminate\Http\Response
      */
     public function show(Service $service)
     {
         $service = Service::with('section')->find($service->id);

         return view('service.index', compact('service'));
     }

     /**
      * Show the form for editing the specified resource.
      *
      * @param  \App\Service  $service
      * @return \Illuminate\Http\Response
      */
     public function edit(Service $service)
     {
         $service = Service::find($service->id);
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
     public function update(Request $request, Service $service)
     {
         $request->validate([
             'service_name' => 'required',
             'section_id' => 'required',
             'price' => 'required',
         ]);

         $service = Service::find($service->id);
         $service->service_name = $request->service_name;
         $service->section_id = $request->section_id;
         $service->price = $request->price;
         $service->save();
         session()->flash('edit','تم تعديل القسم بنجاج');
         return redirect('/services ');
     }
     public function destroy($id)
     {
         $service = Service::find($id);
         $service->delete();
         return redirect()->back()->with('message', 'Service Deleted Successfully');
     }

    }

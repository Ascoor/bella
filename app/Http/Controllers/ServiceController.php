<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\Service;


use App\Models\Section;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class ServiceController extends Controller
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
        $sections =Section::all();
        $services = Service::all();
        return view('service.index',compact('services'))->with('sections',$sections);
    }



    /**
     * Show the form for creating a new resource.
     *
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
         $service->description = $request->description;
         $service->section_id = $request->section_id;
         $service->save();

         return redirect()->route('services.index')
             ->with('success', 'Service created successfully');
     }

    /**
     * Display the specified resource.
     *
     * @param  \App\services  $services
     * @return \Illuminate\Http\Response
     */
    public function show(Service $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\services  $services
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\services  $services
     * @return \Illuminate\Http\Response
     */



     public function update(Request $request)
     {
         $id = $request->id;
    $request->validate([
        'service_name' => ['required', 'max:255', Rule::Unique('services')->ignore($id)],



        'section_id' => 'required',
        'price' => 'required',


    ], [
        'service_name.required' =>'يرجي ادخال اسم الخدمة',
        'section_id.required' =>'اسم الخدمة مسجل مسبقا',
        'price.required' =>'يرجي ادخال التكلفة',


    ]);

    $section = Service::findOrFail($id);
    $section->update([
        'service_name' => $request->service_name,
        'section_id' => $request->section_id,
         'description' => $request->description,
         'price' => $request->price,
    ]);
    session()->flash('Add', 'تم التعديل بنجاح ');
    return redirect()->back()->with('success', 'The section has been updated successfully.');
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\services  $services
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = intval($request->id);

        Service::find($id)->delete();

        session()->flash('delete','تم حذف القسم بنجاح');

        return redirect()->back();
    }

    }

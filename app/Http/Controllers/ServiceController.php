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
            'service_name' => [
                'required',
                Rule::unique('services')->where(function ($query) use ($request) {
                    return $query->where('section_id', $request->section_id);
                })
            ],
            'section_id' => 'required',
            'price' => 'required',
        ], [
            'service_name.unique' => 'اسم هذه الخدمة سبق تسجيله في هذا القسم.'
        ]);


         $service = new Service;
         $service->service_name = $request->service_name;
         $service->price = $request->price;
         $service->description = $request->description;
         $service->section_id = $request->section_id;
         $service->save();

         session()->flash('Add', 'تم التعديل بنجاح.');
         return redirect()->route('services.index');
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
         $request->validate([

            'section_id' => 'required',
            'price' => 'required',
            'description' => 'nullable'
        ], [
            'service_name.unique' => 'اسم هذه الخدمة سبق تسجيله في هذا القسم.',
            'service_name.required' => 'يرجى إدخال اسم الخدمة.',
            'section_id.required' => 'يرجى اختيار القسم.',
            'price.required' => 'يرجى إدخال التكلفة.',
            'description.nullable' => 'يرجى إدخال وصف الخدمة.'
        ]);
            $id = $request->id;

        // Your code to update the service goes here...


         $service = Service::findOrFail($id);
         $service->update([
             'service_name' => $request->service_name,
             'section_id' => $request->section_id,
             'description' => $request->description,
             'price' => $request->price,
         ]);

         session()->flash('edit', 'تم التعديل بنجاح.');
         return redirect()->back();
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

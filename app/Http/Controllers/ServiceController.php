<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Http\Controllers\Controller;
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

        $sections = Section::all();
        $services = Service::all();
        $doctors = Doctor::all();
        // $custumers = Client::all();
        return view('service.index',compact('services', $services))->with('doctors', $doctors)->with('sections', $sections);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $sections = Section::all();
        $doctors = Doctor::all();
        return view('service.create')->with('doctors',$doctors)->with('sections',$sections);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


            $service = Service::create([
                'name'=>$request->name,
                'price' => $request->price,
                'doctor_id' => $request->doctor_id,
                'section_id' => $request->section_id,


            ]);




            return redirect()->route('services.index')->with('تمت', 'تم الإضافة  بنجاح');
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show($id)


        {

            $sections = Section::all();
            $services = Service::all();
            $doctors = Doctor::all();

            return view('service.show')
            ->with('services', $services)->with('doctors', $doctors)->with('sections',$sections);
        }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sections = Section::all();
        $service = Service::where('id', $id)->first();
        $doctors = Doctor::all();
        return view('service.edit')
        ->with('service', $service)->with('doctors',$doctors)->with('sections',$sections);

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
$service->update($request->all());
            return redirect()->back()->with('Done', 'Updated Success');

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
    }
}

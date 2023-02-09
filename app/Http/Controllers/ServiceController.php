<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Http\Controllers\Controller;
use App\Models\Doctor;
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
        $doctors = Doctor::all();
        // $custumers = Client::all();
        return view('service.index',compact('services', $services))->with('doctors', $doctors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $doctors = Doctor::all();
        return view('service.create')->with('doctors',$doctors);
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
                'cost' => $request->cost,
                'doctor_name' => $request->doctor_name,


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

            $services = Service::all();
            $doctors = Doctor::all();

            return view('service.show')
            ->with('services', $services)->with('doctors', $doctors);
        }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $service = Service::where('id', $id)->first();
        $doctors = Doctor::all();
        return view('service.edit')
        ->with('service', $service)->with('doctors',$doctors);

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
            return redirect()->route('services.index')->with('Done', 'Updated Success');

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

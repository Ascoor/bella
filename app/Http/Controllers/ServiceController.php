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
            $services = Service::with(['section'])->get();
$sections = Section::all();
            return view('service.index', compact('services',$services))->with('sections', $sections);;
        }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $sections =
        $sections = Section::all();

        return view('service.create')->with('sections',$sections);
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
            'service_name' => 'required|unique:sections|max:255',
            'price' => 'required',
        ],[

            'service_name.required' =>'يرجي ادخال اسم القسم',
            'service_name.unique' =>'اسم القسم مسجل مسبقا',
            'price.required' =>'يرجي ادخال قيمة الخدمة ',

        ]);

        Service::create([
                'service_name' => $request->service_name,
                'price' => $request->price,


            ]);
            session()->flash('Add', 'تم اضافة القسم بنجاح ');
            return redirect()->back();

        }



        public function show(Service $service)
        {
            return view('service.show', compact('service'));
        }

        /**
         * Show the form for editing the specified service.
         *
         * @param  \App\Service  $service
         * @return \Illuminate\View\View
         */
        public function edit(Service $service)
        {
            return view('service.edit', compact('service'));
        }

        /**
         * Update the specified service in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \App\Service  $service
         * @return \Illuminate\Http\RedirectResponse
         */
        public function update(Request $request, Service $service)
        {
            $request->validate([
                'service_name' => 'required',
                'price' => 'required',
                'section_id' => 'required',
            ]);

            $service->update($request->all());

            return redirect()->route('services.index')->with('success', 'Service updated successfully');
        }

        /**
         * Remove the specified service from storage.
         *
         * @param  \App\Service  $service
         * @return \Illuminate\Http\RedirectResponse
         */
        public function destroy(Service $service)
        {
            $service->delete();

            return redirect()->route('services.index')->with('success', 'Service deleted successfully');
        }
    }
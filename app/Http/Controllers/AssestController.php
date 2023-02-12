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
    { $sections = Section::all();
        $assests = Assest::with('section')->get();
        return view('team.assest.index', ['assests' => $assests])->with('sections',$sections);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sections = Section::all();

        return view('assests.create', compact('sections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'assest_name' => 'required',
            'section_id' => 'required',
            'phone' => 'required',
        ]);

        $assest = new Assest;
        $assest->assest_name = $request->assest_name;
        $assest->phone = $request->phone;
        $assest->section_id = $request->section_id;
        $assest->save();

        return redirect()->route('assests.index')
            ->with('success', 'Assest created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Assest  $assest
     * @return \Illuminate\Http\Response
     */
    public function show(Assest $assest)
    {
        $assest = Assest::with('section')->find($assest->id);

        return view('team.assest.index', compact('assest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Assest  $assest
     * @return \Illuminate\Http\Response
     */
    public function edit(Assest $assest)
    {
        $assest = Assest::find($assest->id);
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
        $request->validate([
            'assest_name' => 'required',
            'section_id' => 'required',
            'phone' => 'required',
        ]);

        $assest = Assest::find($assest->id);
        $assest->assest_name = $request->assest_name;
        $assest->section_id = $request->section_id;
        $assest->phone = $request->phone;
        $assest->save();
        session()->flash('edit','تم تعديل القسم بنجاج');
        return redirect('/assests');
    }
    public function destroy(Request $request)
    {
        $id = $request->id;
        Assest::find($id)->delete();
        session()->flash('delete','تم حذف القسم بنجاح');
        return redirect('/assests');
    }
}

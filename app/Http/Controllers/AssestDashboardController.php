<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Section;
use Illuminate\Http\Request;

class AssestDashboardController extends Controller
{
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
            $doctors = Doctor::all();
            $sections = Section::all();
            return view('team.doctor.index',compact('doctors'))->with('sections', $sections);
        }

}

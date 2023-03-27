<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */



    public function index()
    {
        $appointmentsCount = DB::table('appointments')
                                ->whereDate('apt_datetime', today())
                                ->count();
                                $AllappointmentsCount = DB::table('appointments')
                                ->count();
        $totalRevenue = DB::table('revenues')
                            ->sum('revenue_value');

        $totalIncomeToday = DB::table('invoice_details')
                                ->whereDate('created_at', today())
                                ->sum('payment_amount');

        return view('home', [
            'appointmentsCount' => $appointmentsCount,
            'totalRevenue' => $totalRevenue,
            'totalIncomeToday' => $totalIncomeToday,
            'AllappointmentsCount' => $AllappointmentsCount,
        ]);
    }
}


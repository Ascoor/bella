<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\DB;

class ExpensesAndRevenuesController extends Controller
{
    public function index()
    {
        $expenses = DB::table('expenses')
                ->select('id',
                'expense_date',
                'expense_value',
                'expense_to',
                'expense_notes',
                'expense_type_id',
                DB::raw('"مصروفات" as type'))
                ->get();

$revenues = DB::table('revenues')
                ->select('id', 'revenue_value',
                'revenue_date',
                'revenue_notes',
                'revenue_from',
                'income_type_id', DB::raw('"إيرادات" as type'))
                ->get();

$expenses_revenues = $expenses->merge($revenues);

return view('expenses_and_revenues.index', compact('expenses_revenues'));

    }



}

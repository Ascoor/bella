<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Expense as ModelsExpense;
use App\Models\Revenue as ModelsRevenue;

class ExpensesAndRevenuesController extends Controller
{
    public function index()
    {
        $expenses = ModelsExpense::all();
        $revenues = ModelsRevenue::all();

        return view('expenses_and_revenues.index', compact('expenses', 'revenues'));
    }

}

<?php
namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\ExpenseType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    public function index()
    {
        $expenseTypes = ExpenseType::all();
        $expenses = Expense::all();
        return view('expense.index', compact('expenses'))->with('expenseTypes',$expenseTypes);
    }

    public function create()
    {
        // Return view to create a new expense
    }

    public function store(Request $request)
    {
             Expense::create([
            'expense_date' => $request->expense_date,
            'expense_value' => $request->expense_value,
            'expense_notes' => $request->expense_notes,
            'expense_to' => $request->expense_to,
            'expense_type_id' => $request->expense_type_id,
            'add_id' => Auth::user()->id,

        ]);

        session()->flash('Add','تمت اللإضافة بنجاج');
        return redirect()->back();
    }

    public function show(Expense $expense)
    {
        return view('expenses.show', compact('expense'));
    }

    public function edit(Expense $expense)
    {
        return view('expenses.edit', compact('expense'));
    }

    public function update(Request $request, Expense $expense)
    {
        $expense->update([
            'expense_date' => $request->expense_date,
            'expense_value' => $request->expense_value,
            'expense_notes' => $request->expense_notes,
            'expense_to' => $request->expense_to,
            'expense_type_id' => $request->expense_type_id,
            'add_id' => $request->Auth::id()
        ]);

        return redirect()->route('expenses.index');
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        Expense::find($id)->delete();
        return redirect()->back()->session('delete');
    }
}

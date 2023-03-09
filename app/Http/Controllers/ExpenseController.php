<?php
namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function index()
    {
        $expenses = Expense::all();
        return view('expense.index', compact('expenses'));
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
            'expense_type_id' => $request->expense_type_id
        ]);

        return redirect()->route('expenses.index');
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
            'expense_type_id' => $request->expense_type_id
        ]);

        return redirect()->route('expenses.index');
    }

    public function destroy(Expense $expense)
    {
        $expense->delete();
        return redirect()->route('expenses.index');
    }
}

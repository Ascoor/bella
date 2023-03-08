<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;

class ExpenseController extends Controller
{
    public function index()
    {
        $expenses = Expense::all();

        return view('expenses.index', ['expenses' => $expenses]);
    }

    public function create()
    {
        return view('expenses.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'description' => 'required|max:255',
            'amount' => 'required|numeric',
            'date' => 'required|date'
        ]);

        $expense = Expense::create($validatedData);

        return redirect()->route('expenses.show', $expense->id)
            ->with('success', 'Expense created successfully.');
    }

    public function show($id)
    {
        $expense = Expense::findOrFail($id);

        return view('expenses.show', ['expense' => $expense]);
    }

    public function edit($id)
    {
        $expense = Expense::findOrFail($id);

        return view('expenses.edit', ['expense' => $expense]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'description' => 'required|max:255',
            'amount' => 'required|numeric',
            'date' => 'required|date'
        ]);

        $expense = Expense::findOrFail($id);
        $expense->update($validatedData);

        return redirect()->route('expenses.show', $expense->id)
            ->with('success', 'Expense updated successfully.');
    }

    public function destroy($id)
    {
        $expense = Expense::findOrFail($id);
        $expense->delete();

        return redirect()->route('expenses.index')
            ->with('success', 'Expense deleted successfully.');
    }
}

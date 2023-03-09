<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpenseType;

class ExpenseTypeController extends Controller
{
    public function index()
    {
        $expenseTypes = ExpenseType::all();
        return view('expense.expenses_type')->with('expenseTypes',$expenseTypes);
    }

    public function show($id)
    {
        $expenseType = ExpenseType::findOrFail($id);
        return response()->json($expenseType);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'value' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        $expenseType = ExpenseType::create($validatedData);
        return response()->json($expenseType, 201);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'value' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        $expenseType = ExpenseType::findOrFail($id);
        $expenseType->update($validatedData);

        return response()->json($expenseType);
    }

    public function destroy($id)
    {
        $expenseType = ExpenseType::findOrFail($id);
        $expenseType->delete();

        return response()->json(null, 204);
    }
}

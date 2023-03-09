<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IncomeType;

class IncomeTypeController extends Controller
{
    public function index()
    {
        $incomeTypes = IncomeType::all();

        return view('income-types.index', compact('incomeTypes'));
    }

    public function create()
    {
        return view('income-types.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'value' => 'required|max:255',
            'description' => 'nullable|max:255'
        ]);

        IncomeType::create($validatedData);

        return redirect('/income-types')->with('success', 'Income type created successfully!');
    }

    public function show(IncomeType $incomeType)
    {
        return view('income-types.show', compact('incomeType'));
    }

    public function edit(IncomeType $incomeType)
    {
        return view('income-types.edit', compact('incomeType'));
    }

    public function update(Request $request, IncomeType $incomeType)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'value' => 'required|max:255',
            'description' => 'nullable|max:255'
        ]);

        $incomeType->update($validatedData);

        return redirect('/income-types')->with('success', 'Income type updated successfully!');
    }

    public function destroy(IncomeType $incomeType)
    {
        $incomeType->delete();

        return redirect('/income-types')->with('success', 'Income type deleted successfully!');
    }
}

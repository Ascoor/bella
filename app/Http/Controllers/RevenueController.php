<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Revenue;

class RevenueController extends Controller
{
    public function index()
    {
        $revenues = Revenue::all();

        return view('revenue.index', ['revenues' => $revenues]);
    }

    public function create()
    {
        return view('revenues.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'description' => 'required|max:255',
            'amount' => 'required|numeric',
            'date' => 'required|date'
        ]);

        $revenue = Revenue::create($validatedData);

        return redirect()->route('revenues.show', $revenue->id)
            ->with('success', 'Revenue created successfully.');
    }

    public function show($id)
    {
        $revenue = Revenue::findOrFail($id);

        return view('revenues.show', ['revenue' => $revenue]);
    }

    public function edit($id)
    {
        $revenue = Revenue::findOrFail($id);

        return view('revenues.edit', ['revenue' => $revenue]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'description' => 'required|max:255',
            'amount' => 'required|numeric',
            'date' => 'required|date'
        ]);

        $revenue = Revenue::findOrFail($id);
        $revenue->update($validatedData);

        return redirect()->route('revenues.show', $revenue);

    }
    public function destroy($id)
    {
        $expense = Revenue::findOrFail($id);
        $expense->delete();

        return redirect()->route('Revenue.index')
            ->with('success', 'Revenue deleted successfully.');
    }
}

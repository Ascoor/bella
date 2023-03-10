<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IncomeType;

class IncomeTypeController extends Controller
{
    public function index()
    {
        $incomeTypes = IncomeType::all();

        return view('revenue.income_type', compact('incomeTypes'));
    }

    public function create()
    {
        return view('income-types.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',

            'description' => 'nullable|max:255'
        ]);

        IncomeType::create($validatedData);

        session()->flash('Add','تمت الإضافة بنجاح');
        return redirect()->back();
    }



    public function update(Request $request)
    {
        $id = $request->id;
        $validatedData = $request->validate([
            'name' => 'required|max:255',

            'description' => 'nullable|max:255'
        ]);
        $incomeType = IncomeType::findOrFail($id);
        $incomeType->update($validatedData);
        session()->flash('edit','تم التعديل بنجاح');
        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $incomeType = IncomeType::findOrFail($id);
        $incomeType->delete();
        session()->flash('delete','تمت الحذف بنجاج');
        return redirect()->back();
    }
}

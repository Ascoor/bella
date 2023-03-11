<?php

namespace App\Http\Controllers;

use App\Models\IncomeType;
use Illuminate\Http\Request;
use App\Models\Revenue;
use Illuminate\Support\Facades\Auth;

class RevenueController extends Controller
{
    public function index()
    {
        $revenues = Revenue::all();
        $incomeTypes = IncomeType::all();
        return view('revenue.index', ['revenues' => $revenues])->with('incomeTypes',$incomeTypes);
    }

    public function create()
    {
        // Return view to create a new revenue
    }


    public function store(Request $request)
    {
        Revenue::create([
            'revenue_date' => $request->revenue_date,
            'revenue_value' => $request->revenue_value,
            'revenue_notes' => $request->revenue_notes,
            'revenue_from' => $request->revenue_from,
            'income_type_id' => $request->income_type_id,
            'add_id' => Auth::user()->id,

        ]);

        session()->flash('Add','تمت الإضافة بنجاج');
        return redirect()->back();
    }
    public function show(Revenue $revenue)
    {
        return view('Revenues.show', compact('revenue'));
    }

    public function edit(Revenue $revenue)
    {
        return view('revenue.edit', compact('revenue'));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $validatedData = $request->validate([
            'revenue_date' => 'required',
            'revenue_value' => 'required|numeric',
            'revenue_notes' => 'nullable',
            'revenue_from' => 'required',
            'income_type_id' => 'required',
        ]);

        $validatedData['add_id'] = Auth::user()->id;

        $revenue = Revenue::findOrFail($id);
        $revenue->update($validatedData);
        session()->flash('edit', 'تم التعديل بنجاح');
        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $id=$request->id;
        $revenue = Revenue::findOrFail($id);
        $revenue->delete();
        session()->flash('delete','تمت الحذف بنجاح');
        return redirect()->back();

    }
}

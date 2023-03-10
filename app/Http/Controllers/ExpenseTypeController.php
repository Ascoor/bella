<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpenseType;
use Laravel\Ui\Presets\React;

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

            'description' => 'required|string|max:255',
        ]);

        $expenseType = ExpenseType::create($validatedData);
        session()->flash('Add','تمت الإضافة بنجاح');
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',

            'description' => 'required|string|max:255',
        ]);

        $expenseType = ExpenseType::findOrFail($id);
        $expenseType->update($validatedData);
        session()->flash('edit','تم التعديل بنجاح');
        return redirect()->back();

    }

    public function destroy( Request $request )
    {
        $id=$request->id;
        $expenseType = ExpenseType::findOrFail($id);
        $expenseType->delete();
        session()->flash('delete','تمت الحذف بنجاح');
        return redirect()->back();

    }
}

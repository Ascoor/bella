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
        $expenses = Expense::all();
        $expenseTypes = ExpenseType::all();
        return view('expense.index')->with('expenseTypes',$expenseTypes)->with('expenses',$expenses);
    }

    public function show($id)
    {
        $expenseType = ExpenseType::findOrFail($id);
        return response()->json($expenseType);
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

        session()->flash('Add','تمت الإضافة بنجاج');
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $validatedData = $request->validate([
            'expense_date' => 'required',
            'expense_value' => 'required|numeric',
            'expense_notes' => 'nullable',
            'expense_to' => 'required',
            'expense_type_id' => 'required',
        ]);

        $validatedData['add_id'] = Auth::user()->id;

        $expense = Expense::findOrFail($id);
        $expense->update($validatedData);
        session()->flash('edit', 'تم التعديل بنجاح');
        return redirect()->back();
    }

    public function destroy( Request $request )
    {
        $id=$request->id;
        $expense = Expense::findOrFail($id);
        $expense->delete();
        session()->flash('delete','تمت الحذف بنجاح');
        return redirect()->back();

    }
}

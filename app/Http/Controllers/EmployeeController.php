<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Employee; 
use Illuminate\Http\Request;



class EmployeeController extends Controller
{
    public function index()
    {
        $employees = DB::table('employees')->get();

        return view('employee.employee', compact('employees'));
    }

    public function destroy($id)
    {
        $employee = Employee::where('id', $id)->first();
    
        if ($employee) {
            $employee->delete();
            return redirect('employee')->with('success', 'Employee record deleted successfully.');
        }
    
        return redirect('employee')->with('error', 'Employee record not found.');
    }

    public function add(){
        $employees = Employee::all(); // Replace "Employee" with your actual model name
        return view('employee.add', compact('employees'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'employee_no' => 'required',
            'designation' => 'required'
        ]);

        $newEmployee = Employee::create($data);

        return redirect('employee')->with('success', 'Employee added to the server successfully.');
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employee.update', compact('employee'));
    }

    public function update($id, Request $request)
    {
        // Find the existing employee record
        $employee = Employee::find($id);
    
        if (!$employee) {
            return redirect('employee')->with('error', 'Employee record not found.');
        }
    
        // Validate the input data
        $data = $request->validate([
            'name' => 'required',
            'employee_no' => 'required',
            'designation' => 'required'
        ]);
    
        // Update the employee record with the new data
        $employee->update($data);
    
        return redirect('employee')->with('success', 'Employee updated successfully.');
    }
    
    
}




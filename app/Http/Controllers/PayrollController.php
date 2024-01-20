<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payroll;
use DB;
use App\Models\Employee;

class PayrollController extends Controller
{
    public function index(){
        $payrolls = Payroll::all(); // Assuming you want to retrieve all payroll records with select_period
        
        return view('dashboard', ['payrolls' => $payrolls]);
    }
        

    public function create()
    {
        $employees = Employee::all(); // Replace "Employee" with your actual model name
        return view('payroll.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'select_period' => 'required', // Include the validation rule
            'employee_no' => 'required|numeric',
            'monthly_salary' => 'required',
            'hazard_rate' => 'required',
            'gross_hazard_pay' => 'required',
            'total_days' => 'required|numeric',
            'actual_hazard_pay' => 'required',
            'adjustment' => 'required',
            'net_hazard_pay' => 'required',
            'rate' => 'required',
            'withholding_tax' => 'required',
            'dempco' => 'required',
            'total_deductions' => 'required',
            'net_amount_due' => 'required'
        ]);

        $data['select_period'] = $request->input('select_period'); // Assign the value from the request

        $newPayroll = Payroll::create($data);

        return redirect('payroll')->with('success', 'Payroll created successfully.');
    }


    public function view()
    {
        $payrolls = DB::table('payrolls')->get();

        return view('payroll.payroll', compact('payrolls'));
    }

    public function destroy($serial_no)
    {
        $payroll = Payroll::where('serial_no', $serial_no)->first();
    
        if ($payroll) {
            $payroll->delete();
            return redirect('payroll')->with('success', 'Payroll record deleted successfully.');
        }
    
        return redirect('payroll')->with('error', 'Payroll record not found.');
    }

    public function edit($serial_no)
    {
        $payroll = Payroll::where('serial_no', $serial_no)->firstOrFail();
        $employees = Employee::all();
    
        return view('payroll.edit', compact('payroll', 'employees', 'serial_no'));
    }

public function update($serial_no, Request $request)
{
    $data = $request->validate([
        'name' => 'required',
        'designation' => 'required',
        'select_period' => 'required', // Include the validation rule
        'employee_no' => 'required|numeric',
        'monthly_salary' => 'required',
        'hazard_rate' => 'required',
        'gross_hazard_pay' => 'required',
        'total_days' => 'required|numeric',
        'actual_hazard_pay' => 'required',
        'adjustment' => 'required',
        'net_hazard_pay' => 'required',
        'rate' => 'required',
        'withholding_tax' => 'required',
        'dempco' => 'required',
        'total_deductions' => 'required',
        'net_amount_due' => 'required'
    ]);

    $payroll = Payroll::where('serial_no', $serial_no)->firstOrFail();
    $payroll->update($data);

    return redirect('payroll')->with('success', 'Payroll updated successfully.');

}

}

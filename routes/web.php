<?php

use Dompdf\Dompdf;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\EmployeeController;
use App\Models\Payroll;
use App\Http\Controllers\GoogleController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware' => ['web']], function () {
    // Define your routes here
    Route::get('/dashboard', [PayrollController::class, 'index']);

    Route::get('/about', function () {
        return view('about');
    });

    Route::get('/location', function () {
        return view('dost');
    });

    //CRUD PAYROLL
    Route::get('/payroll', [PayrollController::class, 'index'])->name('payroll.payroll');
    Route::get('/create-payroll', [PayrollController::class, 'create'])->name('payroll.create');
    Route::post('/payroll', [PayrollController::class, 'store'])->name('payroll.store');
    Route::delete('/payroll/{serial_no}', [PayrollController::class, 'destroy'])->name('payroll.destroy');
    Route::get('/payroll/{serial_no}/edit', [PayrollController::class, 'edit'])->name('payroll.edit');
    Route::put('/payroll/{serial_no}/update', [PayrollController::class, 'update'])->name('payroll.update');

    //CRUD EMPLOYEE
    Route::get('/employee', [EmployeeController::class, 'index'])->name('employee.employee');
    Route::get('/add-employee', [EmployeeController::class, 'add'])->name('employee.add');
    Route::post('/add-employee', [EmployeeController::class, 'store'])->name('employee.store');
    Route::delete('/employee/{id}', [EmployeeController::class, 'destroy'])->name('employee.destroy');
    Route::get('/employee/{id}/update', [EmployeeController::class, 'edit'])->name('employee.update');
    Route::put('/employee/{id}/update', [EmployeeController::class, 'update'])->name('employee.edit');

    Route::get('/payroll', [PayrollController::class, 'view'])->name('view');
    
    Route::get('/list', function () {
        $payrolls = Payroll::all(); // Retrieve all payrolls from the database
        return view('payroll.view', compact('payrolls'));
    });

    Route::get('/print', function (Illuminate\Http\Request $request) {
        $selectedPeriod = $request->query('period');
    
        // Fetch the payrolls for the selected period
        $payrolls = Payroll::where('select_period', $selectedPeriod)->get();
    
        // Calculate the values for the required fields
        $monthlySalaryTotal = 0;
        $grossHazardPayTotal = 0;
        $actualHazardPayTotal = 0;
        $adjustmentTotal = 0;
        $netHazardPayTotal = 0;
        $withholdingTaxTotal = 0;
        $dempcoTotal = 0;
        $totalDeductions = 0;
        $netAmountDueTotal = 0;
    
        foreach ($payrolls as $payroll) {
            $monthlySalaryTotal += $payroll->monthly_salary;
            $grossHazardPayTotal += $payroll->gross_hazard_pay;
            $actualHazardPayTotal += $payroll->actual_hazard_pay;
            $adjustmentTotal += $payroll->adjustment;
            $netHazardPayTotal += $payroll->net_hazard_pay;
            $withholdingTaxTotal += $payroll->withholding_tax;
            $dempcoTotal += $payroll->dempco;
            $totalDeductions += $payroll->total_deductions;
            $netAmountDueTotal += $payroll->net_amount_due;
        }
    
        // Format the calculated values with commas and decimals
        $monthlySalaryTotal = number_format($monthlySalaryTotal, 2);
        $grossHazardPayTotal = number_format($grossHazardPayTotal, 2);
        $actualHazardPayTotal = number_format($actualHazardPayTotal, 2);
        $adjustmentTotal = number_format($adjustmentTotal, 2);
        $netHazardPayTotal = number_format($netHazardPayTotal, 2);
        $withholdingTaxTotal = number_format($withholdingTaxTotal, 2);
        $dempcoTotal = number_format($dempcoTotal, 2);
        $totalDeductions = number_format($totalDeductions, 2);
        $netAmountDueTotal = number_format($netAmountDueTotal, 2);
    
        // Load the view with the calculated values
        $pdfContent = view('payroll.view', compact(
            'payrolls',
            'monthlySalaryTotal',
            'grossHazardPayTotal',
            'actualHazardPayTotal',
            'adjustmentTotal',
            'netHazardPayTotal',
            'withholdingTaxTotal',
            'dempcoTotal',
            'totalDeductions',
            'netAmountDueTotal'
        ))->render();
    
        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml($pdfContent);
    
        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('Legal', 'landscape');
    
        // Render the HTML as PDF
        $dompdf->render();
    
        // Get the generated PDF content
        $pdfContent = $dompdf->output();
    
        // Save the PDF with a fixed filename
        $filename = 'payroll.pdf';
        $dompdf->stream($filename, ['Attachment' => true]);
    
        // Return a response to terminate the script execution
        return response($pdfContent, 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
    });

    Route::get('/view', function (Illuminate\Http\Request $request) {
        $selectedPeriod = $request->query('period');
    
        // Fetch the payrolls for the selected period
        $payrolls = Payroll::where('select_period', $selectedPeriod)->get();
    
        // Calculate the values for the required fields
        $monthlySalaryTotal = 0;
        $grossHazardPayTotal = 0;
        $actualHazardPayTotal = 0;
        $adjustmentTotal = 0;
        $netHazardPayTotal = 0;
        $withholdingTaxTotal = 0;
        $dempcoTotal = 0;
        $totalDeductions = 0;
        $netAmountDueTotal = 0;
    
        foreach ($payrolls as $payroll) {
            $monthlySalaryTotal += $payroll->monthly_salary;
            $grossHazardPayTotal += $payroll->gross_hazard_pay;
            $actualHazardPayTotal += $payroll->actual_hazard_pay;
            $adjustmentTotal += $payroll->adjustment;
            $netHazardPayTotal += $payroll->net_hazard_pay;
            $withholdingTaxTotal += $payroll->withholding_tax;
            $dempcoTotal += $payroll->dempco;
            $totalDeductions += $payroll->total_deductions;
            $netAmountDueTotal += $payroll->net_amount_due;
        }
    
        // Format the calculated values with commas and decimals
        $monthlySalaryTotal = number_format($monthlySalaryTotal, 2);
        $grossHazardPayTotal = number_format($grossHazardPayTotal, 2);
        $actualHazardPayTotal = number_format($actualHazardPayTotal, 2);
        $adjustmentTotal = number_format($adjustmentTotal, 2);
        $netHazardPayTotal = number_format($netHazardPayTotal, 2);
        $withholdingTaxTotal = number_format($withholdingTaxTotal, 2);
        $dempcoTotal = number_format($dempcoTotal, 2);
        $totalDeductions = number_format($totalDeductions, 2);
        $netAmountDueTotal = number_format($netAmountDueTotal, 2);
    
        // Load the view with the calculated values
        $pdfContent = view('payroll.view', compact(
            'payrolls',
            'monthlySalaryTotal',
            'grossHazardPayTotal',
            'actualHazardPayTotal',
            'adjustmentTotal',
            'netHazardPayTotal',
            'withholdingTaxTotal',
            'dempcoTotal',
            'totalDeductions',
            'netAmountDueTotal'
        ))->render();
    
        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml($pdfContent);
    
        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('Legal', 'landscape');
    
        // Render the HTML as PDF
        $dompdf->render();
    
        // Output the generated PDF to Browser
        $dompdf->stream('payroll.pdf', ['Attachment' => false]);
    });
});

Route::get('/', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

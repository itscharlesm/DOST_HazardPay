<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;

    protected $primaryKey = 'serial_no';

    protected $fillable = [
        'name',
        'designation',
        'employee_no',
        'monthly_salary',
        'hazard_rate',
        'gross_hazard_pay',
        'total_days',
        'actual_hazard_pay',
        'adjustment',
        'net_hazard_pay',
        'rate',
        'withholding_tax',
        'dempco',
        'total_deductions',
        'net_amount_due',
        'select_period'
    ];
}

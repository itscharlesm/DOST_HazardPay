<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees'; // Specify the table name if it's different from the model name

    protected $fillable = [
        'name',
        'designation',
        'employee_no'
    ];
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayrolls extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payrolls', function (Blueprint $table) {
            $table->id('serial_no');
            $table->string('name');
            $table->string('designation');
            $table->integer('employee_no');
            $table->double('monthly_salary', 10, 2);
            $table->double('hazard_rate', 10, 2);
            $table->double('gross_hazard_pay', 10, 2);
            $table->double('total_days', 10, 2);
            $table->double('actual_hazard_pay', 10, 2);
            $table->double('adjustment', 10, 2);
            $table->double('net_hazard_pay', 10, 2);
            $table->double('rate', 10, 2);
            $table->double('withholding_tax', 10, 2);
            $table->double('dempco', 10, 2);
            $table->double('total_deductions', 10, 2);
            $table->double('net_amount_due', 10, 2);
            $table->string('select_period');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payrolls');
    }
}

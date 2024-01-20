<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Inserting dummy data into the table
        Employee::create([
            'name' => 'Francis Belicario',
            'employee_no' => '421232',
            'designation' => 'Computer Scientist'
            // Add more columns and their corresponding dummy values as needed
        ]);

        // You can also use the factory method to create multiple dummy records
        Employee::factory()->count(10)->create();
    }
}

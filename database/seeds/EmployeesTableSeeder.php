<?php

use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Employee::class, 3)->states('chief')->create()
            ->each(function ($employee) {
                $this->createSubordinates($employee, 2)->each(function ($employee) {
                    $this->createSubordinates($employee, 2)->each(function ($employee) {
                        $this->createSubordinates($employee, 2)->each(function ($employee) {
                            $this->createSubordinates($employee, 2)->each(function ($employee) {
                                $this->createSubordinates($employee, 5);
                            });
                        });
                    });
                });
            });
    }

    function createSubordinates($employee, $count = 1)
    {
        return $employee->subordinates()->saveMany(factory(App\Models\Employee::class, $count)->states('subordinate')->create());
    }
}

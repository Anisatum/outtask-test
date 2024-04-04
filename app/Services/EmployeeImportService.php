<?php

namespace App\Services;

use App\Services\API\EmployeeConnector;

class EmployeeImportService
{
    public function __construct(
        protected EmployeeConnector $employeeConnector,
    ) {

    }
    public function sync() {
        $employees = $this->employeeConnector->fetchEmployees();

        foreach ($employees as $employee) {
            // Validate?
            $employee->save();
        }
    }
}

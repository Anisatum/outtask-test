<?php

namespace App\Services\API;

use App\Models\Employee;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class EmployeeConnectorRetool implements EmployeeConnector
{
    /**
     * Fetches employees from over the API
     *
     * @return Employee[]
     */
    public function fetchEmployees()
    {
        $employees = [];
        $response = Http::get('https://retoolapi.dev/F2UgmN/employees')->json();

        foreach ($response as $employeeData) {
            $employee = new Employee;
            $employee->id = $employeeData['id'];
            $employee->full_name = "{$employeeData['first_name']} {$employeeData['last_name']}";
            $employee->email = $employeeData['email'];
            $employee->social_security_number = Str::padLeft($employeeData['ssn'],9, '0');

            $employees[] = $employee;
        }

        return $employees;
    }
}

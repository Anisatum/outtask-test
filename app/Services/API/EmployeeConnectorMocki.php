<?php

namespace App\Services\API;

use App\Models\Employee;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class EmployeeConnectorMocki implements EmployeeConnector
{
    protected function processEmployeeData(array $data, array &$employees) {
        $employee = new Employee;
        $employee->full_name = $data['name'];
        $employee->email = $data['email_address'];
        $employee->social_security_number = Str::padLeft($data['social_security_number'],9, '0');

        $employees[] = $employee;

        if (isset($data['team'])) {
            foreach ($data['team'] as $teamMember) {
                $this->processEmployeeData($teamMember, $employees);
            }
        }
    }

    /**
     * Fetches employees from over the API
     *
     * @return Employee[]
     */
    public function fetchEmployees()
    {
        $employees = [];
        $response = Http::get('https://mocki.io/v1/5792c5e1-2ba6-4dfe-baff-15d7bad8f54d')->json();

        foreach ($response['data'] as $data) {
            $this->processEmployeeData($data, $employees);
        }

        return $employees;
    }
}

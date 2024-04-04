<?php

namespace App\Services\API;

use App\Models\Employee;

class EmployeeConnectorMocki implements EmployeeConnector
{
    /**
     * Fetches employees from over the API
     *
     * @return Employee[]
     */
    public function fetchEmployees()
    {
        return [];
    }
}

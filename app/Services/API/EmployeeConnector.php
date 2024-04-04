<?php

namespace App\Services\API;

use App\Models\Employee;

interface EmployeeConnector
{
    /**
     * Fetches employees from over the API
     *
     * @return Employee[]
     */
    public function fetchEmployees();
}

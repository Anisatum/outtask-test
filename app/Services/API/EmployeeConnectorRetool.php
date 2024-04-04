<?php

namespace App\Services\API;

use App\Models\Employee;
use Illuminate\Support\Facades\Http;

class EmployeeConnectorRetool implements EmployeeConnector
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

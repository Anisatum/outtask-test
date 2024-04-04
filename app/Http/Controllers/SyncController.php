<?php

namespace App\Http\Controllers;

use App\Services\EmployeeImportService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class SyncController extends Controller
{
    public function __construct(
        protected EmployeeImportService $employeeImportService,
    ) {

    }

    public function sync(): JsonResponse
    {
        $this->employeeImportService->sync();
        return response()->json(["success" => "true"]);
    }

}

<?php

namespace App\Http\Controllers;

use App\Jobs\DeleteEmployees;
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
        try {
            $this->employeeImportService->sync();
            return response()->json(["success" => "true"]);
        } catch (\Throwable $e) {
            return response()->json([
                "success" => "false",
                "error" => $e->getMessage(),
            ]);
        }
    }

    public function delete() : JsonResponse
    {
        try {
            DeleteEmployees::dispatch();
            return response()->json(["success" => "true"]);
        } catch (\Throwable $e) {
            return response()->json([
                "success" => "false",
                "error" => $e->getMessage(),
            ]);
        }
    }
}

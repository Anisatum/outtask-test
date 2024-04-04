<?php

namespace App\Http\Controllers;

use App\Jobs\DeleteEmployees;
use App\Services\EmployeeImportService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class EmployeeController extends Controller
{
    public function __construct(
        protected EmployeeImportService $employeeImportService,
    ) {

    }

    public function sync(): JsonResponse
    {
        try {
            $this->employeeImportService->sync();
            return response()->json([
                "success" => "true",
                "msg" => "Syncing employees succesful",
            ]);
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
            return response()->json([
                "success" => "true",
                "msg" => "Deleting employees queued",
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                "success" => "false",
                "msg" => "Deleting employees failed",
                "error" => $e->getMessage(),
            ]);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Services\Interfaces\CreateDepartmentServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Department;
use Exception;

class DepartmentController extends Controller
{
    protected $createDepartmentService;

    public function __construct(CreateDepartmentServiceInterface $createDepartmentService)
    {
        $this->createDepartmentService = $createDepartmentService;
    }

    public function index(): JsonResponse
    {
        return response()->json(Department::all(), 200);
    }

    public function store(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|min:2|max:30|unique:departments,name',
            'description' => 'required|min:10|max:200',
        ]);

        try {
            $department = $this->createDepartmentService->createDepartment($validatedData);
            return response()->json($department, 201);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
    
    public function getById($id): JsonResponse
    {
        return response()->json(null, 200);
        $department = Department::find($id);

        if (!$department) {
            return response()->json(['error' => 'Department not found'], 404);
        }

        return response()->json($department, 200);
    }

    public function getByManager($managerName): JsonResponse
    {
        return response()->json(null, 200);
        $departments = Department::where('manager_name', $managerName)->get();

        if ($departments->isEmpty()) {
            return response()->json(['error' => 'No departments found for this manager'], 404);
        }

        return response()->json($departments, 200);
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AdminService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

class AdminController extends BaseController
{
    protected $adminService;

    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }

    // get /admin/dashboard
    public function dashboard()
    {
        return response()->json(["role" => "admin"], 200); //edit to return session as well
    }

    // post /admin/create
    public function create(Request $request)
    {
        try{
            $admin = $this->adminService->create($request->all());

            return response()->json($admin, 201);
        }catch(ValidationException $e){
            return response()->json($e->errors(), 422);
        }
    }

    // get /admin/readAll
    public function readAll()
    {
        $admins = $this->adminService->readAll();
        return response()->json($admins, 200);
    }

    // get /admin/read/{id}
    public function read($id)
    {
        $admin = $this->adminService->read($id);
        return response()->json($admin, 200);
    }

    // post /admin/update/{id}
    public function update(Request $request, $id)
    {
        try{
            $admin = $this->adminService->update($request->all(), $id);
            return response()->json($admin, 200);
        }catch(ValidationException $e){
            return response()->json($e->errors(), 422);
        }catch(ModelNotFoundException $e){
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }

    // post /admin/delete
    public function delete(Request $request)
    {
        try{
            $this->adminService->delete($request->all());
            return response()->json(['message' => 'Admin deleted successfully'], 200);
        }catch(ModelNotFoundException $e){
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }
}
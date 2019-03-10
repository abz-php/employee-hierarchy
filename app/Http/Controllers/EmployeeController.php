<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Resources\Employee as EmployeeResource;

class EmployeeController extends Controller
{
    public function tree(Request $request)
    {
        return EmployeeResource::collection(Employee::whereNull('chief_id')->with('subordinates')->get());
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Employees\EmployeesInterface as Service;

class EmployeesController extends Controller
{
    const EMPLOYEE_VALIDATION = [
        'first_name' => 'required',
        'middle_name' => 'required',
        'last_name' => 'required',
        'nick_name' => 'required',
        'department' => 'required',
        'position' => 'required',
        'birth_date' => 'required',
        'hired_date' => 'required',
        'email_address' => 'required|email',
        'status' => 'required'
    ];

    protected $service;

    public function __construct(Service $service)
    {
        $this->service =  $service;
    }

    /**
     * Add a employee.
     *
     * @return void
     */
    public function addEmployee(Request $request) 
    {
        $this->validate($request, self::EMPLOYEE_VALIDATION);

        $response = $this->service->addEmployee($request->all());

        return response()->json(
            [
                'message' => $response->message, 
                'model' => $response->model
            ], $response->status);
    }

    /**
     * Update a employee.
     *
     * @return void
     */
    public function updateEmployee(Request $request, $uuid) 
    {
        $this->validate($request, self::EMPLOYEE_VALIDATION);

        $response = $this->service->updateEmployee($uuid);

        return response()->json(
        [
            'message' => $response->message
        ], $response->status);
    }

    /**
     * View a employee.
     *
     * @return void
     */
    public function viewEmployee($uuid) 
    {
        $result = $this->service->viewEmployee($uuid);

        if ($result->status == 200) {
            return response()->json([
                        "message" => $result->message,
                        "model" => $result->model,
            ]);
        }

        return response()->json([
                    "model" => null,
                    "message" => $result->message,
                        ], $result->status);
    }

    /**
     * Get employee list.
     *
     * @return void
     */
    public function getEmployeeList(Request $request, $page = 1) 
    {
        $getList = $this->service->getEmployeeList($request->toArray(), $page);

        if ($getList->status == 200) {
            return response()->json([
                        "message" => $getList->message,
                        "list" => $getList->list,
                        "max_page" => $getList->max_page,
                        "prev_page" => $getList->prev_page,
                        "next_page" => $getList->next_page
            ]);
        }

        return response()->json([
                    "list" => null,
                    "message" => $getList->message,
                    "max_page" => null,
                    "prev_page" => null,
                    "next_page" => null
                        ], $getList->status);
    }
}

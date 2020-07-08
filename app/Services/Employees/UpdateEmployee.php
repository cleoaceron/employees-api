<?php

namespace App\Services\Employees;

use App\Repositories\Employees\EmployeesRepository;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use Carbon\Carbon;

class UpdateEmployee extends AbstractEmployees
{
    protected $uuid;

    protected $request;

    protected $employeeRepository;

    public function __construct(
        $uuid,
        Request $request, 
        EmployeesRepository $employeeRepository)
    {
        $this->uuid = $uuid;

        $this->request = $request;

        $this->employeeRepository = $employeeRepository;

        parent::__construct($request, $employeeRepository);
    }

    /**
     *
     * Update Employee
     *
     * @return AbstractEmployees
     */
    public function handle(): AbstractEmployees
    {

        $item = $this->request->all();

        $employee = $this->employeeRepository->find('uuid', $this->uuid);
        $updateItem = $this->employeeRepository->update($employee, $item);

        if( $updateItem ){
            $this->response = $this->makeResponse(200, 'update_employee.200');
            $this->response->model = $updateItem;
        }
        else{
           $this->response =  $this->makeResponse(400, 'update_employee.400');
           $this->response->model = null;
        }

        return $this;
    }
}
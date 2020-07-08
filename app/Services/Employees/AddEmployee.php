<?php

namespace App\Services\Employees;

use App\Repositories\Employees\EmployeesRepository;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use Carbon\Carbon;

class AddEmployee extends AbstractEmployees
{

    protected $request;

    protected $employeeRepository;

    public function __construct(Request $request, 
    EmployeesRepository $employeeRepository)
    {
        $this->request = $request;
        $this->employeeRepository = $employeeRepository;

        parent::__construct($request, $employeeRepository);
    }

    /**
     *
     * Add Employee
     *
     * @return AbstractEmployees
     */
    public function handle(): AbstractEmployees
    {

        $item = $this->request->all();
        $item['uuid'] = Uuid::uuid4()->toString();

        $addEmployee = $this->employeeRepository->create($item);

        if( $addEmployee ){
            $this->response = $this->makeResponse(200, 'add_employee.200');
            $this->response->model = $addEmployee;
        }
        else{
           $this->response =  $this->makeResponse(400, 'add_employee.400');
           $this->response->model = null;
        }

        return $this;
    }
}
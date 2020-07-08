<?php

namespace App\Services\Employees;

use App\Services\AbstractBaseService;
use App\Repositories\Employees\EmployeesRepository;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

abstract class AbstractEmployees extends AbstractBaseService
{
    protected $module = 'employees';

    protected $version = 'v1';

    protected $employeesRepository;

    public function __construct(
        Request $request, 
        EmployeesRepository $employeesRepository
    )
    {
        parent::__construct($request);
        $this->employeesRepository = $employeesRepository;
    }

    abstract public function handle(): AbstractEmployees;
}
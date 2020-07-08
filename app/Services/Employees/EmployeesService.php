<?php

namespace App\Services\Employees;

use Ramsey\Uuid\Uuid;
use App\Services\AbstractBaseService;
use App\Services\Employees\AddEmployee;
use App\Repositories\Employees\EmployeesRepository as Repository;
use Illuminate\Http\Request;


class EmployeesService extends AbstractBaseService implements EmployeesInterface {

    protected $module = 'employees';
    protected $repository;
    protected $request;

    const PERPAGE = 10;

    public function __construct(Request $request, Repository $repository) 
    {
        $this->repository = $repository;
        $this->request = $request;
        parent::__construct($request);
    }

    /**
     * Add Employee Service
     *
     * @param Array $item
     * @return response
     */
    public function addEmployee($item) 
    {
        return (new AddEmployee($this->request, $this->repository))->handle()->response();
    }

    /**
     * Update Employee Service
     *
     * @param String $uuid
     * @return response
     */
    public function updateEmployee($uuid) 
    {
        return (new UpdateEmployee($uuid, $this->request, $this->repository))->handle()->response();
    }

    /**
     * View Employees Service
     *
     * @param String $uuid
     * @return response
     */
    public function viewEmployee($uuid) 
    {
        $model = $this->repository->find('uuid', $uuid);

        if( $model ){
            $this->response = $this->makeResponse(200, 'view_employees.200');
            $this->response->model = $model;
        }
        else{
            $this->response = $this->makeResponse(404, 'view_employees.404');
            $this->response->model = null;
        }

        return $this->response;
    }

    /**
     * Get Employees List Service
     *
     * @param String $uuid
     * @return response
     */
    public function getEmployeeList($request, $page) 
    {
        $list = $this->repository->paginate($request, static::PERPAGE, $page);
        $this->response = $this->makeResponse(200, 'list_employees.200');
        
        $this->response->list = $list->list;
        $this->response->max_page = $list->max_page;
        $this->response->next_page = $list->next_page;
        $this->response->prev_page = $list->prev_page;

        return $this->response;
    }
}
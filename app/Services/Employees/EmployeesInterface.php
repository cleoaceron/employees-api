<?php

namespace App\Services\Employees;

interface EmployeesInterface {

    public function addEmployee($item);

    public function updateEmployee($item);

    public function viewEmployee($uuid);

    public function getEmployeeList($request, $page);
}
<?php

use Ramsey\Uuid\Uuid;

class EmployeeTest extends TestCase
{
    /**
     * Add Employee Test Case
     *
     * @return void
     */
    public function testAddEmployee()
    {
        //422
        $response = $this->post("employees/add", []);
        $response->assertResponseStatus(422);
        $response->seeJsonStructure([
            "last_name",
            "first_name",
            "middle_name",
            "nick_name",
            "department",
            "position",
            "birth_date",
            "hired_date",
            "email_address",
            "status"
        ]);

        //Create employee factory
        $employee = factory(\App\Models\Employee::class)->make();

        //200
        $response = $this->post("employees/add", [
            "last_name" => $employee->last_name,
            "first_name" => $employee->first_name,
            "middle_name" => $employee->middle_name,
            "nick_name" => $employee->nick_name,
            "department" => $employee->department,
            "position" => $employee->position,
            "birth_date" => $employee->birth_date,
            "hired_date" => $employee->hired_date,
            "email_address" => $employee->email_address,
            "status" => $employee->status
        ]);
        $response->assertResponseStatus(200);
        $response->seeJsonStructure([
            'message',
            'model'
        ]);
    }

    /**
     * Update Employee Test Case
     *
     * @return void
     */
    public function testUpdateEmployee() 
    {
        //422
        $response = $this->post("employees/update/1", []);
        $response->assertResponseStatus(422);
        $response->seeJsonStructure([
            "last_name",
            "first_name",
            "middle_name",
            "nick_name",
            "department",
            "position",
            "birth_date",
            "hired_date",
            "email_address",
            "status"
        ]);

        //Create employee factory
        $employee = factory(\App\Models\Employee::class)->create();

        //200
        $response = $this->post("employees/update/{$employee->uuid}", [
            "last_name" => $employee->last_name,
            "first_name" => $employee->first_name,
            "middle_name" => $employee->middle_name,
            "nick_name" => $employee->nick_name,
            "department" => $employee->department,
            "position" => $employee->position,
            "birth_date" => $employee->birth_date,
            "hired_date" => $employee->hired_date,
            "email_address" => $employee->email_address,
            "status" => $employee->status
        ]);
        $response->assertResponseStatus(200);
        $response->seeJsonStructure([
            'message'
        ]);
    }

    /**
     * View Employees Test Case
     *
     * @return void
     */
    public function testViewEmployee() 
    {
        //404
        $response = $this->get("employees/view/1");
        $response->assertResponseStatus(404);

        //Create employee factory
        $employee = factory(\App\Models\Employee::class)->create();
        
        //200
        $response = $this->get("employees/view/{$employee->uuid}");
        $response->assertResponseStatus(200);
        $response->seeJsonStructure([
            "message",
            "model" => [
                "uuid",
                "last_name",
                "first_name",
                "middle_name",
                "nick_name",
                "department",
                "position",
                "birth_date",
                "hired_date",
                "email_address",
                "status"
            ]
        ]);
    }

    /**
     * Get Employees Test Case
     *
     * @return void
     */
    public function testEmployeeList() 
    {

        //Create employee factory
        $employee = factory(\App\Models\Employee::class, 9)->create();
        $employee = factory(\App\Models\Employee::class)->create([
            'first_name' => 'John'
        ]);

        //list order
        $response = $this->post("employees/list", [
            "keyword" => ""
        ]);
        $response->assertResponseStatus(200);
        $response->seeJsonStructure([
            "message",
            "list" => [
                "*" => [
                    "last_name",
                    "first_name",
                    "middle_name",
                    "nick_name",
                    "department",
                    "position",
                    "birth_date",
                    "hired_date",
                    "email_address",
                    "status"
                ]
            ],
            "max_page",
            "next_page",
            "prev_page"
        ]);
    }
}
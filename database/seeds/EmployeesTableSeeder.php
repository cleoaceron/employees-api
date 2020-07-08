<?php

use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->delete();

        $employees = [
            0 => [
                "uuid"          => Uuid::uuid4()->toString(),
                "last_name"     => "Doe",
                "first_name"    => "John",
                "middle_name"   => "Smith",
                "nick_name"     => "JJ",
                "department"    => "IT",
                "position"      => "Dev",
                "birth_date"    => "1991-07-15",
                "hired_date"    => "2020-07-20",
                "email_address" => "testEmail1@gmail.com",
                "status"        => 1
            ],
            1 => [
                "uuid"          => Uuid::uuid4()->toString(),
                "last_name"     => "Doe",
                "first_name"    => "Jane",
                "middle_name"   => "Smith",
                "nick_name"     => "JJ",
                "department"    => "IT",
                "position"      => "Dev",
                "birth_date"    => "1992-07-15",
                "hired_date"    => "2020-07-20",
                "email_address" => "testEmail2@gmail.com",
                "status"        => 1
            ],
            2 => [
                "uuid"          => Uuid::uuid4()->toString(),
                "last_name"     => "Doe",
                "first_name"    => "Marie",
                "middle_name"   => "Smith",
                "nick_name"     => "MM",
                "department"    => "IT",
                "position"      => "Dev",
                "birth_date"    => "1993-07-15",
                "hired_date"    => "2020-07-20",
                "email_address" => "testEmail3@gmail.com",
                "status"        => 1
            ],
            3 => [
                "uuid"          => Uuid::uuid4()->toString(),
                "last_name"     => "Doe",
                "first_name"    => "Jenny",
                "middle_name"   => "Smith",
                "nick_name"     => "JN",
                "department"    => "IT",
                "position"      => "Dev",
                "birth_date"    => "1994-07-15",
                "hired_date"    => "2020-07-20",
                "email_address" => "testEmail4@gmail.com",
                "status"        => 1
            ],
            4 => [
                "uuid"          => Uuid::uuid4()->toString(),
                "last_name"     => "Doe",
                "first_name"    => "Michael",
                "middle_name"   => "Smith",
                "nick_name"     => "MD",
                "department"    => "IT",
                "position"      => "Dev",
                "birth_date"    => "1995-07-15",
                "hired_date"    => "2020-07-20",
                "email_address" => "testEmail5@gmail.com",
                "status"        => 1
            ]
        ];

        foreach($employees as $employee) {
            DB::table('employees')->insert($employee);
        }
    }
}

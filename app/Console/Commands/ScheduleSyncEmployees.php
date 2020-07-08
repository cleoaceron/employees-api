<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Bus;
use Carbon\Carbon;
use App\Services\Employees\EmployeesInterface as EmployeesService;

class ScheduleSyncEmployees extends Command {

    protected $signature = "dispatch:sync_employees";

    protected $employeeService;

    public function __construct(EmployeesService $employeeService)
    {
        $this->employeeService =  $employeeService;

        parent::__construct();
    }

    public function handle() {
        Log::info('Running Sync Employees command.');

        //$notify = $this->employeeService->fetchEmployeesApi();

        Log::info('Done...');
    }
}

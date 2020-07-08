<?php

namespace App\Repositories\Employees;

use App\Repositories\AbstractBaseRepository;
use App\Models\Employee as Model;
use DB;

class EmployeesRepository extends AbstractBaseRepository {

	protected $searchFields = [
        'uuid',
        'last_name',
        'first_name',
        'middle_name',
        'nick_name',
        'department',
        'position',
        'birth_date',
        'hired_date',
        'email_address',
        'status'
	];

    public function __construct(Model $model) {
        parent::__construct($model);
    }

    public function paginate($request, $perpage, $page) {
        
        $items = $this->model;

        //check keyword
        if (isset($request['keyword']) && $request['keyword'] !== null && $request['keyword'] !== '') {
            $items = $items->where(function ($query) use ($request) {
            	foreach( $this->searchFields as $key => $field ){
            		if( $key == 0 ){
            			$query->where('employees.'.$field, 'like', '%' . $request['keyword'] . '%');
            		}
            		else{
            			$query->orWhere('employees.'.$field, 'like', '%' . $request['keyword'] . '%');
            		}
            	}
            });
        }
        
        return $this->model::paginate($items, $perpage, $page);
    }
    
}
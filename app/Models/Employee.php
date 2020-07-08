<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Models\AbstractBaseModel;

class Employee extends AbstractBaseModel
{
    const SORT = 'created_at';

    const FIELDS = [
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

    protected $fillable = [
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

    protected $hidden = [
        'id',
        'created_at',
        'updated_at'
    ];
}
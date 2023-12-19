<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function emp_group()
    {
        return $this->belongsTo(Employeegroup::class,'emp_group_id');
    }
}

<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model; 

class Department extends Model
{
    protected $connection = 'mongodb'; 
    protected $collection = 'departments'; 
    protected $fillable = ['dep_no', 'dep_name', 'location']; 


    public function employees()
    {
        return $this->hasMany(Employee::class, 'department_id'); // 'department_id' should match the field used in Employee model
    }
}

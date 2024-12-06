<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model; // Use the updated MongoDB model class

class Employee extends Model
{
    protected $connection = 'mongodb';  // Ensure it's using the MongoDB connection
    protected $collection = 'employees';  // Set the MongoDB collection name
    protected $fillable = [
        'emp_id', 'emp_f_name', 'emp_l_name', 'phone_number', 'job_name', 'department', 'hire_date', 'email',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'dep_name', '_id');
    }
}

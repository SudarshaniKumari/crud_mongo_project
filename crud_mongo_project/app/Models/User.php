<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as LaravelAuthenticatable;

class User extends Model  implements Authenticatable
{
    use LaravelAuthenticatable; // Add this trait

    protected $connection = 'mongodb'; // Specify MongoDB connection
    protected $collection = 'users';  // MongoDB collection name
    protected $fillable = ['name', 'email', 'password']; // Fillable attributes
}

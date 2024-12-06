<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model; // Use the updated MongoDB model class

class Item extends Model
{
    protected $connection = 'mongodb'; // Specify MongoDB connection
    protected $collection = 'items';  // MongoDB collection name
    protected $fillable = ['name', 'description']; // Fillable attributes
}

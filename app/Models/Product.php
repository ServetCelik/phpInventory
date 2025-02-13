<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products'; 

    protected $fillable = [
        'name',
        'description',
        'weight',
        'width',
        'length',
        'height',
        'department_id'
    ];

    // Many Products belong to One Department
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }
}

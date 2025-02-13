<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $table = 'users'; 

    protected $fillable = [
        'user_name',
        'password',
        'employee_id',
    ];

    protected $hidden = [
        'password', // Hide password when returning JSON
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed', // Auto-hash passwords
        ];
    }

    public function employee()
    {
        return $this->hasOne(Employee::class, 'id', 'employee_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $table = 'locations';

    protected $fillable = [
        'name',
        'address',
        'max_pallet',
    ];

    // One Location has Many Pallets
    public function pallets()
    {
        return $this->hasMany(Pallet::class, 'location_id', 'id');
    }
}

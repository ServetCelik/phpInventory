<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pallet extends Model
{
    use HasFactory;

    protected $table = 'pallets'; // Matches the database table name

    protected $fillable = [
        'amount',
        'location_id',
        'product_id',
    ];

    // Many Pallets belong to One Location
    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id', 'id');
    }

    // One Pallet has One Product
    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}

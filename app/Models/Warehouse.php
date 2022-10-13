<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Warehouse extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address'
    ];

    public function product(): HasMany
    {
        return $this->hasMany(Product::class, 'partner_id');
    }

    public function productHistory(): HasMany
    {
        return $this->hasMany(Order::class, 'partner_id');
    }
}

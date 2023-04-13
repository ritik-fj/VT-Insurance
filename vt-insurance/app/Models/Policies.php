<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Policies extends Model
{
    use HasFactory;

    protected $fillable = [

        'id',
        'policy_type',
        'coverage_amount',
        'premium_amount',
        'policy_duration'
    ];
    public function customers()
    {
        return $this->belongsToMany(Customers::class)->withTimestamps();
    }
}

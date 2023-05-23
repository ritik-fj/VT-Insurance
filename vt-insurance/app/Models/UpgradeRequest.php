<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpgradeRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'customer_id',
        'policy_id',
        'coverage_amount',
        'premium_amount',
        'excess_amount',
        'status',
        'policy_duration'
    ];
}

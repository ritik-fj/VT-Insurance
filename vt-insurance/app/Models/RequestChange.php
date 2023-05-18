<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestChange extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'customer_id',
        'policy_id',
        'coverage_amount',
        'premium_amount',
        'policy_duration'
    ];

    public function customer()
    {
        return $this->belongsTo(Customers::class);
    }

    public function policy()
    {
        return $this->belongsTo(Policies::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'customer_id',
        'policy_id',
        'description',
        'incident_date',
        'claim_type',
        'claim_amount',
        'status',
        'image'
    ];
}

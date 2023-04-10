<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerPolicy extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'policy_id',
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

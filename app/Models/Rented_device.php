<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rented_device extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'total_price',
        'per_hour_rate',
        'booking_date',
        'return_date',
        'is_returned',
        'is_insurance',
        'insurance_amount',
        'security',
        'discount',
        'damage_amount',
        'late_fee',
        'note',
        'status'

    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payout extends Model
{
    use HasFactory;
    protected $fillable =[
        'user_id',
        'deal_id',
        'amount',
        'image',
        'reference_number',
        'client',
    ];
}

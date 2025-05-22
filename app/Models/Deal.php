<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    use HasFactory;

    protected $fillable=[
        'created_by',
        'reference_number',
        'project_type',
        'project_name',
        'developer',
        'city',
        'state',
        'project_description',
        'agent_name',
        'brokerage_name',
        'brokerage_license_no',
        'email',
        'phone',
        'swift_number',
        'iban_number',
        'account_holder_name',
        'bank_country',
        'client_name',
        'is_dld',
        'project_value',
        'commission_percentage',
        'commission_amount',
        'deal_status',
        'closing_date'
    ];
}

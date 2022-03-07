<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_id',
        'user_id',
        'from_street_address',
        'status',
        'payment_due',
        'from_city',
        'from_zip',
        'from_country',
        'to_name',
        'to_email',
        'to_street_address',
        'to_city',
        'to_zip',
        'to_country',
        'issue_date',
        'payment_terms',
        'project_description',
        'item1_name',
        'item1_qty',
        'item1_price',
        'item1_total',
        'item2_name',
        'item2_qty',
        'item2_price',
        'item2_total',
        'item3_name',
        'item3_qty',
        'item3_price',
        'item3_total'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

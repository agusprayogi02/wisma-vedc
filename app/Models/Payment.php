<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    function reservation(): BelongsTo
    {
        return $this->belongsTo(Reservation::class);
    }

    function paymentPerson(): BelongsTo
    {
        return $this->belongsTo(Orderer::class, 'id', 'payment_person_id');
    }
}

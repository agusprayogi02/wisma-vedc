<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }

    public function orderer()
    {
        return $this->belongsTo(Orderer::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

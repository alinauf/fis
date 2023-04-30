<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FishingVessel extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function bankAccounts()
    {
        return $this->hasMany(BankAccount::class);
    }

}

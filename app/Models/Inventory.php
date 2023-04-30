<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventory extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function collection()
    {
        return $this->belongsTo(Collection::class);
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function fish()
    {
        return $this->belongsTo(Fish::class);
    }

    public function variant()
    {
        return $this->belongsTo(Variant::class);
    }
}

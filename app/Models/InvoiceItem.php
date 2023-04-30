<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvoiceItem extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function invoice()
    {
        return $this->belongsTo(Invoice::class, 'invoice_id', 'id');
    }

    public function collection()
    {
        return $this->belongsTo(Collection::class, 'collection_id', 'id');
    }

    public function fish()
    {
        return $this->belongsTo(Fish::class, 'fish_id', 'id');
    }

    public function variant()
    {
        return $this->belongsTo(Variant::class, 'variant_id', 'id');
    }

}

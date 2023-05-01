<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function fishingVessel()
    {
        return $this->belongsTo(FishingVessel::class);

    }

    public function collectionVessel()
    {
        return $this->belongsTo(CollectionVessel::class);

    }

    public function collection()
    {
        return $this->belongsTo(Collection::class);
    }


    public function invoiceItems()
    {
        return $this->hasMany(InvoiceItem::class, 'invoice_id', 'id');
    }

}

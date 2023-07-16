<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CS_Supplier_details extends Model
{
    use HasFactory;

    protected $table = 'cs_suppliers_details';

    protected $fillable = [
        'cs_id',
        'supplier_id',
        'selected',
        'price_colllection_way',
        'grade',
        'vat',
        'tax',
        'credit_period',
        'material_availability',
        'delivery_condition',
        'required_time',
        'remarks',
        'created_by',
        'updated_by',
    ];

    public function cs()
    {
        return $this->belongsTo(CS::class, 'cs_id', 'id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }

}

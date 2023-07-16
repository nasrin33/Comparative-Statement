<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CS extends Model
{
    use HasFactory;

    protected $table = 'cs';

    protected $fillable = [
        'cs_ref_no',
        'effective_date',
        'expiry_date',
        'remarks',
        'created_by',
        'updated_by',
    ];

    public function cs_supplier_details()
    {
        return $this->hasMany(CS_Supplier_details::class, 'cs_id', 'id');
    }

    public function cs_details()
    {
        return $this->hasMany(CS_details::class, 'cs_id', 'id');
    }
}

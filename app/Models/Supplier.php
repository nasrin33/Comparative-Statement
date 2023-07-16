<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $table = 'suppliers';

    protected $fillable = [
        'supplier_name',
        'supplier_address',
        'supplier_contact',
        'created_by',
        'updated_by',
    ];

    public function cs_supplier_details()
    {
        return $this->hasMany(CS_Supplier_details::class, 'supplier_id', 'id');
    }

    public function cs_details()
    {
        return $this->hasMany(CS_details::class, 'supplier_id', 'id');
    }
}

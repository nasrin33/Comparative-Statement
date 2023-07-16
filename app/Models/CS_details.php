<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CS_details extends Model
{
    use HasFactory;

    protected $table = 'cs_details';

    protected $fillable = [
        'cs_id',
        'supplier_id',
        'material_id',
        'rate',
        'created_by',
        'updated_by',
    ];

    public function cs()
    {
        return $this->belongsTo(CS::class, 'cs_id', 'id');
    }

    public function material()
    {
        return $this->belongsTo(Material::class, 'material_id', 'id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }


}

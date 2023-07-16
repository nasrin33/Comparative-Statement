<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $table = 'materials';

    protected $fillable = [
        'material_name',
        'unit',
        'created_by',
        'updated_by',
    ];

    public function cs_details()
    {
        return $this->hasMany(CS_details::class, 'material_id', 'id');
    }
}

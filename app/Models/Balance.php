<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo',
        'concepto',
        'valor',
        'rol_pago_id',
        'user_created_id',
        'user_updated_id',
    ];

    public function rol_pago(){
        return $this->belongsTo(RolPago::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolPago extends Model
{
    use HasFactory;

    protected $fillable = [
        'neto_pagar',
        'empleado_id',
        'user_created_id',
        'user_updated_id',
    ];
    public function empleado(){
        return $this->belongsTo(Empleado::class);
    }
    public function balance(){
        return $this->hasMany(Balance::class);
    }
}

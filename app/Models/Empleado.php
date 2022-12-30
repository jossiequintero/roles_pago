<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $fillable =[
        'sueldo',
        'prestamo',
        'user_id',
        'user_created_id',
        'user_updated_id',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function rol_pago(){
        return $this->hasMany(RolPago::class);
    }
}

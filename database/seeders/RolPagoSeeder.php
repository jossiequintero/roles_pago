<?php

namespace Database\Seeders;

use App\Models\RolPago;
use Illuminate\Database\Seeder;

class RolPagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RolPago::create([
            'neto_pagar' =>1400,
            'empleado_id' =>1,
        ]);
    }
}

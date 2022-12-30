<?php

namespace Database\Seeders;

use App\Models\Balance;
use Illuminate\Database\Seeder;

class BalanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Balance::create([
            'tipo' =>'Ingreso',
            'concepto'=>'Horas extras',
            'valor' =>200.00,
            'rol_pago_id'=>1,
        ]);
    }
}

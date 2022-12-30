<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\EmpleadoService;
use App\Services\RolPagoService;
use App\Services\UserService;
use Illuminate\Http\Request;

class RolPagoController extends Controller
{
    public function create(EmpleadoService $empleadoService,$empleado_id=0 )
    {
        $data = $empleadoService->getEmpleadoById($empleado_id);
        $empleados = $empleadoService->getAllEmpleadoUserInfo();
        dump($empleados, $data);
        $empleado = null;
        return view('nuevo-rol-pago',compact('data','empleados','empleado'));
    }
    public function GenerarRolPago(EmpleadoService $empleadoService ,RolPagoService $service, Request $request){
        $empleado_id = $request->empleado_id;
        $empleado = $empleadoService->getEmpleadoSueldoById($empleado_id);
        $data = [
            'empleado_id' => $empleado_id,
            'neto_pagar' => $empleado['neto_pagar'],
        ];
        $rolpago_id = $service->SaveRolPago($data);
        dump($rolpago_id);

        return view('generar-rol-pago',compact('empleado','rolpago_id'));
    }
    public function GenerarRolPagoBalance($empleado_id){

    }
}

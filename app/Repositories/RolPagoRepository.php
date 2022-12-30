<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Empleado;
use App\Models\RolPago;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

final class RolPagoRepository
{

    private RolPago $model;
    const APORTE_IESS = 0.0935;

    /**
     * Funcion constructuro da la clase
     *@param RolPago Rolpago
     *@return void
     *@author Jossie Quintero <quinterojosy@gmail.com>
     *@date septiembre 20th, 2022
     */
    public function __construct(RolPago $RolPago)
    {
        $this->model = $RolPago;
    }

    /**
     * Funcion que obtiene los Roles de pago
     *@param ninguno
     *@return Collection
     *@author Jossie Quintero <quinterojosy@gmail.com>
     *@date septiembre 20th, 2022
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * Funcion que obtiene los roles con sus datos de usuario y empleado
     *@param ninguno
     *@return Collection
     *@author Jossie Quintero <quinterojosy@gmail.com>
     *@date septiembre 20th, 2022
     */
    public function getAllRolWithUser()
    {
        $UserAuth = User::find(auth()->user()->id);
        $data = [];
        if ($UserAuth->rol == 'RH') {
            $allrolpago = $this->model->all();
            foreach ($allrolpago as $item) {
                $info = [];
                $rolpago = new RolPago;
                $rolpago = $item;
                $dataempleado = new Empleado;
                $dataempleado = $rolpago->empleado;
                $datauser = new User;
                $datauser = $dataempleado->user;

                $info = ['rolpago_id' => $rolpago->id, 'name' => $datauser->name, 'apellidos' => $datauser->apellidos, 'neto_pagar' => $rolpago->neto_pagar, 'fecha_creacion' => $rolpago->created_at];
                array_push($data, $info);
            }
            return $data;

        } else {
            $empleado = $UserAuth->empleado;
            if(!$empleado == null) {
                return $rolpago = $empleado->rol_pago;
            }

        }
    }

    /**
     * Funcion que que edita un rol
     *@param int id
     *@return string
     *@author Jossie Quintero <quinterojosy@gmail.com>
     *@date septiembre 20th, 2022
     */
    public function editRol(int $id)
    {
        return "Mensaje";
    }

    /**
     * Funcion que obtiene un rol de pago por su id
     *@param int id
     *@return RolPago
     *@author Jossie Quintero <quinterojosy@gmail.com>
     *@date septiembre 20th, 2022
     */
    public function getRolPago($id)
    {
        $UserAuth = User::find(auth()->user()->id);
        $data = array();
        if ($UserAuth->rol = 'RH') {
            $rolpago = $this->model->find($id);
            $dataempleado = $rolpago->empleado;
            $datauser = $dataempleado->user;

            $info = [
                'rolpago_id' => $rolpago->id,
                'name' => $datauser->name,
                'apellidos' => $datauser->apellidos,
                'neta_pagar' => $rolpago->neto_pagar,
                'fecha_creacion' => $rolpago->created_at,
                'balances' => $rolpago->balance,
            ];
            array_push($data, $info);
        } else if ($UserAuth->rol = 'Empleado') {
            $data = $this->model->where('empleado_id', $UserAuth->id)->get();
        }
        return $data;
    }
    public function SaveRolPago($data){
        $rolpago = new RolPago;
        $rolpago->neto_pagar = $data['neto_pagar'];
        $rolpago->empleado_id = $data['empleado_id'];
        $rolpago->save();
        return $rolpago->id;
    }
}

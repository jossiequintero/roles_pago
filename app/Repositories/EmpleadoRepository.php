<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Empleado;
use App\Services\RolPagoService;

;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

final class EmpleadoRepository
{

    private Empleado $model;

    public function __construct(Empleado $empleado)
    {
        $this->model = $empleado;
    }

    /**
     * Funcion que obtiene un empleado por su id
     *@param int id
     *@return Empleado
     *@author Jossie Quintero <quinterojosy@gmail.com>
     *@date septiembre 20th, 2022
     */
    public function getEmpleado(int $id)
    {
        return Empleado::find($id);
    }

    /**
     * Funcion que obtiene la informacion de Usuario de un Empleado por su id
     *@param int id
     *@return User
     *@author Jossie Quintero <quinterojosy@gmail.com>
     *@date septiembre 20th, 2022
     */
    public function getEmpleadoUserInfo(int $id)
    {
        return Empleado::find($id)->user;
    }

    /**
     * Funcion que obtiene los nombres de los empleados y su id
     *@param ninguno
     *@return Array
     *@author Jossie Quintero <quinterojosy@gmail.com>
     *@date septiembre 20th, 2022
     */
    public function getAllEmpleadoName()
    {
        $data = Empleado::join('users');
    }

    /**
     * Funcion que obtiene la informacion de usuario por empleado
     *@param ninguno
     *@return Collection
     *@author Jossie Quintero <quinterojosy@gmail.com>
     *@date septiembre 20th, 2022
     */
    public function getAllEmpleadoUserInfo()
    {
        return DB::table('users')
            ->join('empleados', 'users.id', '=', 'empleados.user_id')
            ->select('empleados.id', 'users.name','users.apellidos')
            ->get();
    }

     /**
     * Funcion que obtiene el sueldo de un empleado por su id
     *@param int id
     *@return decimal
     *@author Jossie Quintero <quinterojosy@gmail.com>
     *@date septiembre 20th, 2022
     */
    public function getSueldo(int $id)
    {
        return Empleado::where('empleados.id', '=', $id)->select('empleados.sueldo')->get();
    }
    public function getNetoPagar($sueldo){
        return $sueldo - $this->getAporteIESS($sueldo);
    }
     /**
     * Funcion que obtiene la lista de empleados
     *@param ninguno
     *@return Collection
     *@author Jossie Quintero <quinterojosy@gmail.com>
     *@date septiembre 20th, 2022
     */
    public function getAll()
    {
        return $this->model->all();
    }

    public function getEmpleadoById($id){

        if($id !=0){
            $empleado = Empleado::find($id);
            $user = $empleado->user;
            return [
                'empleado_id'=>$empleado->id,
                'sueldo'=>$empleado->sueldo,
                'name'=>$user->name,
                'apellidos'=>$user->apellidos,
                'cedula'=>$user->cedula,
            ];
        }
    }
    public function getEmpleadoSueldoById($id){
        $empleado = Empleado::find($id);
        $user = $empleado->user;
        return [
            'empleado_id'=>$empleado->id,
            'name'=>$user->name,
            'apellidos'=>$user->apellidos,
            'cedula'=>$user->cedula,
            'sueldo'=>$empleado->sueldo,
            'aporte_iess' => $this->getAporteIESS($empleado->sueldo),
            'neto_pagar'=> $this->getNetoPagar($empleado->sueldo),
        ];
    }
    public function getAporteIESS($sueldo){
        return RolPagoRepository::APORTE_IESS * $sueldo;
    }
}

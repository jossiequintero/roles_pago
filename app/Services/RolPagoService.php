<?php
declare(strict_types=1);

namespace App\Services;

use App\Repositories\RolPagoRepository;
use Illuminate\Database\Eloquent\Collection;
use Ramsey\Uuid\Type\Decimal;

final class RolPagoService{

    private RolPagoRepository $repository;
    public function __construct(RolPagoRepository $repo){
        $this->repository = $repo;
    }
    public function all():Collection{
        return $this->repository->all();
    }
    public function allRolUser(){
        return $this->repository->getAllRolWithUser();
    }
    public function getRolPago($id){
        return $this->repository->getRolPago($id);
    }

     /**
     * Funcion que genera el total a pagar de un rol de pago
     *@param $valores de balance y el sueldo
     *@return decimal
     *@author Jossie Quintero <quinterojosy@gmail.com>
     *@date septiembre 20th, 2022
     */
    public function calcularSueldo(array $ingresos, array $egresos, $sueldo){
        $aporteIESS = $sueldo * $this->repository->APORT_IESS;
        $totalIngresos = 0;
        $totalEgresos = 0;
        foreach ($ingresos as $ingreso) {
            $totalIngresos = $totalIngresos + $ingreso;
        }
        foreach ($egresos as $egreso) {
            $totalEgresos = $totalEgresos + $egreso;
        }
        return ($sueldo - $aporteIESS) + $totalIngresos - $totalEgresos;
    }
    public function SaveRolPago($data){
        return $this->repository->SaveRolPago($data);
    }
}

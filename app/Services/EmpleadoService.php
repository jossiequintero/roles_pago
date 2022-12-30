<?php declare(strict_types=1);

namespace App\Services;

use App\Repositories;
use App\Models\Empleado;
use App\Models\User;
use App\Repositories\EmpleadoRepository;
use Illuminate\Database\Eloquent\Collection;
use PhpParser\Node\Stmt\TryCatch;

class EmpleadoService{
    private EmpleadoRepository $repository;
    public function __construct(EmpleadoRepository $repo){
        $this->repository = $repo;
    }
    public function getEmpleadoUserInfo(int $id){
        try {
            return $this->repository->getEmpleadoUserInfo($id);
        } catch (\Throwable $th) {
        }
    }
    public function getAllEmpleadoUserInfo(){
        return $this->repository->getAllEmpleadoUserInfo();
    }
    public function getSueldo(int $id){
        return 'getSueldo' .$id;
    }
    public function getAll(){
        return $this->repository->getAll();
    }
    public function getEmpleadoById($id){
        return $this->repository->getEmpleadoById($id);
    }
    public function getEmpleadoSueldoById($id){
        return $this->repository->getEmpleadoSueldoById($id);
    }
}

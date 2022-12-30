<?php declare(strict_types=1);

namespace App\Services;

use App\Repositories;
use App\Repositories\UserRepository;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use PhpParser\Node\Stmt\TryCatch;

class UserService{

    private UserRepository $repo;
    /**
     * @return string $email
     * @return User
     */
    public function __construct(UserRepository $repository){
        $this->repo = $repository;
    }
    // public function getAll(UserRepository $user):Collection{
    //     try {
    //         return $user->getUsers();
    //     } catch (\Throwable $th) {
    //         //throw $th;
    //     }
    // }
    // public function getUserById(int $user_id){
    //     return User::find($user_id);
    // }
    // public function getUserByCedula(string $cedula){
    //     return User::where('cedula',$cedula)->first();
    // }
    // public function getUserByRol(string $rol){
    //     return User::where('rol',$rol);
    // }
    // public function getUserByFechaNaciento($f_nacimiento):Collection{
    //     return User::where('fecha_nacimiento',$f_nacimiento)->get();
    // }
    public function crear(array $request){
        return $this->repo->crear($request);
    }
}

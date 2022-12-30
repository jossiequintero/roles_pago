<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;

class UserRepository
{

    /**
     * Funcion que obtiene una lista de Usuarios
     *@param ninguno
     *@return Collection
     *@author Jossie Quintero <quinterojosy@gmail.com>
     *@date septiembre 20th, 2022
     */
    public function getUsers(): Collection
    {
        return User::all();
    }

    /**
     * Funcion que obtiene un usuario por su id
     *@param int user_id
     *@return User
     *@author Jossie Quintero <quinterojosy@gmail.com>
     *@date septiembre 20th, 2022
     */
    public function getUserById(int $user_id)
    {
        return User::find($user_id);
    }

    /**
     * Funcion que obtiene un usuario por su cedula
     *@param string cedula
     *@return User
     *@author Jossie Quintero <quinterojosy@gmail.com>
     *@date septiembre 20th, 2022
     */
    public function getUserByCedula(string $cedula)
    {
        return User::where('cedula', $cedula)->first();
    }

     /**
     * Funcion que obtiene los usuario por su rol
     *@param string rol
     *@return Collection
     *@author Jossie Quintero <quinterojosy@gmail.com>
     *@date septiembre 20th, 2022
     */
    public function getUserByRol(string $rol):Collection
    {
        return User::where('rol', $rol);
    }

      /**
     * Funcion que obtiene los usuarios con una fecha de nacimiento
     *@param date fecha nacimiento
     *@return Collection
     *@author Jossie Quintero <quinterojosy@gmail.com>
     *@date septiembre 20th, 2022
     */
    public function getUserByFechaNaciento($f_nacimiento): Collection
    {
        return User::where('fecha_nacimiento', $f_nacimiento)->get();
    }

     /**
     * Funcion que registra un nuevo usuario
     *@param array request
     *@return
     *@author Jossie Quintero <quinterojosy@gmail.com>
     *@date septiembre 20th, 2022
     */
    public function crear(array $request)
    {
        return User::create(
            [
                'nombres' => $request['nombres'],
                'apellidos' => $request['apellidos'],
                'cedula' => $request['cedula'],
                'rol' => $request['rol'],
                'email' => $request['email'],
                'password' => Hash::make($request['password'], $request['password']),
            ]
        );
    }
     /**
     * Funcion que verifica si es un usaurio RH
     *@param int id
     *@return boolean
     *@author Jossie Quintero <quinterojosy@gmail.com>
     *@date septiembre 20th, 2022
     */
    public function isRHUser(int $id)
    {
    }
}

<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use App\Services\EmpleadoService;
use App\Models\Empleado;
use App\Models\RolPago;
use App\Models\User;
use App\Services\RolPagoService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
/**
     * @OA\Get(
     *      path="/projects",
     *      operationId="getProjectsList",
     *      tags={"Projects"},
     *      summary="Get list of projects",
     *      description="Returns list of projects",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/ProjectResource")
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(RolPagoService $service)
    {
        $data = $service->allRolUser();
        return view('home', compact('data'));
    }
    public function edit(RolPagoService $service){
        return "al";
    }
    public function show($id, RolPAgoService $service){
        $data = $service->getRolPago($id);
        return view('show-rol-pago', compact('data'));
    }
    public function RolPagoShow()
    {
        try {
            $data = array();
            return view('rol-pago', $data);
        } catch (\Throwable $th) {
        }
    }
    public function UsuarioStore(array $data, UserService $service)
    {
        try {
            return $service->crear($data);
        } catch (\Throwable $th) {}
    }

    public function showRoles(RolPagoService $service){
        return $service->all();
    }
    public function rolEmpleado(RolPagoService $service){
        return $service->allRolUser();
    }
    // public function rolempleado(RolPagoService $service){
    //     return $service->allRolUser()
    // }
}

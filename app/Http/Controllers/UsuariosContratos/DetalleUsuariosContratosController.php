<?php

namespace App\Http\Controllers\UsuariosContratos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DetalleUsuariosContratosController extends Controller
{
    public function index()
    {
        // $user_cedula = auth()->user()->cedula;
        // $consultas = $this->ConsultarCuentas("1391829884001");
        //SOLO ENVIAMOS LA DATA y forzamos para trabajar como objeto $consultas = $consultas['data'];
        // $consultaObjeto = json_decode(json_encode($consultas['data'], JSON_FORCE_OBJECT));
        #pendiente corregir guardar datos con la nueva base de datos
        // $this->GuardarDatos('1391829884001');
        return view('pages.dashboard');
        // return view('pages.dashboard', compact('consultaObjeto'));
    }
    
    public function ConsultarCuentas($cedula)
    {
        // $cedula = $this->ci;
        // $cedula = auth()->user()->cedula;
        // $tipoConsulta = 'consultaAuxiliar';
        // $getConsultaAuxiliar = Http::withBasicAuth('EPAM_PAGO_LINEA', 'NWRQjSMEnjY=')
        //         ->withUrlParameters([
        //         'endpoint' => 'https://pagos-qa.altura.services/ws-pago-linea/webresources/api',
        //         'idEmpresa' => 'EPAM',
        //         'usuarioCobro' => 'EXTERNO',
        //         'identificacion' => $cedula,
        //         'tipoConsulta' => 'consultaAuxiliar',
        //     ])->get('/{+endpoint}/{+tipoConsulta}?idEmpresa={+idEmpresa}&usuarioCobro={+usuarioCobro}&identificacion={+identificacion}');
        // $response = $getConsultaAuxiliar;
        // return $response;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\UsuariosContratos;

use App\Http\Controllers\Controller;
use App\Models\Contrato;
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class DetalleUsuariosContratosController extends Controller
{
    public $cedula;

    public function index()
    {
        // $user_cedula = auth()->user()->cedula;
        $user_cedula = "1391829884001";
        $consultas = $this->ConsultarCuentas($user_cedula);
        $consultaObjeto = json_decode(json_encode($consultas['data'], JSON_FORCE_OBJECT));
        #guardamos los contratos, podemos manejar los errores true o falso pero no es necesario, ALERTA REGISTROS AGREGADOS O SIN REGISTROS NUEVOS
        $respuestaAccion = $this->GuardarDatos($consultaObjeto);
        //SOLO ENVIAMOS LA DATA y forzamos para trabajar como objeto $consultas = $consultas['data'];
        return view('pages.dashboard', compact('consultaObjeto'));
    }

    public function ConsultarCuentas($cedula)
    {
        // $cedula = auth()->user()->cedula;
        $tipoConsulta = 'consultaAuxiliar';
        $getConsultaAuxiliar = Http::withBasicAuth('EPAM_PAGO_LINEA', 'NWRQjSMEnjY=')
            ->withUrlParameters([
                'endpoint' => 'https://pagos-qa.altura.services/ws-pago-linea/webresources/api',
                'idEmpresa' => 'EPAM',
                'usuarioCobro' => 'EXTERNO',
                'identificacion' => $cedula,
                'tipoConsulta' => 'consultaAuxiliar',
            ])->get('/{+endpoint}/{+tipoConsulta}?idEmpresa={+idEmpresa}&usuarioCobro={+usuarioCobro}&identificacion={+identificacion}');
        $response = $getConsultaAuxiliar;
        return $response;
    }

    #Guardar Datos de los contratos según el usuario consultado, SE ENVIA EL OBJETO CONSULTADO
    public function GuardarDatos($consultaObjeto)
    {
        #traemos el numero de la persona en caso que se cree, si no se crea es porque ya esta registrado la persona (previamente se registro como usuario)
        //por tanto la accion a realizar es como usuario loggeado
        $persona = $this->GuardarPersonaUnaVez($consultaObjeto);
        if ($persona) {
            $numeroIdentificacionC = '';
            $numeroIdentificacionR = '';
            #ACID TRANSACTION
            DB::beginTransaction();
            try {
                foreach ($consultaObjeto as $key => $value) {
                    if (strlen($value->numeroIdentificacion) <= 10) {
                        $numeroIdentificacionC = $value->numeroIdentificacion;
                        $numeroIdentificacionR = null;
                    } else {
                        $numeroIdentificacionR = $value->numeroIdentificacion;
                        $numeroIdentificacionC = null;
                    }
                    // Consulta para guardar la cuenta contrato solo si no esta registrada
                    $contratos = Contrato::firstOrCreate(
                        ['contrato_id' => $value->idDeuda],
                        [
                            'contrato_id' => $value->idDeuda,
                            'codigo_medidor' => $value->idDeudaAlterno,
                            'persona_id' => $persona->id,
                            'clave_catastral' => $value->claveCatastral,
                            'direccion' => $value->direccion,
                            'estado' => 1,
                        ]
                    );
                    $contratos->save();
                }
                DB::commit();
                return true;
            } catch (\Throwable $th) {
                DB::rollBack();
                return ('Error: ' . $th->getMessage());
            }
        }
        else{
            #Actualizar deuda 
            #Actualizar detalle deuda
            return false;
        }

    }

    public function GuardarPersonaUnaVez($value)
    {
        #recibimos el objeto y creamos la persona si no esta creada, por defecto solo se guardará una sola persona
        //asi el objeto traiga mas datos solo corresponderá a una persona, ya que todos estan asociados por cedula, ruc, codigo contrato y el resultado es el mismo
        #COMPROBAMOS QUE SEA UN OBJETO(CONSUMIDO DEL API) Y TRAIGA EL NUMERO DE IDENTIFICACION
        $persona = false;
        if(property_exists(reset($value), 'numeroIdentificacion')) {
            $persona = Persona::firstOrCreate(
                ['numero_identificacion' => reset($value)->numeroIdentificacion],
                [
                    'numero_identificacion' => reset($value)->numeroIdentificacion,
                    'apellidos_nombres'     => reset($value)->apellidosNombre
                ],
            );
            return $persona;
        }else{
            return $persona;
        }
    }

    public function create()
    {
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

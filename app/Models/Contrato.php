<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Contrato
 *
 * @property $id
 * @property $contrato_id
 * @property $codigo_medidor
 * @property $persona_id
 * @property $detalle_adicional
 * @property $direccion
 * @property $clave_catastral
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property DetalleDeudasContrato[] $detalleDeudasContratos
 * @property DetalleUsersContrato[] $detalleUsersContratos
 * @property Persona $persona
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Contrato extends Model
{
    
    static $rules = [
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['contrato_id','codigo_medidor','persona_id','detalle_adicional','direccion','clave_catastral','estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detalleDeudasContratos()
    {
        return $this->hasMany('App\Models\DetalleDeudasContrato', 'contrato_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detalleUsersContratos()
    {
        return $this->hasMany('App\Models\DetalleUsersContrato', 'contrato_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function persona()
    {
        return $this->hasOne('App\Models\Persona', 'id', 'persona_id');
    }
    

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DetalleDeudasContrato
 *
 * @property $id
 * @property $fecha_max_pago
 * @property $fecha_max_pago_date
 * @property $valor
 * @property $abono
 * @property $saldo
 * @property $deuda_id
 * @property $contrato_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Contrato $contrato
 * @property Deuda $deuda
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DetalleDeudasContrato extends Model
{
    
    static $rules = [
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['fecha_max_pago','fecha_max_pago_date','valor','abono','saldo','deuda_id','contrato_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function contrato()
    {
        return $this->hasOne('App\Models\Contrato', 'id', 'contrato_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function deuda()
    {
        return $this->hasOne('App\Models\Deuda', 'id', 'deuda_id');
    }
    

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Deuda
 *
 * @property $id
 * @property $detalle
 * @property $periodo
 * @property $periodo_date
 * @property $created_at
 * @property $updated_at
 *
 * @property DetalleDeudasContrato[] $detalleDeudasContratos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Deuda extends Model
{
    
    static $rules = [
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['detalle','periodo','periodo_date'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detalleDeudasContratos()
    {
        return $this->hasMany('App\Models\DetalleDeudasContrato', 'deuda_id', 'id');
    }
    

}

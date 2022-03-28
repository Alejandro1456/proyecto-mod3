<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Instituto
 *
 * @property $id
 * @property $materia
 * @property $carrera
 * @property $tiempo
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Instituto extends Model
{
    
    static $rules = [
		'materia' => 'required',
		'carrera' => 'required',
		'tiempo' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['materia','carrera','tiempo'];



}

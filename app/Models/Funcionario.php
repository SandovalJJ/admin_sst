<?php

namespace App\Models;

use App\Traits\Auditable;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Funcionario extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'funcionarios';

    protected $dates = [
        'f_nacimiento',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const GENERO_SELECT = [
        'M' => 'Masculino',
        'F' => 'Femenino',
        'O' => 'Otro',
    ];

    protected $fillable = [
        'n_identificacion',
        'nombre',
        'genero',
        'f_nacimiento',
        'celular',
        'direccion',
        'cargo',
        'sede',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function nIdentificacionAsistencia()
    {
        return $this->belongsToMany(Asistencium::class);
    }

    public function getFNacimientoAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFNacimientoAttribute($value)
    {
        $this->attributes['f_nacimiento'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}

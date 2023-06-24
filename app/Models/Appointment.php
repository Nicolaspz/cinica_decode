<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable=[
        'sheduled_date',
        'sheduled_time',
        'type',
        'descricao',
        'medico_id',
        'pacient_id',
        'especialidade_id'
    ];
}

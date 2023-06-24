<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class especialidade extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'descricao',
        'updated_at',
        'created_at',

    ];
    public function users(){
        return $this->belongsToMany(User::class);
    }
}

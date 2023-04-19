<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Position extends Model
{
    protected $table = 'posicao';
    protected $fillable = [
        'id_session',
        'telefone',
        'posicao',
        'valor',
        'created_at',
        'updated_at'	
    ];
}

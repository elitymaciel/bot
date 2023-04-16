<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Contato extends Model
{
    protected $table = 'contatos';
    protected $fillable = [
        'session',
        'nome',
        'telefone',
        'email',
        'created_at',
        'updated_at',
    ];
}

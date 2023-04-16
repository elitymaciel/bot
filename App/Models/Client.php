<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Client extends Model
{
    protected $table = 'clientes';
    protected $fillable = [
        'instancia',
        'telefone',
        'nome_completo',
        'cpf',
        'cep',
        'endereco',
        'cidade',
        'id_user',
        'status',
        'created_at',
        'updated_at',
    ];
}

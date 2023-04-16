<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Mensagem extends Model
{
    protected $table = 'mensagens';
    protected $fillable = [
        'bot_id',
        'comentario',
        'pergunta',
        'resposta',
        'created_at',
        'updated_at',
    ];
}

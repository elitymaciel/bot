<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class DrawflowConexao extends Model
{
    protected $table = 'drawflow_conexao';
    public $timestamps = false;
    protected $fillable = [
        'id_session',
        'input_class',
        'input_id',
        'output_class',
        'output_id', 
    ];
}
